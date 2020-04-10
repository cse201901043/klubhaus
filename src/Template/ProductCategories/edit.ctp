<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductCategory $productCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $productCategory->category_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $productCategory->category_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Product Categories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Shop Products'), ['controller' => 'ShopProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Shop Product'), ['controller' => 'ShopProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productCategories form large-9 medium-8 columns content">
    <?= $this->Form->create($productCategory) ?>
    <fieldset>
        <legend><?= __('Edit Product Category') ?></legend>
        <?php
            echo $this->Form->control('category_name');
            echo $this->Form->control('category_slug');
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
