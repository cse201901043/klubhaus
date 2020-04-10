<?php



namespace App\Controller;



use App\Controller\AppController;

use Cake\ORM\TableRegistry;

use Cake\Controller\Component\CookieComponent;

use Cake\I18n\Time;

use Cake\View\Helper\UrlHelper;

use Cake\Mailer\Email;

use Cake\View\Helper\HtmlHelper;

use Cake\Datasource\ConnectionManager;


use Cake\Mailer\MailerAwareTrait;





/**

 * Orders Controller

 *

 * @property \App\Model\Table\OrdersTable $Orders

 *

 * @method \App\Model\Entity\Order[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])

 */

class OrdersController extends AppController

{

    use MailerAwareTrait;



    /**

     * Index method

     *

     * @return \Cake\Http\Response|void

     */

    public function index()

    {

        $this->paginate = [

            'contain' => ['OrderUsers', 'OrderPayments']

        ];

        $orders = $this->paginate($this->Orders);



        $this->set(compact('orders'));

    }



    /**

     * View method

     *

     * @param string|null $id Order id.

     * @return \Cake\Http\Response|void

     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.

     */

    public function view($id = null)

    {

        $order = $this->Orders->get($id, [

            'contain' => ['OrderUsers', 'OrderPayments']

        ]);



        $this->set('order', $order);

    }



    /**

     * Add method

     *

     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.

     */

    public function add()

    {

        $order = $this->Orders->newEntity();

        if ($this->request->is('post')) {

            $order = $this->Orders->patchEntity($order, $this->request->getData());

            if ($this->Orders->save($order)) {

                $this->Flash->success(__('The order has been saved.'));



                return $this->redirect(['action' => 'index']);

            }

            $this->Flash->error(__('The order could not be saved. Please, try again.'));

        }

        $orderUsers = $this->Orders->OrderUsers->find('list', ['limit' => 200]);

        $orderPayments = $this->Orders->OrderPayments->find('list', ['limit' => 200]);

        $this->set(compact('order', 'orderUsers', 'orderPayments'));

    }



    /**

     * Edit method

     *

     * @param string|null $id Order id.

     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.

     * @throws \Cake\Network\Exception\NotFoundException When record not found.

     */

    public function edit($id = null)

    {

        $order = $this->Orders->get($id, [

            'contain' => []

        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $order = $this->Orders->patchEntity($order, $this->request->getData());

            if ($this->Orders->save($order)) {

                $this->Flash->success(__('The order has been saved.'));



                return $this->redirect(['action' => 'index']);

            }

            $this->Flash->error(__('The order could not be saved. Please, try again.'));

        }

        $orderUsers = $this->Orders->OrderUsers->find('list', ['limit' => 200]);

        $orderPayments = $this->Orders->OrderPayments->find('list', ['limit' => 200]);

        $this->set(compact('order', 'orderUsers', 'orderPayments'));

    }



    /**

     * Delete method

     *

     * @param string|null $id Order id.

     * @return \Cake\Http\Response|null Redirects to index.

     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.

     */

    public function delete($id = null)

    {

        $this->request->allowMethod(['post', 'delete']);

        $order = $this->Orders->get($id);

        if ($this->Orders->delete($order)) {

            $this->Flash->success(__('The order has been deleted.'));

        } else {

            $this->Flash->error(__('The order could not be deleted. Please, try again.'));

        }



        return $this->redirect(['action' => 'index']);

    }



    /* Test SSL */

    public function testSslTransaction()

    {



        $carts = TableRegistry::get('Carts')->find()->where(['cart_user_id' => $this->Auth->user('id'), 'Carts.deleted' => 0])->all();

        $total = 0;

        foreach ($carts as $cart) {

            $total += $cart->cart_product_total_price;

            $cartProduct[]['product'] = $cart->cart_product_name;

            $cartProduct[]['amount'] = $cart->cart_product_total_price;

        }

        /* PHP */

        $Url = new UrlHelper(new \Cake\View\View());



        $post_data = array();

        $post_data['store_id'] = "testbox";

        $post_data['store_passwd'] = "qwerty";

        $post_data['total_amount'] = $total;

        $post_data['currency'] = "BDT";

        $post_data['tran_id'] = "SSLCZ_TEST_" . uniqid();

        $post_data['success_url'] = $Url->build('/', true) . "order/success";

        $post_data['fail_url'] = $Url->build('/', true) . "order/fail";

        $post_data['cancel_url'] = $Url->build('/', true) . "order/cancel";

        # $post_data['multi_card_name'] = "mastercard,visacard,amexcard";  # DISABLE TO DISPLAY ALL AVAILABLE



        # EMI INFO

        // $post_data['emi_option'] = "1";

        // $post_data['emi_max_inst_option'] = "9";

        // $post_data['emi_selected_inst'] = "9";



        # CUSTOMER INFORMATION

        $post_data['cus_name'] = $this->Auth->user('name');

        $post_data['cus_email'] = $this->Auth->user('email');

        $post_data['cus_add1'] = "Dhaka";

        $post_data['cus_add2'] = "Dhaka";

        $post_data['cus_city'] = "Dhaka";

        $post_data['cus_state'] = "Dhaka";

        $post_data['cus_postcode'] = "1000";

        $post_data['cus_country'] = "Bangladesh";

        $post_data['cus_phone'] = $this->Auth->user('user_mobile');

        $post_data['cus_fax'] = $this->Auth->user('user_mobile');



        # SHIPMENT INFORMATION

        $post_data['ship_name'] = "Store Test";

        $post_data['ship_add1 '] = "Dhaka";

        $post_data['ship_add2'] = "Dhaka";

        $post_data['ship_city'] = "Dhaka";

        $post_data['ship_state'] = "Dhaka";

        $post_data['ship_postcode'] = "1000";

        $post_data['ship_country'] = "Bangladesh";



        # OPTIONAL PARAMETERS

        $post_data['value_a'] = "ref" . substr(str_shuffle(str_repeat("0123456789", 4)), 0, 4);

        $post_data['value_b'] = "ref002";

        $post_data['value_c'] = "ref003";

        $post_data['value_d'] = "ref004";



        # CART PARAMETERS

        // $post_data['cart'] = json_encode(array(

        //     array("product"=>"DHK TO BRS AC A1","amount"=>"200.00"),

        //     array("product"=>"DHK TO BRS AC A2","amount"=>"200.00"),

        //     array("product"=>"DHK TO BRS AC A3","amount"=>"200.00"),

        //     array("product"=>"DHK TO BRS AC A4","amount"=>"200.00")    

        // ));

        $post_data['cart'] = json_encode($cartProduct);

        $post_data['product_amount'] = $total;

        $post_data['vat'] = "0";

        $post_data['discount_amount'] = "0";

        $post_data['convenience_fee'] = "0";





        # REQUEST SEND TO SSLCOMMERZ

        $direct_api_url = "https://sandbox.sslcommerz.com/gwprocess/v3/api.php";



        $handle = curl_init();

        curl_setopt($handle, CURLOPT_URL, $direct_api_url);

        curl_setopt($handle, CURLOPT_TIMEOUT, 30);

        curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);

        curl_setopt($handle, CURLOPT_POST, 1);

        curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);

        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC





        $content = curl_exec($handle);



        $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);



        if ($code == 200 && !(curl_errno($handle))) {

            curl_close($handle);

            $sslcommerzResponse = $content;

        } else {

            curl_close($handle);

            echo "FAILED TO CONNECT WITH SSLCOMMERZ API";

            exit;

        }



        # PARSE THE JSON RESPONSE

        $sslcz = json_decode($sslcommerzResponse, true);



        if (isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL'] != "") {

            # THERE ARE MANY WAYS TO REDIRECT - Javascript, Meta Tag or Php Header Redirect or Other

            # echo "<script>window.location.href = '". $sslcz['GatewayPageURL'] ."';</script>";

            echo "<meta http-equiv='refresh' content='0;url=" . $sslcz['GatewayPageURL'] . "'>";

            # header("Location: ". $sslcz['GatewayPageURL']);

            exit;

        } else {

            echo "JSON Data parsing error!";

        }

    }



    //test success

    public function success()

    {

        $this->autoRender = false;

        $order = $this->Orders->newEntity();



        $user_meta_table = TableRegistry::get('UserMetas');

        $user_infos = $user_meta_table->find()->where(['meta_user_id' => $this->Auth->user('id'), 'deleted' => 0])->all();



        foreach ($user_infos as $user_info) {

            if ($user_info->user_meta_field_name == 'user_address') {

                $address = $user_info->user_meta_field_value;

            }

        }



        $order->order_user_id = $this->Auth->user('id');

        $order->order_shipping_address = $address;

        $order->order_amount = $_POST['currency_amount'];

        $order->order_grand_total = $_POST['currency_amount'];

        $order->order_payment_status = 0;

        $order->order_deliver_status = 0;

        $order->order_status = 0;

        $order->created_by = $this->Auth->user('id');

        $order->updated_by = $this->Auth->user('id');

        $order->created_at = Time::now();

        $order->updated_at = Time::now();





        $products_table = TableRegistry::get('ShopProducts');

        $stocks_table = TableRegistry::get('productStocksDetails');

        $order_details_table = TableRegistry::get('OrderDetails');

        $cart_table = TableRegistry::get('Carts');

        $carts = TableRegistry::get('Carts')->find()->where(['cart_user_id' => $this->Auth->user('id'), 'Carts.in_wishlist' => 0, 'Carts.deleted' => 0])->all();

        foreach ($carts as $cart) {

            $orderDetails = $order_details_table->newEntity();

            $orderDetails->order_user_id = $cart->cart_user_id;

            $orderDetails->order_id = $order->order_id;

            $orderDetails->order_product_id = $cart->cart_product_id;

            $orderDetails->order_product_stocks_id = $cart->cart_product_stocks_id;

            $orderDetails->order_product_name = $cart->cart_product_name;

            $orderDetails->order_product_quantity = $cart->cart_product_quantity;

            $orderDetails->order_product_unit_price = $cart->cart_product_unit_price;

            $orderDetails->order_product_total_price = $cart->cart_product_total_price;

            $orderDetails->order_product_image = $cart->cart_product_image;

            $orderDetails->created_by = $cart->created_by;

            $orderDetails->updated_by = $cart->updated_by;

            $orderDetails->created_at = Time::now();

            $orderDetails->updated_at = Time::now();

            $orderDetails->deleted = $cart->deleted;

            $order_details_table->save($orderDetails);



            //Update Cart

            $cart->updated_at = Time::now();

            $cart->deleted = 1;

            $cart_table->save($cart);



            $product = $products_table->find()->where(['products_id' => $cart->cart_product_id])->last();

            $product->product_sold = $product->product_sold + 1;

            $products_table->save($product);



            $arr = explode("_", $cart->cart_product_stocks_id);

            foreach ($arr as $attribute_stock) {

                $stock = $stocks_table->find()->where(['stocks_product_id' => $cart->cart_product_id, 'product_stocks_id' => $attribute_stock])->last();

                $stock->product_attribute_sold = $stock->product_attribute_sold + 1;

                $stocks_table->save($stock);

            }



        }



        $paymentTable = TableRegistry::get('PaymentTransactions');

        $payment = $paymentTable->newEntity();

        $payment->payment_transaction_id = $_POST['tran_id'];

        $payment->payment_order_id = $order->order_id;

        $payment->payment_user_id = $this->Auth->user('id');

        $payment->payment_purpose = $_POST['card_type'];

        $payment->payment_amount = $_POST['currency_amount'];

        $payment->payment_status = 1;

        $payment->created_by = $this->Auth->user('id');

        $payment->updated_by = $this->Auth->user('id');

        $payment->created_at = Time::now();

        $payment->updated_at = Time::now();

        $paymentTable->save($payment);



        $order->order_payment_id = $payment->payment_order_id;

        $order->order_payment_transaction = $payment->payment_transaction_id;

        $order->order_payment_status = 1;

        $this->Orders->save($order);



        return $this->redirect($this->referer());

    }



    //test fail

    public function fail()

    {

        $this->autoRender = false;

        echo "fail";

    }



    //test cancle

    public function cancel()

    {

        $this->autoRender = false;

        echo 'cancle';

    }



    //Cash on Delivery

    public function cashOnDelivery()

    {

        $this->autoRender = false;



        $items = $carts = TableRegistry::get('Carts')->find()->where(['cart_user_id' => $this->Auth->user('id'), 'Carts.in_wishlist' => 0, 'Carts.deleted' => 0])->all();
        $connection = ConnectionManager::get('default');
        $discount = $connection->execute("SELECT * FROM shop_discounts where deleted = 0 and (now() between shop_discount_from AND shop_discount_to) order by shop_discount_id DESC LIMIT 1")->fetch('assoc');
        if(empty($discount)){$discount['shop_discount_rate'] = 0; }

        $total = 0;

        foreach ($carts as $cart) {

            $total += $cart->cart_product_total_price;

        }

        //discount Calculation
        $discount_rate = str_replace("%","", $discount['shop_discount_rate']);
        $discount_value = $discount_rate/100;
        $discount_amount = $total*$discount_value;



        $order = $this->Orders->newEntity();



        $user_table = TableRegistry::get('Users');
        $user = $user_table->find()->where(['id' => $this->Auth->user('id'), 'deleted' => 0])->last();

        $user_meta_table = TableRegistry::get('UserMetas');
        $user_infos = $user_meta_table->find()->where(['meta_user_id' => $this->Auth->user('id'), 'deleted' => 0])->all();



        foreach ($user_infos as $user_info) {

            if ($user_info->user_meta_field_name == 'user_address') {

                $address = $user_info->user_meta_field_value;

            }

        }



        $order->order_user_id = $this->Auth->user('id');

        $order->order_shipping_cost = 60;

        $order->order_shipping_type = 1; //  1 = Pathao

        $order->order_shipping_address = $address;

        $order->order_discount_rate = $discount['shop_discount_rate'];

        $order->order_amount = $total;

        $order->order_deduct_amount = $discount_amount;

        $order->order_grand_total = $total + 60 - $discount_amount;

        $order->order_payment_status = 0;

        $order->order_deliver_status = 0;

        $order->order_status = 0;

        $order->created_by = $this->Auth->user('id');

        $order->updated_by = $this->Auth->user('id');

        $order->created_at = Time::now();

        $order->updated_at = Time::now();

        if ($this->Orders->save($order)) {
            // The $article entity contains the id now
            $order_id = $order->order_id;
        }



        $products_table = TableRegistry::get('ShopProducts');

        $stocks_table = TableRegistry::get('productStocksDetails');

        $order_details_table = TableRegistry::get('OrderDetails');

        $cart_table = TableRegistry::get('Carts');



        foreach ($carts as $cart) {

            $orderDetails = $order_details_table->newEntity();

            $orderDetails->order_user_id = $cart->cart_user_id;

            $orderDetails->order_id = $order->order_id;

            $orderDetails->order_product_id = $cart->cart_product_id;

            $orderDetails->order_product_stocks_id = $cart->cart_product_stocks_id;

            $orderDetails->order_product_name = $cart->cart_product_name;

            $orderDetails->order_product_quantity = $cart->cart_product_quantity;

            $orderDetails->order_product_unit_price = $cart->cart_product_unit_price;

            $orderDetails->order_product_total_price = $cart->cart_product_total_price;

            $orderDetails->order_product_image = $cart->cart_product_image;

            $orderDetails->created_by = $cart->created_by;

            $orderDetails->updated_by = $cart->updated_by;

            $orderDetails->created_at = Time::now();

            $orderDetails->updated_at = Time::now();

            $orderDetails->deleted = $cart->deleted;

            $order_details_table->save($orderDetails);
            



            //Update Cart

            $cart->updated_at = Time::now();

            $cart->deleted = 1;

            $cart_table->save($cart);



            $product = $products_table->find()->where(['products_id' => $cart->cart_product_id])->last();

            $product->product_sold = $product->product_sold + 1;

            $products_table->save($product);



            $arr = explode("_", $cart->cart_product_stocks_id);

            foreach ($arr as $attribute_stock) {

                $stock = $stocks_table->find()->where(['stocks_product_id' => $cart->cart_product_id, 'product_stocks_id' => $attribute_stock])->last();

                $stock->product_attribute_sold = $stock->product_attribute_sold + 1;

                $stocks_table->save($stock);

            }



        }
        
        $items = TableRegistry::get('OrderDetails')->find()->where(['order_user_id' => $this->Auth->user('id'), 'order_id' => $order_id, 'deleted' => 0])->all();
        
        

        // $this->getMailer('User')->send('confirm_order', [$user, $order, $items]);



        return $this->redirect(['controller' => 'Users', 'action' => 'myAccount', "?" => ["status" => "ordered"]]);

    }









//////////////////////////    Admin Start From Here //////////////////





    public function AdminAdd()

    {

        $order = $this->Orders->newEntity();
        if ($this->request->is('post')) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }

        $orderUsers = $this->Orders->OrderUsers->find('list', ['limit' => 200]);

        $orderPayments = $this->Orders->OrderPayments->find('list', ['limit' => 200]);

        $this->set(compact('order', 'orderUsers', 'orderPayments'));

    }






    public function AdminOrderList()

    {

        $orders = $this->Orders->find()->where(['deleted' => 0])->order(['order_id' => 'DESC']);
        $pendingOrder = $this->Orders->find()->where(['order_status' => 0 ,'deleted' => 0])->order(['order_id' => 'DESC']);
        $successOrder = $this->Orders->find()->where(['order_status' => 1 ,'deleted' => 0])->order(['order_id' => 'DESC']);


//        $pickedUp = $this->Orders->find()->where(['order_deliver_status' => 2], ['deleted' => 0])->order(['order_id' => 'DESC']);
    //    foreach( $successOrder as $info){
    //     echo "<pre>";
    //        print_r($info);

    //    }
    //    die();

        $this->paginate = array(
            'limit' => 20,
        );
        $orders = $this->paginate($orders);
        $pendingOrder = $this->paginate($pendingOrder);
        $successOrder = $this->paginate($successOrder);
        $this->set(compact('orders', 'pendingOrder', 'successOrder'));

    }


    public function userOrderInfo($id = null)
    {
        $connection = ConnectionManager::get('default');
        $orderProduct = $connection->execute("SELECT orders.order_user_id, users.name, users.user_mobile, users.email FROM orders INNER JOIN users ON orders.order_user_id = users.id where orders.order_id = $id")->fetch('assoc');
        $this->set(compact('orderProduct'));
        
        // echo "<pre>";
        // print_r($orderProduct);
        // die();
        
        
    }


    public function orderStatusPending() 

    {
        $this->autoRender = false;
        if ($this->request->is('post')) {

            $order = TableRegistry::get('Orders')->find()->where(['order_id' => $this->request->data['order_id'], 'deleted' => 0])->last();
            $orderDetails = TableRegistry::get('OrderDetails')->find()->where(['OrderDetails.order_id' => $this->request->data['order_id'], 'OrderDetails.deleted' => 0])->contain(['ShopProducts'])->all();
            $user = TableRegistry::get('Users')->get($order->order_user_id);
            $description = "";
            foreach ($orderDetails as $product) {
                $description .= $product->shop_product->product_sku . " - " . $product->order_product_name . " : " . $product->order_product_quantity . "pcs, ";
            }

            // $post_data['receiver_name'] = $user->name;
            // $post_data['receiver_address'] = $order->order_shipping_address;
            // $post_data['receiver_number'] = $user->user_mobile;
            // $post_data['recipient_email'] = $user->email;

            // if ($order->order_payment_status == 1) {
            //     $post_data['cost'] = "0";
            // } else {
            //     $post_data['cost'] = $order->order_grand_total;
            // }

            // $post_data['instructions'] = "Something";
            // $post_data['package_description'] = $description;
            // $post_data['order_code'] = "Inv-181000" . $this->request->data['order_id'];
            // $post_data['store_id'] = $this->request->data['shop_id'];
            // $post_data['plan_id'] = "1";
            // $data_string = json_encode($post_data);
            // $ch = curl_init();
            // curl_setopt($ch, CURLOPT_URL, "https://api.pathao.com/v1/me/deliveries");
            // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            // curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            //     'Content-Type: application/json',
            //     "Authorization: Bearer blBsJfTDRtMZJTIHBY4DgTyBcAHbnnjkk0yr1AJU"                    

            // ));

            $result = array();//curl_exec($ch);

            // curl_close($ch);

            //update order table 
            $order->order_status = 1;

            $order->order_deliver_response = $result;

            if ($this->Orders->save($order)) {

                // $this->getMailer('User')->send('confirm_order', [$user, $order, $orderDetails]);

                return $this->redirect($this->referer());

            }
            return $this->redirect($this->referer());
        }
        return $this->redirect($this->referer());
    }



    public function AdminorderStatusSuccess($id = null)

    {

        $orders = $this->Orders->get($id);

        $orders->order_status = 0;



        $orders['updated_by'] = $this->Auth->user('id');



        if ($this->Orders->save($orders)) {



        }



        return $this->redirect($this->referer());

    }



//    public function orderDeliverStatusSuccess($id = null)

//    {

//

//

//    }

//

//    public function orderDeliverStatusPending($id = null)

//    {

//

//    }





    public function AdminDeleteOrder($id = null)

    {
        $order = $this->Orders->get($id);
        $order->deleted = 1;
        $order['updated_by'] = $this->Auth->user('id');
        $this->Orders->save($order);
            $orderDetailsTable = TableRegistry::get('Order_Details');
            $orderInfo = $orderDetailsTable->find()->where(['order_id' => $id, 'deleted' => 0])->all();
            foreach($orderInfo as $info){
                $info->deleted = 1;
                $info['updated_by'] = $this->Auth->user('id');
                $orderDetailsTable->save($info);
                $orderQuantity = $info['order_product_quantity'];
                $ProductStocksTable = TableRegistry::get('Product_Stocks_Details');
                $productInfo = $ProductStocksTable->find()->where(['product_stocks_id' => $info['order_product_stocks_id'], 'deleted' => 0])->all();
              foreach($productInfo as $value){
                    $StockSold = $value['product_attribute_sold'];
                    $value['product_attribute_sold'] = $orderQuantity - $StockSold;
                $value['updated_by'] = $this->Auth->user('id');
                $ProductStocksTable->save($value);
              }
                $ShopProductTable = TableRegistry::get('Shop_Products');
                $ShopProduct = $ShopProductTable->find()->where(['products_id' => $value['stocks_product_id'], 'deleted' => 0])->all();
                foreach($ShopProduct as $data){
                    $soldData = $data['product_sold'];
                    $data['product_sold'] = $orderQuantity - $soldData;
                    $data['updated_by'] = $this->Auth->user('id');
                    $ShopProductTable->save($data);
              }
        }
        return $this->redirect($this->referer());
    }



    public function AdminorderRecord()

    {

        $allProduct = TableRegistry::get('ShopProducts')->find()->where(['product_sale_status' => 1, 'deleted' => 0])->all();
        $this->set(compact('orderRecord', 'allProduct'));
        
    }





    public function AdminviewOrderReport()

    {

        if ($this->request->is('post')) {

            $products_id = $this->request->data('product_id');
            $to_date = $this->request->data('to_date');

            $to_date .= " 00:00:00";

            $from_date = $this->request->data('from_date');

            $from_date .= " 23:59:59";

            $connection = ConnectionManager::get('default');



            $orderProduct = $connection->execute("select * from order_details where order_product_id = $products_id and created_at between '$to_date' and '$from_date'")->fetchAll('assoc');

//



//            echo "<pre>";

////

//            print_r($orderProduct);

//            die();





            foreach ($orderProduct as $info) {

                $products_id = $info['order_product_id'];



                $connection = ConnectionManager::get('default');



                $ProductInfo = $connection->execute("select * from shop_products where products_id = $products_id")->fetchAll('assoc');



//                echo "<pre>";

//////

//            print_r($ProductInfo);





            }

            $allProduct = TableRegistry::get('ShopProducts')->find()->where(['product_sale_status' => 1, 'deleted' => 0])->all();
            $this->set(compact('AdminviewOrderReport', 'allProduct', 'ProductInfo', 'orderProduct'));

        }



    }



    public function getaccessToken()

    {

        $this->autoRender = false;



        // $url = "https://area51.pathao.com/api/v1/oauth/access_token";

        $url = "https://api.pathao.com/v1/oauth/access_token";

        $post_data['client_id'] = "a853162dbc0b3d4a1cd0c63fd8f75073";

        $post_data['client_secret'] = "9d5e877c280325a270291a3da60eb924";

        $post_data['username'] = "info@klubhaus.com.bd";

        $post_data['password'] = "v^Ygpf(Wnx@nu!7E";

        $post_data['grant_type'] = "password";

        $post_data['scope'] = "create_user_delivery";



        $data_string = json_encode($post_data);

        // 'https://area51.pathao.com/api/v1/oauth/access_token'                        

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api.pathao.com/v1/oauth/access_token");

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(

            'Content-Type: application/json'

        ));

        $result = curl_exec($ch);

        curl_close($ch);



        print_r($result);

        die();

    }



    public function createOrder()

    {

        $this->autoRender = false;

        $post_data['receiver_name'] = "Ami";

        $post_data['receiver_address'] = "Dhaka";

        $post_data['receiver_number'] = "0123456789";

        $post_data['recipient_email'] = "ami@tumi.com";

        $post_data['cost'] = "1000";

        $post_data['instructions'] = "Something";

        $post_data['package_description'] = "Something";

        $post_data['order_code'] = "9999";

        $post_data['store_id'] = "413";

        $post_data['plan_id'] = "1";



        $data_string = json_encode($post_data);



        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api.pathao.com/v1/me/deliveries");

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(

            'Content-Type: application/json',

            "Authorization: Bearer blBsJfTDRtMZJTIHBY4DgTyBcAHbnnjkk0yr1AJU"

        ));

        $result = curl_exec($ch);

        curl_close($ch);



        print_r($result);

        die();



    }



    public function testDelivery(){

        $this->autoRender = false;

        $post_data['email'] = "antu@gmail.com";

        $post_data['password'] = "antu";

        // $post_data['order_id'] = "Inv-18100018";

        // $post_data['status'] = "4";

        $data_string = json_encode($post_data);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "http://klubhaus.com.bd/RestApi/getToken");

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");            

        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                 

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                               

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                

            'Content-Type: application/json',

            "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImFudHVAZ21haWwuY29tIn0.XwkPGHl8cIO3hUACfMB8s9y6OvR4XCHMtAYRgqs-1Ow"                          

        ));                                                                             

        $result = curl_exec($ch);

        curl_close($ch);

        print_r($result); die(); 



    }





}

