<div class="right_col" role="main">
    <div class="row">
        <form action="<?php echo $this->Url->build('/', true) ?>Slider/addSliderData"
              method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="item form-group">
                        <label for="name">Slider Title
                            <span
                                class="required">*</span>
                        </label>
                        <div>
                            <input type="text" name="slider_title" class="form-control">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="name">Slider Image
                            <span
                                class="required">*</span>
                        </label>
                        <div>
                            <input type="file" name="slider_image" class="form-control" accept="image/*">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Select Sub-Category</label>
                        <select required="required" name="slider_subCategory_id"
                                class="form-control subCategories"
                                id="appendSubCatId">
                            <option>Choose One</option>
                            <?php foreach ($productSubCategories as $info): ?>
                                <option value="<?php echo $info->sub_category_id ?>">
                                    <?php echo $info->sub_category_name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <button type="reset" class="btn btn-primary">Reset</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </div>
            <br><br><br>
        </form>
    </div>
</div>

