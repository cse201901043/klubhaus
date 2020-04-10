<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * ProductStocksDetails Controller
 *
 * @property \App\Model\Table\ProductStocksDetailsTable $ProductStocksDetails
 *
 * @method \App\Model\Entity\ProductStocksDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductStocksDetailsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ShopProducts', 'AttributeClasses', 'AttributeTypes', 'AttributeFields']
        ];
        $productStocksDetails = $this->paginate($this->ProductStocksDetails);

        $this->set(compact('productStocksDetails'));
    }

    /**
     * View method
     *
     * @param string|null $id Product Stocks Detail id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productStocksDetail = $this->ProductStocksDetails->get($id, [
            'contain' => ['ShopProducts', 'AttributeClasses', 'AttributeTypes', 'AttributeValues']
        ]);

        $this->set('productStocksDetail', $productStocksDetail);
    }

    public function checkStock($id = null)
    {
        $this->autoRender = false;
        $productStocksDetail[] = $this->ProductStocksDetails->get($id);
        echo json_encode($productStocksDetail);
        die();
    }

    public function checkStock2($size = null, $color = null)
    {
        $this->autoRender = false;
        $productStocksDetail[] = $this->ProductStocksDetails->get($size);
        $productStocksDetail[] = $this->ProductStocksDetails->get($color);
        echo json_encode($productStocksDetail);
        die();
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productStocksDetail = $this->ProductStocksDetails->newEntity();
        if ($this->request->is('post')) {
            $productStocksDetail = $this->ProductStocksDetails->patchEntity($productStocksDetail, $this->request->getData());
            if ($this->ProductStocksDetails->save($productStocksDetail)) {
                $this->Flash->success(__('The product stocks detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product stocks detail could not be saved. Please, try again.'));
        }
        $stocksProducts = $this->ProductStocksDetails->StocksProducts->find('list', ['limit' => 200]);
        $stocksAttributeClasses = $this->ProductStocksDetails->StocksAttributeClasses->find('list', ['limit' => 200]);
        $stocksAttributeTypes = $this->ProductStocksDetails->StocksAttributeTypes->find('list', ['limit' => 200]);
        $stocksAttributeFields = $this->ProductStocksDetails->StocksAttributeFields->find('list', ['limit' => 200]);
        $this->set(compact('productStocksDetail', 'stocksProducts', 'stocksAttributeClasses', 'stocksAttributeTypes', 'stocksAttributeFields'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Stocks Detail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productStocksDetail = $this->ProductStocksDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productStocksDetail = $this->ProductStocksDetails->patchEntity($productStocksDetail, $this->request->getData());
            if ($this->ProductStocksDetails->save($productStocksDetail)) {
                $this->Flash->success(__('The product stocks detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product stocks detail could not be saved. Please, try again.'));
        }
        $stocksProducts = $this->ProductStocksDetails->StocksProducts->find('list', ['limit' => 200]);
        $stocksAttributeClasses = $this->ProductStocksDetails->StocksAttributeClasses->find('list', ['limit' => 200]);
        $stocksAttributeTypes = $this->ProductStocksDetails->StocksAttributeTypes->find('list', ['limit' => 200]);
        $stocksAttributeFields = $this->ProductStocksDetails->StocksAttributeFields->find('list', ['limit' => 200]);
        $this->set(compact('productStocksDetail', 'stocksProducts', 'stocksAttributeClasses', 'stocksAttributeTypes', 'stocksAttributeFields'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Stocks Detail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productStocksDetail = $this->ProductStocksDetails->get($id);
        if ($this->ProductStocksDetails->delete($productStocksDetail)) {
            $this->Flash->success(__('The product stocks detail has been deleted.'));
        } else {
            $this->Flash->error(__('The product stocks detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


//    Admin Start From Here

    public function Adminadd()
    {
        $this->autoRender = false;
         if ($this->request->is('post')) {
            $stocks_attribute_field_id = $this->request->data['stocks_attribute_field_id'];
            $stocks_attribute_type_id = $this->request->data['stocks_attribute_type_id'];
            $stocks_product_id = $this->request->data('stocks_product_id');
            foreach ($stocks_attribute_field_id as $key => $value) {
                $query = $this->ProductStocksDetails->findAllByStocksProductIdAndStocksAttributeFieldIdAndDeleted($stocks_product_id, $value, 0);
                $results = $query->toArray();
                if (!empty($results)) {
                    $productStocksDetail = $this->ProductStocksDetails->find()->where(['stocks_product_id' => $stocks_product_id, 'stocks_attribute_field_id' => $value])->first();
                    $productStocksDetail['product_attribute_stock'] = $productStocksDetail['product_attribute_stock'] + $this->request->data('product_attribute_stock');
                    $productStocksDetail['updated_by'] = $this->Auth->user('id');
                    $this->ProductStocksDetails->save($productStocksDetail);
                } else {
                    $productStocksDetail = $this->ProductStocksDetails->newEntity();
                    $productStocksDetail['stocks_product_id'] = $this->request->data('stocks_product_id');
                    $productStocksDetail['product_attribute_stock'] = $this->request->data('product_attribute_stock');
                    $productStocksDetail['stocks_attribute_class_id'] = $this->request->data('stocks_attribute_class_id');
                    $productStocksDetail['stocks_attribute_field_id'] = $value;
                    $productStocksDetail['stocks_attribute_type_id'] = $stocks_attribute_type_id[$key];
                    $productStocksDetail['created_by'] = $this->Auth->user('id');
                    $this->ProductStocksDetails->save($productStocksDetail);
                }
            }
            $id = $this->request->data('stocks_product_id');
            $shopProductTable = TableRegistry::get('ShopProducts');
            $shopProduct = TableRegistry::get('ShopProducts')->find()->where(['products_id' => $id])->first();
            $shopProduct['product_stock'] = $shopProduct['product_stock'] + $this->request->data('product_attribute_stock');
            $shopProduct['updated_by'] = $this->Auth->user('id');
            $shopProductTable->save($shopProduct);
            $this->Flash->success('Saved Successfully', [
                'key' => 'positive',
            ]);
            return $this->redirect($this->referer());
        }
        return $this->redirect($this->referer());
    }

}
