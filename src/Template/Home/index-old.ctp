<!-- Instagram and Arival -->
<div class="row arrivals">
    <div class="col-md-8 col-md-offset-2">
        <div class="gallery-bottom">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 arrivals-left">
                <div class="arrivals-left-texts">
                    <p class="arrivals-title">SHOP OUR INSTAGRAM</p>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 shop-it">
                        <p class="arrival-sub-title">Got Style? Show us</p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 shop-it">
                        <p class="arrival-sub-title">Follow us on 
                            <a href="https://www.instagram.com/klubhausbd" target="_blank">
                                <i class="fa fa-instagram" aria-hidden="true"></i>@klubhausbd
                            </a>
                        </p>
                    </div>
                </div>
                <?php foreach ($instaProducts as $product) { ?>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 shop-it gallery-bottom-left">
                    <?= $this->Html->image('/productImage/InstaGram/' . $product->shop_product->product_featured_image, ['alt' => $product->shop_product->product_name, 'class' => 'img img-responsive']) ?>
                    <div class="inner-box">
                    </div>
                    <div class="shop-it-div">
                        <p class="shop-it-icon"><i class="fa fa-instagram" aria-hidden="true"></i></p>
                        <a href="javascript:;" class="shop-it-link" data-subcat-id = "<?= $product->shop_product->product_sub_category_id ?>" data-product-id = "<?= $product->shop_product->products_id ?>" >SHOP IT</a>
                    </div>
                </div>
                <?php 
            } ?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 new-arrival-container">
                <div class="arrivals-left-texts">
                    <p class="arrivals-title">NEW ARRIVALS</p>
                    <p class="arrival-sub-title-center">Get Ready for <?= date("Y") ?></p>
                </div>
                <?php if (!empty($newArrival->shop_product->product_featured_image)) { ?>
                <!-- <div class="gallery-bottom-right">
                    <?= $this->Html->image('/productImage/productImage/' . $newArrival->shop_product->product_featured_image, [
                        'alt' => 'New Arrival',
                        'class' => 'img img-responsive',
                    ]) ?>
                    <div class="shop-new">
                        <p class="shop-new-header">SHOP NEW <?= $newArrival->shop_product->product_category->category_name ?></p>
                        <?= $this->Html->link('SHOP NOW', "/" . $newArrival->shop_product->product_category->category_slug, ['class' => 'shop-now-small']); ?>
                    </div>
                </div> -->


<div class="gallery-bottom-right">
<?= $this->Html->image('/productImage/Eid.jpg' , [
    'alt' => 'New Arrival',
    'class' => 'img img-responsive',
]) ?>
                    <div class="shop-new">
                        <p class="shop-new-header">SHOP NEW <?= $newArrival->shop_product->product_category->category_name ?></p>
                        <?= $this->Html->link('SHOP NOW', "/" . $newArrival->shop_product->product_category->category_slug, ['class' => 'shop-now-small']); ?>
                    </div>
                </div>





                <?php 
            } ?>
            </div>
        </div>
    </div>
</div>

<!-- Exclusive Collection -->
<div class="row exclusive-collection-header">
    <p class="exclusive-collection-title">EXCLUSIVE COLLECTION</p>
</div>
<div class="row exclusive-collection-header">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 exclusive">
        <?= $this->Html->image('exclusive-men.png', ['alt' => 'Project', 'class' => 'img img-responsive']) ?>
        <div class="exclusive-inner-box">
        </div>
        <div class="exclusive-inner-box-text">
            <p class="exclusive-title">MEN'S FASHION</p>
            <?= $this->Html->link('SHOP NOW', "/men", ['class' => 'exclusive-link']); ?>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 exclusive">
        <?= $this->Html->image('exclusive-women.png', ['alt' => 'Project', 'class' => 'img img-responsive']) ?>
        <div class="exclusive-inner-box">
        </div>
        <div class="exclusive-inner-box-text">
            <p class="exclusive-title">WOMEN'S FASHION</p>
            <?= $this->Html->link('SHOP NOW', "/women", ['class' => 'exclusive-link']); ?>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 exclusive">
        <?= $this->Html->image('exclusive-kids.png', [
            'alt' => 'Project',
            'class' => 'img img-responsive',
            'url' => ['controller' => 'ProductCategories', 'action' => 'index']
        ]) ?>
        <div class="exclusive-inner-box">
        </div>
        <div class="exclusive-inner-box-text">
            <p class="exclusive-title">KID'S FASHION</p>
            <?= $this->Html->link('SHOP NOW', "/kids", ['class' => 'exclusive-link']); ?>
        </div>
    </div>
</div>

<!-- Trending Now -->
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
                    'style' => 'margin-bottom: 10px; height: 23.4375vh;',
                    'url' => '/' . $product->shop_product->product_category->category_slug . '/' . $product->shop_product->product_sub_category->sub_category_slug . '/' . $product->shop_product->product_name_slug
                ]) ?>
                
                <?php 
                $product_name = substr(strip_tags($product->cart_product_name), 0, 26);
                if (strlen($product->cart_product_name) > 26) {
                    $product_name .= "...";
                }
                ?>
                <p class="product-name">
                    <a href="<?= $this->Url->build('/', true) . $product->shop_product->product_category->category_slug . '/' . $product->shop_product->product_sub_category->sub_category_slug . '/' . $product->shop_product->product_name_slug ?>" data-toggle='tooltip' data-placement='top' title='<?= $product->cart_product_name ?>'><?php echo $product_name; ?></a>
                </p>
                <p class="add-to-busket">Added to busket</p>
                <!-- <p class="address">Brentwood | USA</p> -->
            </div>
        <?php 
    } ?>
    </section>
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