<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

/**
 * ProductSubCategories Controller
 *
 * @property \App\Model\Table\ProductSubCategoriesTable $ProductSubCategories
 *
 * @method \App\Model\Entity\ProductSubCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductSubCategoriesController extends AppController
{

    public $paginate = array(
        'limit' => 12,
        'contain' => ['ProductCategories', 'ProductSubCategories']
    );

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($category, $slug)
    {
        // $this->paginate = [
        //     'contain' => ['SubCategoriesCategories']
        // ];
        // $productSubCategories = $this->paginate($this->ProductSubCategories);

        // $this->set(compact('productSubCategories'));
        $connection = ConnectionManager::get('default');
        $cat = TableRegistry::get('ProductCategories')->find()->where(['category_slug' => $category, 'deleted' => 0])->first();

        if(empty($cat)){
            return $this->redirect(
                ['controller' => 'Home', 'action' => 'error']
            );
        }
        $subcat = $this->ProductSubCategories->find()->where(['sub_categories_category_id' => $cat->category_id, 'sub_category_slug' => $slug, 'ProductSubCategories.deleted' => 0] )->contain(['ProductCategories'])->first();

        if(empty($subcat)){
            return $this->redirect(
                ['controller' => 'Home', 'action' => 'error']
            );
        }

        $products = TableRegistry::get('ShopProducts')->find()
            ->where(['product_sub_category_id' => $subcat->sub_category_id, 'ShopProducts.product_sku IS NOT' => "", 'product_sale_status' => 1, 'ShopProducts.deleted' => 0])
            ->contain(['ProductCategories', 'ProductSubCategories'])
            ->order(['products_id' => 'DESC']);
            // ->limit(1)
        // echo "<pre>";
        // print_r($products);
        // die();

        $sizes = $connection->execute("SELECT DISTINCT `attribute_field_value` FROM `attribute_values` LEFT JOIN attribute_types on attribute_values.attribute_values_type_id = attribute_types.attribute_type_id where attribute_types.attribute_type_slug='size' ORDER by `attribute_field_value` ASC")->fetchAll('assoc');

        $colors = $connection->execute("SELECT DISTINCT `attribute_field_value` FROM `attribute_values` LEFT JOIN attribute_types on attribute_values.attribute_values_type_id = attribute_types.attribute_type_id where attribute_types.attribute_type_slug='color' ORDER by `attribute_field_value` ASC")->fetchAll('assoc');

        $products = $this->paginate($products);
        // echo "<pre>";
        // print_r($products);
        // die();

        $this->set(compact('subcat', 'products', 'sizes', 'colors'));
        
        $this->viewBuilder()->setLayout('frontend_layout');
    }

    /**
     * View method
     *
     * @param string|null $id Product Sub Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productSubCategory = $this->ProductSubCategories->get($id, [
            'contain' => ['SubCategoriesCategories', 'ShopProducts']
        ]);

        $this->set('productSubCategory', $productSubCategory);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productSubCategory = $this->ProductSubCategories->newEntity();
        if ($this->request->is('post')) {
            $productSubCategory = $this->ProductSubCategories->patchEntity($productSubCategory, $this->request->getData());
            if ($this->ProductSubCategories->save($productSubCategory)) {
                $this->Flash->success(__('The product sub category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product sub category could not be saved. Please, try again.'));
        }
        $subCategoriesCategories = $this->ProductSubCategories->SubCategoriesCategories->find('list', ['limit' => 200]);
        $this->set(compact('productSubCategory', 'subCategoriesCategories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Sub Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productSubCategory = $this->ProductSubCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productSubCategory = $this->ProductSubCategories->patchEntity($productSubCategory, $this->request->getData());
            if ($this->ProductSubCategories->save($productSubCategory)) {
                $this->Flash->success(__('The product sub category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product sub category could not be saved. Please, try again.'));
        }
        $subCategoriesCategories = $this->ProductSubCategories->SubCategoriesCategories->find('list', ['limit' => 200]);
        $this->set(compact('productSubCategory', 'subCategoriesCategories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Sub Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productSubCategory = $this->ProductSubCategories->get($id);
        if ($this->ProductSubCategories->delete($productSubCategory)) {
            $this->Flash->success(__('The product sub category has been deleted.'));
        } else {
            $this->Flash->error(__('The product sub category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function AdmingetSubCategoriesData()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $categories_id = $this->request->data('categoriesId');
            $subCategoriesData = $this->ProductSubCategories->find()->where(['sub_categories_category_id' => $categories_id, 'deleted' => 0])->all();
            echo json_encode($subCategoriesData);
            die();
        }
    }

    public function AdmineditProductSubCategories()
    {
        $productSubCategory = $this->ProductSubCategories->find()->where(['deleted' => 0])->order(['sub_category_id' => 'DESC']);
        $this->paginate = array(
            'limit' => 20,
        );
        $this->set('productSubCategory', $this->paginate($productSubCategory));
    }

    public function AdminsingleEditSubCategories($id = null)
    {
        $productSubCategory = $this->ProductSubCategories->get($id, [
            'contain' => []
        ]);
        $this->set(compact('productSubCategory'));
    }

    public function AdminsingleEditSubCategoriesData()
    {
    	$this->autoRender = false;
        if ($this->request->is('post')) {
            $id = $this->request->data('sub_category_id');
            $productSubCategory = $this->ProductSubCategories->get($id);
            $name = trim($this->request->data('sub_category_name'));
            $productSubCategory['sub_category_name'] = trim(filter_var($this->request->data('sub_category_name')),FILTER_SANITIZE_STRING);
            $productSubCategory['sub_category_slug'] = strtolower(str_replace(" ", "_", $name));
            $productSubCategory['updated_by'] = $this->Auth->user('id');
            $this->ProductSubCategories->save($productSubCategory);
        }
        return $this->redirect($this->referer());
    }




    public function Adminadd()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            
        //     echo "<pre>";
        // print_r($this->request->data());
        
        // $productSubImg = $this->request->data('sub_category_featured_image');
        

        // $size = filesize('sub_category_featured_image');

        // print_r($size);
        
        // die();
        
            $productSubCategory = $this->ProductSubCategories->newEntity();
            $productSubImg = $this->request->data('sub_category_featured_image');
            $name = trim($this->request->data('sub_category_name'));
            $productSubCategory['sub_category_name'] = trim(filter_var($this->request->data('sub_category_name')),FILTER_SANITIZE_STRING);
            $productSubCategory['sub_category_slug'] = strtolower(str_replace(" ", "_", $name));
            $productSubCategory['deleted'] = "0";
            $productSubCategory['created_by'] = $this->Auth->user('id');
            foreach ($productSubImg as $info) {
                $ext = pathinfo($info, PATHINFO_EXTENSION);
                if ($ext == 'jpg') {
                    $image_name = "subCategory" . uniqid(mt_rand(10, 750)) . '.jpg';
                    $productSubCategory['sub_category_featured_image'] = $image_name;
                    $uploadImg = $this->_move_image($this->request->data('sub_category_featured_image'), $image_name);
                } elseif ($ext == 'png') {
                    $image_name = "subCategory" . uniqid(mt_rand(10, 750)) . '.png';
                    $productSubCategory['sub_category_featured_image'] = $image_name;
                    $uploadImg = $this->_move_image($this->request->data('sub_category_featured_image'), $image_name);
                } elseif ($ext == 'jpeg') {
                    $image_name = "subCategory" . uniqid(mt_rand(10, 750)) . '.jpeg';
                    $productSubCategory['sub_category_featured_image'] = $image_name;
                    $uploadImg = $this->_move_image($this->request->data('sub_category_featured_image'), $image_name);
                } 
            }

                $this->ProductSubCategories->save($productSubCategory);
                $this->autoRender = false;
                echo json_encode($productSubCategory);
                die();
        }
    }

    private function _move_image($uploadImg, $image_name)
    {
        $path = WWW_ROOT . 'productImage/ProductSubCategory/' . $image_name;
        move_uploaded_file($uploadImg['tmp_name'], $path);
        return $path;
    }

    public function addBanerImageView()
    {
        $productSubCategories = TableRegistry::get('ProductSubCategories')->find('all');
        $this->set(compact('productSubCategories'));
    }

    
}
