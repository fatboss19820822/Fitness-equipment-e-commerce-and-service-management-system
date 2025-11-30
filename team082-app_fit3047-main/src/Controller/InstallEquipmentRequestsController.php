<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * InstallEquipmentRequests Controller
 *
 * @property \App\Model\Table\InstallEquipmentRequestsTable $InstallEquipmentRequests
 * @property \Authorization\Controller\Component\AuthorizationComponent $Authorization
 */
class InstallEquipmentRequestsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Authentication.Authentication');
        $this->loadComponent('Authorization.Authorization');
        $this->viewBuilder()->setLayout('admin');   // Optional if you have admin layout

    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        // Allow unauthenticated access to 'add' action
        $this->Authentication->addUnauthenticatedActions(['add']);

        if ($this->request->getParam('action') === 'add') {
            $this->Authorization->skipAuthorization();
        }
    }

    public function index()
    {
        $query = $this->InstallEquipmentRequests->find();
        $query = $this->Authorization->applyScope($query);
        $installEquipmentRequests = $this->paginate($query);

        $this->set(compact('installEquipmentRequests'));
    }

    public function view($id = null)
    {
        $installEquipmentRequest = $this->InstallEquipmentRequests->get($id, contain: []);
        $this->Authorization->authorize($installEquipmentRequest);
        $this->set(compact('installEquipmentRequest'));
    }

    public function add()
    {
        $identity = $this->request->getAttribute('identity');
        if ($identity) {
            // Logged-in user (admin/staff)
            $this->viewBuilder()->setLayout('admin'); // or whatever your logged-in layout is
        } else {
            // Public user
            $this->viewBuilder()->setLayout('default');
        }

        $installEquipmentRequest = $this->InstallEquipmentRequests->newEmptyEntity();

        if ($this->request->is('post')) {
            $installEquipmentRequest = $this->InstallEquipmentRequests->patchEntity($installEquipmentRequest, $this->request->getData());

            // ✅ Generate a unique booking number
            $installEquipmentRequest->booking_number = 'BOOK-' . strtoupper(uniqid());

            if ($this->InstallEquipmentRequests->save($installEquipmentRequest)) {
                $this->Flash->success(__('Your booking is confirmed! Your booking number is: {0}', $installEquipmentRequest->booking_number));

                return $this->redirect(['controller' => 'Pages', 'action' => 'thankyou']);
            }
            $this->Flash->error(__('The request could not be saved. Please, try again.'));
        }

        $this->set(compact('installEquipmentRequest'));
    }

    public function edit($id = null)
    {
        $installEquipmentRequest = $this->InstallEquipmentRequests->get($id, contain: []);
        $this->Authorization->authorize($installEquipmentRequest);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $installEquipmentRequest = $this->InstallEquipmentRequests->patchEntity($installEquipmentRequest, $this->request->getData());
            if ($this->InstallEquipmentRequests->save($installEquipmentRequest)) {
                $this->Flash->success(__('The install equipment request has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The install equipment request could not be saved. Please, try again.'));
        }
        $this->set(compact('installEquipmentRequest'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $installEquipmentRequest = $this->InstallEquipmentRequests->get($id);
        $this->Authorization->authorize($installEquipmentRequest);
        if ($this->InstallEquipmentRequests->delete($installEquipmentRequest)) {
            $this->Flash->success(__('The install equipment request has been deleted.'));
        } else {
            $this->Flash->error(__('The install equipment request could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function updateStatus($id = null)
    {
        $this->request->allowMethod(['post', 'put']);
        $request = $this->InstallEquipmentRequests->get($id);

        // ✅ Authorization check
        $this->Authorization->authorize($request);

        $request->status = $this->request->getData('status');

        if ($this->InstallEquipmentRequests->save($request)) {
            $this->Flash->success(__('The status has been updated.'));
        } else {
            $this->Flash->error(__('Unable to update the status. Please try again.'));
        }

        return $this->redirect($this->referer());
    }
}
