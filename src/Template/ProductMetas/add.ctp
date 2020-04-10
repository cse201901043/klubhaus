<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductMeta $productMeta
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Product Metas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="productMetas form large-9 medium-8 columns content">
    <?= $this->Form->create($productMeta) ?>
    <fieldset>
        <legend><?= __('Add Product Meta') ?></legend>
        <?php
            echo $this->Form->control('meta_product_id');
            echo $this->Form->control('product_meta_field_name');
            echo $this->Form->control('product_meta_field_value');
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
