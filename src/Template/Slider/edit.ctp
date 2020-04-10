<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Slider $slider
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $slider->slider_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $slider->slider_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Slider'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="slider form large-9 medium-8 columns content">
    <?= $this->Form->create($slider) ?>
    <fieldset>
        <legend><?= __('Edit Slider') ?></legend>
        <?php
            echo $this->Form->control('slider_subCategory_id');
            echo $this->Form->control('slider_title');
            echo $this->Form->control('slider_image');
            echo $this->Form->control('created_at');
            echo $this->Form->control('updated_by');
            echo $this->Form->control('created_by');
            echo $this->Form->control('updated_at');
            echo $this->Form->control('deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
