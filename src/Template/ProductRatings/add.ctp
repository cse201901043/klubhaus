<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductRating $productRating
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Product Ratings'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="productRatings form large-9 medium-8 columns content">
    <?= $this->Form->create($productRating) ?>
    <fieldset>
        <legend><?= __('Add Product Rating') ?></legend>
        <?php
            echo $this->Form->control('ratings_product_id');
            echo $this->Form->control('rate_point');
            echo $this->Form->control('rate_user_id');
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
