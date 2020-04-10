
        <div class="row category-content content bg-white">
            <div class="col-md-8 col-md-offset-2">
                <div class="row category-header-div">
                    <p class="category-header-title"><?= strtoupper($category->category_name) ?></p>
                </div>
                <div class="row content">
                    <?php 
                        //  if($category->category_name == 'Accessories'){ 
                        if(count($category->product_sub_categories)>0){
                            foreach($category->product_sub_categories as $subcat) { 
                    ?>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 category-div">
                        <?= $this->Html->image('/productImage/ProductSubCategory/'.$subcat->sub_category_featured_image, [
                            'alt' => $subcat->sub_category_name, 
                            'class' => 'img img-responsive category-image',
                            'url' => '/'.$category->category_slug.'/'.$subcat->sub_category_slug
                        ]) ?>
                        <p class="image-capsion"><?= $this->Html->link(strtoupper($subcat->sub_category_name), '/'.$category->category_name.'/'.$subcat->sub_category_slug); ?></p>
                    </div>
                    <?php } }else{ ?>
                    <div class="col-lg-12">
                        <?= $this->Html->image('/productImage/coming-soon.png', [
                            'alt' => 'Coming Soon', 
                            'class' => 'img img-responsive',
                            'style' => 'margin: 10px auto 20px;'
                        ]) ?>
                    </div>
                    <?php } ?>
                </div>

            </div>
        </div>