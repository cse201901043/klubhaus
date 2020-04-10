<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;
use Cake\Controller\Component\CookieComponent;
use Cake\View\Helper\HtmlHelper;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Datasource\ConnectionManager;
use Cake\Mailer\MailerAwareTrait;


/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    use MailerAwareTrait;
    
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['AccessLogs']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->autoRender = false;
        // $user = $this->Users->newEntity();
        if ($this->request->is('post')) {

            $EmailCheck = filter_var($this->request->data('email'),FILTER_SANITIZE_EMAIL);
            $UserPhone = $this->request->data('user_mobile');
            $EmailResult = $this->Users->find()->where(['email' => $EmailCheck, 'deleted' => 0])->first();
            $PhoneResult = $this->Users->find()->where(['user_mobile' => $UserPhone, 'deleted' => 0])->first();
            if(!empty($EmailResult)){
                $user = '';
                $status = 1;//Email Exist
                $data = [$user, $status];
                echo json_encode($data);
                die();
            }elseif (!empty($PhoneResult)){
                $user = '';
                $status = 2;//Phone Exist
                $data = [$user, $status];
                echo json_encode($data);
                die();
            }else{
                $html = new HtmlHelper(new \Cake\View\View());

                $user = TableRegistry::get('Users')->find()->where(['remember_token' => $this->Cookie->read('remember_token')])->first();

                $this->request->data['name_slug'] = strtolower(str_replace(" ", "_", $this->request->data['name']));
                $this->request->data['user_role'] = 'customer';
                $this->request->data['updated_at'] = Time::now();

                if ($user->user_role != 'unregister') {
                    $user = $this->Users->newEntity();
                    $hash = sha1($this->request->data['name'] . rand(0, 100));
                    $this->request->data['user_type'] = 'guest';
                    $this->request->data['remember_token'] = $hash;
                    $this->request->data['user_profile_image'] = 'male-avater.png';
                    $this->request->data['login_status'] = '0';
                    $this->request->data['status'] = '0';
                    $this->request->data['created_at'] = Time::now();
                    $this->request->data['updated_at'] = Time::now();
                }

                $user = $this->Users->patchEntity($user, $this->request->getData());
                $user_data = json_decode(json_encode($user), true);
                $result = array_diff($this->request->data, $user_data);
                $counter = 0;

                $user_meta_table = TableRegistry::get('UserMetas');


                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The user has been saved.'));

                     //$this->getMailer('User')->send('signup', [$user]);

                    foreach ($result as $key => $value) {
                        if ($counter < 8 && $counter != 4 && $counter != 5) {
                            $user_meta = $user_meta_table->newEntity();
                            $user_meta->meta_user_id = $user->id;
                            $user_meta->user_meta_field_name = $key;
                            $user_meta->user_meta_field_value = $value;
                            if ($user_meta->user_meta_field_name == 'subscriber')
                                $user_meta->user_meta_field_value = $this->request->data['email'];
                            $user_meta->created_by = $user->id;
                            $user_meta->updated_by = $user->id;
                            $user_meta->deleted = 0;
                            $user_meta->created_at = Time::now();
                            $user_meta->updated_at = Time::now();
                            $user_meta_table->save($user_meta);
                        }
                        $counter++;
                    }

                    $status = 0;
                    $data = [$user, $status];

                    echo json_encode($data);
                    die();
                }
            }
            // $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        // $this->set(compact('user'));
    }

    public function activate($remember_token = '')
    {
        $this->autoRender = false;
        if ($remember_token != "") {
            $user = $this->Users->find()->where(['remember_token' => $remember_token])->first();
            if ($user) {
                $userId = $user->id;
                $user->login_status = 1;
                $user->status = 1;
                $this->Users->save($user);
                $this->Cookie->delete('remember_token');
                $this->Cookie->write('remember_token', $user->remember_token);
                $this->Auth->setUser($user);
                return $this->redirect(['action' => 'index', 'controller' => 'Home']);
            }
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {

                $this->Cookie->write('remember_token', $user->remember_token);

                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user['status'] == 1) {
                $this->Auth->setUser($user);
                $cookieUser = TableRegistry::get('Users')->find()->where(['remember_token' => $this->Cookie->read('remember_token')])->first();
                // echo $cookieUser->id;
                if ($cookieUser->user_role == 'unregister')
                    TableRegistry::get('Carts')->updateAll(['cart_user_id' => $this->Auth->user('id')], ['cart_user_id' => $cookieUser->id]);
                $orders = TableRegistry::get('Carts')->find()->where(['Carts.cart_user_id' => $this->Auth->user('id'), 'Carts.in_wishlist' => 0, 'Carts.deleted' => 0])->contain(['ShopProducts' => ['ProductSubCategories']])->all();
                if (empty($orders))
                    $orders = "empty";
                $this->Cookie->delete('remember_token');
                $this->Cookie->write('remember_token', $this->Auth->user('remember_token'));
                $user = $this->Users->find()->where(['id' => $this->Auth->user('id')])->contain(['UserMetas'])->first();
                // $this->getMailer('User')->send('welcome', [$user]);
                $status = 1;
                $data = [$user, $orders, $status];
                echo json_encode($data);
                die();
            }
            else{
                $user = "";
                $orders = "";
                $status = 0;
                $data = [$user, $orders, $status];
                echo json_encode($data);
                die();
            }
        }
    }

    public function logout()
    {
        $this->autoRender = false;
        $this->Cookie->delete('remember_token');
        $this->Cookie->write('remember_token', substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz", 32)), 0, 32));
        $this->Auth->logout();
        $rsponse_array = array('status' => 'false');
        echo json_encode($rsponse_array);
        die();
    }

    public function myAccount()
    {
        if ($this->Auth->user('id') != ""){
            $this->viewBuilder()->setLayout('frontend_layout');
            $status = "";
            if($this->request->query('status') == 'ordered'){
                $status = 'order_done';
            }
            $orders_table = TableRegistry::get('Orders');
            $myorders = $orders_table->find()->where(['order_user_id' => $this->Auth->user('id'), 'deleted' => 0])->order(['created_at' => 'desc'])->limit(10);
            $this->set(compact('myorders', 'status'));
        }else{
            return $this->redirect('/');
        }
        
    }

    public function changeInfo()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $id = $this->request->data['user_id'];
            if(isset($this->request->data['user_mobile'])){
            $user = $this->Users->get($id);
                if (!empty($this->request->data['user_email'])) {
                    $mail = filter_var($this->request->data['user_email'],FILTER_SANITIZE_EMAIL);
                    $user->email = $mail;
                }
                if (!empty($this->request->data['user_mobile'])) {
                    $user_mobile = $this->request->data['user_mobile'];
                    $user->user_mobile = $user_mobile;
                }
                if ($this->Users->save($user)) {
                    $data[] = $user;
                }
            }
            if(isset($this->request->data['user_address'])){
                $user_meta_table = TableRegistry::get('UserMetas');
                $user_meta = $user_meta_table->find()->where(['meta_user_id' => $id, 'user_meta_field_name' => 'user_address'])->last();
                if(!empty($user_meta)){
                    $user_address = filter_var($this->request->data['user_address'],FILTER_SANITIZE_STRING);
                    $user_meta->user_meta_field_value = $user_address;
                    $user_meta->updated_at = Time::now();
                }else{
                    $user_meta = $user_meta_table->newEntity();
                    $user_address = filter_var($this->request->data['user_address'],FILTER_SANITIZE_STRING);
                    $user_meta->meta_user_id = $id;
                    $user_meta->user_meta_field_name = 'user_address';
                    $user_meta->user_meta_field_value = $user_address;
                    $user_meta->created_by = $id;
                    $user_meta->updated_by = $id;
                    $user_meta->deleted = 0;
                    $user_meta->created_at = Time::now();
                    $user_meta->updated_at = Time::now();
                }
                if ($user_meta_table->save($user_meta)) {
                    $data[] = $user_meta;
                }
            }
            echo json_encode($data);
            die();
        }
    }

    public function changePassword()
    {
        $this->autoRender = false;
        $user = $this->Users->get($this->Auth->user('id'));
        if ((new DefaultPasswordHasher)->check($this->request->data['current_password'], $user->password)) {
            if ($this->request->is(['post'])) {
                $user = $this->Users->patchEntity($user, $this->request->data);
                if ($this->Users->save($user)) {
                    echo json_encode($user);
                    die();
                }
            }
        }
    }

    public function reference()
    {
        $this->redirect(Router::url($this->referer(), true));
    }

    public function subscribe()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $user_meta_table = TableRegistry::get('UserMetas');
            $user_meta = $user_meta_table->newEntity();
            $user_meta->meta_user_id = $this->request->data['meta_user_id'];
            $user_meta->user_meta_field_name = 'subscriber';
            $user_meta->user_meta_field_value = filter_var($this->request->data['sub_mail'],FILTER_SANITIZE_EMAIL);
            $user_meta->created_by = $this->request->data['meta_user_id'];
            $user_meta->updated_by = $this->request->data['meta_user_id'];
            $user_meta->created_at = Time::now();
            $user_meta->updated_at = Time::now();
            $user_meta->deleted = 0;
            if ($user_meta_table->save($user_meta)) {
                echo json_encode($user_meta);
                die();
            }
        }
    }


///////////////////////// Admin Start  //////////////////////////////////


    public function AdminIndex()
    {
        $users = $this->paginate($this->Users);
        $this->set(compact('users'));
    }


    public function AdminUsersAdd()
    {

    }

    public function AdminAddUsers()
    {
        $this->autoRender = false;
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $EmailCheck = filter_var($this->request->data('email'),FILTER_SANITIZE_EMAIL);
            $UserPhone = $this->request->data('user_mobile');
            $EmailResult = $this->Users->find()->where(['email' => $EmailCheck, 'deleted' => 0])->first();
            $PhoneResult = $this->Users->find()->where(['user_mobile' => $UserPhone, 'deleted' => 0])->first();
            if(!empty($EmailResult)){
                $this->Flash->success('Email Already Exist', [
                    'key' => 'positive',
                ]);
                return $this->redirect($this->referer());
            }elseif (!empty($PhoneResult)){
                $this->Flash->success('User Mobile Already Exist', [
                    'key' => 'positive',
                ]);
                return $this->redirect($this->referer());
            }else{
                $name = $this->request->data('name');
                $user['name'] = filter_var($this->request->data('name'),FILTER_SANITIZE_STRING);
                $user['name_slug'] = strtolower(str_replace(" ", "_", $name));
                $hash = sha1($user['name'] . rand(0, 100));
                $user['email'] = filter_var($this->request->data('email'),FILTER_SANITIZE_EMAIL);
                $user['password'] = $this->request->data('password');
                $user['user_mobile'] = $this->request->data('user_mobile');
                $user['user_role'] = $this->request->data('user_role');
                $user['status'] = 0;
                $user['user_type'] = "admin";
                $user['remember_token'] = $hash;
                $user['created_by'] = $this->Auth->user('id');
                $this->Users->save($user);
                $this->Flash->success('User Saved Successfully', [
                    'key' => 'positive',
                ]);
                return $this->redirect($this->referer());
            }
        }
    }


    public function AdminViewUserList()
    {
        $userList = $this->Users->find()->where(['user_type' => 'admin', 'deleted' => 0])->order(['id' => 'DESC']);
        $this->paginate = array(
            'limit' => 20,
        );
        $this->set('userList', $this->paginate($userList));
    }


    public function AdminUserStatusPublish($id = null)
    {
        $user = $this->Users->get($id);
        $user->status = 1;
        $user['updated_by'] = $this->Auth->user('id');
        $this->Users->save($user);
        return $this->redirect($this->referer());
    }

    public function AdminUserStatusNotPublish($id = null)
    {
        $user = $this->Users->get($id);
        $user->status = 0;
        $user['updated_by'] = $this->Auth->user('id');
        $this->Users->save($user);
        return $this->redirect($this->referer());
    }


    public function AdminDeleteUser($id = null)
    {
        $user = $this->Users->get($id);
        $user->deleted = 1;
        $user['updated_by'] = $this->Auth->user('id');
        $this->Users->save($user);
        return $this->redirect($this->referer());
    }

    public function adminHome()
    {
        $user = $this->Users->find()->where(['user_role' => 'customer', 'deleted' => 0])->all();
        $guest = $this->Users->find()->where(['user_role' => 'unregister', 'deleted' => 0])->all();
        $totalSells = TableRegistry::get('OrderDetails')->find()->where(['deleted' => 0])->all();
        $totalProduct = TableRegistry::get('ShopProducts')->find()->where(['product_sale_status' => 1, 'deleted' => 0])->all();
        $totalInstaProduct = TableRegistry::get('ShopProducts')->find()->where(['product_sale_status' => 1, 'product_unit_sale_price' => 0, 'deleted' => 0])->all();
        $this->viewBuilder()->setLayout('adminMaster');
        $this->set(compact('adminhome', 'user', 'guest', 'totalSells', 'totalProduct', 'totalInstaProduct'));
    }

    public function AdminAdminlogin()
    {
        $this->viewBuilder()->setLayout('empty');

    }


    public function adminLogin()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $email = filter_var($this->request->data('email'),FILTER_SANITIZE_EMAIL);
            $userRole = 'admin';
            $admin = $this->Users->find()->where(['email' => $email, 'user_role' => $userRole])->first();
            if (!empty($admin)) {
                $user = $this->Auth->identify();
                if (!empty($user)) {
                    $this->Auth->setUser($user);
                    return $this->redirect(['controller' => 'users/admin-home']);
                } else {
                    $this->Flash->error(__('Wrong User Name Or Password.'));
                    return $this->redirect(['controller' => 'users/admin_adminlogin']);
                }
            } else {
                $this->Flash->error(__('Wrong User Name Or Password.'));
                return $this->redirect(['controller' => 'users/admin_adminlogin']);
            }
        } else {
            $this->Flash->error(__('I am a poor script. Stop using cross site scripting.'));
            return $this->redirect(['controller' => 'users/admin-home']);
        }
    }


    public function AdmineditUserInfo($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        $this->set(compact('user'));
    }

    public function AdminsingleEditUser()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $id = $this->request->data('id');
            $user = $this->Users->get($id);
            $name = $this->request->data('name');
            $user['name'] = filter_var($this->request->data('name'),FILTER_SANITIZE_STRING);
            $user['name_slug'] = strtolower(str_replace(" ", "_", $name));
            $user['email'] = filter_var($this->request->data('email'),FILTER_SANITIZE_EMAIL);
            $user['user_mobile'] = $this->request->data('user_mobile');
            $user['user_role'] = $this->request->data('user_role');
            $user['updated_by'] = $this->Auth->user('id');
            $this->Users->save($user);
        }
        return $this->redirect($this->referer());
        
    }
    
    

    public function AdminLogout()
    {
        return $this->redirect($this->Auth->logout());
    }


//    public function testProduct(){
//        $connection = ConnectionManager::get('sqlDatabase');
//        $test = $connection->execute("select TOP 23
//        tblProductDetailsWithAttribute.ShopCode, tblDepartment.DepartmentName, tblDepartment.DepartmentCode,
//        tblProductLine.LineDescr, tblProductLine.Pro_Line, tblProductGroup.GroupDescr, tblProductGroup.GroupCode,
//        tblProduct.Pro_Code, tblProduct.Pro_Descr, tblProduct.LastCost, tblProduct.SalesPrice, tblProduct.Setupdate
//        from tblProduct
//        LEFT JOIN tblProductGroup ON tblProduct.GroupCode = tblProductGroup.GroupCode
//        LEFT JOIN tblProductLine ON tblProductLine.Pro_Line = tblProductGroup.Pro_Line
//        LEFT JOIN tblDepartment ON tblProductLine.DepartmentCode = tblDepartment.DepartmentCode
//        LEFT JOIN tblProductDetailsWithAttribute ON tblProductDetailsWithAttribute.Pro_Code = tblProduct.Pro_Code
//        where tblProduct.IsSaleable = 1
//        and tblProductLine.Pro_Line != 019
//        and tblProductDetailsWithAttribute.ShopCode = 'K001' ORDER BY Pro_Code DESC")->fetchAll('assoc');
//        // ORDER BY Pro_Code DESC
//        $this->set(compact('test'));
//    }
//
//
//    public function testProductStock(){
//        $connection = ConnectionManager::get('sqlDatabase');
//        $test = $connection->execute("select TOP 23 * from tblProductDetailsWithAttribute
//        where tblProductDetailsWithAttribute.ShopCode = 'K001'
//        ORDER BY Pro_Code DESC")->fetchAll('assoc');
//        // ORDER BY Pro_Code DESC
//        // $this->set(compact('test'));
//
//        $this->autoRender = false;
//        echo "<pre>";
//        print_r($test);
//        die();
//    }


}
