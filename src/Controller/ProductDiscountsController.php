<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProductDiscounts Controller
 *
 * @property \App\Model\Table\ProductDiscountsTable $ProductDiscounts
 *
 * @method \App\Model\Entity\ProductDiscount[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductDiscountsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['DiscountTypes']
        ];
        $productDiscounts = $this->paginate($this->ProductDiscounts);

        $this->set(compact('productDiscounts'));
    }

    /**
     * View method
     *
     * @param string|null $id Product Discount id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productDiscount = $this->ProductDiscounts->get($id, [
            'contain' => ['DiscountTypes']
        ]);

        $this->set('productDiscount', $productDiscount);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productDiscount = $this->ProductDiscounts->newEntity();
        if ($this->request->is('post')) {
            $productDiscount = $this->ProductDiscounts->patchEntity($productDiscount, $this->request->getData());
            if ($this->ProductDiscounts->save($productDiscount)) {
                $this->Flash->success(__('The product discount has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product discount could not be saved. Please, try again.'));
        }
        $discountTypes = $this->ProductDiscounts->DiscountTypes->find('list', ['limit' => 200]);
        $this->set(compact('productDiscount', 'discountTypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Discount id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productDiscount = $this->ProductDiscounts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productDiscount = $this->ProductDiscounts->patchEntity($productDiscount, $this->request->getData());
            if ($this->ProductDiscounts->save($productDiscount)) {
                $this->Flash->success(__('The product discount has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product discount could not be saved. Please, try again.'));
        }
        $discountTypes = $this->ProductDiscounts->DiscountTypes->find('list', ['limit' => 200]);
        $this->set(compact('productDiscount', 'discountTypes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Discount id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productDiscount = $this->ProductDiscounts->get($id);
        if ($this->ProductDiscounts->delete($productDiscount)) {
            $this->Flash->success(__('The product discount has been deleted.'));
        } else {
            $this->Flash->error(__('The product discount could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
