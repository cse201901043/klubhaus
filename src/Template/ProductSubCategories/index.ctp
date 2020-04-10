<style type="text/css">

.select2-multiple, .select2-multiple2
{
  width: 50%
}
.select2-results__option .wrap:before{
    font-family:fontAwesome;
    color:#999;
    content:"\f096";
    width:25px;
    height:25px;
    padding-right: 10px;
    
}
.select2-results__option[aria-selected=true] .wrap:before{
    content:"\f14a";
}
.select2-container--default .select2-selection--single .select2-selection__placeholder {
    color: #111;
}
.select2-container--default .select2-selection--single .select2-selection__arrow b {
    border-color: #111 transparent transparent transparent;
}
.select2.select2-container .select2-selection,
.select2.select2-container .select2-selection .select2-selection__arrow{
    border-color: transparent;
    background: transparent;
}
.Pagination {
    display: inline-block;
    padding-left: 0;
    margin-top: 10px;
}
.Pagination li{
    display: inline;
    padding-left: 10px;
}
.Pagination li a{
    font-weight: 700;
}
.Pagination li.active a{
    font-weight: 700;
    color: #268ECE;
}
.Pagination>.disabled>a, 
.Pagination>.disabled>a:focus, 
.Pagination>.disabled>a:hover, 
.Pagination>.disabled>span, 
.Pagination>.disabled>span:focus, 
.Pagination>.disabled>span:hover {
    color: #777;
    cursor: not-allowed;
}
.sold{
    color: white;
    font-weight: bolder;
    text-transform: uppercase;
}
.sold span { 
    background-color: #de595a; 
    padding: 1px 6px;
    letter-spacing: 1px;
}
</style>
        <div class="row subcategory-filter">
            <div class="col-md-8 col-md-offset-2">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 breadcrumbs">
                    <p><?= $this->Html->link('Home', "/"); ?> > <?= $this->Html->link($subcat->product_category->category_name, "/".$subcat->product_category->category_slug); ?> > <?= $subcat->sub_category_name ?></p>
                </div>
                <form method="post" id="product-sorting">
                <input type="hidden" name="sub_category" value="<?= $subcat->sub_category_id ?>" >
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="dropdown">
                        <select class="form-control size-dropdown" id="sorting-size" name="sorting-size[]" placeholder="Size" multiple>
                            <?php foreach($sizes as $size){ ?>
                                <option value="<?= $size['attribute_field_value'] ?>">
                                    <?= $size['attribute_field_value'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="dropdown">
                        <select class="form-control size-dropdown" id="sorting-color" name="sorting-color[]" placeholder="Color" multiple>
                            <?php foreach($colors as $color){ ?>
                                <option value="<?= $color['attribute_field_value'] ?>">
                                    <?= $color['attribute_field_value'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <!-- <div class="dropdown">
                        <select class="form-control size-dropdown" id="sorting-price" name="sorting-price[]" placeholder="Price" multiple>
                            <option value="1-500">1 - 500 BDT</option>
                            <option value="501-1000">501 - 1000 BDT</option>
                            <option value="1001-2000">1001 - 2000 BDT</option>
                            <option value="2001-5000">2000 - 5000 BDT</option>
                            <option value="5000"> 5000+ BDT</option>
                        </select>
                    </div> -->
                    <div class="price-slider"></div>
                    <input name="min_price" id="min-price" type="hidden" value="0">
                    <input name="max_price" id="max-price" type="hidden" value="5000">
                </div>
                </form>
            </div>
        </div>

        <div class="row category-content content bg-white">
            <div class="col-md-8 col-md-offset-2">
                <div class="row category-header-div">
                    <p class="category-header-title"><?= $subcat->sub_category_name ?></p>
                </div>
                <div class="row category-products-div">
                    <?php foreach($products as $product) { ?>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 category-div">
                        <?= $this->Html->image('/productImage/productImage/'.$product->product_featured_image, [
                            'alt' => $product->product_name, 
                            'class' => 'img img-responsive category-image',
                            'url' => '/'.$subcat->product_category->category_slug . '/' . $subcat->sub_category_slug . '/' . $product->product_name_slug
                        ]) ?>
                        
                        <?php 
                            $product_name = html_entity_decode(substr(strip_tags($product->product_name),0,26)); 
                            if(strlen($product->product_name)>26) { $product_name .= "...";} 
                        ?>
                        <p class="product-type">
                            <a href="<?= $this->Url->build('/', true).$product->product_category->category_slug . '/' . $product->product_sub_category->sub_category_slug . '/' . $product->product_name_slug ?>" data-toggle='tooltip' data-placement='top' title='<?= $product->product_name ?>'><?php echo $product_name; ?></a>
                        </p>
                        <?php if($product->product_stock == $product->product_sold || $product->product_stock == 0){ ?>
                        <p class="sold"><span>Sold Out</span></p>
                        <?php }else{ ?>
                        <p class="price">৳ <?= $product->product_unit_sale_price ?></p>
                        <?php } ?>
                    </div>
                    <?php } ?>
                </div>

                <ul class="Pagination pull-right">
                    <?php
                        echo $this->Paginator->prev('<', array('tag' => 'li', 'escape' => false), '<a href="#"><</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
                        echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentLink' => true, 'currentClass' => 'active', 'currentTag' => 'a'));
                        echo $this->Paginator->next('>', array('tag' => 'li', 'escape' => false), '<a href="#">></a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
                    ?>
                </ul>

            </div>
        </div>