<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AttributeType[]|\Cake\Collection\CollectionInterface $attributeTypes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Attribute Type'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="attributeTypes index large-9 medium-8 columns content">
    <h3><?= __('Attribute Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('attribute_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('attribute_type_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('attribute_type_slug') ?></th>
                <th scope="col"><?= $this->Paginator->sort('attribute_types_class_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($attributeTypes as $attributeType): ?>
            <tr>
                <td><?= $this->Number->format($attributeType->attribute_type_id) ?></td>
                <td><?= h($attributeType->attribute_type_name) ?></td>
                <td><?= h($attributeType->attribute_type_slug) ?></td>
                <td><?= $this->Number->format($attributeType->attribute_types_class_id) ?></td>
                <td><?= h($attributeType->created_by) ?></td>
                <td><?= h($attributeType->updated_by) ?></td>
                <td><?= h($attributeType->created_at) ?></td>
                <td><?= h($attributeType->updated_at) ?></td>
                <td><?= $this->Number->format($attributeType->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $attributeType->attribute_type_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $attributeType->attribute_type_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $attributeType->attribute_type_id], ['confirm' => __('Are you sure you want to delete # {0}?', $attributeType->attribute_type_id)]) ?>
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
