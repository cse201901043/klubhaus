<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserMeta[]|\Cake\Collection\CollectionInterface $userMetas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User Meta'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userMetas index large-9 medium-8 columns content">
    <h3><?= __('User Metas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('user_meta_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('meta_user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_meta_field_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_meta_field_value') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userMetas as $userMeta): ?>
            <tr>
                <td><?= $this->Number->format($userMeta->user_meta_id) ?></td>
                <td><?= $this->Number->format($userMeta->meta_user_id) ?></td>
                <td><?= h($userMeta->user_meta_field_name) ?></td>
                <td><?= h($userMeta->user_meta_field_value) ?></td>
                <td><?= h($userMeta->created_by) ?></td>
                <td><?= h($userMeta->updated_by) ?></td>
                <td><?= h($userMeta->created_at) ?></td>
                <td><?= h($userMeta->updated_at) ?></td>
                <td><?= $this->Number->format($userMeta->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userMeta->user_meta_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userMeta->user_meta_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userMeta->user_meta_id], ['confirm' => __('Are you sure you want to delete # {0}?', $userMeta->user_meta_id)]) ?>
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
