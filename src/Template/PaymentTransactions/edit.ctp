<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PaymentTransaction $paymentTransaction
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $paymentTransaction->payment_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $paymentTransaction->payment_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Payment Transactions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Payment Transactions'), ['controller' => 'PaymentTransactions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Payment Transaction'), ['controller' => 'PaymentTransactions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="paymentTransactions form large-9 medium-8 columns content">
    <?= $this->Form->create($paymentTransaction) ?>
    <fieldset>
        <legend><?= __('Edit Payment Transaction') ?></legend>
        <?php
            echo $this->Form->control('payment_transaction_id');
            echo $this->Form->control('payment_order_id');
            echo $this->Form->control('payment_user_id');
            echo $this->Form->control('payment_purpose');
            echo $this->Form->control('payment_tax_amount');
            echo $this->Form->control('payment_amount');
            echo $this->Form->control('payment_status');
            echo $this->Form->control('created_by');
            echo $this->Form->control('updated_by');
            echo $this->Form->control('created_at');
            echo $this->Form->control('updated_at');
            echo $this->Form->control('deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
