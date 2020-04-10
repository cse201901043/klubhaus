<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserMetas Controller
 *
 * @property \App\Model\Table\UserMetasTable $UserMetas
 *
 * @method \App\Model\Entity\UserMeta[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserMetasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['MetaUsers']
        ];
        $userMetas = $this->paginate($this->UserMetas);

        $this->set(compact('userMetas'));
    }

    /**
     * View method
     *
     * @param string|null $id User Meta id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userMeta = $this->UserMetas->get($id, [
            'contain' => ['MetaUsers']
        ]);

        $this->set('userMeta', $userMeta);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userMeta = $this->UserMetas->newEntity();
        if ($this->request->is('post')) {
            $userMeta = $this->UserMetas->patchEntity($userMeta, $this->request->getData());
            if ($this->UserMetas->save($userMeta)) {
                $this->Flash->success(__('The user meta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user meta could not be saved. Please, try again.'));
        }
        $metaUsers = $this->UserMetas->MetaUsers->find('list', ['limit' => 200]);
        $this->set(compact('userMeta', 'metaUsers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Meta id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userMeta = $this->UserMetas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userMeta = $this->UserMetas->patchEntity($userMeta, $this->request->getData());
            if ($this->UserMetas->save($userMeta)) {
                $this->Flash->success(__('The user meta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user meta could not be saved. Please, try again.'));
        }
        $metaUsers = $this->UserMetas->MetaUsers->find('list', ['limit' => 200]);
        $this->set(compact('userMeta', 'metaUsers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Meta id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userMeta = $this->UserMetas->get($id);
        if ($this->UserMetas->delete($userMeta)) {
            $this->Flash->success(__('The user meta has been deleted.'));
        } else {
            $this->Flash->error(__('The user meta could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
