<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cart[]|\Cake\Collection\CollectionInterface $carts
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cart'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="carts index large-9 medium-8 columns content">
    <h3><?= __('Carts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('cart_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cart_product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cart_product_stocks_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cart_user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cart_product_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cart_product_quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cart_product_unit_price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cart_product_total_price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cart_product_image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($carts as $cart): ?>
            <tr>
                <td><?= $this->Number->format($cart->cart_id) ?></td>
                <td><?= $this->Number->format($cart->cart_product_id) ?></td>
                <td><?= $this->Number->format($cart->cart_product_stocks_id) ?></td>
                <td><?= $this->Number->format($cart->cart_user_id) ?></td>
                <td><?= h($cart->cart_product_name) ?></td>
                <td><?= $this->Number->format($cart->cart_product_quantity) ?></td>
                <td><?= $this->Number->format($cart->cart_product_unit_price) ?></td>
                <td><?= $this->Number->format($cart->cart_product_total_price) ?></td>
                <td><?= h($cart->cart_product_image) ?></td>
                <td><?= h($cart->created_by) ?></td>
                <td><?= h($cart->updated_by) ?></td>
                <td><?= h($cart->created_at) ?></td>
                <td><?= h($cart->updated_at) ?></td>
                <td><?= $this->Number->format($cart->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cart->cart_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cart->cart_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cart->cart_id], ['confirm' => __('Are you sure you want to delete # {0}?', $cart->cart_id)]) ?>
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
