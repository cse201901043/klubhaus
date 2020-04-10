<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ShopDiscounts Controller
 *
 * @property \App\Model\Table\ShopDiscountsTable $ShopDiscounts
 *
 * @method \App\Model\Entity\ShopDiscount[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ShopDiscountsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $shopDiscounts = $this->paginate($this->ShopDiscounts);

        $this->set(compact('shopDiscounts'));
    }

    /**
     * View method
     *
     * @param string|null $id Shop Discount id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $shopDiscount = $this->ShopDiscounts->get($id, [
            'contain' => []
        ]);

        $this->set('shopDiscount', $shopDiscount);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $shopDiscount = $this->ShopDiscounts->newEntity();
        if ($this->request->is('post')) {
            $shopDiscount = $this->ShopDiscounts->patchEntity($shopDiscount, $this->request->getData());
            if ($this->ShopDiscounts->save($shopDiscount)) {
                $this->Flash->success(__('The shop discount has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shop discount could not be saved. Please, try again.'));
        }
        $this->set(compact('shopDiscount'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Shop Discount id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $shopDiscount = $this->ShopDiscounts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $shopDiscount = $this->ShopDiscounts->patchEntity($shopDiscount, $this->request->getData());
            if ($this->ShopDiscounts->save($shopDiscount)) {
                $this->Flash->success(__('The shop discount has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shop discount could not be saved. Please, try again.'));
        }
        $this->set(compact('shopDiscount'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Shop Discount id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $shopDiscount = $this->ShopDiscounts->get($id);
        if ($this->ShopDiscounts->delete($shopDiscount)) {
            $this->Flash->success(__('The shop discount has been deleted.'));
        } else {
            $this->Flash->error(__('The shop discount could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    
    public function addShopDiscounts()
    {

    }

    public function shopDiscountsListView()
    {
        $shopDiscount = $this->ShopDiscounts->find()->order(['shop_discount_id' => 'DESC']);
        $this->paginate = array(
            'limit' => 20,
        );
        $this->set('shopDiscount', $this->paginate($shopDiscount));
    }

    public function addShopDiscountsData()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $shopDiscount = $this->ShopDiscounts->newEntity();
            $name = trim($this->request->data('shop_discount_name'));
            $shopDiscount['shop_discount_name'] = trim(filter_var($this->request->data('shop_discount_name')), FILTER_SANITIZE_STRING);
            $shopDiscount['shop_discount_slug'] = strtolower(str_replace(" ", "_", $name));
            $shopDiscount['shop_discount_code'] = $this->request->data('shop_discount_code');
            $shopDiscount['shop_discount_rate'] = $this->request->data('shop_discount_rate');
            $shopDiscount['shop_discount_from'] = $this->request->data('shop_discount_from');
            $shopDiscount['shop_discount_to'] = $this->request->data('shop_discount_to');
            $shopDiscount['deleted'] = "0";
            $shopDiscount['created_by'] = $this->Auth->user('id');
            $this->ShopDiscounts->save($shopDiscount);
            $this->Flash->success('Shop Discounts Saved Successfully', [
                'key' => 'positive',
            ]);
        }
        return $this->redirect($this->referer());
    }

    public function singleEditShopDiscount($id = null)
    {
        $shopDiscount = $this->ShopDiscounts->get($id, [
            'contain' => []
        ]);
        $this->set(compact('shopDiscount'));
    }

    public function editShopDiscountData()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $id = $this->request->data('shop_discount_id');
            $shopDiscount = $this->ShopDiscounts->get($id);
            $name = trim($this->request->data('shop_discount_name'));
            $shopDiscount['shop_discount_name'] = trim(filter_var($this->request->data('shop_discount_name')), FILTER_SANITIZE_STRING);
            $shopDiscount['shop_discount_slug'] = strtolower(str_replace(" ", "_", $name));
            $shopDiscount['shop_discount_code'] = $this->request->data('shop_discount_code');
            $shopDiscount['shop_discount_rate'] = $this->request->data('shop_discount_rate');
            $shopDiscount['shop_discount_from'] = $this->request->data('shop_discount_from');
            $shopDiscount['shop_discount_to'] = $this->request->data('shop_discount_to');
            $shopDiscount['deleted'] = "0";
            $shopDiscount['created_by'] = $this->Auth->user('id');
            $this->ShopDiscounts->save($shopDiscount);
            $this->Flash->success('Shop Discounts Updated Successfully', [
                'key' => 'positive',
            ]);
        }
        return $this->redirect($this->referer());

    }

    public function discountsNotPublished($id = null)
    {
        $this->autoRender = false;
        $shopDiscount = $this->ShopDiscounts->get($id);
        $shopDiscount->deleted = 0;
        $shopDiscount['updated_by'] = $this->Auth->user('id');
        $this->ShopDiscounts->save($shopDiscount);
        return $this->redirect($this->referer());

    }

    public function discountPublished($id = null)
    {
        $this->autoRender = false;
        $shopDiscount = $this->ShopDiscounts->get($id);
        $shopDiscount->deleted = 1;
        $shopDiscount['updated_by'] = $this->Auth->user('id');
        $this->ShopDiscounts->save($shopDiscount);
        return $this->redirect($this->referer());

    }
}
