<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProductBrands Controller
 *
 * @property \App\Model\Table\ProductBrandsTable $ProductBrands
 *
 * @method \App\Model\Entity\ProductBrand[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductBrandsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $productBrands = $this->paginate($this->ProductBrands);

        $this->set(compact('productBrands'));
    }

    /**
     * View method
     *
     * @param string|null $id Product Brand id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productBrand = $this->ProductBrands->get($id, [
            'contain' => ['ShopProducts']
        ]);

        $this->set('productBrand', $productBrand);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productBrand = $this->ProductBrands->newEntity();
        if ($this->request->is('post')) {
            $productBrand = $this->ProductBrands->patchEntity($productBrand, $this->request->getData());
            if ($this->ProductBrands->save($productBrand)) {
                $this->Flash->success(__('The product brand has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product brand could not be saved. Please, try again.'));
        }
        $this->set(compact('productBrand'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Brand id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productBrand = $this->ProductBrands->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productBrand = $this->ProductBrands->patchEntity($productBrand, $this->request->getData());
            if ($this->ProductBrands->save($productBrand)) {
                $this->Flash->success(__('The product brand has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product brand could not be saved. Please, try again.'));
        }
        $this->set(compact('productBrand'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Brand id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productBrand = $this->ProductBrands->get($id);
        if ($this->ProductBrands->delete($productBrand)) {
            $this->Flash->success(__('The product brand has been deleted.'));
        } else {
            $this->Flash->error(__('The product brand could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function Adminadd()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $productBrand = $this->ProductBrands->newEntity();
            $name = trim($this->request->data('brand_name'));
            $productBrand['brand_name'] = trim(filter_var($this->request->data('brand_name')),FILTER_SANITIZE_STRING);
            $productBrand['brand_slug'] = strtolower(str_replace(" ", "_", $name));
            $productBrand['deleted'] = "0";
            $productBrand['created_by'] = $this->Auth->user('id');
            if ($this->ProductBrands->save($productBrand)) {
                echo json_encode($productBrand);
                die();
            }
        }
    }

    public function AdmineditProductBrand()
    {
        $productBrand = $this->ProductBrands->find()->where(['deleted' => 0])->order(['brand_id' => 'DESC']);
        $this->paginate = array(
            'limit' => 20,
        );
        $this->set('productBrand', $this->paginate($productBrand));

    }

    public function AdminsingleEditBrand($id = null)
    {
        $productBrand = $this->ProductBrands->get($id, [
            'contain' => []
        ]);
        $this->set(compact('productBrand'));

    }


    public function AdminsingleEditProductBrandData()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $id = $this->request->data('brand_id');
            $productBrand = $this->ProductBrands->get($id);
            $name = trim($this->request->data('brand_name'));
            $productBrand['brand_name'] = trim(filter_var($this->request->data('brand_name')),FILTER_SANITIZE_STRING);
            $productBrand['updated_by'] = $this->Auth->user('id');
            $productBrand['brand_slug'] = strtolower(str_replace(" ", "_", $name));
            $this->ProductBrands->save($productBrand);
        }
        return $this->redirect($this->referer());
    }
}
