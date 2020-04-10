<?php
/**
 * Created by PhpStorm.
 * User: an2
 * Date: 4/10/18
 * Time: 11:05 AM
 */


namespace App\Controller;

use Cake\ORM\TableRegistry;
use RestApi\Controller\ApiController;
use RestApi\Utility\JwtToken;


class RestApiController extends ApiController
{

    public function getProductDataApi()
    {
        //        echo $this->request->header('Authorization: Bearer [token]');
                //    your action logic
        
                // Set the HTTP status code. By default, it is set to 200
        
        
                // $this->request->allowMethod('post');
        
                // $this->httpStatusCode = 200;
        
        
                // Set the response
        
        //        $date = date("Y-m-d");
        //
        //        echo $date = $date . " 23:59:59";
        ////
        //        die();->where(['updated_at' => $date])
        
                $ShopProductTable = TableRegistry::get('ShopProducts');
        
                $ShopProducts = $ShopProductTable->find()->select(['product_sku', 'product_name', 'product_stock'])->all();
        
                $i = 0;
                foreach ($ShopProducts as $info) {
        
                    $this->apiResponse['you_response_' . $i] = $info;
                    $i++;
        
                }
        
        
            }


    public function getToken()
    {
        $this->request->allowMethod('post');
        $user = TableRegistry::get('Users')->find()->where(['email' => $this->request->data['email']])->last();
        if($user['user_role'] == 'courier'){
            $validUser = ['email' => $user->email];
            $this->apiResponse['token'] = JwtToken::generateToken($validUser);
            $this->apiResponse['message'] = 'Logged in successfully.';
        }else{
            $this->httpStatusCode = 401;
            $this->apiResponse['message'] = 'Unauthorized User.';
        }
            
    }

    public function deliverStatusApi()
    {
        $this->request->allowMethod('post');
        
        $order_id = substr($this->request->data['order_id'], 6); //Inv-18100018
        
        $order_id = $order_id % 100000;

        $orderTable = TableRegistry::get('Orders');
        $order = $orderTable->find()->where(['order_id' => $order_id])->select(['order_id', 'order_deliver_status'])->last();

        if(!empty($order)){
            $order->order_deliver_status = $this->request->data['status'];
            $orderTable->save($order);
            $id = 18100000 + $order_id;
            $order->order_id = "Inv-".$id;
            $this->apiResponse = $order;
            $this->apiResponse['message'] = 'Status Updated successfully.';
        }else{
            $this->httpStatusCode = 500;
            $this->apiResponse['message'] = 'Attempt Failed.';
        }

    }

    public function deliverOrderApi()
    {
        $this->request->allowMethod('post');

        $orderTable = TableRegistry::get('Orders');
        $order = $orderTable->find()->where(['order_id' => $this->request->data['order_id']])->select(['order_id', 'order_deliver_status'])->last();

        if($order->order_deliver_status == 2){
            $order->order_deliver_status = 1;
            $orderTable->save($order);
            $this->apiResponse['response'] = $order;
        }

    }
}