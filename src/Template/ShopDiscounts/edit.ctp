<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShopDiscount $shopDiscount
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $shopDiscount->shop_discount_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $shopDiscount->shop_discount_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Shop Discounts'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="shopDiscounts form large-9 medium-8 columns content">
    <?= $this->Form->create($shopDiscount) ?>
    <fieldset>
        <legend><?= __('Edit Shop Discount') ?></legend>
        <?php
            echo $this->Form->control('shop_discount_name');
            echo $this->Form->control('shop_discount_slug');
            echo $this->Form->control('shop_discount_code');
            echo $this->Form->control('shop_discount_rate');
            echo $this->Form->control('shop_discount_from');
            echo $this->Form->control('shop_discount_to');
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
