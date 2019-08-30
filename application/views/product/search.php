
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
                    <?php echo $page_title ?>
                </h4>
                <div class="card-body" style="background: white; padding: 10px">
                    <div class="row">
                        <?php if($result_products && count($result_products) > 0){ ?>
                            <?php foreach($result_products as $product){ ?>
                                <a href="<?php echo site_url('/product/'.str_replace(' ', '-', strtolower($product['name']))); ?>">
                                    <div class="col-md-2 card product list-item-group-active">
                                        <img class="card-img" src="<?php echo site_url('public/images/products/'.$product['code'].'/01.jpg') ?>" alt="Card image" style="width: 100%;">
                                        <div class="card-body text-left">
                                            <h5 class="card-title"><?php echo $product['name'] ?></h5>
                                            <p class="card-text"><?php echo "N".$product['price'] ?></p>
                                            <a class="btn btn-sm btn-primary add_to_cart" name="<?php echo $product['name'] ?>" price="<?php echo $product['price']?>">Add to cart <span class="fa fa-cart-plus"></span></a>
                                        </div>
                                    </div>
                                </a>
                                
                            <?php } ?>
                        <?php }else{ ?>
                            <div class="alert alert-warning">
                                No search result for <?php echo $key ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
