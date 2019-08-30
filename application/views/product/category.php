
<!--  Main Page Starts  -->
<div class="container" id="main">
    <!--  Upper Remark  -->
    <div class="row">
        <div class="col-md-2" id="left-side">
            <?php include APPPATH.'/views/layouts/general/side_bar_product.php' ?>
        </div>

        <div class="col-md-10" id="main-right">

            <div class="card products" style="border-radius: 10px; background: white; ">
                <h4 class="card-header products-header">
                    <?php echo str_replace('%20', ' ', $page_title) ?>
                </h4>
                <div class="card-body" style="background: white; padding: 10px">
                    <div class="row">
                        <?php if(isset($cats)){ ?>
                            <?php foreach($cats as $category){ ?>
                                <a href="<?php echo site_url('/product/category/'.strtolower(str_replace([' ', '&'], ['-', 'and'], $category->name))) ?>">
                                    <div class="col-md-2">
                                        <div classs="card product">
                                            <img class="card-img" src="<?php echo site_url('public/images/system/categories/'.strtolower(str_replace(' ', '-', $category->name)).'.jpg') ?>" alt="Card image" style="width: 100%;">
                                            <div class="card-body text-left">
                                                <h5 class="card-title" style="font-weight: 700; color: black;"><?php echo $category->name ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php } ?>
                        <?php } ?>


                        <?php if(isset($subcats)){ ?>
                            <?php if(count($subcats) == 0){ ?>
                                <div class="alert alert-warning">
                                    No Subcategory for <b class="badge badge-warning"><?php echo ucfirst(str_replace('-', ' ', $cat)) ?> category</b>
                                </div>
                            <?php } ?>
                            <?php foreach($subcats as $category){ ?>
                                <a href="<?php echo site_url('/product/category/'.strtolower(str_replace(' ', '-', $cat)).'/'.strtolower(str_replace(' ', '-', $category->name))) ?>">
                                    <div class="col-md-2 card product list-item-group-active">
                                        <img class="card-img" src="<?php echo site_url('public/images/system/subcategories/'.strtolower(str_replace(' ', '-', $category->name)).'.jpg') ?>" alt="Card image" style="width: 100%;">
                                        <div class="card-body text-left">
                                            <h5 class="card-title" style="font-weight: 700; color: black;"><?php echo $category->name ?></h5>
                                        </div>
                                    </div>
                                </a>
                            <?php } ?>
                            
                        <?php } ?>

                        <?php if(isset($cat_products)){ ?>
                            <?php if(count($cat_products) == 0){ ?>
                                <div class="alert alert-warning">
                                    No Product found for <b class="badge badge-warning"><?php echo ucfirst(str_replace('-', ' ', $cat))?></b> > <b class="badge badge-warning"x><?php echo ucfirst(str_replace('-', ' ', $subcat)) ?> category</b>
                                </div>
                            <?php } ?>
                            <?php foreach($cat_products as $cat_product){ ?>
                                <a href="<?php echo site_url('/product/'.str_replace(' ', '-', strtolower($cat_product->name))); ?>">
                                    <div class="col-md-2 card product list-item-group-active">
                                        <img class="card-img" src="<?php echo site_url('public/images/products/'.$cat_product->code.'/01.jpg') ?>" alt="Card image" style="width: 100%;">
                                        <div class="card-body text-left">
                                            <h5 class="card-title" style="font-weight: 700; color: black; font-variant: small-caps"><?php echo $cat_product->name ?></h5>
                                            <h5 class="card-subtitle"><?php echo $cat_product->short_description ?></h5>
                                        </div>
                                    </div>
                                </a>
                            <?php } ?>
                        <?php } ?>
                       
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
