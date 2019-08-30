
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
                    <?php echo "Products from ".str_replace('%20', ' ', $page_title) ?>
                </h4>
                <div class="card-body" style="background: white; padding: 10px">
                    <div class="row">
                        <?php foreach($products as $product){ ?>
                            <div href="hey" class="col-md-2 card product list-item-group-active">
                                <img class="card-img" src="<?php echo site_url('public/images/shoe'.rand(0, 5).'.jpg') ?>" alt="Card image">
                                <div class="card-img-overlay">
                                    <h5 class="card-title"><?php echo $product['name'] ?></h5>
                                    <p class="card-text"><?php echo "N".$product['price'] ?></p>
                                    <p class="card-text">Last updated 3 mins ago</p>
                                    <a class="btn btn-sm btn-primary add_to_cart" name="<?php echo $product['name'] ?>" price="<?php echo $product['price']?>">Add to cart <span class="fa fa-cart-plus"></span></a>
                                    <a class="btn btn-sm btn-warning">Read More <span class="fa fa-caret-right"></span></a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
