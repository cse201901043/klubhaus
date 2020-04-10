<div class="right_col" role="main"> <!--class="right_col" role="main"-->
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Advanced Edit Information</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="buttons">
                            <!-- Standard button -->


                            <?php echo $this->Html->link('Attribute Class', ['controller' => 'AttributeClasses', 'action' => 'AdmineditAttributeClass'], ['class' => 'btn btn-success btn-lg', 'escape' => false]) ?>


                            <?php echo $this->Html->link('Attribute Type', ['controller' => 'AttributeTypes', 'action' => 'AdmineditAttributeType'], ['class' => 'btn btn-success btn-lg', 'escape' => false]) ?>


                            <?php echo $this->Html->link('Attribute Value', ['controller' => 'AttributeValues', 'action' => 'AdmineditAttributeValue'], ['class' => 'btn btn-dark btn-lg', 'escape' => false]) ?>


                            <?php echo $this->Html->link('Category', ['controller' => 'ProductCategories', 'action' => 'AdmineditProductCategories'], ['class' => 'btn btn-success btn-lg', 'escape' => false]) ?>


                            <?php echo $this->Html->link('Sub Category', ['controller' => 'ProductSubCategories', 'action' => 'AdmineditProductSubCategories'], ['class' => 'btn btn-info btn-lg', 'escape' => false]) ?>


                            <?php echo $this->Html->link('Brand', ['controller' => 'ProductBrands', 'action' => 'editProductBrand'], ['class' => 'btn btn-dark btn-lg', 'escape' => false]) ?>


                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
