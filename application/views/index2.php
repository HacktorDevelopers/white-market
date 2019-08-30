

<header class="masthead container-fluid text-white text-center" style="background-image: url(<?php echo site_url('/public/images/system/sys/shop.png') ?>)">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
              <h1 class="mb-5" style="font-size: 60pt"><span style="color: red; text-shadow: 1px 2px 6px black">White</span> <span style="color:white !important; text-shadow: 1px 2px 6px black">Market</span></h1>
              <p><i style="color: white">A Place For Affordable Products</i></p>
          </div>
        </div>
    </div>
</header>

<div class="container">
  <div class="row text-center">
    <h1 style="padding: 15px">What We Sell</h1>
    <hr/><br/>
    <?php foreach($categories as $category){ ?>
      <div class="col-md-3 text-center">
        <a href="<?php echo site_url('/product/category/'.strtolower(str_replace(' ', '-', $category->name))) ?>">
        <i class="<?php echo (strlen($category->icon) > 0 ) ? $category->icon: 'fab fa-product-hunt' ; ?> fa-8x" style="color: gold !important"></i>
          <p style="color: gold; font-weight: 600; margin: 10px; background-image: radial-gradient(circle, #6c57f8, #9581fd, #baabff, #dcd5ff, #ffffff); padding: 10px; border-radius: 5px;"><?php echo $category->name; ?></p>
        </a>
      </div>
    <?php } ?>
      <div class="col-md-3 text-center">
        <a href="<?php echo site_url('/market') ?>">
        <i class="fas fa-door-open fa-8x" style="color: gold !important"></i>
          <p style="color: gold; font-weight: 600; margin: 10px; background-image: radial-gradient(circle, #6c57f8, #9581fd, #baabff, #dcd5ff, #ffffff); padding: 10px; border-radius: 5px;">Explore Market</p>
        </a>
      </div>
  </div>
  <br/><br/>
  <div class="row text-center">
    <h1 style="padding: 15px">Featured Products</h1>
    <hr/>
    <br/>
    <?php $featured_products = $this->ProductModel->getProductsAtRandom(); ?>
    <?php foreach($featured_products as $featured_product){ ?>
      <div class="col-md-2">
        <a class="card text-center" href="<?php echo site_url('product/'.str_replace(['&', ' '], ['and', '-'], strtolower($featured_product['name']))) ?>">
          <img class="card-img" src="<?php echo site_url('public/images/products/'.$featured_product['code'].'/01.jpg') ?>" style="width: 60%; height: 200px"/>
          <hr/>
          <div class="card-body text-left">
            <p><?php echo character_limiter($featured_product['name'], 10); ?></p>
            <p <?php echo ($featured_product['discount_price'] != 0)? 'style="text-decoration: line-through" class="text-danger"' : '';?>>
              <?php echo $this->cart->format_number($featured_product['price']); ?>
            </p>
            <?php if($featured_product['discount_price'] != 0){ ?>
              <p><?php echo $this->cart->format_number($featured_product['discount_price']); ?></p>
            <?php } ?>
            <p>
              <?php $rating = $this->ProductModel->getProductRating($featured_product['product_id']); $highest_rating = 5; $i = 0; ?>
              <?php while($i < $highest_rating){ ?>
                <?php if($rating > $i){ ?>
                  <i class="fa fa-star" style="color: gold"></i>
                <?php }else{ ?>
                  <i class="fa fa-star" style="color: black"></i>
                <?php } ?>
              <?php $i++; } ?>
            </p>
          </div>
        </a>
      </div>
    <?php } ?>
      <div class="col-md-2 text-center">
        <a href="<?php echo site_url('/market') ?>">
        <i class="fas fa-door-open fa-8x" style="color: gold !important"></i>
          <p style="color: gold; font-weight: 600; margin: 10px; background-image: radial-gradient(circle, #6c57f8, #9581fd, #baabff, #dcd5ff, #ffffff); padding: 10px; border-radius: 5px;">Explore Market</p>
        </a>
      </div>
  </div>

  <div class="row text-center">
    <h1 style="padding: 15px">Latest Products</h1>
    <hr/>
    <br/>
    <?php $sellers = $this->ProductModel->getLatestProducts(); ?>
    <?php foreach($sellers as $latest_product){ ?>
      <div class="col-md-2">
        <a class="card text-center" href="<?php echo site_url('product/'.str_replace(['&', ' '], ['and', '-'], strtolower($latest_product['name']))) ?>">
          <img class="card-img" src="<?php echo site_url('public/images/products/'.$latest_product['code'].'/01.jpg') ?>" style="width: 60%; height: 200px"/>
          <hr/>
          <div class="card-body text-left">
            <p><?php echo character_limiter($latest_product['name'], 10); ?></p>
            <p <?php echo ($latest_product['discount_price'] != 0)? 'style="text-decoration: line-through" class="text-danger"' : '';?>>
              <?php echo $this->cart->format_number($latest_product['price']); ?>
            </p>
            <?php if($latest_product['discount_price'] != 0){ ?>
              <p><?php echo $this->cart->format_number($latest_product['discount_price']); ?></p>
            <?php } ?>
            <p>
              <?php $rating = $this->ProductModel->getProductRating($latest_product['product_id']); $highest_rating = 5; $i = 0; ?>
              <?php while($i < $highest_rating){ ?>
                <?php if($rating > $i){ ?>
                  <i class="fa fa-star" style="color: gold"></i>
                <?php }else{ ?>
                  <i class="fa fa-star" style="color: black"></i>
                <?php } ?>
              <?php $i++; } ?>
            </p>
          </div>
        </a>
      </div>
      
    <?php } ?>
      <div class="col-md-2 text-center">
        <a href="<?php echo site_url('/market') ?>">
        <i class="fas fa-door-open fa-8x" style="color: gold !important"></i>
          <p style="color: gold; font-weight: 600; margin: 10px; background-image: radial-gradient(circle, #6c57f8, #9581fd, #baabff, #dcd5ff, #ffffff); padding: 10px; border-radius: 5px;">Explore Market</p>
        </a>
      </div>
  </div>

  <div class="row text-center">
    <h1 style="padding: 15px">Our Trusted Sellers</h1>
    <hr/>
    <br/>
    <?php $trusted_sellers = $this->db->join('users', 'users.user_id = sellers.seller_id', 'left')->get('sellers')->result_array(); ?>
    <?php foreach($trusted_sellers as $trusted_seller){ ?>
      <div class="col-md-2">
        <a class="card" href="<?php echo site_url('product/seller/'.str_replace(['&', ' '], ['and', '-'], strtolower($trusted_seller['company_name']))) ?>">
          <img class="" src="<?php echo $trusted_seller['logo'] ?>" style="width: 100%;"/>
          <hr/>
          <div class="card-body text-left">
            <p><?php echo ($trusted_seller['company_name']) ? $trusted_seller['company_name'] : $trusted_seller['full_name'] ?> </p>
            <p><?php //echo $this->cart->format_number($trusted_seller['price']); ?></p>
            <p>
              <?php $rating = $this->UserModel->getSellerRating($trusted_seller['seller_id']); $highest_rating = 5; $i = 0; ?>
              <?php while($i < $highest_rating){ ?>
                <?php if($rating > $i){ ?>
                  <i class="fa fa-star" style="color: gold"></i>
                <?php }else{ ?>
                  <i class="fa fa-star" style="color: black"></i>
                <?php } ?>
              <?php $i++; } ?>
            </p>
          </div>
        </a>
      </div>
      
    <?php } ?>
      <div class="col-md-2 text-center">
        <a href="<?php echo site_url('/product/seller') ?>">
        <i class="fas fa-door-open fa-8x" style="color: gold !important"></i>
          <p style="color: gold; font-weight: 600; margin: 10px; background-image: radial-gradient(circle, #6c57f8, #9581fd, #baabff, #dcd5ff, #ffffff); padding: 10px; border-radius: 5px;">Explore Market</p>
        </a>
      </div>
  </div>

</div>

<!-- Call to Action -->
<section class="call-to-action text-white text-center container-fluid" style="background: url(<?php echo site_url('/public/images/system/sys/shop.png');?>) no-repeat bottom;padding: 7em 0px 7em 0px">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-xl-12 mx-auto text-center">
        <h2 class="mb-4" style="color: white; text-shadow: 1px 2px 6px black">Ready To Sell Online? Sign up now!</h2><br/>
        <a href="<?php echo site_url('/seller/register');?>" class="btn btn-primary btn-lg text-light">Sign Up For Free</a>
      </div>
    </div>
  </div>
</section>