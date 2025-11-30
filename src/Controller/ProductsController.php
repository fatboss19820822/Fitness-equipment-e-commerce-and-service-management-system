<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 */
class ProductsController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Authentication.Authentication');
        $this->Authentication->allowUnauthenticated([
            'addToCart', 'cart', 'checkout',
            'increase', 'decrease', 'remove',
            'publicIndex', 'publicView', 'requestRepair'
        ]);
        $this->Authorization->skipAuthorization();
        $this->viewBuilder()->setLayout('admin');   // Optional if you have admin layout

    }

    public function beforeFilter(\Cake\Event\EventInterface $event): void
    {
        parent::beforeFilter($event);

        $this->Authentication->addUnauthenticatedActions([
            'addToCart', 'cart', 'checkout',
            'increase', 'decrease', 'remove',
            'publicIndex', 'publicView'
        ]);
    }

    /**
     * Request Repair Form
     *
     * @return \Cake\Http\Response|null|void
     */
    public function requestRepair()
    {
        // If the form is submitted (POST request), process the data
        if ($this->request->is('post')) {
            // Get the form data
            $formData = $this->request->getData();

            // You can optionally save this data to a ServiceRequests model or perform some other action.
            // Assuming a ServiceRequests model, you'd save it like this:
            // $this->loadModel('ServiceRequests');
            // $serviceRequest = $this->ServiceRequests->newEntity($formData);
            // if ($this->ServiceRequests->save($serviceRequest)) {
            //    $this->Flash->success(__('Your service request has been submitted.'));
            // } else {
            //    $this->Flash->error(__('There was an error with your request.'));
            // }

            // Flash success message and redirect
            $this->Flash->success(__('Your service request has been submitted successfully!'));
            return $this->redirect(['action' => 'requestRepair']);
        }

        // Render the request repair form page
        $this->set('title', 'Repair Request Form');
    }



    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

        $query = $this->Products->find();
        $products = $this->paginate($query);

        $key = $this->request->getQuery('key');
        $selectedCategory = $this->request->getQuery('category');
        $minPrice = $this->request->getQuery('min_price');
        $maxPrice = $this->request->getQuery('max_price');

        $conditions = [];

        if ($key) {
            $conditions[] = [
                'OR' => [
                    'Products.name LIKE' => '%' . $key . '%',
                    'Products.category LIKE' => '%' . $key . '%'
                ]
            ];
        }

        if ($selectedCategory) {
            $conditions['Products.category'] = $selectedCategory;
        }

        if ($minPrice !== null && $maxPrice !== null) {
            $conditions[] = [
                'Products.price >=' => (float)$minPrice,
                'Products.price <=' => (float)$maxPrice
            ];
        }

        $query = $this->Products->find()->where($conditions);

        $this->set([
            'products' => $this->paginate($query),
            'categories' => $this->Products->find()->select(['category'])->distinct()->all(),
            'selectedCategory' => $selectedCategory
        ]);
    }

    public function cart()
    {
        $this->viewBuilder()->setLayout('default');

        $session = $this->getRequest()->getSession();
        $cart = $session->read('Cart') ?? [];

        // Pass the cart to the view
        $this->set(compact('cart'));
    }

    public function publicIndex()
    {
        $this->Authorization->skipAuthorization();
        $this->viewBuilder()->setLayout('default');


        $key = $this->request->getQuery('key');
        $selectedCategory = $this->request->getQuery('category');
        $minPrice = $this->request->getQuery('min_price');
        $maxPrice = $this->request->getQuery('max_price');

        $conditions = [];

        if ($key) {
            $conditions[] = [
                'OR' => [
                    'Products.name LIKE' => '%' . $key . '%',
                    'Products.category LIKE' => '%' . $key . '%'
                ]
            ];
        }

        if ($selectedCategory) {
            $conditions['Products.category'] = $selectedCategory;
        }

        if ($minPrice !== null && $maxPrice !== null) {
            $conditions[] = [
                'Products.price >=' => (float)$minPrice,
                'Products.price <=' => (float)$maxPrice
            ];
        }

        $query = $this->Products->find()->where($conditions);

        $this->set([
            'products' => $this->paginate($query),
            'categories' => $this->Products->find()->select(['category'])->distinct()->all(),
            'selectedCategory' => $selectedCategory
        ]);
    }


    public function publicView($id = null)
    {
        $this->viewBuilder()->setLayout('default');

        $this->Authorization->skipAuthorization();

        $product = $this->Products->get($id, contain: []);
        $this->set(compact('product'));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, contain: []);
        $this->set(compact('product'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $product = $this->Products->newEmptyEntity();

        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->getData());

            if (!$product->getErrors()) {
                $image = $this->request->getData('image_file');
                $name = $image->getClientFilename();

                if ($name) {
                    $targetPath = WWW_ROOT . 'img/products' . DS . $name;
                    $image->moveTo($targetPath);
                    $product->image = $name;
                }
            }

            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }

        // Add category options here
        $categoryOptions = [
            'Free Weight' => 'Free Weight',
            'Machine' => 'Machine',
            'Cardio' => 'Cardio',
            'Accessory' => 'Accessory',
        ];

        $this->set(compact('product', 'categoryOptions'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, contain: []);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());

            if (!$product->getErrors()) {
                $image = $this->request->getData('image_file');
                $name = $image->getClientFilename();

                if ($name) {
                    $targetPath = WWW_ROOT . 'img/products' . DS . $name;
                    $image->moveTo($targetPath);
                    $product->image = $name;
                }
            }

            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }

        $categoryOptions = [
            'Freeweight' => 'Free Weight',
            'Machine' => 'Machine',
            'Cardio' => 'Cardio',
            'Accessory' => 'Accessory',
        ];

        $this->set(compact('product', 'categoryOptions'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function addToCart($productId)
    {
        // Get the product record
        $product = $this->Products->get($productId);
        $session = $this->getRequest()->getSession();

        // Retrieve the cart from session (or create a new one)
        $cart = $session->read('Cart') ?? [];

        // Get current quantity in cart (if any)
        $currentQuantity = isset($cart[$productId]) ? $cart[$productId]['quantity'] : 0;

        // Check if adding one more exceeds available stock
        if ($currentQuantity + 1 > $product->stock_level) {
            $this->Flash->error(__('Cannot add more of this product. Not enough stock available.'));
            return $this->redirect($this->referer());
        }

        // If product already exists in cart, increase the quantity; otherwise, add it.
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += 1;
        } else {
            $cart[$productId] = [
                'id'       => $product->id,
                'name'     => $product->name,
                'price'    => $product->price,
                'image'    => $product->image,
                'quantity' => 1
            ];
        }

        $session->write('Cart', $cart);
        $this->Flash->success(__('Product added to cart.'));

        return $this->redirect($this->referer());
    }


    public function decrease($productId){
        $this->autoRender = false;

        // Get the product record
        $product = $this->Products->get($productId);
        $session = $this->getRequest()->getSession();

        $cart = $session->read('Cart') ?? [];

        $currentQuantity = isset($cart[$productId]) ? $cart[$productId]['quantity'] : 0;

        if ($currentQuantity > 0) {
            // Decrease the quantity
            $cart[$productId]['quantity'] -= 1;

            // If the quantity is now 0, remove the product from the cart
            if ($cart[$productId]['quantity'] === 0) {
                unset($cart[$productId]);
                $session->write('Cart', $cart);
                $this->Flash->success(__('Product removed from the cart'));
                return $this->redirect($this->referer());
            }

            $session->write('Cart', $cart);
            $this->Flash->success(__('Product quantity decreased in cart.'));
        } else {
            $this->Flash->error(__('Product is not in the cart or quantity is already zero.'));
        }

        return $this->redirect($this->referer());

    }

    public function remove($productId){
        $this->autoRender = false;

        $product = $this->Products->get($productId);
        $session = $this->getRequest()->getSession();

        // Retrieve the cart from session (or create a new one)
        $cart = $session->read('Cart') ?? [];

        // Check if the product exists in the cart
        if (isset($cart[$productId])) {
            unset($cart[$productId]); // Remove the product entirely
            $session->write('Cart', $cart);
            $this->Flash->success(__('Product removed from cart.'));
        } else {
            $this->Flash->error(__('Product not found in cart.'));
        }

        return $this->redirect($this->referer());
    }

}
