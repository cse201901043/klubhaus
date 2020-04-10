<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Slider[]|\Cake\Collection\CollectionInterface $slider
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Slider'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="slider index large-9 medium-8 columns content">
    <h3><?= __('Slider') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('slider_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('slider_subCategory_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('slider_title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('slider_image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($slider as $slider): ?>
            <tr>
                <td><?= $this->Number->format($slider->slider_id) ?></td>
                <td><?= $this->Number->format($slider->slider_subCategory_id) ?></td>
                <td><?= h($slider->slider_title) ?></td>
                <td><?= h($slider->slider_image) ?></td>
                <td><?= h($slider->created_at) ?></td>
                <td><?= h($slider->updated_by) ?></td>
                <td><?= h($slider->created_by) ?></td>
                <td><?= h($slider->updated_at) ?></td>
                <td><?= $this->Number->format($slider->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $slider->slider_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $slider->slider_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $slider->slider_id], ['confirm' => __('Are you sure you want to delete # {0}?', $slider->slider_id)]) ?>
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
