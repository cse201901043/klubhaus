
    <div class="container-fluid">
        <div class="text-center home-title">
            <h2>Cart</h2>
        </div>
        <div class="row content">
            <div class="col-md-8 col-md-offset-2 cart-content">
                <div class="step order">
                    <div class="clearfix"></div>
                    <div class="row mgl-15">
                        <div class="table-responsive">          
                          <table class="table table-bordered table-cart">
                            <thead>
                              <tr>
                                <th style="width: 50%">Item</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Subtotal</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach($orders as $cart){ ?>
                              <tr id="cart<?= $cart->cart_id ?>" class="cart-list">
                                <td>
                                <div class="row">
                                    <div class="col-md-2">
                                        <?= $this->Html->image('/productImage/productImage/'.$cart->cart_product_image, [
                                            'alt' => $cart->shop_product->product_name, 
                                            'class' => 'img img-responsive'
                                        ]) ?>
                                    </div>
                                    <div class="col-md-10">
                                        <p class="h4 text-bold"><?= $cart->shop_product->product_sub_category->sub_category_name ?></p>
                                        <p class="h4 text-bold"><b><?= $cart->shop_product->product_name ?></b></p>
                                        <a href="#" class="remove-order">remove item</a>
                                    </div>
                                </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                      <span class="input-group-btn">
                                        <button class="btn btn-default dec-item" type="button" id="btn-plus"><span class="glyphicon glyphicon-minus"></span></button>
                                      </span>
                                      <input type="number" value="<?= $cart->cart_product_quantity ?>" readonly="" class="form-control item-quantity">
                                      <span class="input-group-btn">
                                        <button class="btn btn-default inc-item" type="button" id="btn-minus"><span class="glyphicon glyphicon-plus"></span></button>
                                      </span>
                                    </div>
                                </td>
                                <td>৳ <span class="price"><?= $cart->cart_product_unit_price ?></span></td>
                                <td>৳ <span class="total_price"><?= $cart->cart_product_total_price ?></span></td>
                              </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="total-price row">
                            <div class="col-md-8">
                                <h3>Coupon</h3>
					            <div>
					                <input type="text" name="" placeholder="Type your coupon code here" class="email">
					                <a href="#" class="join">Use</a>
					            </div>
                            </div>
                            <div class="col-md-3 col-md-offset-1">
                                <h4>Total: <p class="pull-right">৳ <span class="order_total">0.00</span></p> </h4>
                                <h4>Subtotal: <p class="pull-right">৳ <span class="order_total">0.00</span></p> </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="total-price row">
                            <div class="col-md-9">
                                <h3>Total: <b class="h3">৳ <span class="order_total">0.00</span></b> </h3>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?= $this->Html->link('<button class="btn btn-warning btn-lg login-btn">Proceed to Checkout</button>', '#', ['escape' => false]); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>