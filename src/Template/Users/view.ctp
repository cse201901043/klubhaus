<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Access Logs'), ['controller' => 'AccessLogs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Access Log'), ['controller' => 'AccessLogs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name Slug') ?></th>
            <td><?= h($user->name_slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Type') ?></th>
            <td><?= h($user->user_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Role') ?></th>
            <td><?= h($user->user_role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Mobile') ?></th>
            <td><?= h($user->user_mobile) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Profile Image') ?></th>
            <td><?= h($user->user_profile_image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($user->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Remember Token') ?></th>
            <td><?= h($user->remember_token) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Login Status') ?></th>
            <td><?= $this->Number->format($user->login_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= $this->Number->format($user->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($user->created_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated At') ?></th>
            <td><?= h($user->updated_at) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Access Logs') ?></h4>
        <?php if (!empty($user->access_logs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Ip Address') ?></th>
                <th scope="col"><?= __('Controller') ?></th>
                <th scope="col"><?= __('Action') ?></th>
                <th scope="col"><?= __('Prev Data') ?></th>
                <th scope="col"><?= __('Mac Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->access_logs as $accessLogs): ?>
            <tr>
                <td><?= h($accessLogs->id) ?></td>
                <td><?= h($accessLogs->user_id) ?></td>
                <td><?= h($accessLogs->ip_address) ?></td>
                <td><?= h($accessLogs->controller) ?></td>
                <td><?= h($accessLogs->action) ?></td>
                <td><?= h($accessLogs->prev_data) ?></td>
                <td><?= h($accessLogs->mac_id) ?></td>
                <td><?= h($accessLogs->created) ?></td>
                <td><?= h($accessLogs->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AccessLogs', 'action' => 'view', $accessLogs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AccessLogs', 'action' => 'edit', $accessLogs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AccessLogs', 'action' => 'delete', $accessLogs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accessLogs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
