<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AttributeClass $attributeClass
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $attributeClass->attribute_class_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $attributeClass->attribute_class_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Attribute Classes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="attributeClasses form large-9 medium-8 columns content">
    <?= $this->Form->create($attributeClass) ?>
    <fieldset>
        <legend><?= __('Edit Attribute Class') ?></legend>
        <?php
            echo $this->Form->control('attribute_class_name');
            echo $this->Form->control('attribute_class_slug');
            echo $this->Form->control('created_by');
            echo $this->Form->control('updated_by');
            echo $this->Form->control('created_at');
            echo $this->Form->control('updated_at');
            echo $this->Form->control('deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
