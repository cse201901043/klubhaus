<div class="right_col" role="main">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Product Info
                    <small></small>
                </h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <ul class="list-unstyled timeline">
                    <li>
                        <div class="block">
                            <div class="tags">
                                <a class="tag">
                                    <span>Name</span>
                                </a>
                            </div>
                            <div class="block_content">
                                <h2 class="title">
                                    <a><?php echo $shopProduct->product_name ?></a>
                                </h2>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="block">
                            <div class="tags">
                                <a class="tag">
                                    <span>Sku</span>
                                </a>
                            </div>
                            <div class="block_content">
                                <h2 class="title">
                                    <a><?php echo $shopProduct->product_sku ?></a>
                                </h2>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="block">
                            <div class="tags">
                                <a class="tag">
                                    <span>Price</span>
                                </a>
                            </div>
                            <div class="block_content">
                                <h2 class="title">
                                    <a><?php echo $shopProduct->product_unit_sale_price ?></a>
                                </h2>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="block">
                            <div class="tags">
                                <a class="tag">
                                    <span>Description</span>
                                </a>
                            </div>
                            <div class="block_content">
                                <h2 class="title">
                                    <a><?php echo $shopProduct->product_short_description ?></a>
                                </h2>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="block">
                            <div class="tags">
                                <a class="tag">
                                    <span>Stock</span>
                                </a>
                            </div>
                            <div class="block_content">
                                <h2 class="title">
                                    <a><?php echo $shopProduct->product_stock ?></a>
                                </h2>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="block">
                            <div class="tags">
                                <a class="tag">
                                    <span>Attribute Class</span>
                                </a>
                            </div>
                            <div class="block_content">
                                <h2 class="title">
                                    <a><?php echo $shopProduct->attribute_class->attribute_class_name ?></a>
                                </h2>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="block">
                            <div class="tags">
                                <a class="tag">
                                    <span>Image</span>
                                </a>
                            </div>
                            <div class="block_content">
                                <h2 class="title">

                                    <?php echo $this->Html->image('productImage/' . $shopProduct->product_featured_image, ['alt' => '...', 'style' => 'height:400px; width:400px']) ?>


                                </h2>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>