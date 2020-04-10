<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductDiscount $productDiscount
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $productDiscount->product_discount_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $productDiscount->product_discount_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Product Discounts'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="productDiscounts form large-9 medium-8 columns content">
    <?= $this->Form->create($productDiscount) ?>
    <fieldset>
        <legend><?= __('Edit Product Discount') ?></legend>
        <?php
            echo $this->Form->control('discount_type');
            echo $this->Form->control('discount_type_id');
            echo $this->Form->control('discount_rate');
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
