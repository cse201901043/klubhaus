<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AttributeClass[]|\Cake\Collection\CollectionInterface $attributeClasses
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Attribute Class'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="attributeClasses index large-9 medium-8 columns content">
    <h3><?= __('Attribute Classes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('attribute_class_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('attribute_class_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('attribute_class_slug') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($attributeClasses as $attributeClass): ?>
            <tr>
                <td><?= $this->Number->format($attributeClass->attribute_class_id) ?></td>
                <td><?= h($attributeClass->attribute_class_name) ?></td>
                <td><?= h($attributeClass->attribute_class_slug) ?></td>
                <td><?= h($attributeClass->created_by) ?></td>
                <td><?= h($attributeClass->updated_by) ?></td>
                <td><?= h($attributeClass->created_at) ?></td>
                <td><?= h($attributeClass->updated_at) ?></td>
                <td><?= $this->Number->format($attributeClass->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $attributeClass->attribute_class_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $attributeClass->attribute_class_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $attributeClass->attribute_class_id], ['confirm' => __('Are you sure you want to delete # {0}?', $attributeClass->attribute_class_id)]) ?>
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
