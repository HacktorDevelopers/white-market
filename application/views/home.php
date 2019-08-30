
<!--  Main Page Starts  -->
<div class="container" id="main">
    
    <!--  Upper Remark  -->
    <div class="row">
        <div class="col-md-2" id="left-side">
            <?php include 'layouts/general/side_bar_product.php' ?>
        </div>

        <div class="col-md-10" id="main-right">

            <!--  Product Slider  -->
            <?php //include 'layouts/general/product_slider.php'; ?>

            <?php foreach($subcategories as $subcategory){ ?>
                <?php $products = $this->db->query("SELECT * FROM products WHERE category_id = $subcategory->id ORDER BY RAND() LIMIT 10")->result_array() ?>
                <?php if(count($products) > 0){ ?>
                <div class="card products" style="border-radius: 10px; background: white;">
                    <h4 class="card-header products-header">
                        <?php echo $subcategory->name ?> <span  style="float: right"><a class="stretched-link" style="color: white" href="<?php echo site_url('/product/category/'.strtolower(str_replace(' ', '-', $this->CategoryModel->getCategory($subcategory->category_id)['name'])).'/'.strtolower(str_replace(' ', '-', $subcategory->name)) ) ?>">See all <span class="fa fa-caret-right"></span></a></span>
                    </h4>
                    <div class="card-body" style="background: white; padding: 10px">
                        <div class="row">
                            
                            <?php foreach($products as $product){ ?>
                                <a href="<?php echo site_url('/product/'.str_replace(' ', '-', str_replace(' ', '-', strtolower($product['name'])))); ?>">
                                    <div class="col-md-2 card product list-item-group-active">
                                        <img class="card-img" src="<?php echo site_url('public/images/products/'.$product['code'].'/01.jpg') ?>" alt="Card image" style="height: 150px; width: 100%;">
                                        <div class="card-body text-left" style="">
                                            <h5 class="card-title"><?php echo $product['name'] ?></h5>
                                            <p class="card-text"><?php echo "N".$this->cart->format_number($product['price']) ?></p>
                                            <p>
                                                <?php $rating = $this->ProductModel->getProductRating($product['product_id']); $highest_rating = 5; $i = 0; ?>
                                                <?php while($i < $highest_rating){ ?>
                                                    <?php if($rating > $i){ ?>
                                                    <i class="fa fa-star" style="color: gold"></i>
                                                    <?php }else{ ?>
                                                    <i class="fa fa-star" style="color: black"></i>
                                                    <?php } ?>
                                                <?php $i++; } ?>
                                            </p>
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
