
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-116245833-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-116245833-1');
</script>

<!-- Instagram and Arival -->
<div class="row arrivals">
    <div class="col-md-8 col-md-offset-2">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 arrivals-left">
                <div class="arrivals-left-texts">
                    <p class="arrivals-title">SHOP OUR INSTAGRAM</p>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 shop-it">
                        <p class="arrival-sub-title">Got Style? Show us</p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 shop-it">
                        <p class="arrival-sub-title">Follow us on <i class="fa fa-instagram" aria-hidden="true"></i>@</i>---------------</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 new-arrival-container">
                <div class="arrivals-left-texts">
                    <p class="arrivals-title">NEW ARRIVALS</p>
                    <p class="arrival-sub-title-center">Get Ready for 2018</p>
                </div>
            </div>
        </div>

        <div class="gallery-bottom">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 arrivals-left">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 shop-it gallery-bottom-left">
                    <?= $this->Html->image('new-arrival-1.png', ['alt' => 'New Project', 'class' => 'img img-responsive']) ?>
                    <div class="inner-box">
                    </div>
                    <div class="shop-it-div">
                        <p class=" shop-it-icon"><i class="fa fa-instagram" aria-hidden="true"></i></p>
                        <a href="#" class="shop-it-link">SHOP IT</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 shop-it gallery-bottom-left">
                    <?= $this->Html->image('new-arrival-2.png', ['alt' => 'New Project', 'class' => 'img img-responsive']) ?>
                    <div class="inner-box">
                    </div>
                    <div class="shop-it-div">
                        <p class=" shop-it-icon"><i class="fa fa-instagram" aria-hidden="true"></i></p>
                        <a href="#" class="shop-it-link">SHOP IT</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 shop-it gallery-bottom-left">
                    <?= $this->Html->image('new-arrival-3.png', ['alt' => 'New Project', 'class' => 'img img-responsive']) ?>
                    <div class="inner-box">
                    </div>
                    <div class="shop-it-div">
                        <p class=" shop-it-icon"><i class="fa fa-instagram" aria-hidden="true"></i></p>
                        <a href="#" class="shop-it-link">SHOP IT</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 shop-it gallery-bottom-left">
                    <?= $this->Html->image('new-arrival-4.png', ['alt' => 'New Project', 'class' => 'img img-responsive']) ?>
                    <div class="inner-box">
                    </div>
                    <div class="shop-it-div">
                        <p class=" shop-it-icon"><i class="fa fa-instagram" aria-hidden="true"></i></p>
                        <a href="#" class="shop-it-link">SHOP IT</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 new-arrival-container">
                <?= $this->Html->image('new_arrival.png', ['alt' => 'New Arrival', 'class' => 'img img-responsive']) ?>
                <div class="shop-new">
                    <p class="shop-new-header">SHOP NEW WOMEN'S</p>
                    <?= $this->html->link('SHOP NOW', "/women", ['class' => 'shop-now-small']); ?>
                </div>
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
            <?= $this->html->link('SHOP NOW', "/men", ['class' => 'exclusive-link']); ?>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 exclusive">
        <?= $this->Html->image('exclusive-women.png', ['alt' => 'Project', 'class' => 'img img-responsive']) ?>
        <div class="exclusive-inner-box">
        </div>
        <div class="exclusive-inner-box-text">
            <p class="exclusive-title">WOMEN'S FASHION</p>
            <?= $this->html->link('SHOP NOW', "/women", ['class' => 'exclusive-link']); ?>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 exclusive">
        <?= $this->Html->image('exclusive-kids.png', [
            'alt' => 'Project', 
            'class' => 'img img-responsive',
            'url' => [ 'controller' => 'ProductCategories', 'action' => 'index']
        ]) ?>
        <div class="exclusive-inner-box">
        </div>
        <div class="exclusive-inner-box-text">
            <p class="exclusive-title">KID'S FASHION</p>
            <?= $this->html->link('SHOP NOW', "/kids", ['class' => 'exclusive-link']); ?>
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
        <?php for ($i= 1; $i<=12; $i++) { ?>
            <div>
                <?= $this->Html->image('product.jpg', [
                    'alt' => 'Product', 
                    'class' => '',
                    'url' => '/men/shirt/bd_shirt'
                ]) ?>
                <p class="product-name">
                    <?= $this->html->link('FUR CHECK', "/men/shirt/bd_shirt", ['class' => '']); ?>
                </p>
                <p class="add-to-busket">Added to busket</p>
                <p class="address">Brentwood | USA</p>
            </div>
        <?php } ?>
    </section>
</div>