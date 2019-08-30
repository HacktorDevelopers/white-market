
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
                    <a href="<?php if(isset($_SERVER['HTTP_REFERER'])){ echo $_SERVER['HTTP_REFERER']; }else{ echo site_url(); }?>" class="fa fa-arrow-left btn btn-round"> back </a>
                    <?php echo $bseller->company_name ?>
                </h4>
                <div class="card-body" style="background: white; padding: 10px">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <img style="width: 200px; height: 200px;" src="<?php echo $bseller->logo ?>"/>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Company/Brand Name: </strong><?php echo ($bseller->company_name) ? $bseller_detail->full_name : $bseller_detail->full_name; ?></p>
                            <p><strong>Owner's Name: </strong><?php echo $bseller_detail->full_name ?></p>
                            <p><strong>Rating: </strong><?php echo count($bseller_rating) ?> of 5 rating</p>
                            <p><strong>Products: </strong><?php echo count($bproducts) ?> product</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card products" style="border-radius: 10px; background: white; ">
                <h4 class="card-header products-header">
                    <?php echo $bseller->company_name ?>'s products
                </h4>
                <div class="card-body" style="background: white; padding: 10px">
                    <div class="row">
                        <?php if(count($bproducts) > 0){ ?>
                        <?php foreach($bproducts as $product){ ?>
                            <a href="<?php echo site_url('/product/'.str_replace(' ', '-', strtolower($product['name']))); ?>">
                                <div class="col-md-2 card product list-item-group-active">
                                    <img class="card-img" src="<?php echo site_url('public/images/products/'.$product['code'].'/01.jpg') ?>" alt="Card image" style="width: 100%;">
                                    <div class="card-body text-left" style="">
                                        <h5 class="card-title"><?php echo $product['name'] ?></h5>
                                        <p class="card-text"><?php echo "N".$product['price'] ?></p>
                                    </div>
                                </div>
                            </a>
                        <?php } ?>
                        <?php }else{ ?>
                            <p class="alert alert-warning"><?php echo $bseller->company_name ?>'s Store is Empty</p>
                        <?php }?>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<div class="toast" id="toast">
    <div class="toast-header" id="toast-header">

    </div>
    <div class="toast-body" id="toast-body">
        
    </div>
</div>

<script src="<?php echo site_url('public/js/this_product.js') ?>"></script>
