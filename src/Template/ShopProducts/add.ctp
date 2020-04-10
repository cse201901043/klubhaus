<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShopProduct $shopProduct
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Shop Products'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Product Categories'), ['controller' => 'ProductCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Category'), ['controller' => 'ProductCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product Sub Categories'), ['controller' => 'ProductSubCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Sub Category'), ['controller' => 'ProductSubCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product Brands'), ['controller' => 'ProductBrands', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Brand'), ['controller' => 'ProductBrands', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="shopProducts form large-9 medium-8 columns content">
    <?= $this->Form->create($shopProduct) ?>
    <fieldset>
        <legend><?= __('Add Shop Product') ?></legend>
        <?php
            echo $this->Form->control('product_arrival_date');
            echo $this->Form->control('product_sku');
            echo $this->Form->control('product_name');
            echo $this->Form->control('product_name_slug');
            echo $this->Form->control('product_featured_image');
            echo $this->Form->control('product_category_id', ['options' => $productCategories]);
            echo $this->Form->control('product_sub_category_id', ['options' => $productSubCategories]);
            echo $this->Form->control('product_brand_id', ['options' => $productBrands, 'empty' => true]);
            echo $this->Form->control('product_attribute_class_id');
            echo $this->Form->control('product_short_description');
            echo $this->Form->control('product_buy_price');
            echo $this->Form->control('product_unit_sale_price');
            echo $this->Form->control('product_dummy_price');
            echo $this->Form->control('product_stock');
            echo $this->Form->control('product_sold');
            echo $this->Form->control('product_sale_status');
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
