<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AccessLogs Controller
 *
 * @property \App\Model\Table\AccessLogsTable $AccessLogs
 *
 * @method \App\Model\Entity\AccessLog[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AccessLogsController extends AppController
{

    /**
     * index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Macs']
        ];
        $accessLogs = $this->paginate($this->AccessLogs);

        $this->set(compact('accessLogs'));
    }

    /**
     * View method
     *
     * @param string|null $id Access Log id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $accessLog = $this->AccessLogs->get($id, [
            'contain' => ['Users', 'Macs']
        ]);

        $this->set('accessLog', $accessLog);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $accessLog = $this->AccessLogs->newEntity();
        if ($this->request->is('post')) {
            $accessLog = $this->AccessLogs->patchEntity($accessLog, $this->request->getData());
            if ($this->AccessLogs->save($accessLog)) {
                $this->Flash->success(__('The access log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The access log could not be saved. Please, try again.'));
        }
        $users = $this->AccessLogs->Users->find('list', ['limit' => 200]);
        $macs = $this->AccessLogs->Macs->find('list', ['limit' => 200]);
        $this->set(compact('accessLog', 'users', 'macs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Access Log id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $accessLog = $this->AccessLogs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $accessLog = $this->AccessLogs->patchEntity($accessLog, $this->request->getData());
            if ($this->AccessLogs->save($accessLog)) {
                $this->Flash->success(__('The access log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The access log could not be saved. Please, try again.'));
        }
        $users = $this->AccessLogs->Users->find('list', ['limit' => 200]);
        $macs = $this->AccessLogs->Macs->find('list', ['limit' => 200]);
        $this->set(compact('accessLog', 'users', 'macs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Access Log id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $accessLog = $this->AccessLogs->get($id);
        if ($this->AccessLogs->delete($accessLog)) {
            $this->Flash->success(__('The access log has been deleted.'));
        } else {
            $this->Flash->error(__('The access log could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
