<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * RepairRequests Controller
 *
 * @property \App\Model\Table\RepairRequestsTable $RepairRequests
 * @property \Authorization\Controller\Component\AuthorizationComponent $Authorization
 */
class RepairRequestsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Authentication.Authentication'); // ✅ Load auth component
        $this->loadComponent('Authorization.Authorization');
        $this->viewBuilder()->setLayout('admin');   // Optional if you have admin layout

    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        // ✅ Allow unauthenticated users to access 'add'
        $this->Authentication->addUnauthenticatedActions(['add']);

        // ✅ Skip authorization if unauthenticated
        if ($this->request->getParam('action') === 'add') {
            $this->Authorization->skipAuthorization();
        }
    }

    public function index()
    {
        $query = $this->RepairRequests->find();
        $query = $this->Authorization->applyScope($query);
        $repairRequests = $this->paginate($query);

        $this->set(compact('repairRequests'));
    }

    public function view($id = null)
    {
        $repairRequest = $this->RepairRequests->get($id, contain: []);
        $this->Authorization->authorize($repairRequest);
        $this->set(compact('repairRequest'));
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

        $repairRequest = $this->RepairRequests->newEmptyEntity();

        // ✅ Authorization already skipped in beforeFilter
        if ($this->request->is('post')) {
            $data = $this->request->getData();

            // Set the equipment field based on equipment_type or a default value
            if (!isset($data['equipment'])) {
                // Option 1: Copy from equipment_type if available
                if (isset($data['equipment_type'])) {
                    $data['equipment'] = $data['equipment_type'];
                }
                // Option 2: Or set a default value
                else {
                    $data['equipment'] = 'Not specified';
                }
            }

            $repairRequest = $this->RepairRequests->patchEntity($repairRequest, $data);
            if ($this->RepairRequests->save($repairRequest)) {
                $this->Flash->success(__('Your repair request has been submitted.'));
                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The repair request could not be submitted. Please, try again.'));
        }
        $this->set(compact('repairRequest'));
    }

    public function edit($id = null)
    {
        $repairRequest = $this->RepairRequests->get($id, contain: []);
        $this->Authorization->authorize($repairRequest);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();

            // Make sure equipment field is set when editing too
            if (!isset($data['equipment'])) {
                // Option 1: Copy from equipment_type if available
                if (isset($data['equipment_type'])) {
                    $data['equipment'] = $data['equipment_type'];
                }
                // Option 2: Or keep the existing value
                else {
                    $data['equipment'] = $repairRequest->equipment;
                }
            }

            $repairRequest = $this->RepairRequests->patchEntity($repairRequest, $data);
            if ($this->RepairRequests->save($repairRequest)) {
                $this->Flash->success(__('The repair request has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The repair request could not be saved. Please, try again.'));
        }
        $this->set(compact('repairRequest'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $repairRequest = $this->RepairRequests->get($id);
        $this->Authorization->authorize($repairRequest);
        if ($this->RepairRequests->delete($repairRequest)) {
            $this->Flash->success(__('The repair request has been deleted.'));
        } else {
            $this->Flash->error(__('The repair request could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
