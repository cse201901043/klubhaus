<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductMeta $productMeta
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product Meta'), ['action' => 'edit', $productMeta->product_meta_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product Meta'), ['action' => 'delete', $productMeta->product_meta_id], ['confirm' => __('Are you sure you want to delete # {0}?', $productMeta->product_meta_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Product Metas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Meta'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productMetas view large-9 medium-8 columns content">
    <h3><?= h($productMeta->product_meta_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Product Meta Field Name') ?></th>
            <td><?= h($productMeta->product_meta_field_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= h($productMeta->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated By') ?></th>
            <td><?= h($productMeta->updated_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Meta Id') ?></th>
            <td><?= $this->Number->format($productMeta->product_meta_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Meta Product Id') ?></th>
            <td><?= $this->Number->format($productMeta->meta_product_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= $this->Number->format($productMeta->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($productMeta->created_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated At') ?></th>
            <td><?= h($productMeta->updated_at) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Product Meta Field Value') ?></h4>
        <?= $this->Text->autoParagraph(h($productMeta->product_meta_field_value)); ?>
    </div>
</div>
