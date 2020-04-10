<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class ProductCategoriesController extends AppController
{
    public function index($slug)
    {

        $category = $this->ProductCategories->find()->where(['category_slug' => $slug])->contain(['ProductSubCategories'])->first();
        // echo "<pre>";
        // print_r($category);
        // die();
        if (empty($category)) {
            return $this->redirect(
                ['controller' => 'Home', 'action' => 'error']
            );
        }

        $category = $this->ProductCategories->find()->where(['category_slug' => $slug])->contain(['ProductSubCategories'])->first();


        $this->set(compact('category'));

        $this->viewBuilder()->setLayout('frontend_layout');
    }


    public function view($id = null)
    {
        $productCategory = $this->ProductCategories->get($id, [
            'contain' => ['ShopProducts']
        ]);

        $this->set('productCategory', $productCategory);
    }

    public function add()
    {
        $productCategory = $this->ProductCategories->newEntity();
        if ($this->request->is('post')) {
            $productCategory = $this->ProductCategories->patchEntity($productCategory, $this->request->getData());
            if ($this->ProductCategories->save($productCategory)) {
                $this->Flash->success(__('The product category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product category could not be saved. Please, try again.'));
        }
        $this->set(compact('productCategory'));
    }


    public function edit($id = null)
    {
        $productCategory = $this->ProductCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productCategory = $this->ProductCategories->patchEntity($productCategory, $this->request->getData());
            if ($this->ProductCategories->save($productCategory)) {
                $this->Flash->success(__('The product category has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product category could not be saved. Please, try again.'));
        }
        $this->set(compact('productCategory'));
    }


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productCategory = $this->ProductCategories->get($id);
        if ($this->ProductCategories->delete($productCategory)) {
            $this->Flash->success(__('The product category has been deleted.'));
        } else {
            $this->Flash->error(__('The product category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


//    Admin Start From Here ///////////////////////////


    public function Adminadd()
    { 
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $productCategory = $this->ProductCategories->newEntity();
            $name = rtrim($this->request->data('category_name'));
            $productCategory['category_name'] = rtrim(filter_var($this->request->data('category_name')), FILTER_SANITIZE_STRING);
            $productCategory['category_slug'] = strtolower(str_replace(" ", "_", $name));
            $productCategory['deleted'] = "0";
            $productCategory['created_by'] = $this->Auth->user('id');
            $this->ProductCategories->save($productCategory);
            echo json_encode($productCategory);
            die();

        }

    }

    public function AdminaddProduct()
    {
        $productCategories = $this->ProductCategories->find()->where(['deleted' => 0])->all();
        $productSubCategories = TableRegistry::get('ProductSubCategories')->find()->where(['deleted' => 0])->all();
        $productBrands = TableRegistry::get('ProductBrands')->find()->where(['deleted' => 0])->all();
        $attributeClasses = TableRegistry::get('AttributeClasses')->find()->where(['deleted' => 0])->all();
        $this->set(compact('productCategories', 'productSubCategories', 'productBrands', 'attributeClasses'));

    }


    public function AdmineditProductCategories()
    {
        $productCategories = $this->ProductCategories->find()->where(['deleted' => 0])->order(['category_id' => 'DESC']);
        $this->paginate = array(
            'limit' => 20,
        );
        $this->set('productCategories', $this->paginate($productCategories));

    }


    public function AdminsingleEditCategory($id = null)
    {
        $productCategories = $this->ProductCategories->get($id, [
            'contain' => []
        ]);
        $this->set(compact('productCategories'));

    }

    public function AdminsingleCategoryData()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $id = $this->request->data('category_id');
            $productCategories = $this->ProductCategories->get($id);
            $name = rtrim($this->request->data('category_name'));
            $productCategories['category_name'] = rtrim(filter_var($this->request->data('category_name')), FILTER_SANITIZE_STRING);
            $productCategories['category_slug'] = strtolower(str_replace(" ", "_", $name));
            $productCategories['updated_by'] = $this->Auth->user('id');
            $this->ProductCategories->save($productCategories);
        }
        return $this->redirect($this->referer());
    }



}
