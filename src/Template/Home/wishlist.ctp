
	<div class="container-fluid">
	    <div class="text-center home-title">
	        <h2>MY WISHLIST</h2>
	    </div>
        <div class="row content bg-white mgl-15">
            <div class="col-md-8 col-md-offset-2 cart-content">
	            <div class="col-md-12 text-center">
        			<h3>Total <span id="wishlistCount"><?= $lists->count() ?> </span> Products</h3><br>

	                <div class="row category-products-div">
	                    <?php foreach($lists as $list) { ?>
	                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 category-div">
	                    	<a class="pull-right text-bold btn btn-link remove-fav" id='removeFav<?= $list->cart_id ?>'>X</a>
	                    	<div class="clearfix"></div>
	                        <?= $this->Html->image('/productImage/productImage/'.$list->cart_product_image, [
                            'alt' => $list->shop_product->product_name, 
                            'class' => 'img img-responsive category-image',
                            'url' => '/'.$list->shop_product->product_category->category_slug . '/' . $list->shop_product->product_sub_category->sub_category_slug . '/' . $list->shop_product->product_name_slug ]) ?>
                            <?php $product_name = substr(strip_tags($list->shop_product->product_name),0,26);  if(strlen($list->shop_product->product_name)>26) { $product_name .= "...";} ?>
	                        <p class="product-type"><?= $this->Html->link($product_name, '/'.$list->shop_product->product_category->category_slug . '/' . $list->shop_product->product_sub_category->sub_category_slug . '/' . $list->shop_product->product_name_slug, ['class' => '', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $list->shop_product->product_name]); ?></p>
	                        <p class="price">৳ <?= $list->shop_product->product_unit_sale_price ?></p>
	                    </div>
	                    <?php } ?>
	                </div>

	            	<br><br><br><br>
	            </div>
            </div>
        </div>
    </div>