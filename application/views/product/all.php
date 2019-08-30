
<!--  Main Page Starts  -->
<div class="container" id="main">
    
    <!--  Upper Remark  -->
    <div class="row">
        <div class="col-md-2" id="left-side">
            <?php include APPPATH.'/views/layouts/general/side_bar_product.php' ?>
        </div>

        <div class="col-md-10" id="main-right">

            <!--  Product Slider  -->
            <?php include APPPATH.'/views/layouts/general/product_slider.php'; ?>

            <?php foreach($subcategories as $subcategory){ ?>
                <div class="card products" style="border-radius: 10px; background: white;">
                    <h4 class="card-header products-header">
                        <?php echo $subcategory->name ?> <span  style="float: right"><a class="stretched-link" style="color: white" href="<?php echo site_url('/product/category/'.$this->CategoryModel->getCategory($subcategory->category_id)['name'].'/'.$subcategory->name) ?>">See all <span class="fa fa-caret-right"></span></a></span>
                    </h4>
                    <div class="card-body" style="background: white; padding: 10px">
                        <div class="row">
                            <?php $products = $this->db->query("SELECT * FROM products WHERE category_id = $subcategory->id ORDER BY RAND() LIMIT 10")->result_array() ?>
                            <?php foreach($products as $product){ ?>
                                <a href="<?php echo site_url('/product/'.str_replace(' ', '-', strtolower($product['name']))); ?>">
                                    <div class="col-md-2 card product list-item-group-active">
                                        <img class="card-img" src="<?php echo site_url('public/images/products/'.$product['code'].'/01.jpg') ?>" alt="Card image" style="width: 100%;">
                                        <div class="card-body" style="">
                                            <h5 class="card-title"><?php echo $product['name'] ?></h5>
                                            <p class="card-text"><?php echo "N".$product['price'] ?></p>
                                        </div>
                                    </div>
                                </a>
                            <?php } ?>
                            <?php if(count($products) == 0){ ?>
                                <div class="alert alert-warning">
                                    No product available for <?php echo $subcategory->name ?> Category
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?> 
            
        </div>
    </div>
</div>

<div class="toast" id="toast">
    <div class="toast-header" id="toast-header">

    </div>
    <div class="toast-body" id="toast-body">
        
    </div>
</div>
