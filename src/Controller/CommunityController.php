<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Community Controller
 *
 * @property \App\Model\Table\CommunityTable $Community
 *
 * @method \App\Model\Entity\Community[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CommunityController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->viewBuilder()->setLayout('frontend_layout');
        $community = $this->paginate($this->Community);

        $this->set(compact('community'));
    }

    /**
     * View method
     *
     * @param string|null $id Community id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $community = $this->Community->get($id, [
            'contain' => []
        ]);

        $this->set('community', $community);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $community = $this->Community->newEntity();
        if ($this->request->is('post')) {
            $community = $this->Community->patchEntity($community, $this->request->getData());
            if ($this->Community->save($community)) {
                $this->Flash->success(__('The community has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The community could not be saved. Please, try again.'));
        }
        $this->set(compact('community'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Community id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $community = $this->Community->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $community = $this->Community->patchEntity($community, $this->request->getData());
            if ($this->Community->save($community)) {
                $this->Flash->success(__('The community has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The community could not be saved. Please, try again.'));
        }
        $this->set(compact('community'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Community id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $community = $this->Community->get($id);
        if ($this->Community->delete($community)) {
            $this->Flash->success(__('The community has been deleted.'));
        } else {
            $this->Flash->error(__('The community could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function addCommunity()
    {
        if ($this->request->is('post')) {
            $community = $this->Community->patchEntity($community, $this->request->getData());
            if ($this->Community->save($community)) {
                $this->Flash->success(__('The community has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The community could not be saved. Please, try again.'));
        }
        $this->set(compact('community'));
    }

    public function addCommunityInfo()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $community = $this->Community->newEntity();
            $community['video_code'] = $this->request->data('video_code');
            $community['title'] = filter_var($this->request->data('title'),FILTER_SANITIZE_STRING);
            $community['discription'] = filter_var($this->request->data('discription'),FILTER_SANITIZE_STRING);
            $community['deleted'] = "0";
            $community['created_by'] = $this->Auth->user('id');
            $this->Community->save($community);
            $this->Flash->success('Community Saved Successfully', [
                'key' => 'positive',
            ]);
        }
        return $this->redirect($this->referer());
        
    }


   public function viewCommunity()
   {
        $community = $this->Community->find()->where(['deleted' => 0])->order(['community_id' => 'DESC']);
        $this->paginate = array(
            'limit' => 20,
        );
        $this->set('productBrand', $this->paginate($community));
   }


   public function singleEditCommunity($community_id)
   {
    $community = $this->Community->get($community_id, [
        'contain' => []
    ]);
    $this->set(compact('community'));
   }

   public function singleEditCommunityInfo()
   {
       $this->autoRender = false;
    if ($this->request->is('post')) {
        $community_id = $this->request->data('community_id');
        $community = $this->Community->get($community_id);
        $community['video_code'] = $this->request->data('video_code');
        $community['title'] = filter_var($this->request->data('title'),FILTER_SANITIZE_STRING);
        $community['discription'] = filter_var($this->request->data('discription'),FILTER_SANITIZE_STRING);
        $community['updated_by'] = $this->Auth->user('id');
        $this->Community->save($community);
        $this->Flash->success('Community Updated Successfully', [
                'key' => 'positive',
            ]);
    }
        return $this->redirect($this->referer());

   }

}
