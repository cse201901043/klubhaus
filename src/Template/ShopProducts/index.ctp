
        <div class="row subcategory-filter">
            <div class="col-md-8 col-md-offset-2">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 breadcrumbs">
                    <p>
                        <?= $this->Html->link('HOME', "/"); ?>
                         > 
                        <?= $this->Html->link(strtoupper($product->product_category->category_name), "/".$product->product_category->category_slug); ?>
                         > 
                        <?= $this->Html->link(strtoupper($product->product_sub_category->sub_category_name), "/".$product->product_category->category_slug."/".$product->product_sub_category->sub_category_slug); ?>
                         > 
                        <?= $product->product_name ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="row category category-content content bg-white">
            <div class="col-md-8 col-md-offset-2">
                <div class="row category-header-div">
                    <p class="category-header-title"><?= $product->product_name ?></p>
                </div>
                
                <div class="row product-details">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        <?php 
                            foreach($metas as $meta){ 
                            if($meta->product_meta_field_name == 'product_related_images'){ ?>
                        <?= $this->Html->image('/productImage/ProductRelated/'.$meta->product_meta_field_value, ['alt' => 'New Project', 'class' => 'img img-responsive product-link-image']) ?>
                        <?php } } ?>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <?= $this->Html->image('/productImage/productImage/'.$product->product_featured_image, ['alt' => 'New Project', 'class' => 'img img-responsive product-detail-image', 'id' => 'zoom',  'data-zoom-image' => $this->Url->build('/productImage/productImage/'.$product->product_featured_image, true)]) ?>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 product-description">
                        <p class="product-title"><?= $product->product_name ?></p>
                        <p class="price">৳ <?= $product->product_unit_sale_price ?></p>
                        <p class="shipping-type"><?= $product->product_short_description ?></p>
                        
                        <?php 
                            $stocks_id = array();
                            if(!empty($stocks)){

                                foreach($stocks as $stock){ 
                                    $stocks_id[$stock->product_stocks_id] = $stock->product_stocks_id;
                                    if($stock->attribute_type->attribute_type_slug == 'color'){
                                        $color = "yes";
                                        $colors_id[] = $stock->product_stocks_id;
                                        $colors[] = $stock->attribute_value->attribute_field_value;
                                    }  
                                    if($stock->attribute_type->attribute_type_slug == 'size'){
                                        $size = "yes";
                                        $sizes_id[] = $stock->product_stocks_id;
                                        $sizes[] = $stock->attribute_value->attribute_field_value;
                                    } 
                                } 
                            }
                            $stocks_id_implode = implode(',', $stocks_id);
                            $colValue = "";
                            $sizeValue = "";
                        ?>

                        <?php if($product->product_stock != $product->product_sold || $product->product_stock != 0){
                            if(isset($color)){ ?>
                                <p class="product-color"><strong>COLOR: </strong></p>
                                <select class="select-size" id="color_value">
                                    <option>Please Select</option>
                                    <?php for($i=0; $i<count($colors); $i++){ ?>
                                        <option value="<?= $colors_id[$i] ?>">
                                            <?= $colors[$i] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <br>
                                <br>
                        <?php $colValue = 'yes'; } } ?>
                        <?php if($product->product_stock != $product->product_sold || $product->product_stock != 0){
                            if(isset($size)){ ?>
                                <p><strong>SIZE: </strong><a href="<?= $this->Url->build('/size-guide') ?>" class="size-guide pull-right" target="_blank">Size guide</a></p>
                                <select class="select-size" id="size_value">
                                    <option>Please Select</option>
                                    <?php for($i=0; $i<count($sizes); $i++){ ?>
                                        <option value="<?php echo trim($sizes_id[$i]); ?>">
                                            <?php echo trim($sizes[$i]); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <br>
                                <br>
                        <?php $sizeValue = 'yes'; } } ?>
                        <input type="hidden" name="select_color" id="select_color" value="<?= $colValue ?>">
                        <input type="hidden" name="select_size" id="select_size" value="<?= $sizeValue ?>">
                        <input type="hidden" name="stocks_id" class="stocks_id" value="<?php echo $stocks_id_implode; ?>">
                        <p class="add-cart">
                            <?php if($product->product_stock != $product->product_sold || $product->product_stock != 0){ ?>
                            <a href="javascript:;" class="add-to-cart" id="add-to-cart">ADD TO BAG</a>
                            <?php }else{ ?>
                            <a href="javascript:;" class="sold-out" id="sold-out">SOLD OUT</a>
                            <?php } ?>     
                        </p>

                        <p>Share</p>
                        <div>
                            <ul class="product-social">
                                <li>
                                    <?= $this->SocialShare->fa('facebook', $this->request->here); ?>
                                </li>
                                <li>
                                    <?= $this->SocialShare->fa('twitter', $this->request->here); ?>
                                </li>
                                <li>
                                    <?= $this->SocialShare->fa('gplus', $this->request->here); ?>
                                    </a>
                                </li>
                                <!-- <li>
                                    <a href="javascript:;">
                                        <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="fa fa-google-plus" aria-hidden="true"></i>
                                    </a>
                                </li> -->
                            </ul>
                        </div>

                    </div>
                </div>

                <div class="row product-description-text">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <p class="description-header">PRODUCT DETAILS</p>
                        <p><?php 
                            foreach($metas as $meta){ 
                                if($meta->product_meta_field_name == 'product_detail'){ ?>
                                <?=  $meta->product_meta_field_value ?>
                        <?php } } ?></p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <p class="description-header">PRODUCT CODE</p>
                        <p><?php if(isset($product->product_sku)){ echo $product->product_sku; } ?></p>

                        <p class="description-header">BRAND</p>
                        <p><?php if(isset($product->product_brand)){ echo $product->product_brand->brand_name; } ?></p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <p class="description-header">SIZE & FIT</p>
                        <p><?php 
                            foreach($metas as $meta){ 
                                if($meta->product_meta_field_name == 'product_size_fit'){ ?>
                                <?=  $meta->product_meta_field_value ?>
                        <?php } } ?></p>
                    </div>
                </div>

                <?php if(count($rel_products) > 0){ ?>
                <div class="row related-products">
                    <p class="related-products-title">YOU MIGHT ALSO LIKE</p>
                </div>

                <div class="row related-product">    
                    <!-- <section class="center slider"> -->
                    <section class="related-slider row">
                        <?php foreach($rel_products as $rel_product) { ?>
                        <!-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 product-page-slider"> -->
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 product-related-slider">
                            <?= $this->Html->image('/productImage/productImage/'.$rel_product->product_featured_image, [
                                'alt' => $rel_product->product_name, 
                                'class' => 'img img-responsive category-image',
                                'url' => '/'.$rel_product->product_category->category_slug . '/' . $rel_product->product_sub_category->sub_category_slug . '/' . $rel_product->product_name_slug
                            ]) ?>
                            
                            <p class="product-type">
                                <?php 
                                    $product_name = substr(strip_tags($rel_product->product_name),0,26); 
                                    if(strlen($rel_product->product_name)>26) { $product_name .= "...";} 
                                ?>
                                <a href="<?= $this->Url->build('/', true).$rel_product->product_category->category_slug . '/' . $rel_product->product_sub_category->sub_category_slug . '/' . $rel_product->product_name_slug ?>" data-toggle='tooltip' data-placement='top' title='<?= $rel_product->product_name ?>'><?php echo $product_name; ?></a></p>
                            <p class="price">৳ <?= $rel_product->product_unit_sale_price ?></p>
                        </div>
                        <?php } ?>
                    </section>
                </div>
                <?php } ?>

                <!-- <div class="row we-accept">
                    <p class="we-accept-title">WE ACCEPT:</p>
                </div>
                <div>
                    <ul class="we-accept-div">
                        <li>
                            <?= $this->Html->image('accept-money-1.png', ['alt' => 'Payment', 'class' => 'img img-responsive']) ?> 
                        </li>
                        <li>
                            <?= $this->Html->image('accept-money-2.png', ['alt' => 'Payment', 'class' => 'img img-responsive']) ?> 
                        </li>
                        <li>
                            <?= $this->Html->image('accept-money-3.png', ['alt' => 'Payment', 'class' => 'img img-responsive']) ?> 
                        </li>
                        <li>
                            <?= $this->Html->image('accept-money-4.png', ['alt' => 'Payment', 'class' => 'img img-responsive']) ?> 
                        </li>
                        <li>
                            <?= $this->Html->image('accept-money-5.png', ['alt' => 'Payment', 'class' => 'img img-responsive']) ?> 
                        </li>
                    </ul>
                </div> -->

            </div>
        </div>

        
    <?php $this->start('script'); ?>
        <?= $this->Html->script(['jquery.elevatezoom.js']) ?>
        <script>
          $('#zoom').elevateZoom({
                zoomType: "inner",
                cursor: "crosshair",
                scrollZoom: true,
                easing : true,
            });
          $( ".product-link-image" ).click(function() {
                $('.product-detail-image').attr('src', $(this).attr('src'));
                $('.product-detail-image').attr('data-zoom-image', $(this).attr('src'));

                $('.zoomContainer').remove();
                $('#zoom').removeData('elevateZoom');
                $('#zoom').removeData('zoomImage');

                $('#zoom').elevateZoom({
                    zoomType: "inner",
                    cursor: "crosshair",
                    scrollZoom: true,
                    easing : true,
                });
            });
        </script>
    <?php $this->end(); ?>