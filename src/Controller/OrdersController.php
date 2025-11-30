<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\I18n\FrozenTime;
use Cake\Mailer\Mailer;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 * @property \Authorization\Controller\Component\AuthorizationComponent $Authorization
 */
class OrdersController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Authorization.Authorization');
        $this->Authentication->allowUnauthenticated(['index', 'publicView', 'order_detail', 'checkout', 'placeOrder', 'confirmation']);
        $this->viewBuilder()->setLayout('admin');   // Optional if you have admin layout

        $this->Authorization->skipAuthorization();
    }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

        $query = $this->Orders->find();
//        $query = $this->Authorization->applyScope($query);
        $orders = $this->paginate($query);

        $this->set(compact('orders'));
    }

    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $order = $this->Orders->get($id, contain: ['OrderItems']);
        $this->Authorization->authorize($order);
        $this->set(compact('order'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $order = $this->Orders->newEmptyEntity();
        $this->Authorization->authorize($order);
        if ($this->request->is('post')) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $this->set(compact('order'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $order = $this->Orders->get($id, contain: []);
        $this->Authorization->authorize($order);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $this->set(compact('order'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id, [
            'contain' => ['OrderItems'], // Load related items
        ]);

        $this->Authorization->authorize($order);

        // Begin transaction for safe rollback in case of failure
        $this->Orders->getConnection()->begin();

        try {
            // Delete related order items first
            foreach ($order->order_items as $item) {
                $this->Orders->OrderItems->delete($item);
            }

            // Now delete the order
            if ($this->Orders->delete($order)) {
                $this->Orders->getConnection()->commit();
                $this->Flash->success(__('The order has been deleted.'));
            } else {
                $this->Orders->getConnection()->rollback();
                $this->Flash->error(__('The order could not be deleted. Please, try again.'));
            }
        } catch (\Exception $e) {
            $this->Orders->getConnection()->rollback();
            $this->Flash->error(__('Error deleting order: ' . $e->getMessage()));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function complete($id = null)
    {
        $this->request->allowMethod(['post', 'patch', 'put']);
        $order = $this->Orders->get($id);
        $order->status = 'Completed';
        if ($this->Orders->save($order)) {
            $this->Flash->success(__('Order marked as completed.'));
        } else {
            $this->Flash->error(__('Unable to complete the order.'));
        }
        return $this->redirect($this->referer());
    }



    public function placeOrder()
    {
        $session = $this->getRequest()->getSession();
        $cart = $session->read('Cart') ?? [];

        if (empty($cart)) {
            $this->Flash->error('Your cart is empty.');
            return $this->redirect(['controller' => 'Products', 'action' => 'publicIndex']);
        }

        if ($this->request->is('post')) {
            $data = $this->request->getData();

            $discountPercent = 0;
            $discountCode = strtoupper(trim($data['discount_code'] ?? ''));

            if ($discountCode === 'SAVE10') {
                $discountPercent = 10;
                $this->Flash->success('Discount SAVE10 applied. You saved 10%!');
            }

            $shippingCost = 0;
            if ($data['delivery_method'] === 'Express') {
                $shippingCost = 50.00;
            }

            $subtotal = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));

            $discountAmount = ($discountPercent > 0) ? $subtotal * ($discountPercent / 100) : 0;
            $subtotalAfterDiscount = $subtotal - $discountAmount;

            $installationCost = !empty($data['install_address']) || !empty($data['install_datetime']) ? ($subtotal * 0.20) : 0;

            $total = $subtotalAfterDiscount + $shippingCost + $installationCost;

            $order = $this->Orders->newEmptyEntity();
            $order->total_amount = $total;
            $order->status = 'Pending';
            $order->customer_name = $data['customer_name'];
            $order->email = $data['email'];
            $order->address = $data['address'];
            $order->delivery_method = $data['delivery_method'];
            $order->shipping_cost = $shippingCost;

            // Save installation info if provided
            if (!empty($data['install_address']) || !empty($data['install_datetime'])) {
                $order->install_address = $data['install_address'] ?? null;
                $order->install_datetime = $data['install_datetime'] ?? null;
                $order->requires_installation = true;
            }

            if ($this->Orders->save($order)) {
                foreach ($cart as $item) {
                    $orderItem = $this->Orders->OrderItems->newEmptyEntity();
                    $orderItem->order_id = $order->id;
                    $orderItem->product_id = $item['id'];
                    $orderItem->quantity = $item['quantity'];
                    $orderItem->price = $item['price'];
                    $this->Orders->OrderItems->save($orderItem);

                    $product = $this->Orders->OrderItems->Products->get($item['id']);
                    $product->stock_level -= $item['quantity'];
                    $this->Orders->OrderItems->Products->save($product);
                }

                $mailer = new Mailer('default');
                $mailer->setTo($order->email)
                    ->setSubject('Order Confirmation - PowerProShop')
                    ->setEmailFormat('html')
                    ->viewBuilder()
                    ->setTemplate('order_confirmation')
                    ->setLayout('default');

                $orderItems = $this->Orders->OrderItems->find()
                    ->contain(['Products'])
                    ->where(['order_id' => $order->id])
                    ->all();

                $mailer->setViewVars([
                    'customerName' => $order->customer_name,
                    'order' => $order,
                    'items' => $orderItems,
                    'total' => $order->total_amount,
                ]);

//                $mailer->deliver();

                $session->delete('Cart');


                return $this->redirect(['action' => 'confirmation', $order->id]);
            }

            $this->Flash->error('Could not place the order.');
        }

        return $this->redirect(['action' => 'checkout']);
    }

    public function checkout()
    {
        $this->viewBuilder()->setLayout('default');

        $cart = $this->request->getSession()->read('Cart') ?? [];

        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        $shipping = $subtotal > 100 ? 0 : 10;
        $discount = 0;

        if ($this->request->is('post')) {
            $discountCode = $this->request->getData('discount_code');
            if ($discountCode === 'SAVE10') {
                $discount = $subtotal * 0.10;
                $this->Flash->success('Discount applied!');
            } else if (!empty($discountCode)) {
                $this->Flash->error('Invalid discount code.');
            }
        }

        $this->set(compact('cart', 'subtotal', 'shipping', 'discount'));
    }

    public function confirmation($orderId = null)
    {
        $this->viewBuilder()->setLayout('default');

        if (!$orderId) {
            throw new NotFoundException(__('Invalid order ID'));
        }

        $order = $this->Orders->get($orderId, [
            'contain' => ['OrderItems' => ['Products']]
        ]);

        $this->set([
            'order' => $order,
            'orderItems' => $order->order_items,
        ]);
    }

}
