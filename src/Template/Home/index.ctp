

<!-- Instagram and Arival -->
<div class="container-fluid">
    <div class="row mgl-15">
        <div class="col-md-8 col-sm-12 col-xs-12 no-padding">
            <section class="home-slider slider desktop">
                <?php $counter = 1; foreach ($productSliderImage as $product) {
                    if(count($product->product_metas) > 0){ 
                        if($counter <= 3){
                    ?>
                    <div class="shop-it ">
                        <?php foreach ($product->product_metas as $meta) { ?>
                        <div class="slider-text">
                            <h2 class="text-uppercase"><?php if($meta->product_meta_field_name == 'Slider_Title'){ echo $meta->product_meta_field_value; ?></h2>
                            <p><a href="<?= $this->Url->build('/', true) . $product->product_category->category_slug . '/' . $product->product_sub_category->sub_category_slug ?>">SHOP NOW</a></p>
                            <?php } ?>
                        </div>
                        <?php if($meta->product_meta_field_name == 'Slider_Image'){
                                echo $this->Html->image('Slider/' . $meta->product_meta_field_value, ['alt' => '...']);
                            }
                        }
                    } ?>
                    </div>
                <?php $counter++; } } ?>
            </section>
            <section class="home-slider slider mobile">
                <?php $i = 0; foreach ($productSliderImage as $product) {
                    if(count($product->product_metas) > 0){ 
                    ?>
                    <div class="shop-it ">
                        <?php foreach ($product->product_metas as $meta) { ?>
                        <div class="slider-text">
                            <h2 class="text-uppercase"><?php if($meta->product_meta_field_name == 'Slider_Title'){ echo $meta->product_meta_field_value; ?></h2>
                            <p><a href="<?= $this->Url->build('/', true) . $product->product_category->category_slug . '/' . $product->product_sub_category->sub_category_slug ?>">SHOP NOW</a></p>
                            <!-- <p><a href="<?= $this->Url->build('/find-store', true) ?>">SHOP NOW</a></p> -->
                            <?php } ?>
                        </div>
                        <?php if($meta->product_meta_field_name == 'Slider_Image'){
                                echo $this->Html->image('Slider/' . ++$i . '.png', ['alt' => '...']);
                            }
                        } ?>
                    </div>
                <?php } } ?>
            </section>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12 no-padding">
            <div class="gallery-bottom-right">
                <!-- InstaWidget -->
                <a href="https://instawidget.net/v/user/klubhausbd" id="link-a94fc37c5b584718801cd1e7a04a4ac3ee6e1ef00c17a42eb852f1756bb55cf8">@klubhausbd</a>
                <script src="https://instawidget.net/js/instawidget.js?u=a94fc37c5b584718801cd1e7a04a4ac3ee6e1ef00c17a42eb852f1756bb55cf8&width=100%"></script>
            </div>
        </div>
    </div>
</div>

<!-- Exclusive Collection -->
<div class="exclusive-container">
    <div class="row exclusive-collection-header">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 exclusive">
            <?= $this->Html->image('exclusive-accessories.png', [
                'alt' => 'Project',
                'class' => 'img img-responsive',
                'url' => ['controller' => 'ProductCategories', 'action' => 'index']
            ]) ?>
            <div class="exclusive-inner-box">
            </div>
            <a href="<?= $this->Url->build('/', true) ?>/accessories">
                <div class="exclusive-inner-box-text">
                    <p class="exclusive-title">ACCESSORIES</p>
                    <span class='exclusive-link'>SHOP NOW</span>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 exclusive">
            <?= $this->Html->image('exclusive-men.png', ['alt' => 'Project', 'class' => 'img img-responsive']) ?>
            <div class="exclusive-inner-box">
            </div>
            <a href="<?= $this->Url->build('/', true) ?>/men">
                <div class="exclusive-inner-box-text">
                    <p class="exclusive-title">MEN</p>
                    <span class='exclusive-link'>SHOP NOW</span>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 exclusive">
            <?= $this->Html->image('exclusive-women.png', ['alt' => 'Project', 'class' => 'img img-responsive']) ?>
            <div class="exclusive-inner-box">
            </div>
            <a href="<?= $this->Url->build('/', true) ?>/women">
                <div class="exclusive-inner-box-text">
                    <p class="exclusive-title">WOMEN</p>
                    <span class='exclusive-link'>SHOP NOW</span>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 exclusive">
            <?= $this->Html->image('exclusive-kids.png', [
                'alt' => 'Project',
                'class' => 'img img-responsive',
                'url' => ['controller' => 'ProductCategories', 'action' => 'index']
            ]) ?>
            <div class="exclusive-inner-box">
            </div>
            <a href="<?= $this->Url->build('/', true) ?>/kids">
                <div class="exclusive-inner-box-text">
                    <p class="exclusive-title">KID'S</p>
                    <span class='exclusive-link'>SHOP NOW</span>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- Exclusive Collection -->
<div class="video-container">
    <div class="container-fluid">
        <div class="row mgl-15">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 video-content-right">
                <h2 class="text-uppercase"><?= $community->title ?></h2>
                <p class="text-justify"><?= $community->discription ?></p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 exclusive">
                <iframe src="https://www.youtube.com/embed/<?= $community->video_code ?>?rel=0"></iframe>
            </div>
        </div>
    </div>
</div>

<!-- Trending Now -->
<div class="trending-container">
    <div class="row trending-header">
        <p class="trending-title">TRENDING RIGHT NOW</p>
        <p class="trending-sub-title">Showcasing what the world's most stylish people are buying right now</p>
    </div>
    <div class="row trending-body">
        <section class="center slider">
            <?php foreach ($cartProducts as $product) { ?>
                <div>
                    <?= $this->Html->image('/productImage/productImage/' . $product->cart_product_image, [
                        'alt' => 'Product',
                        'class' => '',
                        'url' => '/' . $product->shop_product->product_category->category_slug . '/' . $product->shop_product->product_sub_category->sub_category_slug . '/' . $product->shop_product->product_name_slug
                    ]) ?>
                    
                    <?php 
                    $product_name = substr(strip_tags($product->cart_product_name), 0, 18);
                    if (strlen($product->cart_product_name) > 18) {
                        $product_name .= "...";
                    }
                    ?>
                    <p class="product-name">
                        <a href="<?= $this->Url->build('/', true) . $product->shop_product->product_category->category_slug . '/' . $product->shop_product->product_sub_category->sub_category_slug . '/' . $product->shop_product->product_name_slug ?>" data-toggle='tooltip' data-placement='top' title='<?= $product->cart_product_name ?>'><?php echo $product_name; ?></a>
                    </p>
                    <p class="add-to-busket">Added to Basket</p>
                    <!-- <p class="address">Brentwood | USA</p> -->
                </div>
            <?php } ?>
        </section>
    </div>
</div>
<!-- Modal Shop IT -->
<div class="modal fade" id="shop-modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body" style="padding:15px 30px 30px 10px;">
                <div class="row">
                    <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 category-div">
                        <?= $this->Html->image('logo_klu.png', [
                            'alt' => 'logo',
                            'class' => 'logo',
                        ]) ?>
                        <h4><b><?php echo date("d M Y") ?></b></h4>
                        <p class="Text-bold">"Sitting preety and ready for spring"</p>
                    </div>
                    <div class="col-md-8 products-div">
                        <h3 class="text-bold text-center"> SHOP IT (<span id="instaModalImage">0</span> items)</h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="row">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>