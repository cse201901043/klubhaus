<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductSubCategory $productSubCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $productSubCategory->sub_category_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $productSubCategory->sub_category_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Product Sub Categories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Shop Products'), ['controller' => 'ShopProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Shop Product'), ['controller' => 'ShopProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productSubCategories form large-9 medium-8 columns content">
    <?= $this->Form->create($productSubCategory) ?>
    <fieldset>
        <legend><?= __('Edit Product Sub Category') ?></legend>
        <?php
            echo $this->Form->control('sub_category_name');
            echo $this->Form->control('sub_category_slug');
            echo $this->Form->control('sub_category_featured_image');
            echo $this->Form->control('sub_category_featured_product');
            echo $this->Form->control('sub_categories_category_id');
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
