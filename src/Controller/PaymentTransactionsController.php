<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PaymentTransactions Controller
 *
 * @property \App\Model\Table\PaymentTransactionsTable $PaymentTransactions
 *
 * @method \App\Model\Entity\PaymentTransaction[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PaymentTransactionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['PaymentOrders', 'PaymentUsers']
        ];
        $paymentTransactions = $this->paginate($this->PaymentTransactions);

        $this->set(compact('paymentTransactions'));
    }

    /**
     * View method
     *
     * @param string|null $id Payment Transaction id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $paymentTransaction = $this->PaymentTransactions->get($id, [
            'contain' => ['PaymentOrders', 'PaymentUsers', 'PaymentTransactions']
        ]);

        $this->set('paymentTransaction', $paymentTransaction);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $paymentTransaction = $this->PaymentTransactions->newEntity();
        if ($this->request->is('post')) {
            $paymentTransaction = $this->PaymentTransactions->patchEntity($paymentTransaction, $this->request->getData());
            if ($this->PaymentTransactions->save($paymentTransaction)) {
                $this->Flash->success(__('The payment transaction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payment transaction could not be saved. Please, try again.'));
        }
        $paymentOrders = $this->PaymentTransactions->PaymentOrders->find('list', ['limit' => 200]);
        $paymentUsers = $this->PaymentTransactions->PaymentUsers->find('list', ['limit' => 200]);
        $this->set(compact('paymentTransaction', 'paymentOrders', 'paymentUsers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Payment Transaction id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $paymentTransaction = $this->PaymentTransactions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $paymentTransaction = $this->PaymentTransactions->patchEntity($paymentTransaction, $this->request->getData());
            if ($this->PaymentTransactions->save($paymentTransaction)) {
                $this->Flash->success(__('The payment transaction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payment transaction could not be saved. Please, try again.'));
        }
        $paymentOrders = $this->PaymentTransactions->PaymentOrders->find('list', ['limit' => 200]);
        $paymentUsers = $this->PaymentTransactions->PaymentUsers->find('list', ['limit' => 200]);
        $this->set(compact('paymentTransaction', 'paymentOrders', 'paymentUsers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Payment Transaction id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $paymentTransaction = $this->PaymentTransactions->get($id);
        if ($this->PaymentTransactions->delete($paymentTransaction)) {
            $this->Flash->success(__('The payment transaction has been deleted.'));
        } else {
            $this->Flash->error(__('The payment transaction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
