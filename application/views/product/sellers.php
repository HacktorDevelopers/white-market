
<!--  Main Page Starts  -->
<div class="container" id="main">
    
    <!--  Upper Remark  -->
    <div class="row">
        <div class="col-md-2" id="left-side">
            <?php include APPPATH.'/views/layouts/general/side_bar_product.php' ?>
        </div>

        <div class="col-md-10" id="main-right">

            <div class="card products" style="border-radius: 10px; background: white;">
                    <h4 class="card-header products-header">
                        <?php echo $page_title ?> 
                    </h4>
                    <div class="card-body" style="background: white; padding: 10px">
                        <div class="row">
                            <?php foreach($sellers as $seller){ ?>
                                <a href="<?php echo site_url('/product/seller/'.strtolower(str_replace(' ', '-', $seller->company_name))); ?>">
                                    <div class="col-md-2 card product list-item-group-active text-center">
                                        <img class="card-img" src="<?php echo $seller->logo ?>" alt="Card image" style="width: 80%;">
                                        <div class="card-body text-left" style="">
                                            <h5 class="card-title"><?php echo $seller->company_name ?></h5>
                                            <p>
                                                
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            <?php } ?>
                            <?php if(count($sellers) == 0){ ?>
                                <div class="alert alert-warning">
                                    No Seller available
                                </div>
                            <?php } ?>
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
