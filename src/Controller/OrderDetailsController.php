<?php

namespace App\Controller;


use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

/**
 * OrderDetails Controller
 *
 * @property \App\Model\Table\OrderDetailsTable $OrderDetails
 *
 * @method \App\Model\Entity\OrderDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrderDetailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['OrderUsers', 'Orders', 'OrderProducts', 'OrderProductStocks']
        ];
        $orderDetails = $this->paginate($this->OrderDetails);

        $this->set(compact('orderDetails'));
    }

    public function ajaxOrderDetails()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $order_id = $this->request->data['order_id'];

            $orders = $this->OrderDetails->find()->where(['order_id' => $order_id, 'deleted' => 0])->all();

            echo json_encode($orders);
            die();
        }
    }

    /**
     * View method
     *
     * @param string|null $id Order Detail id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $orderDetail = $this->OrderDetails->get($id, [
            'contain' => ['OrderUsers', 'Orders', 'OrderProducts', 'OrderProductStocks']
        ]);

        $this->set('orderDetail', $orderDetail);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $orderDetail = $this->OrderDetails->newEntity();
        if ($this->request->is('post')) {
            $orderDetail = $this->OrderDetails->patchEntity($orderDetail, $this->request->getData());
            if ($this->OrderDetails->save($orderDetail)) {
                $this->Flash->success(__('The order detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order detail could not be saved. Please, try again.'));
        }
        $orderUsers = $this->OrderDetails->OrderUsers->find('list', ['limit' => 200]);
        $orders = $this->OrderDetails->Orders->find('list', ['limit' => 200]);
        $orderProducts = $this->OrderDetails->OrderProducts->find('list', ['limit' => 200]);
        $orderProductStocks = $this->OrderDetails->OrderProductStocks->find('list', ['limit' => 200]);
        $this->set(compact('orderDetail', 'orderUsers', 'orders', 'orderProducts', 'orderProductStocks'));
    }

    public function addToCart()
    {
        $orderDetail = $this->OrderDetails->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['created_at'] = Time::now();
            $this->request->data['updated_at'] = Time::now();
            $orderDetail = $this->OrderDetails->patchEntity($orderDetail, $this->request->getData());
            if ($this->OrderDetails->save($orderDetail)) {
                $this->autoRender = false;
                echo json_encode($orderDetail);
                die();

                // return $this->redirect(['action' => 'index']);
            }
            // $this->Flash->error(__('The order detail could not be saved. Please, try again.'));
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Order Detail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $orderDetail = $this->OrderDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $orderDetail = $this->OrderDetails->patchEntity($orderDetail, $this->request->getData());
            if ($this->OrderDetails->save($orderDetail)) {
                // $this->Flash->success(__('The order detail has been saved.'));

                // return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order detail could not be saved. Please, try again.'));
        }
        // $orderUsers = $this->OrderDetails->OrderUsers->find('list', ['limit' => 200]);
        // $orders = $this->OrderDetails->Orders->find('list', ['limit' => 200]);
        // $orderProducts = $this->OrderDetails->OrderProducts->find('list', ['limit' => 200]);
        // $orderProductStocks = $this->OrderDetails->OrderProductStocks->find('list', ['limit' => 200]);
        // $this->set(compact('orderDetail', 'orderUsers', 'orders', 'orderProducts', 'orderProductStocks'));
    }

    public function removeFromCart($id = null)
    {
        $orderDetail = $this->OrderDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->request->data['deleted'] = 1;
            $orderDetail = $this->OrderDetails->patchEntity($orderDetail, $this->request->getData());
            if ($this->OrderDetails->save($orderDetail)) {
                $this->autoRender = false;
                // $this->Flash->success(__('The order detail has been saved.'));

                // return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order detail could not be saved. Please, try again.'));
        }
        // $orderUsers = $this->OrderDetails->OrderUsers->find('list', ['limit' => 200]);
        // $orders = $this->OrderDetails->Orders->find('list', ['limit' => 200]);
        // $orderProducts = $this->OrderDetails->OrderProducts->find('list', ['limit' => 200]);
        // $orderProductStocks = $this->OrderDetails->OrderProductStocks->find('list', ['limit' => 200]);
        // $this->set(compact('orderDetail', 'orderUsers', 'orders', 'orderProducts', 'orderProductStocks'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Order Detail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $orderDetail = $this->OrderDetails->get($id);
        if ($this->OrderDetails->delete($orderDetail)) {
            // $this->Flash->success(__('The order detail has been deleted.'));
        } else {
            // $this->Flash->error(__('The order detail could not be deleted. Please, try again.'));
        }
        $this->autoRender = false;
        $data = ['success'];
        echo json_encode($data);
        die();
        // return $this->redirect(['action' => 'index']);
    }


//    Admin Started From Here///////////////////////////////////////////////////


    public function AdminsingleViewProduct($id = null)
    {
        $orderDetail = $this->OrderDetails->find()->where(['order_id' => $id, 'deleted' => 0])->all();

//        echo "<pre>";
//
//        print_r($orderDetail);
//        die();

        $this->set(compact('orderDetail'));

    }

}
