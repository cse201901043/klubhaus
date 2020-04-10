<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AttributeValue[]|\Cake\Collection\CollectionInterface $attributeValues
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Attribute Value'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="attributeValues index large-9 medium-8 columns content">
    <h3><?= __('Attribute Values') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('attribute_field_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('attribute_field_value') ?></th>
                <th scope="col"><?= $this->Paginator->sort('attribute_values_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('attribute_values_class_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($attributeValues as $attributeValue): ?>
            <tr>
                <td><?= $this->Number->format($attributeValue->attribute_field_id) ?></td>
                <td><?= h($attributeValue->attribute_field_value) ?></td>
                <td><?= $this->Number->format($attributeValue->attribute_values_type_id) ?></td>
                <td><?= $this->Number->format($attributeValue->attribute_values_class_id) ?></td>
                <td><?= h($attributeValue->created_by) ?></td>
                <td><?= h($attributeValue->updated_by) ?></td>
                <td><?= h($attributeValue->created_at) ?></td>
                <td><?= h($attributeValue->updated_at) ?></td>
                <td><?= $this->Number->format($attributeValue->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $attributeValue->attribute_field_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $attributeValue->attribute_field_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $attributeValue->attribute_field_id], ['confirm' => __('Are you sure you want to delete # {0}?', $attributeValue->attribute_field_id)]) ?>
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
