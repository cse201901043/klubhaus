<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PaymentTransaction $paymentTransaction
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Payment Transaction'), ['action' => 'edit', $paymentTransaction->payment_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Payment Transaction'), ['action' => 'delete', $paymentTransaction->payment_id], ['confirm' => __('Are you sure you want to delete # {0}?', $paymentTransaction->payment_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Payment Transactions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Payment Transaction'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Payment Transactions'), ['controller' => 'PaymentTransactions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Payment Transaction'), ['controller' => 'PaymentTransactions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="paymentTransactions view large-9 medium-8 columns content">
    <h3><?= h($paymentTransaction->payment_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Payment Transaction Id') ?></th>
            <td><?= h($paymentTransaction->payment_transaction_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment Purpose') ?></th>
            <td><?= h($paymentTransaction->payment_purpose) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment Status') ?></th>
            <td><?= h($paymentTransaction->payment_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= h($paymentTransaction->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated By') ?></th>
            <td><?= h($paymentTransaction->updated_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment Id') ?></th>
            <td><?= $this->Number->format($paymentTransaction->payment_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment Order Id') ?></th>
            <td><?= $this->Number->format($paymentTransaction->payment_order_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment User Id') ?></th>
            <td><?= $this->Number->format($paymentTransaction->payment_user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment Tax Amount') ?></th>
            <td><?= $this->Number->format($paymentTransaction->payment_tax_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment Amount') ?></th>
            <td><?= $this->Number->format($paymentTransaction->payment_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= $this->Number->format($paymentTransaction->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($paymentTransaction->created_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated At') ?></th>
            <td><?= h($paymentTransaction->updated_at) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Payment Transactions') ?></h4>
        <?php if (!empty($paymentTransaction->payment_transactions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Payment Id') ?></th>
                <th scope="col"><?= __('Payment Transaction Id') ?></th>
                <th scope="col"><?= __('Payment Order Id') ?></th>
                <th scope="col"><?= __('Payment User Id') ?></th>
                <th scope="col"><?= __('Payment Purpose') ?></th>
                <th scope="col"><?= __('Payment Tax Amount') ?></th>
                <th scope="col"><?= __('Payment Amount') ?></th>
                <th scope="col"><?= __('Payment Status') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col"><?= __('Updated By') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col"><?= __('Updated At') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($paymentTransaction->payment_transactions as $paymentTransactions): ?>
            <tr>
                <td><?= h($paymentTransactions->payment_id) ?></td>
                <td><?= h($paymentTransactions->payment_transaction_id) ?></td>
                <td><?= h($paymentTransactions->payment_order_id) ?></td>
                <td><?= h($paymentTransactions->payment_user_id) ?></td>
                <td><?= h($paymentTransactions->payment_purpose) ?></td>
                <td><?= h($paymentTransactions->payment_tax_amount) ?></td>
                <td><?= h($paymentTransactions->payment_amount) ?></td>
                <td><?= h($paymentTransactions->payment_status) ?></td>
                <td><?= h($paymentTransactions->created_by) ?></td>
                <td><?= h($paymentTransactions->updated_by) ?></td>
                <td><?= h($paymentTransactions->created_at) ?></td>
                <td><?= h($paymentTransactions->updated_at) ?></td>
                <td><?= h($paymentTransactions->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PaymentTransactions', 'action' => 'view', $paymentTransactions->payment_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PaymentTransactions', 'action' => 'edit', $paymentTransactions->payment_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PaymentTransactions', 'action' => 'delete', $paymentTransactions->payment_id], ['confirm' => __('Are you sure you want to delete # {0}?', $paymentTransactions->payment_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
