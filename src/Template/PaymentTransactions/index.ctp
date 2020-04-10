<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PaymentTransaction[]|\Cake\Collection\CollectionInterface $paymentTransactions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Payment Transaction'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="paymentTransactions index large-9 medium-8 columns content">
    <h3><?= __('Payment Transactions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('payment_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('payment_transaction_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('payment_order_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('payment_user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('payment_purpose') ?></th>
                <th scope="col"><?= $this->Paginator->sort('payment_tax_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('payment_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('payment_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($paymentTransactions as $paymentTransaction): ?>
            <tr>
                <td><?= $this->Number->format($paymentTransaction->payment_id) ?></td>
                <td><?= h($paymentTransaction->payment_transaction_id) ?></td>
                <td><?= $this->Number->format($paymentTransaction->payment_order_id) ?></td>
                <td><?= $this->Number->format($paymentTransaction->payment_user_id) ?></td>
                <td><?= h($paymentTransaction->payment_purpose) ?></td>
                <td><?= $this->Number->format($paymentTransaction->payment_tax_amount) ?></td>
                <td><?= $this->Number->format($paymentTransaction->payment_amount) ?></td>
                <td><?= h($paymentTransaction->payment_status) ?></td>
                <td><?= h($paymentTransaction->created_by) ?></td>
                <td><?= h($paymentTransaction->updated_by) ?></td>
                <td><?= h($paymentTransaction->created_at) ?></td>
                <td><?= h($paymentTransaction->updated_at) ?></td>
                <td><?= $this->Number->format($paymentTransaction->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $paymentTransaction->payment_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $paymentTransaction->payment_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $paymentTransaction->payment_id], ['confirm' => __('Are you sure you want to delete # {0}?', $paymentTransaction->payment_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
