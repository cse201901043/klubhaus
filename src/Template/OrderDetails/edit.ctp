<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderDetail $orderDetail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $orderDetail->order_details_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $orderDetail->order_details_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Order Details'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orderDetails form large-9 medium-8 columns content">
    <?= $this->Form->create($orderDetail) ?>
    <fieldset>
        <legend><?= __('Edit Order Detail') ?></legend>
        <?php
            echo $this->Form->control('order_user_id');
            echo $this->Form->control('order_id', ['options' => $orders]);
            echo $this->Form->control('order_product_id');
            echo $this->Form->control('order_product_stocks_id');
            echo $this->Form->control('order_product_name');
            echo $this->Form->control('order_product_quantity');
            echo $this->Form->control('order_product_unit_price');
            echo $this->Form->control('order_product_total_price');
            echo $this->Form->control('order_product_image');
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
