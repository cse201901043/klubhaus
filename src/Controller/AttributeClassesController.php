<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;

use App\Controller\AppController;

/**
 * AttributeClasses Controller
 *
 * @property \App\Model\Table\AttributeClassesTable $AttributeClasses
 *
 * @method \App\Model\Entity\AttributeClass[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AttributeClassesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $attributeClasses = $this->paginate($this->AttributeClasses);
        $this->set(compact('attributeClasses'));
    }

    /**
     * View method
     *
     * @param string|null $id Attribute Class id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $attributeClass = $this->AttributeClasses->get($id, [
            'contain' => []
        ]);

        $this->set('attributeClass', $attributeClass);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $attributeClass = $this->AttributeClasses->newEntity();
        if ($this->request->is('post')) {
            $attributeClass = $this->AttributeClasses->patchEntity($attributeClass, $this->request->getData());
            if ($this->AttributeClasses->save($attributeClass)) {
                $this->Flash->success(__('The attribute class has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The attribute class could not be saved. Please, try again.'));
        }
        $this->set(compact('attributeClass'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Attribute Class id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $attributeClass = $this->AttributeClasses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $attributeClass = $this->AttributeClasses->patchEntity($attributeClass, $this->request->getData());
            if ($this->AttributeClasses->save($attributeClass)) {
                $this->Flash->success(__('The attribute class has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The attribute class could not be saved. Please, try again.'));
        }
        $this->set(compact('attributeClass'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Attribute Class id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $attributeClass = $this->AttributeClasses->get($id);
        if ($this->AttributeClasses->delete($attributeClass)) {
            $this->Flash->success(__('The attribute class has been deleted.'));
        } else {
            $this->Flash->error(__('The attribute class could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


//    Admin Panel Start ////////////////

    public function AdminAttributeSettings()
    {
        $attributeClasses = $this->AttributeClasses->find('all');
        $attributeTypes = TableRegistry::get('AttributeTypes')->find('all')->where(['deleted' => 0]);
        $attributeValues = TableRegistry::get('AttributeValues')->find('all')->where(['deleted' => 0]);
        $this->set(compact('attributeClasses', 'attributeTypes', 'attributeValues'));

    }


    public function Adminadd()
    {
         
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $user = $this->AttributeClasses->newEntity();
            $name = trim($this->request->data('attribute_class_name'));
            $user['attribute_class_name'] = trim(filter_var($this->request->data('attribute_class_name')),FILTER_SANITIZE_STRING);
            $user['attribute_class_slug'] = strtolower(str_replace(" ", "_", $name));
            $user['deleted'] = "0";
            $user['created_by'] = $this->Auth->user('id');
            $this->AttributeClasses->save($user);
            echo json_encode($user);
            die();
        }
        
   
    }


    public function AdmineditAttributeClass()
    {
        $attributeClasses = $this->AttributeClasses->find()->where(['deleted' => 0])->order(['attribute_class_id' => 'DESC']);
        $this->paginate = array(
            'limit' => 20,

        );

        $this->set('attributeClasses', $this->paginate($attributeClasses));
    }

    public function AdminsingleEditClass($id = null)
    {
        $attributeClasses = $this->AttributeClasses->get($id, [
            'contain' => []
        ]);

        $this->set(compact('attributeClasses'));


    }

    public function singleDeleteClass($id = null)
    {
        $attributeClasses = $this->AttributeClasses->get($id);
        $attributeClasses->deleted = 1;
        if ($this->AttributeClasses->save($attributeClasses)) {
        }
        return $this->redirect($this->referer());
 
    }

    public function AdminsingleEditClassData()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $id = $this->request->data('attribute_class_id');
            $attributeClasses = $this->AttributeClasses->get($id);
            $name = trim($this->request->data('attribute_class_name'));
            $attributeClasses['attribute_class_name'] = trim(filter_var($this->request->data('attribute_class_name')),FILTER_SANITIZE_STRING);
            $attributeClasses['attribute_class_slug'] = strtolower(str_replace(" ", "_", $name));
            $attributeClasses['updated_by'] = $this->Auth->user('id');
            $this->AttributeClasses->save($attributeClasses);
            
        }
        return $this->redirect($this->referer());
    }
}
