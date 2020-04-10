<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Routing\Router;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Controller\Component\CookieComponent;
use Cake\I18n\Time;

class AppController extends Controller
{

    public function initialize()
    {
        parent::initialize();

        // $this->loadComponent('Security', ['blackHoleCallback' => 'forceSSL']); // SSL Security

        $this->loadComponent('Flash');
        $this->loadComponent('Cookie');
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Auth', [
            'authorize' => 'Controller',
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'AdminAdminlogin'
            ],
            'unauthorizedRedirect' =>
                [
                'controller' => 'Home',
                'action' => 'index'
            ],
        ]);

        $this->viewBuilder()->setLayout('adminMaster');
    }

    // for ssl
    // public function forceSSL(){
    //     return $this->redirect('https://' . env('SERVER_NAME') . $this->request->here);
    // }

    public function isAuthorized($user = null)
    {
        // Any registered user can access public functions
        if (!$user['user_type']) {
            return true;
        }

        // Only admins can access admin functions
        if ($user['user_type'] == 'admin') {
            return (bool)($user['user_type'] === 'admin');
        }

        // Default deny
        return false;
    }

    public function beforeFilter(Event $event)
    {

        $Auth = $this->Auth;
        $user = "";

        $this->Cookie->configKey('remember_token', 'encryption', false, ['expires' => '+365 days']);
        if (isset($_COOKIE['remember_token'])) {
            $user = TableRegistry::get('Users')->find()->where(['remember_token' => $_COOKIE['remember_token'], 'deleted' => 0])->contain(['UserMetas'])->first();
        }

        if (!empty($Auth->user('id'))) {
            $uid = $Auth->user('id');
            $this->Cookie->delete('remember_token');
            $this->Cookie->write('remember_token', $Auth->user('remember_token'));
        } elseif (!empty($user)) {
            $uid = $user->id;
        } else {
            $usersTable = TableRegistry::get('Users');
            $user = $usersTable->newEntity();
            $user['name'] = substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz", 6)), 0, 6);
            $user['name_slug'] = $user['name'];
            $hash = sha1($user['name'] . rand(0, 100));
            $user['user_profile_image'] = 'male-avater.png';
            $user['user_type'] = 'guest';
            $user['user_role'] = 'unregister';
            $user['email'] = $user['name'] . '@gmail.com';
            $user['password'] = '123456';
            $user['user_mobile'] = substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz", 11)), 0, 11);
            $user['login_status'] = '0';
            $user['status'] = '0';
            $user['remember_token'] = $hash;
            $user['created_at'] = Time::now();
            $user['updated_at'] = Time::now();
            $user['deleted'] = '0';
            if ($usersTable->save($user)) {
                $uid = $user->id;
                $this->Cookie->write('remember_token', $hash);
            }
        }

        //Create access log for each request

        $accessLogTable = TableRegistry::get('AccessLogs');
        $accessLog = $accessLogTable->newEntity();
        $accessLog['user_id'] = $uid;
        $ipAddress = $accessLog['ip_address'] = $_SERVER['REMOTE_ADDR'];
        $accessLog['controller'] = $this->request->controller;
        $accessLog['action'] = $this->request->action;
        $accessLog['prev_data'] = $_SERVER['HTTP_USER_AGENT'];
        $accessLog['mac_id'] = "";
        $accessLog['created'] = Time::now();
        $accessLog['modified'] = Time::now();
        $accessLogTable->save($accessLog);

        //Varriables for all pages


        $cats = TableRegistry::get('ProductCategories')->find()->where(['deleted' => 0])->all();
        $locations = TableRegistry::get('Locations')->find()->distinct(['thana'])->all();

        $connection = ConnectionManager::get('default');
        $stock_outs = $connection->execute("UPDATE carts as c SET c.deleted= 1 WHERE c.cart_id in (SELECT t.cart_id FROM (select * from carts) as t left join shop_products as s on t.cart_product_id = s.products_id where t.deleted = 0 and t.cart_user_id = '$uid' and s.product_stock = s.product_sold)");


        $orders = TableRegistry::get('Carts')->find()->where(['cart_user_id' => $uid, 'Carts.in_wishlist' => 0, 'Carts.deleted' => 0])->contain(['ShopProducts' => ['ProductSubCategories']])->all();


        //Discount
        $discount = $connection->execute("SELECT * FROM shop_discounts where deleted = 0 and (now() between shop_discount_from AND shop_discount_to) order by shop_discount_id DESC LIMIT 1")->fetch('assoc');

        if(empty($discount)){$discount['shop_discount_rate'] = 0; }
        if (strpos($discount['shop_discount_rate'], '%') !== false) {
            $discount['type'] = '1'; // For Percentage
        }else{
            $discount['type'] = '2'; // For Fixed Amount
        }

        //Pass data to the pages
        $this->set('cookieHelper', $this->Cookie);
        $this->set(compact('Auth', 'user', 'cats', 'orders', 'locations', 'discount'));

        if ($this->Auth->user('user_type') != 'admin') {
            $this->Auth->deny();
            $this->Auth->allow(['home', 'login', 'logout', 'testDelivery', 'callback', 'ajaxInstagram', 'view', 'index', 'add', 'cart', 'checkout', 'map', 'ajaxSorting', 'ajaxOrderDetails', 'delete', 'edit', 'changeInfo', 'changePassword', 'login', 'logout', 'activate', 'search', 'about', 'contact', 'faq', 'privacyPolicy', 'cookiePolicy', 'sizeGuide', 'returnsExchanges', 'termsOfUse', 'paymentMethods', 'customerCare', 'delivery', 'addToCart', 'removeFromCart', 'wishlist', 'addToWishlist', 'myAccount', 'removeFromWishlist', 'checkStock', 'checkStock2', 'subscribe', 'contactMail', 'AdminAdminlogin', 'adminLogin', 'error', 'cashOnDelivery', 'testSslTransaction', 'success', 'fail', 'cancel']);
        } else {
            $this->Auth->deny();
            $this->Auth->allow(['AdminAdminlogin', 'adminLogin', 'adminHome']);
        }


        parent::beforeFilter($event);
    }
}
