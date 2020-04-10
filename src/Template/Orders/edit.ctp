<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $order->order_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $order->order_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="orders form large-9 medium-8 columns content">
    <?= $this->Form->create($order) ?>
    <fieldset>
        <legend><?= __('Edit Order') ?></legend>
        <?php
            echo $this->Form->control('order_user_id');
            echo $this->Form->control('order_payment_id');
            echo $this->Form->control('order_payment_transaction');
            echo $this->Form->control('order_shipping_cost');
            echo $this->Form->control('order_shipping_address');
            echo $this->Form->control('order_discount_type');
            echo $this->Form->control('order_discount_code');
            echo $this->Form->control('order_discount_rate');
            echo $this->Form->control('order_amount');
            echo $this->Form->control('order_deduct_amount');
            echo $this->Form->control('order_tax_amount');
            echo $this->Form->control('order_grand_total');
            echo $this->Form->control('order_payment_status');
            echo $this->Form->control('order_deliver_status');
            echo $this->Form->control('order_status');
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
