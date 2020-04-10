<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductStocksDetail $productStocksDetail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $productStocksDetail->product_stocks_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $productStocksDetail->product_stocks_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Product Stocks Details'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="productStocksDetails form large-9 medium-8 columns content">
    <?= $this->Form->create($productStocksDetail) ?>
    <fieldset>
        <legend><?= __('Edit Product Stocks Detail') ?></legend>
        <?php
            echo $this->Form->control('stocks_product_id');
            echo $this->Form->control('stocks_attribute_class_id');
            echo $this->Form->control('stocks_attribute_type_id');
            echo $this->Form->control('stocks_attribute_field_id');
            echo $this->Form->control('product_attribute_stock');
            echo $this->Form->control('product_attribute_sold');
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
