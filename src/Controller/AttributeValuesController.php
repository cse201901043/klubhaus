<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * AttributeValues Controller
 *
 * @property \App\Model\Table\AttributeValuesTable $AttributeValues
 *
 * @method \App\Model\Entity\AttributeValue[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AttributeValuesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['AttributeValuesTypes', 'AttributeValuesClasses']
        ];
        $attributeValues = $this->paginate($this->AttributeValues);

        $this->set(compact('attributeValues'));
    }

    /**
     * View method
     *
     * @param string|null $id Attribute Value id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $attributeValue = $this->AttributeValues->get($id, [
            'contain' => ['AttributeValuesTypes', 'AttributeValuesClasses']
        ]);

        $this->set('attributeValue', $attributeValue);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $attributeValue = $this->AttributeValues->newEntity();
        if ($this->request->is('post')) {
            $attributeValue = $this->AttributeValues->patchEntity($attributeValue, $this->request->getData());
            if ($this->AttributeValues->save($attributeValue)) {
                $this->Flash->success(__('The attribute value has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The attribute value could not be saved. Please, try again.'));
        }
        $attributeValuesTypes = $this->AttributeValues->AttributeValuesTypes->find('list', ['limit' => 200]);
        $attributeValuesClasses = $this->AttributeValues->AttributeValuesClasses->find('list', ['limit' => 200]);
        $this->set(compact('attributeValue', 'attributeValuesTypes', 'attributeValuesClasses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Attribute Value id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $attributeValue = $this->AttributeValues->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $attributeValue = $this->AttributeValues->patchEntity($attributeValue, $this->request->getData());
            if ($this->AttributeValues->save($attributeValue)) {
                $this->Flash->success(__('The attribute value has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The attribute value could not be saved. Please, try again.'));
        }
        $attributeValuesTypes = $this->AttributeValues->AttributeValuesTypes->find('list', ['limit' => 200]);
        $attributeValuesClasses = $this->AttributeValues->AttributeValuesClasses->find('list', ['limit' => 200]);
        $this->set(compact('attributeValue', 'attributeValuesTypes', 'attributeValuesClasses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Attribute Value id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $attributeValue = $this->AttributeValues->get($id);
        if ($this->AttributeValues->delete($attributeValue)) {
            $this->Flash->success(__('The attribute value has been deleted.'));
        } else {
            $this->Flash->error(__('The attribute value could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

//    Admin Start From Here




    public function AdminfullAdd()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $attribute_field_value = $this->request->data['attribute_field_value'];
            $data = array_map('trim', array_filter(explode(',', $attribute_field_value)));
            for ($i = 0; $i < count($data); $i++) {
                $attributeValue = $this->AttributeValues->newEntity();
                $attributeValue['attribute_field_value'] = filter_var($data[$i],FILTER_SANITIZE_STRING);
                $attributeValue['attribute_values_class_id'] = $this->request->data('attribute_class_id');
                $attributeValue['attribute_values_type_id'] = $this->request->data('attribute_type_id');
                $attributeValue['created_by'] = $this->Auth->user('id');
                $this->AttributeValues->save($attributeValue);

             }

            $attribute_type_class_id = $this->request->data('attribute_class_id');
            $attribute_type_name = $this->request->data('attribute_type_name');
            $attributeTypesTable = TableRegistry::get('AttributeTypes');
            $exists = $attributeTypesTable->exists(['attribute_types_class_id' => $attribute_type_class_id, 'attribute_type_name' => $attribute_type_name]);
            echo json_encode($attributeValue);
            die();
            
           
        }
        
        

    }

    public function AdmingetValueData()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) 
        {
            $attributeClassId = $this->request->data('attribute_values_class_id');
            $attributeTypeId = $this->request->data('attribute_values_type_id');
            $attributeValue = $this->AttributeValues->find()->where(['attribute_values_class_id' => $attributeClassId, 'attribute_values_type_id' => $attributeTypeId])->all();
            echo json_encode($attributeValue);
            die();
            
        }
        
            
    }


    public function AdminadvancedEdit()
    {

    }

    public function editAttributeValue()
    {
        $attributeValue = $this->AttributeValues->find()->where(['deleted' => 0])->order(['attribute_field_id' => 'DESC']);

        $this->paginate = array(
            'limit' => 20,
        );

        $this->set('attributeValue', $this->paginate($attributeValue));

    }

    public function singleDeleteValue($id = null)
    {
        $attributeValue = $this->AttributeValues->get($id);
        $attributeValue->deleted = 1;
        if ($this->AttributeValues->save($attributeValue)) {
        }
        return $this->redirect($this->referer());

    }

    


    public function AdmineditAttributeValue()
    {
        $attributeValue = $this->AttributeValues->find()->where(['deleted' => 0])->order(['attribute_field_id' => 'DESC']);
        $this->paginate = array(
            'limit' => 20,

        );
        $this->set('attributeValue', $this->paginate($attributeValue));

    }

    public function AdminsingleEditValue($id = null)

    {
        $attributeValue = $this->AttributeValues->get($id, [
            'contain' => []
        ]);

        $this->set(compact('attributeValue'));
    }

    public function AdminsingleEditValuesData()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) 
        {
            $id = $this->request->data('attribute_field_id');
            $attributeValue = $this->AttributeValues->get($id);
            $attributeValue['attribute_field_value'] = filter_var($this->request->data('attribute_field_value'),FILTER_SANITIZE_STRING);
            $attributeValue['updated_by'] = $this->Auth->user('id');
            $this->AttributeValues->save($attributeValue);

        }
            
            return $this->redirect($this->referer());
    }
}
