<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductMeta[]|\Cake\Collection\CollectionInterface $productMetas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Product Meta'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productMetas index large-9 medium-8 columns content">
    <h3><?= __('Product Metas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('product_meta_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('meta_product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_meta_field_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productMetas as $productMeta): ?>
            <tr>
                <td><?= $this->Number->format($productMeta->product_meta_id) ?></td>
                <td><?= $this->Number->format($productMeta->meta_product_id) ?></td>
                <td><?= h($productMeta->product_meta_field_name) ?></td>
                <td><?= h($productMeta->created_by) ?></td>
                <td><?= h($productMeta->updated_by) ?></td>
                <td><?= h($productMeta->created_at) ?></td>
                <td><?= h($productMeta->updated_at) ?></td>
                <td><?= $this->Number->format($productMeta->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $productMeta->product_meta_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productMeta->product_meta_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productMeta->product_meta_id], ['confirm' => __('Are you sure you want to delete # {0}?', $productMeta->product_meta_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
