<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserMeta $userMeta
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Meta'), ['action' => 'edit', $userMeta->user_meta_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Meta'), ['action' => 'delete', $userMeta->user_meta_id], ['confirm' => __('Are you sure you want to delete # {0}?', $userMeta->user_meta_id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Metas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Meta'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userMetas view large-9 medium-8 columns content">
    <h3><?= h($userMeta->user_meta_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User Meta Field Name') ?></th>
            <td><?= h($userMeta->user_meta_field_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Meta Field Value') ?></th>
            <td><?= h($userMeta->user_meta_field_value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= h($userMeta->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated By') ?></th>
            <td><?= h($userMeta->updated_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Meta Id') ?></th>
            <td><?= $this->Number->format($userMeta->user_meta_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Meta User Id') ?></th>
            <td><?= $this->Number->format($userMeta->meta_user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= $this->Number->format($userMeta->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($userMeta->created_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated At') ?></th>
            <td><?= h($userMeta->updated_at) ?></td>
        </tr>
    </table>
</div>
