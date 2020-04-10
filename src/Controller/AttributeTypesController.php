<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * AttributeTypes Controller
 *
 * @property \App\Model\Table\AttributeTypesTable $AttributeTypes
 *
 * @method \App\Model\Entity\AttributeType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AttributeTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['AttributeTypesClasses']
        ];
        $attributeTypes = $this->paginate($this->AttributeTypes);

        $this->set(compact('attributeTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Attribute Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $attributeType = $this->AttributeTypes->get($id, [
            'contain' => ['AttributeTypesClasses']
        ]);

        $this->set('attributeType', $attributeType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $attributeType = $this->AttributeTypes->newEntity();
        if ($this->request->is('post')) {
            $attributeType = $this->AttributeTypes->patchEntity($attributeType, $this->request->getData());
            if ($this->AttributeTypes->save($attributeType)) {
                $this->Flash->success(__('The attribute type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The attribute type could not be saved. Please, try again.'));
        }
        $attributeTypesClasses = $this->AttributeTypes->AttributeTypesClasses->find('list', ['limit' => 200]);
        $this->set(compact('attributeType', 'attributeTypesClasses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Attribute Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $attributeType = $this->AttributeTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $attributeType = $this->AttributeTypes->patchEntity($attributeType, $this->request->getData());
            if ($this->AttributeTypes->save($attributeType)) {
                $this->Flash->success(__('The attribute type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The attribute type could not be saved. Please, try again.'));
        }
        $attributeTypesClasses = $this->AttributeTypes->AttributeTypesClasses->find('list', ['limit' => 200]);
        $this->set(compact('attributeType', 'attributeTypesClasses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Attribute Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $attributeType = $this->AttributeTypes->get($id);
        if ($this->AttributeTypes->delete($attributeType)) {
            $this->Flash->success(__('The attribute type has been deleted.'));
        } else {
            $this->Flash->error(__('The attribute type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


//    Admin Start


    public function Adminadd()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $users = $this->AttributeTypes->newEntity();
            $name = trim($this->request->data('f'));
            $users['attribute_type_name'] = trim(filter_var($this->request->data('f')),FILTER_SANITIZE_STRING);
            $users['attribute_type_slug'] = strtolower(str_replace(" ", "_", $name));
            $users['deleted'] = 0;
            $users['attribute_types_class_id'] = $this->request->data('e');;
            $users['created_by'] = $this->Auth->user('id');
            $this->AttributeTypes->save($users);
            echo json_encode($users);
            die();
            
        }
    }


    public function AdmingetTypeData()
    {
            
        $this->autoRender = false;

        if ($this->request->is('post')) {
            $attributeTypeId = $this->request->data('attribute_types_class_id');
            $attributeType = $this->AttributeTypes->find()->where(['attribute_types_class_id' => $attributeTypeId])->all();
            echo json_encode($attributeType);
            die();
        }
           
    }
    

    public function AdmineditAttributeType()
    {

        $attributeTypes = $this->AttributeTypes->find()->where(['deleted' => 0])->order(['attribute_type_id' => 'DESC']);
        $this->paginate = array(
            'limit' => 20,
        );

        $this->set('attributeTypes', $this->paginate($attributeTypes));

    }

    public function AdminsingleEditType($id = null)
    {
        $attributeTypes = $this->AttributeTypes->get($id, [
            'contain' => []
        ]);
        $this->set(compact('attributeTypes'));
    }

    public function AdminsingleEditTypeData()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $id = $this->request->data('attribute_type_id');
            $attributeTypes = $this->AttributeTypes->get($id);
            $name = trim($this->request->data('attribute_type_name'));
            $attributeTypes['attribute_type_name'] = trim(filter_var($this->request->data('attribute_type_name')),FILTER_SANITIZE_STRING);
            $attributeTypes['updated_by'] = $this->Auth->user('id');
            $attributeTypes['attribute_type_slug'] = strtolower(str_replace(" ", "_", $name));
            $this->AttributeTypes->save($attributeTypes);
        }
        
        
            return $this->redirect($this->referer());
    }


}






