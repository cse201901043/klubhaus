
        <div class="row category-content content bg-white">
            <div class="col-md-8 col-md-offset-2">
                <div class="row category-header-div">
                    <p class="category-header-title"><?= $category->category_name ?></p>
                </div>
                <div class="row">
                    <?php foreach($category->product_sub_categories as $subcat) { ?>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 category-div">
                        <?= $this->Html->image($subcat->sub_category_featured_image, [
                            'alt' => $subcat->sub_category_name, 
                            'class' => 'img img-responsive category-image',
                            'url' => '/'.$category->category_slug.'/'.$subcat->sub_category_slug
                        ]) ?>
                        <p class="image-capsion"><?= $this->html->link($subcat->sub_category_name, '/'.$category->category_name.'/'.$subcat->sub_category_slug); ?></p>
                    </div>
                    <?php } ?>
                </div>

            </div>
        </div>