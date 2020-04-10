<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Access Logs'), ['controller' => 'AccessLogs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Access Log'), ['controller' => 'AccessLogs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('name_slug');
            echo $this->Form->control('user_type');
            echo $this->Form->control('user_role');
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->control('user_mobile');
            echo $this->Form->control('user_profile_image');
            echo $this->Form->control('login_status');
            echo $this->Form->control('status');
            echo $this->Form->control('remember_token');
            echo $this->Form->control('created_at');
            echo $this->Form->control('updated_at');
            echo $this->Form->control('deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
