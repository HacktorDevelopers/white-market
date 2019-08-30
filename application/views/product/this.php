
<?php
    $product_rating = $this->db->query("SELECT * FROM product_rating WHERE product_id = '".$product['product_id']."'")->result_array();
    $avg_rating = $this->db->where('product_id', $product['product_id'])->select('AVG(rate) as avg_rating')->from('product_rating')->get()->row()->avg_rating;
    $contact = $this->db->where('user_id', $product['owner_id'])->get('contacts')->row_array();
?>
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
                    <a href="<?php echo site_url('market'); ?>" class="fa fa-arrow-left btn btn-round"> back </a><?php echo $product['name'] ?>
                </h4>
                <div class="card-body" style="background: white; padding: 10px">
                    <div class="row">
                        <div class="col-md-7 text-center" style="border: 1px solid gold; border-radius: 10px; background: white;">
                            <h4>Gallery</h4>
                            <img class="animated fadeIn align-center" style="height: 350px;border: 1px solid gold; max-width:100%; border-radius: 10px;" src="<?php echo site_url('public/images/products/'.$product['code'].'/01.jpg')?>" id="product_image_preview"/>
                            <div style="display: flex; overflow: scroll;" id="product_images">
                                <?php
                                    $directory = APPPATH.'../public/images/products/'.$product['code'];
                                    $pimages = array_diff(scandir($directory), array('..', '.'));
                                ?>
                                <?php foreach($pimages as $pimage){ ?>
                                    <img style="height: 90px; width: 90px; margin: 10px; border: 1px solid gold; border-radius: 50%;" src="<?php echo site_url('public/images/products/'.$product['code'].'/'.$pimage)?>" class="product_images animated faster slideInRight"/>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <h4><?php echo $product['name']?></h4>
                            <div class="text-subtitle">
                                <?php $i = 0; while($i < 5){ ?>
                                    <?php if($avg_rating > $i){ ?>
                                        <span class="fa fa-star text-success"></span>
                                    <?php }else{ ?>
                                        <span class="fa fa-star"></span>
                                    <?php } ?>
                                <?php $i++; } $seller = $this->db->where('seller_id', $product['owner_id'])->get('sellers')->row_array();?>
                                <?php echo count($product_rating) ?> Reviews Product Code: <?php echo $product['code'] ?>
                                <?php $subcat = $this->SubCategoryModel->getSubCategory($product['category_id']) ?>
                                <?php $cat = $this->CategoryModel->getCategory($subcat['category_id']) ?>
                                <p>Category <a href="<?php echo site_url('product/category/'.strtolower(str_replace([' '], ['-'], $cat['name']))) ?>" class="badge badge-danger"><?php echo $cat['name'] ?></a> <a href="<?php echo site_url('product/category/'.strtolower(str_replace([' '], ['-'], $cat['name'])).'/'.strtolower(str_replace([' '], ['-'], $subcat['name']))) ?>" class="badge badge-success"><?php echo $subcat['name'] ?></a></p>
                                <P>Sold by: <?php echo ($seller) ? $seller['company_name'] : 'White Market'; ?></P>
                                <P>Phone Number: <?php echo ($contact) ? $contact['phone_number'] : 'White Market'; ?></P>
                            </div>
                            <hr/>

                            <div>
                                <h3 <?php echo ($product['discount_price'] != 0)? 'style="text-decoration: line-through;" class="text-danger"': ''; ?>>
                                    N <?php echo $this->cart->format_number($product['price']) ?>
                                </h3>

                                <?php if($product['discount_price'] != 0){ ?>
                                    <h3> N <?php echo $this->cart->format_number($product['discount_price']) ?></h3>
                                <?php } ?>
                                
                            </div>
                            <hr/>

                            <div>
                                Quantity
                                <div style="display: flex;">
                                    <button class="btn btn-sm btn-danger" id="decrease_quantity"><span class="fa fa-minus"></span></button>
                                    <div id="quantity" style="width: 50px; border-radius: 0px !important;" class="form-control text-center">1</div>
                                    <button class="btn btn-sm btn-primary" id="increase_quantity"><span class="fa fa-plus"></span></button>
                                </div>
                            </div>
                            <hr/>
                            <div>
                                <form msg="Adding <?php echo $product['name'] ?> to cart..." action="<?php echo site_url('/buyer/addtocart') ?>" method="POST">
                                    <input type="hidden" id="qty" name="qty" />
                                    <input type="hidden" id="pname" name="name" value="<?php echo $product['name'] ?>"/>
                                    <input type="hidden" id="owner_id" name="owner_id" value="<?php echo $product['owner_id'] ?>"/>
                                    <input type="hidden" id="id" name="id" value="<?php echo $product['id'] ?>"/>
                                    <input type="hidden" id="product_id" name="product_id" value="<?php echo $product['product_id'] ?>"/>
                                    <input type="hidden" id="pprice" name="price" value="<?php echo $product['price'] ?>"/>
                                    <div class="form-group">
                                        <textarea class="form-control" name="oto" placeholder="Other specifications, like color, size etc in format name: value, example color: blue"></textarea>
                                    </div>
                                    
                                    <button class="btn btn-lg btn-block btn-primary">Add To Cart</button>
                                </form>
                            </div>
                            <?php if($this->session->userdata('user') && $this->session->userdata('user')->loggedinas == 'buyer'){ ?>
                                <div id="rating" class="text-center" style="margin: 5px;">
                                    <?php $i = 0; while($i < 5){ ?>
                                        <a class="fa fa-star fa-2x ajax rater" id="rater_<?php echo $i+1 ?>" rate="<?php echo $i+1?>" href="#"></a>
                                    <?php $i++;} ?>
                                </div>
                            <?php } ?>
                        </div>
                        <hr/>
                        <div class="col-md-12 row">
                            <div class="col-md-6">
                                <h4>Description</h4>
                                <hr/>
                                <p>
                                    <?php echo $product['description'] ?>
                                </p>
                            </div>

                            <div class="col-md-6">
                                <h4>Comment</h4>
                                <hr/>
                                <?php foreach($product_rating as $pr){ ?>
                                <div class="list-group">
                                    <a href="" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1"><?php echo $this->UserModel->getUserBy('user_id', $pr['rated_by'])['full_name'] ?></h5>
                                            <small><?php echo Carbon\Carbon::create($pr['created_at'])->diffForHumans() ?></small>
                                        </div>
                                        <p class="mb-1"><?php echo $pr['msg'] ?></p>
                                        <small>4</small>
                                    </a>
                                </div>
                                <?php } ?>
                                <?php if($this->session->userdata('user') && $this->session->userdata('user')->loggedinas == 'buyer'){ ?>
                                    <form>
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="What can you say about this product" name="msg"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-block btn-success">Comment</button>
                                        </div>
                                    </form>
                                <?php }else{ ?>
                                    <p class="alert alert-warning">You must be logged in to leave a comment</p>
                                <?php } ?>
                            </div>
                            
                        </div>

                    </div>
                </div>
            </div>

            <div class="card products" style="border-radius: 10px; background: white; ">
                <h4 class="card-header products-header">
                    Other related products
                </h4>
                <div class="card-body" style="background: white; padding: 10px">
                    <div class="row">
                        <?php foreach($otherproducts as $product){ ?>
                            <a href="<?php echo site_url('/product/'.str_replace(' ', '-', strtolower($product['name']))); ?>">
                                <div class="col-md-2 card product list-item-group-active">
                                    <img class="card-img" src="<?php echo site_url('public/images/products/'.$product['code'].'/01.jpg') ?>" alt="Card image" style="height: 200px; width: 100%;">
                                    <div class="card-body" style="">
                                        <h5 class="card-title"><?php echo $product['name'] ?></h5>
                                        <p class="card-text"><?php echo "N".$this->cart->format_number($product['price']) ?></p>
                                        <div>
                                            <form msg="Adding <?php echo $product['name'] ?> to cart..." action="<?php echo site_url('/buyer/addtocart') ?>" method="POST">
                                                <input type="hidden" name="qty" value="1"/>
                                                <input type="hidden" name="name" value="<?php echo $product['name'] ?>"/>
                                                <input type="hidden" name="owner_id" value="<?php echo $product['owner_id'] ?>"/>
                                                <input type="hidden" name="id" value="<?php echo $product['id'] ?>"/>
                                                <input type="hidden" name="product_id" value="<?php echo $product['product_id'] ?>"/>
                                                <input type="hidden" name="price" value="<?php echo $product['price'] ?>"/>
                                                <textarea class="form-control" name="oto" placeholder="Other specifications, like color, size etc in format name: value, example color: blue"></textarea>
                                                <button class="btn btn-sm btn-block btn-primary">Add To Cart</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>


<script src="<?php echo site_url('public/js/this_product.js') ?>"></script>
<script src="<?php echo site_url('public/js/rating.js') ?>"></script>
