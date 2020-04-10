<p>Hello <?= $user->name ?>!</p>
<p>Thank you for shopping on KLUBHAUS! Hope you enjoyed shopping with us. your order is now being processed.</p>
<table style="width: 100%">
    <tr>
        <th style="width: 33%; text-align: left; text-decoration: underline;">Address</th>
    </tr>
    <tr>
        <td><?= $order->order_shipping_address ?><br>Phone: <?= $user->user_mobile ?></td>
    </tr>
</table>
<br><br>
<table style="width: 100%">
    <tr>
        <th style="width: 33%; text-align: left; text-decoration: underline;">Item </th>
        <th style="width: 33%; text-align: left; text-decoration: underline;">Quantity </th>
        <th style="width: 33%; text-align: left; text-decoration: underline;">Price </th>
    </tr>
    <?php $counter = 1;  foreach($items as $item){ ?>
    <tr>
        <td><?= $counter ?>. <?= $item->cart_product_name ?></td>
        <td><?= $item->cart_product_quantity ?></td>
        <td>৳ <?= $item->cart_product_total_price ?></td>
    </tr>
    <?php $counter++; } ?>
    <tr rowspan='2'><td colspan="3"><br></td></tr>
    <tr><td colspan="3"> </td></tr>
    <tr>
        <td colspan="2" style="text-align: right;padding-right: 10%;">Sub Total:</td>
        <td>৳ <?= $order->order_amount ?></td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: right;padding-right: 10%;">Discount:</td>
        <td>৳ <?= isset($order->order_discount_rate) ? $order->order_discount_rate : 0 ?></td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: right;padding-right: 10%;">Delivery Charge:</td>
        <td>৳ <?= $order->order_shipping_cost ?></td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: right;padding-right: 10%;"></td>
        <td><hr style="width: 20%; margin: 0"></td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: right;padding-right: 10%;">Total amount:</td>
        <td>৳ <?= $order->order_grand_total ?></td>
    </tr>
</table>