<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;

/**
 * Carts Controller
 *
 * @property \App\Model\Table\CartsTable $Carts
 *
 * @method \App\Model\Entity\Cart[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CartsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['CartProducts', 'CartProductStocks', 'CartUsers']
        ];
        $carts = $this->paginate($this->Carts);

        $this->set(compact('carts'));
    }

    /**
     * View method
     *
     * @param string|null $id Cart id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cart = $this->Carts->get($id, [
            'contain' => ['CartProducts', 'CartProductStocks', 'CartUsers']
        ]);

        $this->set('cart', $cart);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cart = $this->Carts->newEntity();
        if ($this->request->is('post')) {
            $cart = $this->Carts->patchEntity($cart, $this->request->getData());
            if ($this->Carts->save($cart)) {
                $this->Flash->success(__('The cart has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cart could not be saved. Please, try again.'));
        }
        $cartProducts = $this->Carts->CartProducts->find('list', ['limit' => 200]);
        $cartProductStocks = $this->Carts->CartProductStocks->find('list', ['limit' => 200]);
        $cartUsers = $this->Carts->CartUsers->find('list', ['limit' => 200]);
        $this->set(compact('cart', 'cartProducts', 'cartProductStocks', 'cartUsers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cart id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */

    public function edit($id = null)
    {
        $this->autoRender = false;
        $cart = $this->Carts->get($id, [
            'contain' => ['ShopProducts']
        ]);

        if ($this->request->is(['post'])) {
            $cart['cart_product_quantity'] = $this->request->data['cart_product_quantity'];
            $available = $cart->shop_product->product_stock - $cart->shop_product->product_sold;

            if($available >= $cart['cart_product_quantity']){
                $cart['cart_product_total_price'] = $this->request->data['cart_product_quantity']*$cart['cart_product_unit_price'];
                if ($this->Carts->save($cart)) {
                    $status = 1; //success
                    echo json_encode($status);
                    die();
                }
            }else{
                $status = 0; //fail
                echo json_encode($status);
                die();
            }
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Cart id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cart = $this->Carts->get($id);
        if ($this->Carts->delete($cart)) {
            $this->Flash->success(__('The cart has been deleted.'));
        } else {
            $this->Flash->error(__('The cart could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    //@function for add cart 
    public function addToCart(){
        $this->autoRender = false;
        if ($this->request->is('post', 'ajax')) {
            $cart = $this->Carts->newEntity();
            $cart_exist = $this->_checkItemInCart($this->request->data['cart_product_id'], $this->request->data['cart_product_stocks_id'], $this->request->data['cart_user_id']); 
            if(!empty($cart_exist)){
                $cart = $this->Carts->get($cart_exist);
                $data['updated_at'] = Time::now();
                $data['cart_product_quantity'] = $cart->cart_product_quantity + 1;
                $data['cart_product_total_price'] = $cart->cart_product_total_price + $this->request->data['cart_product_total_price'];
                $cart = $this->Carts->patchEntity($cart, $data);
                if ($this->Carts->save($cart)) {
                    echo json_encode($cart);
                    die();
                }
            } else {
                $this->request->data['created_at'] = Time::now();
                $this->request->data['updated_at'] = Time::now();
                $this->request->data['in_wishlist'] = 0;
                $cart = $this->Carts->patchEntity($cart, $this->request->data);
                if ($this->Carts->save($cart)) {
                    echo json_encode($cart);
                    die();
                }
            }
            // $this->Flash->error(__('The order detail could not be saved. Please, try again.'));
        }
    }


    //@function for add cart 
    public function addToWishlist(){
        $this->autoRender = false;
        $cart = $this->Carts->newEntity();
        if ($this->request->is('post')) {
            $exist = $this->_checkItemInWishlist($this->request->data['cart_product_id'], $this->request->data['cart_user_id'], $this->request->data['in_wishlist']);
            if(!$exist){
                $product = TableRegistry::get('ShopProducts')->find()->where(['products_id' => $this->request->data['cart_product_id']])->first();
                $this->request->data['cart_product_name'] = $product->product_name;
                $this->request->data['cart_product_unit_price'] = $product->product_unit_sale_price;
                $this->request->data['cart_product_quantity'] = 0;
                $this->request->data['cart_product_total_price'] = 0;
                $this->request->data['cart_product_image'] = $product->product_featured_image;
                $this->request->data['created_at'] = Time::now();
                $this->request->data['updated_at'] = Time::now();
                $this->request->data['in_wishlist'] = 1;
                $cart = $this->Carts->patchEntity($cart, $this->request->getData());
                if ($this->Carts->save($cart)) {
                    echo json_encode($cart);
                    die();
                }
            }else{
                $cart = "";
                echo json_encode($cart);
                die();
            }
            // $this->Flash->error(__('The order detail could not be saved. Please, try again.'));
        }
    }

    //check item in cart, if exist then update quantity and price
    private function _checkItemInCart($product_id, $product_stocks_id, $user_id){
        $query = $this->Carts->findAllByCartProductIdAndCartProductStocksIdAndCartUserIdAndDeleted($product_id, $product_stocks_id, $user_id, 0);

        // $query2 = $this->Carts->find()->where(['cart_product_id' => $product_id, 'cart_user_id' => $user_id, 'in_wishlist' => 1, 'deleted'=>0])->last();
        // $query2->deleted = 1;
        // $this->Carts->save($query2);

        $results = $query->toArray();
        $cart_id = 0;
        if(!empty($results)){
            $cart_id = $results[0]['cart_id'];
        } 
        return $cart_id;
    }
    private function _checkItemInWishlist($product_id, $user_id, $inWishlist){
        $query = $this->Carts->findAllByCartProductIdAndCartUserIdAndInWishlistAndDeleted($product_id, $user_id, $inWishlist, 0);
        $results = $query->toArray();
        $cart_id = 0;
        if(!empty($results)){
            $cart_id = $results[0]['cart_id'];
        } 
        return $cart_id;
    }


//function for remove item from carts
    public function removeFromCart($id = null){
        $this->autoRender = false;
        $cart = $this->Carts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->request->data['deleted'] = 1;
            $cart = $this->Carts->patchEntity($cart, $this->request->getData());
            if ($this->Carts->save($cart)) {
                $response_array = array('status' => 'success');
                echo json_encode($response_array); die();
            }
        }
    }

    public function removeFromWishlist($id = null){
        $this->autoRender = false;
        $cart = $this->Carts->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->request->data['deleted'] = 1;
            $cart = $this->Carts->patchEntity($cart, $this->request->getData());
            if ($this->Carts->save($cart)) {
                $response_array = array('status' => 'success');
                echo json_encode($response_array);
                die();
            }
        }
    }
}
