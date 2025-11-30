<?php
declare(strict_types=1);

namespace App\Controller;

use Authorization\AuthorizationService;
use Authorization\AuthorizationServiceProviderInterface;
use Cake\Http\Client;

/**
 * Contacts Controller
 *
 * @property \App\Model\Table\ContactsTable $Contacts
 */
class ContactsController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Recaptcha.Recaptcha', [
            'enable' => true,
            'sitekey' => '6LcymP0qAAAAAI2i4qBv5sCO8R2r98S3P9-_fxL9',
            'secret' => '6LcymP0qAAAAAPiBExR-uKs14t8xp0rGbLudpV4x',
            'type' => 'image',
            'theme' => 'light',
            'lang' => 'en',
            'size' => 'normal',
            'callback' => null,
            'scriptBlock' => true
        ]);

        $this->Authentication->allowUnauthenticated(['add','thankyou']);
        $this->viewBuilder()->setLayout('admin');   // Optional if you have admin layout

    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Contacts->find();
//        $query = $this->Authorization->applyScope($query);
        $this->Authorization->skipAuthorization();
        // Add Search Functionality:
        $search = $this->request->getQuery('search');
        if (!empty($search)) {
            $query->where([
                'OR' => [
                    'Contacts.name LIKE' => '%' . $search . '%',
                    'Contacts.email LIKE' => '%' . $search . '%',
                    'Contacts.message LIKE' => '%' . $search . '%',
                ]
            ]);
        }

        $contacts = $this->paginate($query);

        $this->set(compact('contacts'));
    }


    /**
     * View method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contact = $this->Contacts->newEmptyEntity();
        $this->Authorization->authorize($contact);
        $contact = $this->Contacts->get($id, contain: []);
        $this->set(compact('contact'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        // Check if user is logged in, set layout accordingly
        $identity = $this->request->getAttribute('identity');
        if ($identity) {
            // Logged-in user (admin/staff)
            $this->viewBuilder()->setLayout('admin'); // or whatever your logged-in layout is
        } else {
            // Public user
            $this->viewBuilder()->setLayout('default');
        }

        $this->Authorization->skipAuthorization();

        $contact = $this->Contacts->newEmptyEntity();

        if ($this->request->is('post')) {
            $recaptchaResponse = $this->request->getData('g-recaptcha-response');

            $contact = $this->Contacts->patchEntity($contact, $this->request->getData());

            if ($this->Contacts->save($contact)) {
                if (!$this->_verifyRecaptcha($recaptchaResponse)) {
                    // Delete saved message if reCAPTCHA fails (optional, to prevent spam)
                    $this->Contacts->delete($contact);
                    $this->Flash->error(__('Please complete the reCAPTCHA to continue.'));
                } else {
                    return $this->redirect(['controller' => 'Pages', 'action' => 'thankyou']);
                }
            } else {
                $this->Flash->error(__('Your message could not be saved. Please try again.'));
            }
        }

        $this->set(compact('contact'));
    }



    /**
     * Edit method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contact = $this->Contacts->newEmptyEntity();
        $this->Authorization->authorize($contact);
        $contact = $this->Contacts->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contact = $this->Contacts->patchEntity($contact, $this->request->getData());
            if ($this->Contacts->save($contact)) {
                $this->Flash->success(__('The contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contact could not be saved. Please, try again.'));
        }
        $this->set(compact('contact'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $contact = $this->Contacts->newEmptyEntity();
        $this->Authorization->authorize($contact);
        $this->request->allowMethod(['post', 'delete']);
        $contact = $this->Contacts->get($id);
        if ($this->Contacts->delete($contact)) {
            $this->Flash->success(__('The contact has been deleted.'));
        } else {
            $this->Flash->error(__('The contact could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    private function _verifyRecaptcha($recaptchaResponse) {
        $secretKey = '6LcymP0qAAAAAPiBExR-uKs14t8xp0rGbLudpV4x';
        $url = 'https://www.google.com/recaptcha/api/siteverify';

        $http = new Client();
        $response = $http->post($url, [
            'secret' => $secretKey,
            'response' => $recaptchaResponse,
        ]);

        $data = json_decode($response->getBody()->getContents(), true);

        return $data['success'] ?? false;
    }
}
