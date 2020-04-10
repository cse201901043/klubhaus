<?php

// src/Controller/HomeController.php



namespace App\Controller;



use App\Controller\AppController;

use Cake\ORM\TableRegistry;

use Cake\Datasource\ConnectionManager;

use Cake\Mailer\Email;





class HomeController extends AppController

{



    public function initialize()

    {

        parent::initialize();

        $this->loadComponent('Paginator');

        $this->viewBuilder()->setLayout('frontend_layout');

    }



    public $paginate = array(

        'limit' => 12,

        'contain' => ['ProductCategories', 'ProductSubCategories']

    );



    public function index()

    {

        // $cats = TableRegistry::get('ProductCategories')->find('all');

        // $this->set(compact('cats'));

        $newArrival = TableRegistry::get('ProductMetas')->find()

                    ->where(['product_meta_field_name' => 'new_arrival', 'product_meta_field_value' => 1])

                    ->contain(['ShopProducts' => ['ProductCategories', 'fields' =>['products_id', 'product_name', 'product_category_id', 'product_featured_image']]])->last();

        $instaProducts = TableRegistry::get('ProductMetas')->find()

                ->where(['product_meta_field_name' => 'Instagram_product', 'product_meta_field_value' => 1, 'ShopProducts.product_sale_status' => 1, 'ShopProducts.deleted' => 0 ])

                ->contain(['ShopProducts' => ['fields' =>['products_id', 'product_name', 'product_sub_category_id', 'product_featured_image']]])->order(['product_meta_id' => 'DESC'])->limit(3)->all();

        $cartProducts = TableRegistry::get('Carts')->find()->contain(['ShopProducts' => ['ProductCategories', 'ProductSubCategories']])->limit(15)->all();



        $productSliderImage = TableRegistry::get('ShopProducts')->find('all')

        ->contain(['ProductCategories', 'ProductSubCategories', 'ProductMetas' => ['conditions' => ['product_meta_field_name !=' => '', 'ProductMetas.deleted' => 0,

                'OR' => [['product_meta_field_name' => "Slider_Image"], ['product_meta_field_name' => "Slider_Title"]]

            ]]])->order(['products_id' => 'DESC']);
        $community = TableRegistry::get('Community')->find()->last();

        $this->set(compact('community', 'instaProducts', 'cartProducts', 'newArrival', 'productSliderImage'));

    }



    public function ajaxInstagram()

    {

        $this->autoRender = false;

        if ($this->request->is('post') || $this->request->is('ajax')) {

            $product_id = $this->request->data['product_id'];

            $sub_cat_id = $this->request->data['sub_cat_id'];



            $shopProduct = TableRegistry::get('ShopProducts')->get($product_id);

            $subcatProducts = TableRegistry::get('ShopProducts')->find()

                ->where(['product_sub_category_id' => $sub_cat_id, 'ShopProducts.product_sku IS NOT' => "", 'product_sale_status' => 1, 'ShopProducts.deleted' => 0])

                ->contain(['ProductCategories', 'ProductSubCategories'])->order(['products_id' => 'DESC'])->limit(3)->all();



            $products = [$shopProduct, $subcatProducts];

            echo json_encode($products);

            die();

        }

    }



    public function map()

    {

    }



    public function checkout()

    {

        $connection = ConnectionManager::get('default');

        $referer = TableRegistry::get('Users')->find()

                ->where(['user_role' => 'salesman', 'deleted' => 0 ])

                ->all();



         $this->set('referer', $referer);

         $this->viewBuilder()->setLayout('frontend_layout');

    }



    public function cart()

    {

    }



    public function privacyPolicy()

    {

    }



    public function cookiePolicy()

    {

    }



    public function termsOfUse()

    {

    }



    public function sizeGuide()

    {

    }



    public function delivery()

    {

    }



    public function paymentMethods()

    {

    }



    public function customerCare()

    {

    }



    public function about()

    {

    }



    public function faq()

    {

    }



    public function returnsExchanges()

    {

    }



    public function wishlist()

    {

        $user = TableRegistry::get('Users')->find()->where(['remember_token' => $this->Cookie->read('remember_token'), 'deleted' => 0])->contain(['UserMetas'])->first();

        $uid = $user->id;

        $lists = TableRegistry::get('Carts')->find()->where(['cart_user_id' => $uid, 'Carts.in_wishlist' => 1, 'Carts.deleted' => 0])->contain(['ShopProducts'=>['ProductCategories', 'ProductSubCategories']])->all();

        $this->set(compact('lists'));

    }



    public function search()

    {

        $connection = ConnectionManager::get('default');

        $sizes = $connection->execute("SELECT DISTINCT `attribute_field_value` FROM `attribute_values` LEFT JOIN attribute_types on attribute_values.attribute_values_type_id = attribute_types.attribute_type_id where attribute_types.attribute_type_slug='size' ORDER by `attribute_field_value` ASC")->fetchAll('assoc');



        $colors = $connection->execute("SELECT DISTINCT `attribute_field_value` FROM `attribute_values` LEFT JOIN attribute_types on attribute_values.attribute_values_type_id = attribute_types.attribute_type_id where attribute_types.attribute_type_slug='color' ORDER by `attribute_field_value` ASC")->fetchAll('assoc');

        

        if ($this->request->is('get'))

        {

            $search_key = (isset($this->request->query['search_key'])) ? $this->request->query['search_key'] : "";



            $products = TableRegistry::get('ShopProducts')->find()->where(['product_name LIKE' => "%".$search_key."%", 'ShopProducts.product_sku is not' => "", 'ShopProducts.deleted' => 0])->contain(['ProductCategories', 'ProductSubCategories'])->order(['products_id' => 'DESC']);

        }else{

            $products = array();

            $search_key = " ";

        }



        $products = $this->paginate($products);



        $this->set(compact('products', 'sizes', 'colors', 'search_key'));





    }



    public function contact()

    {

    }



    public function contactMail()

    {

        $this->autoRender = false;

        if ($this->request->is('post') || $this->request->is('ajax')) {

            $ms = "<b>Name: ".$this->request->data['name']."<br>";

            $ms .= "Phone: ".$this->request->data['phone']."</b><br>";

            $ms .= $this->request->data['message'];

            $ms = wordwrap($ms, 70);



            $email = new Email();

            $email->from('info@klubhaus.com.bd')

                ->to('info@klubhaus.com.bd')

                ->replyTo($this->request->data['email'])

                ->subject('Contact from E-commerce')

                ->emailFormat('both')

                ->send($ms);



            $data = ['success'];

            echo json_encode($data);

            die();

        }

    }



    public function view($slug = null)

    {

    }



    public function error()

    {

    }

    

}