<?php



namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use PhpParser\Node\Stmt\If_;
class ShopProductsController extends AppController

{



    public function initialize()

    {

        parent::initialize();

        $this->loadComponent('RequestHandler');

        $this->loadComponent('Paginator');

    }



    public $paginate = array(

        'limit' => 12,

        'contain' => ['ProductCategories', 'ProductSubCategories']

    );



    public function index($subcategory, $slug)

    {

        $product = $this->ShopProducts->find()->where(['product_name_slug' => $slug, 'product_sku IS NOT' => "", 'product_sale_status' => 1, 'ShopProducts.deleted' => 0])->contain(['ProductCategories', 'ProductSubCategories', 'ProductBrands'])->first();



        if (empty($product)) {

            return $this->redirect(

                ['controller' => 'Home', 'action' => 'error']

            );

        }

        $rel_products = $this->ShopProducts->find()->where(['ShopProducts.product_sku IS NOT' => "", 'ShopProducts.products_id IS NOT' => $product->products_id, 'product_sale_status' => 1, 'ShopProducts.product_sub_category_id' => $product->product_sub_category_id, 'ShopProducts.deleted' => 0])->contain(['ProductCategories', 'ProductSubCategories'])->limit(10)->all();

        // print_r($subcat); die();

        $metas = TableRegistry::get('ProductMetas')->find()->where(['meta_product_id' => $product->products_id, 'deleted' => 0])->all();

        $stocks = TableRegistry::get('ProductStocksDetails')->find()->where(['stocks_product_id' => $product->products_id, 'ProductStocksDetails.deleted' => 0])->contain(['AttributeClasses', 'AttributeTypes', 'AttributeValues'])->all();



        $this->set(compact('rel_products', 'product', 'metas', 'stocks'));



        $this->viewBuilder()->setLayout('frontend_layout');

    }



    public function ajaxSorting()

    {

        $this->autoRender = false;

        if ($this->request->is('post')) {

            $connection = ConnectionManager::get('default');
            $min_price = $this->request->data['min_price'];
            $max_price = $this->request->data['max_price'];
            $sizes = (isset($this->request->data['sorting-size'])) ? $this->request->data['sorting-size'] : array();
            $colors = (isset($this->request->data['sorting-color'])) ? $this->request->data['sorting-color'] : array();
            if (isset($this->request->data['sub_category'])) {

                $subcategory = $this->request->data['sub_category'];

                $subcat_query = " and `product_sub_category_id` = " . $subcategory;

            } else {

                $subcat_query = "";
            }

            if (isset($this->request->data['search_key'])) {

                $search_key = $this->request->data['search_key'];

                $search_query = " and product_name LIKE '%" . $search_key . "%' ";

            } else {

                $search_query = "";
            }

            $field_query = "";
            if (!empty($sizes) || !empty($colors)) {
                $array = array_merge($sizes, $colors);
                $field_query = " and `attribute_field_value` in ('" . implode("', '", $array) . "' ) ";
            }

            $price_query = " and product_unit_sale_price BETWEEN " . $min_price . " AND " . $max_price;
            $products = $connection->execute("SELECT `products_id`,`product_name`,`product_name_slug`,`product_featured_image`,`product_unit_sale_price`, `attribute_field_value`, `category_slug`, `sub_category_slug` FROM `shop_products` LEFT JOIN `product_stocks_details` on `products_id` = `stocks_product_id` LEFT JOIN `attribute_values` on `stocks_attribute_field_id` = `attribute_field_id` LEFT JOIN `product_categories` on `product_category_id` = `category_id` LEFT JOIN `product_sub_categories` on `product_sub_category_id` = `sub_category_id` WHERE shop_products.deleted = 0 and shop_products.product_unit_sale_price > 0 " . $subcat_query . $search_query . $field_query . $price_query . " group by products_id Order by products_id DESC")->fetchAll('assoc');
            echo json_encode($products);

            die();

        }

    }



    public function view($id = null)

    {

        $shopProduct = $this->ShopProducts->get($id, [

            'contain' => ['ProductCategories', 'ProductSubCategories', 'ProductBrands', 'ProductAttributeClasses']

        ]);



        $this->set('shopProduct', $shopProduct);

    }



    public function add()

    {

        $shopProduct = $this->ShopProducts->newEntity();

        if ($this->request->is('post')) {

            $shopProduct = $this->ShopProducts->patchEntity($shopProduct, $this->request->getData());

            if ($this->ShopProducts->save($shopProduct)) {

                $this->Flash->success(__('The shop product has been saved.'));



                return $this->redirect(['action' => 'index']);

            }

            $this->Flash->error(__('The shop product could not be saved. Please, try again.'));

        }

        $productCategories = $this->ShopProducts->ProductCategories->find('list', ['limit' => 200]);

        $productSubCategories = $this->ShopProducts->ProductSubCategories->find('list', ['limit' => 200]);

        $productBrands = $this->ShopProducts->ProductBrands->find('list', ['limit' => 200]);

        $productAttributeClasses = $this->ShopProducts->ProductAttributeClasses->find('list', ['limit' => 200]);

        $this->set(compact('shopProduct', 'productCategories', 'productSubCategories', 'productBrands', 'productAttributeClasses'));

    }



    public function edit($id = null)

    {

        $shopProduct = $this->ShopProducts->get($id, [

            'contain' => []

        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $shopProduct = $this->ShopProducts->patchEntity($shopProduct, $this->request->getData());

            if ($this->ShopProducts->save($shopProduct)) {

                $this->Flash->success(__('The shop product has been saved.'));



                return $this->redirect(['action' => 'index']);

            }

            $this->Flash->error(__('The shop product could not be saved. Please, try again.'));

        }

        $productCategories = $this->ShopProducts->ProductCategories->find('list', ['limit' => 200]);

        $productSubCategories = $this->ShopProducts->ProductSubCategories->find('list', ['limit' => 200]);

        $productBrands = $this->ShopProducts->ProductBrands->find('list', ['limit' => 200]);

        $productAttributeClasses = $this->ShopProducts->ProductAttributeClasses->find('list', ['limit' => 200]);

        $this->set(compact('shopProduct', 'productCategories', 'productSubCategories', 'productBrands', 'productAttributeClasses'));

    }



    public function delete($id = null)

    {

        $this->request->allowMethod(['post', 'delete']);

        $shopProduct = $this->ShopProducts->get($id);

        if ($this->ShopProducts->delete($shopProduct)) {

            $this->Flash->success(__('The shop product has been deleted.'));

        } else {

            $this->Flash->error(__('The shop product could not be deleted. Please, try again.'));

        }



        return $this->redirect(['action' => 'index']);

    }















//    Admin Started


    public function AdminviewProductList()

    {
        $productCategories = TableRegistry::get('ProductCategories')->find()->where(['deleted' => 0])->all();
        $productSubCategories = array();
        $shopProduct = $this->ShopProducts->find()->where(['deleted' => 0])->order(['products_id' => 'DESC']);
        $this->paginate = array(
            'limit' => 20,
        );
        $shopProduct = $this->paginate($shopProduct);
        $this->set(compact('shopProduct', 'productCategories', 'productSubCategories'));
    }

    public function AdminviewProductSearchList()

    {
        $productCategories = TableRegistry::get('ProductCategories')->find()->where(['deleted' => 0])->all();
        $productSubCategories = TableRegistry::get('ProductSubCategories')->find()->where(['sub_categories_category_id' => $this->request->query['category'], 'deleted' => 0])->all();
        if ($this->request->is('get')){
            $search_key = (isset($this->request->query['product'])) ? $this->request->query['product'] : "";
            $shopProduct = TableRegistry::get('ShopProducts')->find()->where(['product_name LIKE' => "%".$search_key."%", 'ShopProducts.deleted' => 0])->contain(['ProductCategories', 'ProductSubCategories'])->order(['products_id' => 'DESC']);
            if($this->request->query['category'] != ""){
                $shopProduct = TableRegistry::get('ShopProducts')->find()->where(['product_name LIKE' => "%".$search_key."%", 'ShopProducts.product_category_id' => $this->request->query['category'], 'ShopProducts.deleted' => 0])->contain(['ProductCategories', 'ProductSubCategories'])->order(['products_id' => 'DESC']);
            }
            if($this->request->query['subcategory'] != ""){
                $shopProduct = TableRegistry::get('ShopProducts')->find()->where(['product_name LIKE' => "%".$search_key."%", 'ShopProducts.product_category_id' => $this->request->query['category'], 'ShopProducts.product_sub_category_id' => $this->request->query['subcategory'], 'ShopProducts.deleted' => 0])->contain(['ProductCategories', 'ProductSubCategories'])->order(['products_id' => 'DESC']);
            }
        }else{
            $shopProduct = array();
        }

        $this->paginate = array(
            'limit' => 20,
        );
        $shopProduct = $this->paginate($shopProduct);
        $this->set(compact('shopProduct', 'productCategories', 'productSubCategories'));
        $this -> render('adminview_product_list');
    }





    public function AdminproductSaleStatusPublish($id = null)

    {
        $this->autoRender = false;
        $shopProduct = $this->ShopProducts->get($id);
        $shopProduct->product_sale_status = 1;
        $shopProduct['updated_by'] = $this->Auth->user('id');
        $this->ShopProducts->save($shopProduct);
        return $this->redirect($this->referer());
    }



    public function AdminproductSaleStatusNotPublish($id = null)

    {
        $this->autoRender = false;
        $shopProduct = $this->ShopProducts->get($id);
        $shopProduct->product_sale_status = 0;
        $shopProduct['updated_by'] = $this->Auth->user('id');
        $this->ShopProducts->save($shopProduct);
        return $this->redirect($this->referer());
    }



    public function AdminsingleViewProduct($id = null)

    {
        $shopProduct = $this->ShopProducts->get($id, [
            'contain' => ['ProductCategories', 'ProductSubCategories', 'ProductBrands', 'AttributeClasses']
        ]);
        $this->set('shopProduct', $shopProduct);
    }



    public function AdminsingleDeleteProduct($id = null)

    {
        
        $shopProduct = $this->ShopProducts->get($id);
        $shopProduct->deleted = 1;
        $shopProduct['updated_by'] = $this->Auth->user('id');
        $this->ShopProducts->save($shopProduct);
        return $this->redirect($this->referer());
    }



    public function AdminsingleEditProduct($id = null)

    {
        
        $shopProduct = $this->ShopProducts->get($id, [
            'contain' => []
        ]);
        $productCategories = TableRegistry::get('ProductCategories')->find('all')->where(['deleted' => 0]);
        $productSubCategories = TableRegistry::get('ProductSubCategories')->find('all')->where(['deleted' => 0]);
        $productBrands = TableRegistry::get('ProductBrands')->find('all')->where(['deleted' => 0]);
        $attributeClasses = TableRegistry::get('AttributeClasses')->find('all')->where(['deleted' => 0]);
        $productMetaDetail = TableRegistry::get('ProductMetas')->find()->where(['meta_product_id' => $id, 'product_meta_field_name' => 'product_detail', 'deleted' => 0]);
        $productMetaSizeFit = TableRegistry::get('ProductMetas')->find()->where(['meta_product_id' => $id, 'product_meta_field_name' => 'product_size_fit', 'deleted' => 0]);
        $productMetaResize = TableRegistry::get('ProductMetas')->find()->where(['meta_product_id' => $id, 'product_meta_field_name' => 'product_resize_images', 'deleted' => 0]);
        $productMetaNewResize = TableRegistry::get('ProductMetas')->find()->where(['meta_product_id' => $id, 'product_meta_field_name' => 'New_Arrival', 'deleted' => 0])->first();
        $productMeta = TableRegistry::get('ProductMetas')->find()->where(['meta_product_id' => $id, 'product_meta_field_name' => 'product_related_images', 'deleted' => 0]);
            foreach ($productMetaDetail as $info){
            }
            foreach ($productMetaSizeFit as $value){
            }
     $this->set(compact('shopProduct', 'value', 'info', 'productCategories', 'productMetaNewResize', 'productSubCategories', 'productBrands', 'attributeClasses', 'productMeta', 'productMetaResize'));
    }







    public function AdminUpdateShopProduct()

    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $id = $this->request->data('products_id');
            $shopProduct = $this->ShopProducts->get($id);
            $name = trim($this->request->data('product_name'));
            $shopProduct['product_name'] = trim(filter_var($this->request->data('product_name')),FILTER_SANITIZE_STRING);
            $shopProduct['product_sku'] = $this->request->data('product_sku');
            $shopProduct['product_name_slug'] = strtolower(str_replace(" ", "_", $name));
            $shopProduct['product_attribute_class_id'] = $this->request->data('product_attribute_class_id');
            $shopProduct['product_arrival_date'] = $this->request->data('product_arrival_date');
            $shopProduct['product_category_id'] = $this->request->data('product_category_id');
            $shopProduct['product_sub_category_id'] = $this->request->data('product_sub_category_id');
            $shopProduct['product_brand_id'] = $this->request->data('product_brand_id');
            $shopProduct['product_short_description'] = $this->request->data('product_short_description');
            $shopProduct['product_unit_sale_price'] = $this->request->data('product_unit_sale_price');
            $shopProduct['product_arrival_date'] = $this->request->data('product_arrival_date');
            $shopProduct['product_stock'] = 0;
            $shopProduct['updated_by'] = $this->Auth->user('id');
            $this->ShopProducts->save($shopProduct);
            $this->Flash->success('Updated Successfully', [
                'key' => 'positive',
            ]);
            return $this->redirect($this->referer());
        }
        return $this->redirect($this->referer());
    }





    public function AdminsingleStockProduct($id = null)

    {
        $shopProduct = $this->ShopProducts->get($id, [
            'contain' => ['ProductCategories', 'ProductSubCategories', 'ProductBrands', 'AttributeClasses' => ['AttributeTypes' => ['AttributeValues']]]
        ]);
        $connection = ConnectionManager::get('default');
        $product_stocks_details = $connection->execute("select c.attribute_type_name, c.attribute_type_id, d.attribute_field_value, d.attribute_field_id from shop_products a inner join attribute_classes b on (a.product_attribute_class_id = b.attribute_class_id and b.deleted=0)inner join attribute_types c on (c.attribute_types_class_id = b.attribute_class_id and c.deleted = 0)inner join attribute_values d on (c.attribute_type_id = d.attribute_values_type_id and b.attribute_class_id = d.attribute_values_class_id and d.deleted=0)where products_id =  $id")->fetchAll('assoc');
        $data = array();
        foreach ($product_stocks_details as $information) {
            $data[$information['attribute_type_id']][] = $information;
        }
        $connection = ConnectionManager::get('default');
        $productStocksDetail = $connection->execute("select c.attribute_type_name, c.attribute_type_id, d.attribute_field_value, d.attribute_field_id, a.product_attribute_stock from product_stocks_details a inner join attribute_types c on (c.attribute_type_id = a.stocks_attribute_type_id and c.deleted = 0) inner join attribute_values d on (d.attribute_field_id = a.stocks_attribute_field_id and d.deleted=0)where stocks_product_id = $id")->fetchAll('assoc');
        $this->set(compact('shopProduct', 'data', 'productStocksDetail', $shopProduct));
    }



    public function AdmininstaDownload()

    {
        $productCategories = TableRegistry::get('ProductCategories')->find('all');
        $productSubCategories = TableRegistry::get('ProductSubCategories')->find('all');
        $this->set(compact('productCategories', 'productSubCategories'));
    }





    public function Adminadd()

    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $shopProduct = $this->ShopProducts->newEntity();
            $name = trim($this->request->data('product_name'));
            $shopProduct['product_name'] = trim(filter_var($this->request->data('product_name')),FILTER_SANITIZE_STRING);
            $productSku = $this->request->data('product_sku');
            if (empty($productSku)) {
                $shopProduct['product_sku'] = uniqid(mt_rand(10, 100));
            } else {
                $shopProduct['product_sku'] = $this->request->data('product_sku');
            }
            $shopProduct['product_name_slug'] = strtolower(str_replace(" ", "_", $name));
            $shopProduct['product_attribute_class_id'] = $this->request->data('product_attribute_class_id');
            $shopProduct['product_arrival_date'] = $this->request->data('product_arrival_date');
            $shopProduct['product_category_id'] = $this->request->data('product_category_id');
            $shopProduct['product_sub_category_id'] = $this->request->data('product_sub_category_id');
            $shopProduct['product_brand_id'] = $this->request->data('product_brand_id');
            $shopProduct['product_short_description'] = $this->request->data('product_short_description');
            $shopProduct['product_unit_sale_price'] = $this->request->data('product_unit_sale_price');
            $shopProduct['product_stock'] = 0;
            $shopProduct['product_featured_image'] = $this->request->data('product_featured_image');
            $shopProduct['created_by'] = $this->Auth->user('id');
            $this->ShopProducts->save($shopProduct);
            $product_meta_image_id = $this->request->data('product_meta_image_id');
            $data = explode(",", $product_meta_image_id);
            foreach ($data as $value) {
                $productMetaTable = TableRegistry::get('ProductMetas');
                $productMetaId = $productMetaTable->find()->where(['product_meta_id' => $value])->first();
                $productMetaId['meta_product_id'] = $shopProduct->products_id;
                $productMetaId['updated_by'] = $this->Auth->user('id');
                $productMetaTable->save($productMetaId);
            }
            $productCategorieId = $this->request->data('product_category_id');
            $productSubCategorieId = $this->request->data('product_sub_category_id');
            $productSubCategorieTable = TableRegistry::get('ProductSubCategories');
            $productSubCategorie = $productSubCategorieTable->find()->where(['sub_category_id' => $productSubCategorieId])->last();
            if ($productSubCategorie['sub_categories_category_id'] == 0) {
                $productSubCategorie['sub_categories_category_id'] = $productCategorieId;
                $productSubCategorie['updated_by'] = $this->Auth->user('id');
                $productSubCategorieTable->save($productSubCategorie);
            } elseif ($productSubCategorie['sub_categories_category_id'] == $productSubCategorie['sub_categories_category_id']) {
                $subCategorieName = trim($productSubCategorie['sub_category_name']);
                $subCategorieSlug = trim($productSubCategorie['sub_category_slug']);
                $subCategoriesImage = $productSubCategorie['sub_category_featured_image'];
                $productCategorieGetId = $productSubCategorie['sub_categories_category_id'];
                $productSubCategorie['sub_category_name'] = trim($subCategorieName);
                $productSubCategorie['sub_category_slug'] = trim($subCategorieSlug);
                $productSubCategorie['sub_category_featured_image'] = $subCategoriesImage;
                $productSubCategorie['sub_categories_category_id'] = $productCategorieGetId;
                $productSubCategorie['updated_by'] = $this->Auth->user('id');
                $productSubCategorieTable->save($productSubCategorie);
            } else {
                $subCategorieName = trim($productSubCategorie['sub_category_name']);
                $subCategorieSlug = trim($productSubCategorie['sub_category_slug']);
                $subCategoriesImage = $productSubCategorie['sub_category_featured_image'];
                $productSubCategorie = $productSubCategorieTable->newEntity();
                $productSubCategorie['sub_category_name'] = $subCategorieName;
                $productSubCategorie['sub_category_slug'] = $subCategorieSlug;
                $productSubCategorie['sub_category_featured_image'] = $subCategoriesImage;
                $productSubCategorie['sub_categories_category_id'] = $productCategorieId;
                $productSubCategorie['created_by'] = $this->Auth->user('id');
                $productSubCategorieTable->save($productSubCategorie);
            }
            // $product_meta_resize_id = $this->request->data('meta_product_size_image_id');
            // $resizeimgId = explode(",", $product_meta_resize_id);
            // foreach ($resizeimgId as $info) {
            //     $productMetaTable = TableRegistry::get('ProductMetas');
            //     $productMetaId = $productMetaTable->find()->where(['product_meta_id' => $info])->last();
            //     $productMetaId['meta_product_id'] = $shopProduct->products_id;
            //     $productMetaId['updated_by'] = $this->Auth->user('id');
            //     $productMetaTable->save($productMetaId);
            // }
            if (!empty($this->request->data('product_des_meta_id'))) {
                $product_des_meta_id = $this->request->data('product_des_meta_id');
                $desmetaId = explode(",", $product_des_meta_id);
                foreach ($desmetaId as $information) {
                    $productMetaTable = TableRegistry::get('ProductMetas');
                    $productMetaId = $productMetaTable->find()->where(['product_meta_id' => $information])->last();
                    $productMetaId['meta_product_id'] = $shopProduct->products_id;
                    $productMetaId['updated_by'] = $this->Auth->user('id');
                    $productMetaTable->save($productMetaId);
                }
            }
            $productMetass = "success";
            if (!empty($this->request->data('product_meta_arrival_name'))) {
                $productMetaTableGet = TableRegistry::get('ProductMetas');
                $productMetaNewArival = $productMetaTableGet->find()->where(['product_meta_field_name' => 'women_new_arrival', 'deleted' => 0])->last();
                $productMetaTable = TableRegistry::get('ProductMetas');
                $productMeta = $productMetaTable->newEntity();
                $productMeta['product_meta_field_name'] = filter_var($this->request->data('product_meta_arrival_name'),FILTER_SANITIZE_STRING);
                $productMeta['meta_product_id'] = $shopProduct->products_id;
                $productMeta['product_meta_field_value'] = 1;
                $productMeta['created_by'] = $this->Auth->user('id');
                $productMetaTable->save($productMeta);
            }
            if (!empty($this->request->data('product_meta_cover_image'))) {
                $productMetaTableGet = TableRegistry::get('ProductMetas');
                $productMetaNewArivals = $productMetaTableGet->find()->where(['product_meta_field_name' => 'cover_image', 'deleted' => 0])->last();
                $productMetaTable = TableRegistry::get('ProductMetas');
                $productMeta = $productMetaTable->newEntity();
                $productMeta['product_meta_field_name'] = filter_var($this->request->data('product_meta_cover_image'),FILTER_SANITIZE_STRING);
                $productMeta['meta_product_id'] = $shopProduct->products_id;
                $productMeta['product_meta_field_value'] = 1;
                $productMeta['created_by'] = $this->Auth->user('id');
                $productMetaTable->save($productMeta);
            }
            if (!empty($this->request->data('sliderTitle'))) {
                        $productMetaTable = TableRegistry::get('ProductMetas');
                        $productMeta = $productMetaTable->newEntity();
                        $productMeta['product_meta_field_name'] = "Slider_Title";
                        $productMeta['product_meta_field_value'] = filter_var($this->request->data('sliderTitle'),FILTER_SANITIZE_STRING);
                        $productMeta['meta_product_id'] = $shopProduct->products_id;
                        $productMeta['deleted'] = "0";
                        $productMeta['created_by'] = $this->Auth->user('id');
                        $productMetaTable->save($productMeta);
                        $productMetaTable = TableRegistry::get('ProductMetas');
                        $productMeta = $productMetaTable->newEntity();
                        $product_meta_image = $this->request->data('sliderImagename');
                        $productMeta['product_meta_field_value'] = $this->request->data('sliderImagename');
                        $productMeta['deleted'] = "0";
                        $productMeta['created_by'] = $this->Auth->user('id');
                        $productMeta['meta_product_id'] = $shopProduct->products_id;
                        $productMeta['product_meta_field_name'] = "Slider_Image";
                        $productMetaTable->save($productMeta);
                        
                        $productMeta = $productMetaTable->newEntity();
                        $product_meta_image = $this->request->data('sliderImagenameMobo');
                        $productMeta['product_meta_field_value'] = $this->request->data('sliderImagenameMobo');
                        $productMeta['deleted'] = "0";
                        $productMeta['created_by'] = $this->Auth->user('id');
                        $productMeta['meta_product_id'] = $shopProduct->products_id;
                        $productMeta['product_meta_field_name'] = "Slider_Image_Mobo";
                        $productMetaTable->save($productMeta);
                        }
                 echo json_encode($productMetass);
                 die();
        }
    }

    





    public function AdmindeleteMainImage()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $id = $this->request->data('products_id');
            $selected = $this->request->data('select');
            $shopProduct = $this->ShopProducts->get($id);
            $mainImageName = $shopProduct['product_featured_image'];
            $productImg = $this->request->data('product_featured_image');
            $ext = pathinfo($productImg['name'], PATHINFO_EXTENSION);
            if ($ext == 'jpg') {
                $image_name = "Klubhaus" . uniqid(mt_rand(10, 750)) . '.jpg';

            } elseif ($ext == 'png') {
                $image_name = "Klubhaus" . uniqid(mt_rand(10, 750)) . '.png';
            } else {
                $image_name = "Klubhaus" . uniqid(mt_rand(10, 750)) . '.jpg';
            }
            $shopProduct['product_featured_image'] = $image_name;
            $uploadImg = $this->_move_image($this->request->data('product_featured_image'), $image_name);
            $shopProduct['updated_by'] = $this->Auth->user('id');
            $this->ShopProducts->save($shopProduct);
            $dirname = WWW_ROOT . 'productImage/productImage/';
            $filenames = $dirname . $mainImageName;
            $path = WWW_ROOT . 'productImage/DeletedImage/' . $mainImageName;
            copy($filenames, $path);
            unlink($filenames);
            if ($selected) {
            // $productMetaTable = TableRegistry::get('ProductMetas');
            //     $productMetaId = $productMetaTable->find()->where(['meta_product_id' => $id, 'product_meta_field_name' => 'product_resize_images'])->all();
            //     foreach ($productMetaId as $information) {
            //         $resizeImageName = $information['product_meta_field_value'];
            //         $dirname = WWW_ROOT . 'productImage/productImage/';
            //         $filenames = $dirname . $resizeImageName;
            //         unlink($filenames);
            //         $information['deleted'] = 1;
            //         $information['updated_by'] = $this->Auth->user('id');
            //         $productMetaTable->save($information);
            //     }
            }
           echo json_encode($shopProduct);
           die();
        }

    }



    private function _move_image($uploadImg, $image_name)
    {
        $path = WWW_ROOT . 'productImage/productImage/' . $image_name;
        move_uploaded_file($uploadImg['tmp_name'], $path);
        return $path;
    }



    public function AdmindeleteRelatedImage()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $id = $this->request->data('products_id');
            $related_product_image = $this->request->data['related_product_image'];
            foreach ($related_product_image as $information) {
                $productMetaTable = TableRegistry::get('ProductMetas');
                $productMetaId = $productMetaTable->find()->where(['meta_product_id' => $id, 'product_meta_field_value' => $information])->all();
                $dirname = WWW_ROOT . '/productImage/ProductRelated/';
                $filenames = $dirname . $information;
                $path = WWW_ROOT . '/productImage/DeletedImage/' . "$information";
                copy($filenames, $path);
                unlink($filenames);
                foreach ($productMetaId as $value) {
                    $value['deleted'] = 1;
                    $value['updated_by'] = $this->Auth->user('id');
                    $productMetaTable->save($value);
                }
            }
            echo json_encode($value);
            die();
        }

    }





    public function AdminretRiveImage()
    {
        $username = 'Klubhausbd';
        $insta_source = file_get_contents('http://instagram.com/' . $username);
        $shards = explode('window._sharedData = ', $insta_source);
        $insta_json = explode(';</script>', $shards[1]);
        $results_array = json_decode($insta_json[0], true);
        $images = $results_array;
        for ($i = 0; $i < 11; $i++) {
            $url = $images['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'][$i]['node']['display_url'];
            $img = WWW_ROOT . 'productImage/InstaDownload/';
            $data = explode("/", $url);
            $content = file_get_contents($url);
            $fp = fopen($img . $i . ".jpg", "w");
            fwrite($fp, $content);
            fclose($fp);
        }
        return $this->redirect($this->referer());
    }





    public function AdmininstragramImageSave()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $shopProduct = $this->ShopProducts->newEntity();
            $shopProduct['product_category_id'] = $this->request->data('product_category_id');
            $shopProduct['product_sub_category_id'] = $this->request->data('product_sub_category_id');
            $shopProduct['product_name'] =  filter_var($this->request->data('product_name'),FILTER_SANITIZE_STRING);
            $image_name = $this->request->data('product_featured_image');
            $image_new_name = "instragram" . uniqid(mt_rand(10, 700)) . '.jpg';
            $shopProduct['product_featured_image'] = $image_new_name;
            $dirname = WWW_ROOT . 'productImage/InstaDownload/';
            $filenames = $dirname . $image_name;
            $path = WWW_ROOT . 'productImage/InstaGram/' . $image_new_name;
            copy($filenames, $path);
            $shopProduct['product_name_slug'] = strtolower(str_replace(" ", "_", $this->request->data('product_name')));
            $shopProduct['created_by'] = $this->Auth->user('id');
            $this->ShopProducts->save($shopProduct);
            /////////// Product Metas Save /////////
            $productMetaTable = TableRegistry::get('ProductMetas');
            $productMeta = $productMetaTable->newEntity();
            $productMeta['product_meta_field_name'] = "Instagram_product";
            $productMeta['product_meta_field_value'] = 1;
            $productMeta['meta_product_id'] = $shopProduct->products_id;
            $productMeta['created_by'] = $this->Auth->user('id');
            $productMetaTable->save($productMeta);
        }
        return $this->redirect($this->referer());
    }
}

