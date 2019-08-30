<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name = "viewport" content = "user-scalable=no, width=device-width">
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>Flexisel - A responsive jQuery Carousel</title>

<link type="text/css" rel="stylesheet" href="<?php echo site_url() ?>public/css/bootstrap.min.css"/>
<link href="<?php echo site_url() ?>public/css/style2.css" rel="stylesheet" type="text/css" />
<link href="<?php echo site_url() ?>public/css/style1.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo site_url() ?>public/css/fontawesome-all.css">
<!-- <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" > -->


<!-- web fonts -->
<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
    rel="stylesheet">
<!-- //web fonts -->

<style>
body{
    background-color: #f2f3f7;
  }

  #bgred{
    background-color: #004186;
    height: 20px;
    border-top:2px solid rgba(255, 255, 255, 0.1);
  }
  #test{
    color:#ffffff;
  }

  .mega-menu{
    width:800px;
    overflow:hidden;
    padding:10px;
  }

  /* change the link color */
  .nav-link {
      color: white !important;
  }


  /* .navbar {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    padding: 0.5rem 1rem;
} */
</style>


</head>

<body>



      <!-- top-header -->
    <div class="agile-main-top">
    <div class="container-fluid">
      <div class="row main-top-w3l py-2" style="background:#004186;">
        <div class="col-lg-3 header-most-top">
          <p class="text-white text-lg-left text-center">Offer Zone Top Deals & Discounts
            <i class="fas fa-shopping-cart ml-1"></i>
          </p>
        </div>
        <div class="col-lg-9 header-right mt-lg-0 mt-2">
          <!-- header lists -->
          <ul>
            <li class="text-center border-right text-white">
              <a class="play-icon popup-with-zoom-anim text-white" href="#small-dialog1">
                <i class="fas fa-map-marker mr-2"></i>Select Location</a>
            </li>
            <li class="text-center border-right text-white">
              <a href="#" data-toggle="modal" data-target="#exampleModal" class="text-white">
                <i class="fas fa-truck mr-2"></i>Track Order</a>
            </li>
            <li class="text-center border-right text-white">
              <i class="fas fa-phone mr-2"></i> 001 234 5678
            </li>
            <li class="text-center border-right text-white">
              <a href="<?php echo site_url('seller/login') ?>" class="text-white">
                <i class="fas fa-sign-in-alt mr-2"></i> Log In </a>
            </li>
            <li class="text-center text-white">
              <a href="<?php echo site_url('buyer/register') ?>" class="text-white">
                <i class="fas fa-sign-out-alt mr-2"></i>Register </a>
            </li>
            <li class="text-center text-white">
              <a href="<?php echo site_url('seller/register') ?>" class="text-white">
                <i class="fas fa-sign-out-alt mr-2"></i>Become a Seller </a>
            </li>
          </ul>
          <!-- //header lists -->
        </div>
      </div>
    </div>
    </div>


    <!-- header-bottom-->
<div class="header-bot" style="background:#004186;">
  <div class="container">
    <div class="row header-bot_inner_wthreeinfo_header_mid">
      <!-- logo -->
      <div class="col-md-3 logo_agile">
        <img src="<?php echo site_url() ?>public/images/logo.png" alt=" " class="img-fluid">
        <!-- <h1 class="text-center">
          <a href="index.html" class="font-weight-bold font-italic">
            <img src="<?php echo site_url() ?>public/images/logo.png" alt=" " class="img-fluid">Electro Store
          </a>
        </h1> -->
      </div>
      <!-- //logo -->
      <!-- header-bot -->
      <div class="col-md-9 header mt-4 mb-md-0 mb-4">
        <div class="row">

          <!-- search -->
          <div class="col-10 agileits_search">



            <form class="form-inline" action="#" method="post">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" required>

              <button class="btn my-2 my-sm-0" type="submit">Search</button>
            </form>
          </div>
          <!-- //search -->
          <!-- cart details -->
          <div class="col-2 top_nav_right text-center mt-sm-0 mt-2">
            <div class="wthreecartaits wthreecartaits2 cart cart box_1">
              <form action="#" method="post" class="last">
                <input type="hidden" name="cmd" value="_cart">
                <input type="hidden" name="display" value="1">
                <!-- <button class="btn w3view-cart" type="submit" name="submit" value="">
                  <i class="fas fa-cart-arrow-down"></i>
                </button> -->
              </form>
            </div>
          </div>
          <!-- //cart details -->
        </div>
      </div>
    </div>
  </div>
</div>
<!-- shop locator (popup) -->
<!-- //header-bottom -->
</div>

    </div>

    <!-- <nav class="navbar navbar-expand-sm navbar-dark" style="background-color:#004186;">
  <div class="navbar-header">
      <a class="navbar-brand" href="#">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a>
    </div>


  <div class="row">
    <div class="col-lg-3 col-sm-6 col-xs-6">
      <div class="dropdown">
        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" style="background:#ffd200;">
          <b>ALL CATEGORIES</b>
        </button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Link 1</a>
          <a class="dropdown-item" href="#">Link 2</a>
          <a class="dropdown-item" href="#">Link 3</a>
        </div>
      </div>
    </div>
  </div>


    <div class="col-lg-9 col-sm-6 col-xs-6">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button> &nbsp&nbsp&nbsp
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#" style="color:yellow;">HOME</a>
          </li>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="color:#ffffff;">
            COLLECTIONS
          </a>
          <div class="dropdown-menu mega-menu">
            <div class="row">
              <div class="col-lg-3 col-sm-3 col-xs-3">
                <u><p><b style="color:black;">WOMEN</b></p></u>
                <p><a href="#">Dress</a></p>
                <p><a href="#">necklaces</a></p>
                <p><a href="#">pearl mens</a></p>
                <p><a href="#">Shirt</a></p>

              </div>

              <div class="col-lg-3 col-sm-3 col-xs-3">
                <u><p><b style="color:black;">JEWELRY</b></p></u>
                <p><a href="#">Necklaces</a></p>
                <p><a href="#">Pearl jewelry</a></p>
                <p><a href="#">Slider 925</a></p>
              </div>
              <div class="col-lg-3 col-sm-3 col-xs-3">
                <u><p><b style="color:black;">SHOP COLLECTION</b></p></u>
                <p><a href="#">Hanet magente</a></p>
                <p><a href="#">Knage unget</a></p>
                <p><a href="#">Latenge mange</a></p>
                <p><a href="#">Punge nenune</a></p>
                <p><a href="#">Qunge genga</a></p>
                <p><a href="#">Tange manue</a></p>
              </div>
              <div class="col-lg-3 col-sm-3 col-xs-3">
                <u><p><b style="color:black;">SPORTS2</b></p></u>
                <p><a href="#">Accessories</a></p>
                <p><a href="#">Boys News</a></p>
                <p><a href="#">Computers</a></p>
                <p><a href="#">Electronics</a></p>
                <p><a href="#">Fashion</a></p>
                <p><a href="#">Girls New</a></p>
              </div>
            </div>


          </div>
        </li>


      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="color:#ffffff;">
        SHOP
        </a>
        <div class="dropdown-menu mega-menu">
          <div class="row">
            <div class="col-lg-3">
              <u><p><b style="color:black;">WOMEN</b></p></u>
              <p><a href="#">Dress</a></p>
              <p><a href="#">necklaces</a></p>
              <p><a href="#">pearl mens</a></p>
              <p><a href="#">Shirt</a></p>

            </div>

            <div class="col-lg-3">
              <u><p><b style="color:black;">JEWELRY</b></p></u>
              <p><a href="#">Necklaces</a></p>
              <p><a href="#">Pearl jewelry</a></p>
              <p><a href="#">Slider 925</a></p>
            </div>
            <div class="col-lg-3">
              <u><p><b style="color:black;">SHOP COLLECTION</b></p></u>
              <p><a href="#">Hanet magente</a></p>
              <p><a href="#">Knage unget</a></p>
              <p><a href="#">Latenge mange</a></p>
              <p><a href="#">Punge nenune</a></p>
              <p><a href="#">Qunge genga</a></p>
              <p><a href="#">Tange manue</a></p>
            </div>
            <div class="col-lg-3">
              <u><p><b style="color:black;">SPORTS2</b></p></u>
              <p><a href="#">Accessories</a></p>
              <p><a href="#">Boys News</a></p>
              <p><a href="#">Computers</a></p>
              <p><a href="#">Electronics</a></p>
              <p><a href="#">Fashion</a></p>
              <p><a href="#">Girls New</a></p>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <img src="<?php echo site_url() ?>public/images/dangote1.jpg" alt="" width="380px" class="img-responsive">
            </div>
            <div class="col-sm-6">
              <img src="<?php echo site_url() ?>public/images/dangote2.jpg" alt="" width="380px" class="img-responsive">
            </div>
          </div>


        </div>
      </li>


          <li class="nav-item">
            <a class="nav-link" href="#" id="test">BLOG</a>
          </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="color:#ffffff;">
            PAGES
          </a>
          <div class="dropdown-menu mega-menu">
            <div class="row">
              <div class="col-lg-6">


              </div>

              <div class="col-lg-6">

              </div>

            </div>


          </div>
        </li>
          <li class="nav-item">
            <a class="nav-link" href="#" id="test">MARKETPLACE</a>
          </li>
        </ul>
      </div>
    </nav>
    </div> -->




  <div class="navbar-inner" style="background-color:#004186;">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light bg-blue">
				<div class="agileits-navi_search" style="background:#ffd200;">
					<form action="#" method="post">
						<select id="agileinfo-nav_search" name="agileinfo_search" class="border" required="">
							<option value="">All Categories</option>
							<option value="Televisions">Televisions</option>
							<option value="Headphones">Headphones</option>
							<option value="Computers">Computers</option>
							<option value="Appliances">Appliances</option>
							<option value="Mobiles">Mobiles</option>
							<option value="Fruits &amp; Vegetables">Tv &amp; Video</option>
							<option value="iPad &amp; Tablets">iPad &amp; Tablets</option>
							<option value="Cameras &amp; Camcorders">Cameras &amp; Camcorders</option>
							<option value="Home Audio &amp; Theater">Home Audio &amp; Theater</option>
						</select>
					</form>
				</div>
				<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="navbar-collapse collapse" id="navbarSupportedContent" style="">
					<ul class="navbar-nav ml-auto text-center mr-xl-5">
						<li class="nav-item active mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link" href="index.html"><b style="color:#ffd200;">Home</b>
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Electronics
							</a>
							<div class="dropdown-menu">
								<div class="agile_inner_drop_nav_info p-4">
									<h5 class="mb-3">Mobiles, Computers</h5>
									<div class="row">
										<div class="col-sm-6 multi-gd-img">
											<ul class="multi-column-dropdown">
												<li>
													<a href="product.html">All Mobile Phones</a>
												</li>
												<li>
													<a href="product.html">All Mobile Accessories</a>
												</li>
												<li>
													<a href="product.html">Cases &amp; Covers</a>
												</li>
												<li>
													<a href="product.html">Screen Protectors</a>
												</li>
												<li>
													<a href="product.html">Power Banks</a>
												</li>
												<li>
													<a href="product.html">All Certified Refurbished</a>
												</li>
												<li>
													<a href="product.html">Tablets</a>
												</li>
												<li>
													<a href="product.html">Wearable Devices</a>
												</li>
												<li>
													<a href="product.html">Smart Home</a>
												</li>
											</ul>
										</div>
										<div class="col-sm-6 multi-gd-img">
											<ul class="multi-column-dropdown">
												<li>
													<a href="product.html">Laptops</a>
												</li>
												<li>
													<a href="product.html">Drives &amp; Storage</a>
												</li>
												<li>
													<a href="product.html">Printers &amp; Ink</a>
												</li>
												<li>
													<a href="product.html">Networking Devices</a>
												</li>
												<li>
													<a href="product.html">Computer Accessories</a>
												</li>
												<li>
													<a href="product.html">Game Zone</a>
												</li>
												<li>
													<a href="product.html">Software</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Appliances
							</a>
							<div class="dropdown-menu" style="display: none;">
								<div class="agile_inner_drop_nav_info p-4">
									<h5 class="mb-3">TV, Appliances, Electronics</h5>
									<div class="row">
										<div class="col-sm-6 multi-gd-img">
											<ul class="multi-column-dropdown">
												<li>
													<a href="product2.html">Televisions</a>
												</li>
												<li>
													<a href="product2.html">Home Entertainment Systems</a>
												</li>
												<li>
													<a href="product2.html">Headphones</a>
												</li>
												<li>
													<a href="product2.html">Speakers</a>
												</li>
												<li>
													<a href="product2.html">MP3, Media Players &amp; Accessories</a>
												</li>
												<li>
													<a href="product2.html">Audio &amp; Video Accessories</a>
												</li>
												<li>
													<a href="product2.html">Cameras</a>
												</li>
												<li>
													<a href="product2.html">DSLR Cameras</a>
												</li>
												<li>
													<a href="product2.html">Camera Accessories</a>
												</li>
											</ul>
										</div>
										<div class="col-sm-6 multi-gd-img">
											<ul class="multi-column-dropdown">
												<li>
													<a href="product2.html">Musical Instruments</a>
												</li>
												<li>
													<a href="product2.html">Gaming Consoles</a>
												</li>
												<li>
													<a href="product2.html">All Electronics</a>
												</li>
												<li>
													<a href="product2.html">Air Conditioners</a>
												</li>
												<li>
													<a href="product2.html">Refrigerators</a>
												</li>
												<li>
													<a href="product2.html">Washing Machines</a>
												</li>
												<li>
													<a href="product2.html">Kitchen &amp; Home Appliances</a>
												</li>
												<li>
													<a href="product2.html">Heating &amp; Cooling Appliances</a>
												</li>
												<li>
													<a href="product2.html">All Appliances</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="nav-item mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link" href="about.html">About Us</a>
						</li>
						<li class="nav-item mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link" href="product.html">New Arrivals</a>
						</li>
						<li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Pages
							</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="product.html">Product 1</a>
								<a class="dropdown-item" href="product2.html">Product 2</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="single.html">Single Product 1</a>
								<a class="dropdown-item" href="single2.html">Single Product 2</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="checkout.html">Checkout Page</a>
								<a class="dropdown-item" href="payment.html">Payment Page</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="contact.html">Contact Us</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>



  <!-- ========================= FIRST ROW SLIDER ======================================== -->

<div class="container-fluid" style="margin-top:30px">
  <div class="row">
    <div class="col-lg-12">
      <ul id="flexiselDemo1">
          <li><img src="<?php echo site_url() ?>public/images/top.jpg" /></li>
          <li><img src="<?php echo site_url() ?>public/images/top2.jpg" /></li>
          <li><img src="<?php echo site_url() ?>public/images/top3.jpg" /></li>
      </ul>
    </div>
</div>

</div>
<!-- ========================= FIRST ROW SLIDER ENDS ======================================== -->





<!-- ========================= SECOND ROW SLIDER STARTS======================================== -->
<!-- ========================================================================================== -->
<div class="container-fluid" style="margin-top:30px;">
  <div class="row">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h3>Deals Of The Days</h3>
          <div id="carouselExampleControls1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">

              <div class="carousel-item active">
                <div class="row">
                    <div class="col-6">
                      <img class="" src="<?php echo site_url('public/images/products/'.$products[0]->code.'/'.'01.jpg') ?>" width="200px"  alt="First slide">
                    </div>

                    <div class="col-6">
                      <div class="thumb-content">
                        <h4><?php echo $products[0]->name ?></h4>

                        <div class="star-rating">
                          <ul class="list-inline">
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                          </ul>
                        </div>
                        <p><?php echo $products[0]->short_description ?></p>

                        <p class="item-price">
                          <?php if($products[0]->discount_price){ ?>
                            <strike>$<?php echo $products[0]->price ?></strike> <span>$<?php echo $products[0]->discount_price ?></span>
                          <?php }else{ ?>
                            <span>$<?php echo $products[0]->price;?></span>
                          <?php } ?>
                        </p>
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                      </div>

                      <!-- here -->
                      <!-- <div class="timer_wrap">
                        <div id="counter"> </div>
                      </div>
                      <script src="<?php echo site_url() ?>public/js/jquery.countdown.js"></script>
                      <script src="<?php echo site_url() ?>public/js/script.js"></script> -->
                      <!-- here -->
                    </div>
                  </div>

                </div>

               <div class="carousel-item">
                 <div class="row">
                   <div class="col-6">
                     <img class="" src="<?php echo site_url() ?>public/images/pot.jpg" width="200px"  alt="First slide">
                   </div>

                   <div class="col-6">
                     <div class="thumb-content">
                       <h4>Apple iPad</h4>

                        <div class="star-rating">
                          <ul class="list-inline">
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                          </ul>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>

                        <p class="item-price">
                          <?php if($products[0]->discount_price){ ?>
                            <strike>$<?php echo $products[0]->price ?></strike> <span>$<?php echo $products[0]->discount_price ?></span>
                          <?php }else{ ?>
                            <span>$<?php echo $products[0]->price;?></span>
                          <?php } ?>
                        </p>
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                      </div>

                    </div>

                  </div>
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleControls1" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>

              <a class="carousel-control-next" href="#carouselExampleControls1" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
        </div>

      </div>



    </div>




    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h3>Featured Products</h3>
          <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="row">
                  <?php $i = 0; ?>
                  <?php while($i < count($products)){ ?>
                    <div class="col-4">
                      <img class="" src="<?php echo site_url('public/images/products/'.$products[$i]->code.'/'.'01.jpg') ?>" width="110px"  alt="<?php echo $products[$i]->name ?>">
                      <div class="thumb-content">
                        <h4>
                          <a href="<?php echo site_url('product/'.str_replace(['&', ' '], ['and', '-'], strtolower($products[$i]->name))) ?>">
                            <?php echo character_limiter(($products[$i]->name), 6) ?>
                          </a>
                        </h4>
      									<p class="item-price">
                        <?php if($products[$i]->discount_price){ ?>
                            <strike>$<?php echo $this->cart->format_number($products[$i]->price) ?></strike> <span>$<?php echo $products[$i]->discount_price ?></span>
                          <?php }else{ ?>
                            <span>$<?php echo $this->cart->format_number($products[$i]->price);?></span>
                          <?php } ?>
                        </p>
      									<div class="star-rating">
                          <?php $rating = $this->ProductModel->getProductRating($products[$i]->product_id); $highest_rating = 5; $ir = 0; ?>
                          <?php while($ir < $highest_rating){ ?>
                            <?php if($rating > $ir){ ?>
                              <i class="fa fa-star" style="color: gold"></i>
                            <?php }else{ ?>
                              <i class="fa fa-star" style="color: black"></i>
                            <?php } ?>
                          <?php $ir++; } ?>
      									</div>
      									<div>
                          <form msg="Adding <?php echo $products[$i]->name ?> to cart..." action="<?php echo site_url('/buyer/addtocart') ?>" method="POST">
                              <input type="hidden" name="qty" value="1"/>
                              <input type="hidden" name="name" value="<?php echo $products[$i]->name ?>"/>
                              <input type="hidden" name="owner_id" value="<?php echo $products[$i]->owner_id ?>"/>
                              <input type="hidden" name="id" value="<?php echo $products[$i]->id ?>"/>
                              <input type="hidden" name="product_id" value="<?php echo $products[$i]->product_id ?>"/>
                              <input type="hidden" name="price" value="<?php echo $products[$i]->price ?>"/>
                              <textarea class="form-control" name="oto" placeholder="Other specifications, like color, size etc in format name: value, example color: blue"></textarea>
                              <button class="btn btn-sm btn-block btn-primary">Add To Cart</button>
                          </form>
                      </div>
      								</div>
                    </div>
                  <?php
                    // echo count($products);
                    if((($i+1)%3) == 0 && ($i+1) == count($products)){
                      // echo "Condition 1 Met";
                      echo "
                          </div>
                        </div>
                      ";
                    }else if((($i+1)%3) == 0 &&  ($i+1) != count($products)){
                      // echo "Condition 2 Met";
                      echo "
                          </div>
                        </div>
                        <div class='carousel-item'>
                          <div class='row'>
                      ";
                    }else if((($i+1)%3) != 0 && ($i+1) == count($products)){
                      // echo "Condition 3 Met";
                      echo "
                          </div>
                        </div>
                      ";
                    }
                  ?>
                  <?php $i++; } ?>


              </div>
              <a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>

              <a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
        </div>

      </div>



    </div>


</div>
      <!-- row :: ends -->
</div>
<!-- end :: container-fluid -->
<!-- ========================= SECOND ROW SLIDER ENDS======================================== -->
<!-- ========================================================================================== -->





<!-- ========================= THIRD ROW SLIDER STARTS======================================== -->
<!-- ========================================================================================== -->
<div class="container-fluid" style="margin-top:50px;">
  <!-- start :: row -->
  <div class="row">
    <!-- start::column -->
    <div class="col-lg-12">
      <h3>Top Collections</h3>
      <ul id="flexiselDemo11">
          <li>
            <div class="card">
              <img class="card-img-top" src="<?php echo site_url() ?>public/images/men.png" alt="Card image" height="200px">
              <div class="card-body">
                <h4 class="card-title text-center" style="font-size:18px;">MEN</h4>
              </div>
            </div>
          </li>

          <li>
            <div class="card">
              <img class="card-img-top" src="<?php echo site_url() ?>public/images/women.png" alt="Card image" height="200px">
              <div class="card-body">
                <h4 class="card-title text-center" style="font-size:18px;">WOMEN</h4>
              </div>
            </div>
          </li>

          <li>
            <div class="card">
              <img class="card-img-top" src="<?php echo site_url() ?>public/images/men2.png" alt="Card image" height="200px">
              <div class="card-body">
                <h4 class="card-title text-center" style="font-size:18px;">FASHION</h4>
              </div>
            </div>
          </li>

          <li>
            <div class="card">
              <img class="card-img-top" src="<?php echo site_url() ?>public/images/shoe.png" alt="Card image" height="200px">
              <div class="card-body">
                <h4 class="card-title text-center" style="font-size:18px;">BOYS NEW</h4>
              </div>
            </div>
          </li>

          <li>
            <div class="card">
              <img class="card-img-top" src="<?php echo site_url() ?>public/images/access.png" alt="Card image" height="200px">
              <div class="card-body">
                <h4 class="card-title text-center" style="font-size:18px;">GIRLS NEW</h4>
              </div>
            </div>
          </li>

      </ul>


    </div>
    <!-- end::column -->
  </div>
  <!-- end:: row -->
</div>

<!-- ========================= THIRD ROW SLIDER ENDS======================================== -->
<!-- ======================================================================================= -->





<!-- ========================= FOURTH ROW SLIDER STARTS======================================== -->
<!-- ========================================================================================== -->
<div class="container-fluid" style="margin-top:30px;">
<div class="card mb-3">
 <div class="row no-gutters">

     <div class="card bg-primary col-lg-2">
       <div class="card-body text-center" style="position:absolute;top:40px;">
       <p class="card-text" style="font-size:30px; color:white;">The best of smartphone</p>
       <a href="#" class="btn btn-default bg-white">VIEW ALL</a>
     </div>

    </div>


   <div class="col-lg-10">
     <div class="card-body">
       <ul id="flexiselDemo12">
           <li>
             <img src="<?php echo site_url() ?>public/images/best.jpg"  height="200px"/>
           </li>

           <li>
             <img src="<?php echo site_url() ?>public/images/best1.jpg" height="200px"/>
           </li>

           <li>
             <img src="<?php echo site_url() ?>public/images/best3.jpg" alt="image 3" height="200px"/>
           </li>

           <li>
             <img src="<?php echo site_url() ?>public/images/best4.jpg" alt="image 4" height="200px"/>
           </li>

           <li>
             <img src="<?php echo site_url() ?>public/images/best5.jpg" alt="image 5" height="200px"/>
           </li>

           <li>
             <img src="<?php echo site_url() ?>public/images/best6.jpg" alt="image 6" height="200px"/>
           </li>

           <li>
             <img src="<?php echo site_url() ?>public/images/best7.jpg" alt="image 7" height="200px"/>
           </li>

           <li>
             <img src="<?php echo site_url() ?>public/images/best8.jpg"  alt="image 8" height="200px"/>
           </li>
       </ul>
     </div>
   </div>
 </div>
</div>
</div>
<!-- ========================= FOURTH ROW SLIDER ENDS======================================== -->
<!-- ========================================================================================== -->




<!-- ========================= FIFTH ROW SLIDER STARTS======================================== -->
<!-- ========================================================================================== -->
<div class="container-fluid" style="margin-top:30px;">
<div class="card mb-3">
 <div class="row no-gutters">

     <div class="card bg-primary col-lg-2">
       <div class="card-body text-center" style="position:absolute;top:40px;">
        <p class="card-text" style="font-size:30px; color:white;">Products Categories</p>
        <a href="#" class="btn btn-default bg-white">VIEW ALL</a>
      </div>

    </div>


   <div class="col-lg-10">
     <div class="card-body">
       <ul id="flexiselDemo13">
         <?php foreach($categories as $category){ ?>
           <li class="loadInModal">
            <a href="<?php echo site_url('/product/category/'.strtolower(str_replace(' ', '-', $category->name))) ?>">
              <img src="<?php echo site_url('public/images/system/categories/'.strtolower(str_replace(' ', '-', $category->name)).'.jpg') ?>"  height="200px"/>
            </a>
           </li>
         <?php } ?>
       </ul>
     </div>
   </div>
 </div>
</div>
</div>
<!-- ========================= FIFTH ROW SLIDER ENDS======================================== -->
<!-- ========================================================================================== -->




<!-- ========================= SIXTH ROW SLIDER STARTS======================================== -->
<!-- ========================================================================================== -->
<div class="container-fluid" style="margin-top:30px;">
<div class="card mb-3">
 <div class="row no-gutters">

     <div class="card col-lg-2" style="background:#fd7b7b">
       <div class="card-body text-center" style="position:absolute;top:40px;">
          <p class="card-text" style="font-size:30px; color:white;">Fashion & Jewelry</p>
          <a href="#" class="btn btn-default bg-white">VIEW ALL</a>
        </div>

    </div>


   <div class="col-lg-10">
     <div class="card-body">
       <ul id="flexiselDemo14">
         <?php foreach($products as $product){ ?>
           <li>
             <img src="<?php echo site_url('public/images/products/'.$product->code.'/'.'01.jpg') ?>"  height="200px"/>
           </li>
         <?php } ?>

           <!-- <li>
             <img src="<?php echo site_url() ?>public/images/car1.jpg" height="200px"/>
           </li>

           <li>
             <img src="<?php echo site_url() ?>public/images/car2.jpg" alt="image 3" height="200px"/>
           </li>

           <li>
             <img src="<?php echo site_url() ?>public/images/car3.jpg" alt="image 4" height="200px"/>
           </li>

           <li>
             <img src="<?php echo site_url() ?>public/images/car4.jpg" alt="image 5" height="200px"/>
           </li>

           <li>
             <img src="<?php echo site_url() ?>public/images/car5.jpg" alt="image 6" height="200px"/>
           </li>

           <li>
             <img src="<?php echo site_url() ?>public/images/car6.jpg" alt="image 7" height="200px"/>
           </li>

           <li>
             <img src="<?php echo site_url() ?>public/images/car7.jpg"  alt="image 8" height="200px"/>
           </li> -->
       </ul>
     </div>
   </div>
 </div>
</div>
</div>
<!-- ========================= SIXTH ROW SLIDER ENDS======================================== -->
<!-- ========================================================================================== -->



<!-- ========================= seventh ROW SLIDER ======================================== -->

<div class="container-fluid" style="margin-top:30px; margin-bottom:30px;">
<div class="row">
  <div class="col-lg-12">
    <ul id="flexiselDemo15">
        <li><img src="<?php echo site_url() ?>public/images/film.jpg" /></li>
        <li><img src="<?php echo site_url() ?>public/images/film1.jpg" /></li>
        <li><img src="<?php echo site_url() ?>public/images/film2.jpg" /></li>
        <li><img src="<?php echo site_url() ?>public/images/film3.jpg" /></li>
        <li><img src="<?php echo site_url() ?>public/images/film4.jpg" /></li>
        <li><img src="<?php echo site_url() ?>public/images/film5.jpg" /></li>
    </ul>
  </div>
</div>

</div>

<!-- ========================= seventh ROW SLIDER ENDS ======================================== -->





<!-- ============================================================================ -->
<!-- START :: FOOTER -->
<!-- ============================================================================ -->
<!-- <div class="jumbotron text-center" style="margin-top:30px; margin-bottom:0px; background-color:white; height:200px;">
  <p>Footer</p>
</div> -->
<!-- ============================================================================ -->
<!-- END :: FOOTER -->
<!-- ============================================================================ -->


<div class="w3l-middlefooter-sec">
			<div class="container py-md-5 py-sm-4 py-3">
				<div class="row footer-info w3-agileits-info">
					<!-- footer categories -->
					<div class="col-md-3 col-sm-6 footer-grids">
						<h3 class="text-white font-weight-bold mb-3">Categories</h3>
						<ul>
							<li class="mb-3">
								<a href="product.html">Mobiles </a>
							</li>
							<li class="mb-3">
								<a href="product.html">Computers</a>
							</li>
							<li class="mb-3">
								<a href="product.html">TV, Audio</a>
							</li>
							<li class="mb-3">
								<a href="product2.html">Smartphones</a>
							</li>
							<li class="mb-3">
								<a href="product.html">Washing Machines</a>
							</li>
							<li>
								<a href="product2.html">Refrigerators</a>
							</li>
						</ul>
					</div>
					<!-- //footer categories -->
					<!-- quick links -->
					<div class="col-md-3 col-sm-6 footer-grids mt-sm-0 mt-4">
						<h3 class="text-white font-weight-bold mb-3">Quick Links</h3>
						<ul>
							<li class="mb-3">
								<a href="about.html">About Us</a>
							</li>
							<li class="mb-3">
								<a href="contact.html">Contact Us</a>
							</li>
							<li class="mb-3">
								<a href="help.html">Help</a>
							</li>
							<li class="mb-3">
								<a href="faqs.html">Faqs</a>
							</li>
							<li class="mb-3">
								<a href="terms.html">Terms of use</a>
							</li>
							<li>
								<a href="privacy.html">Privacy Policy</a>
							</li>
						</ul>
					</div>
					<div class="col-md-3 col-sm-6 footer-grids mt-md-0 mt-4">
						<h3 class="text-white font-weight-bold mb-3">Get in Touch</h3>
						<ul>
							<li class="mb-3">
								<i class="fas fa-map-marker"></i> 123 Sebastian, USA.</li>
							<li class="mb-3">
								<i class="fas fa-mobile"></i> 333 222 3333 </li>
							<li class="mb-3">
								<i class="fas fa-phone"></i> +222 11 4444 </li>
							<li class="mb-3">
								<i class="fas fa-envelope-open"></i>
								<a href="mailto:example@mail.com"> mail 1@example.com</a>
							</li>
							<li>
								<i class="fas fa-envelope-open"></i>
								<a href="mailto:example@mail.com"> mail 2@example.com</a>
							</li>
						</ul>
					</div>
					<div class="col-md-3 col-sm-6 footer-grids w3l-agileits mt-md-0 mt-4">
						<!-- newsletter -->
						<h3 class="text-white font-weight-bold mb-3">Newsletter</h3>
						<p class="mb-3">Free Delivery on your first order!</p>
						<form action="#" method="post">
							<div class="form-group">
								<input type="email" class="form-control" placeholder="Email" name="email" required="">
								<input type="submit" value="Go">
							</div>
						</form>
						<!-- //newsletter -->
						<!-- social icons -->
						<div class="footer-grids  w3l-socialmk mt-3">
							<h3 class="text-white font-weight-bold mb-3">Follow Us on</h3>
							<div class="social">
								<ul>
									<li>
										<a class="icon fb" href="#">
											<i class="fab fa-facebook-f"></i>
										</a>
									</li>
									<li>
										<a class="icon tw" href="#">
											<i class="fab fa-twitter"></i>
										</a>
									</li>
									<li>
										<a class="icon gp" href="#">
											<i class="fab fa-google-plus-g"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<!-- //social icons -->
					</div>
				</div>
				<!-- //quick links -->
			</div>
		</div>

    <!-- ==========================================second segment ==================================-->
    <div class="agile-sometext py-md-5 py-sm-4 py-3">
			<div class="container">
				<!-- brands -->
				<div class="sub-some">
					<h5 class="font-weight-bold mb-2">Mobile &amp; Tablets :</h5>
					<ul>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">Android Phones</a>
						</li>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">Smartphones</a>
						</li>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">Feature Phones</a>
						</li>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">Unboxed Phones</a>
						</li>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">Refurbished Phones</a>
						</li>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2"> Tablets</a>
						</li>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">CDMA Phones</a>
						</li>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">Value Added Services</a>
						</li>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">Sell Old</a>
						</li>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">Used Mobiles</a>
						</li>
					</ul>
				</div>
				<div class="sub-some mt-4">
					<h5 class="font-weight-bold mb-2">Computers :</h5>
					<ul>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">Laptops </a>
						</li>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">Printers</a>
						</li>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">Routers</a>
						</li>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">Ink &amp; Toner Cartridges</a>
						</li>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">Monitors</a>
						</li>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">Video Games</a>
						</li>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">Unboxed &amp; Refurbished Laptops</a>
						</li>
						<li>
							<a href="product.html" class="border-right pr-2">Assembled Desktops</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Data Cards</a>
						</li>
					</ul>
				</div>
				<div class="sub-some mt-4">
					<h5 class="font-weight-bold mb-2">TV, Audio &amp; Large Appliances :</h5>
					<ul>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">TVs &amp; DTH</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Home Theatre Systems</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Hidden Cameras &amp; CCTVs</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Refrigerators</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Washing Machines</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2"> Air Conditioners</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Cameras</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Speakers</a>
						</li>
					</ul>
				</div>
				<div class="sub-some mt-4">
					<h5 class="font-weight-bold mb-2">Mobile &amp; Laptop Accessories :</h5>
					<ul>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Headphones</a>
						</li>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">Power Banks </a>
						</li>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">Backpacks</a>
						</li>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">Mobile Cases &amp; Covers</a>
						</li>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">Pen Drives</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">External Hard Disks</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2"> Mouse</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Smart Watches &amp; Fitness Bands</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">MicroSD Cards</a>
						</li>
					</ul>
				</div>
				<div class="sub-some mt-4">
					<h5 class="font-weight-bold mb-2">Appliances :</h5>
					<ul>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Trimmers</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Hair Dryers</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Emergency Lights</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Water Purifiers </a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Electric Kettles</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Hair Straighteners</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Induction Cooktops</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Sewing Machines</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2"> Geysers</a>
						</li>
					</ul>
				</div>
				<div class="sub-some mt-4">
					<h5 class="font-weight-bold mb-2">Popular on Electro Store</h5>
					<ul>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">Offers &amp; Coupons</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Couple Watches</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Gas Stoves</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2"> Air Coolers</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Air Purifiers</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Headphones</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2"> Headsets</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Pressure Cookers</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Sandwich Makers</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Air Friers</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Irons</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">LED TV</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Sandwich Makers</a>
						</li>
					</ul>
				</div>
				<!-- //brands -->
				<!-- payment -->
				<div class="sub-some child-momu mt-4">
					<h5 class="font-weight-bold mb-3">Payment Method</h5>
					<ul>
						<li>
							<img src="<?php echo site_url() ?>public/images/pay2.png" alt="">
						</li>
						<li>
							<img src="<?php echo site_url() ?>public/images/pay5.png" alt="">
						</li>
						<li>
							<img src="<?php echo site_url() ?>public/images/pay1.png" alt="">
						</li>
						<li>
							<img src="<?php echo site_url() ?>public/images/pay4.png" alt="">
						</li>
						<li>
							<img src="<?php echo site_url() ?>public/images/pay6.png" alt="">
						</li>
						<li>
							<img src="<?php echo site_url() ?>public/images/pay3.png" alt="">
						</li>
						<li>
							<img src="<?php echo site_url() ?>public/images/pay7.png" alt="">
						</li>
						<li>
							<img src="<?php echo site_url() ?>public/images/pay8.png" alt="">
						</li>
						<li>
							<img src="<?php echo site_url() ?>public/images/pay9.png" alt="">
						</li>
					</ul>
				</div>
				<!-- //payment -->
			</div>
		</div>
    <!-- ==========================================second segment ==================================-->


    <!-- =====================================third segment=======================================-->
    <div class="copy-right py-3">
		<div class="container">
			<p class="text-center text-white">© 2018 Electro Store. All rights reserved | Design by
				<a href="http://w3layouts.com"> W3layouts.</a>
			</p>
		</div>
	</div>
    <!-- =====================================third segment=======================================-->













<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>

<script type="text/javascript" src="<?php echo site_url() ?>public/js/jquery.flexisel.js"></script>
  <script src="<?php echo site_url() ?>public/js/popper.min.js"></script>
  <script src="<?php echo site_url() ?>public/js/bootstrap.min.js"></script>


<script type="text/javascript">

$(window).load(function() {
    $("#flexiselDemo1").flexisel(
      {
          visibleItems: 1,
          itemsToScroll: 1,
          autoPlay: {
              enable: true,
              interval: 11000,
              pauseOnHover: true
          },
          responsiveBreakpoints: {
              portrait: {
                  changePoint:480,
                  visibleItems: 1,
                  itemsToScroll: 1
              },
              landscape: {
                  changePoint:640,
                  visibleItems: 1,
                  itemsToScroll: 1
              },
              tablet: {
                  changePoint:768,
                  visibleItems: 1,
                  itemsToScroll: 1
              }
          },
      }
    );

    $("#flexiselDemo2").flexisel({
        visibleItems: 4,
        itemsToScroll: 3,
        animationSpeed: 200,
        infinite: true,
        navigationTargetSelector: null,
        autoPlay: {
            enable: false,
            interval: 4000,
            pauseOnHover: true
        },
        responsiveBreakpoints: {
            portrait: {
                changePoint:480,
                visibleItems: 1,
                itemsToScroll: 1
            },
            landscape: {
                changePoint:640,
                visibleItems: 2,
                itemsToScroll: 2
            },
            tablet: {
                changePoint:768,
                visibleItems: 3,
                itemsToScroll: 3
            }
        },
        loaded: function(object) {
            console.log('Slider loaded...');
        },
        before: function(object){
            console.log('Before transition...');
        },
        after: function(object) {
            console.log('After transition...');
        },
        resize: function(object){
            console.log('After resize...');
        }
    });

    $("#flexiselDemo3").flexisel({
        visibleItems: 3,
        itemsToScroll: 1,
        autoPlay: {
            enable: true,
            interval: 6000,
            pauseOnHover: true
        }
    });

    $("#flexiselDemo4").flexisel({
        infinite: false
    });

    $("#flexiselDemo11").flexisel(
      {
          visibleItems: 5,
          itemsToScroll: 1,
          // autoPlay: {
          //     enable: true,
          //     interval: 5000,
          //     pauseOnHover: true
          // }
      }
    );

    $("#flexiselDemo12").flexisel(
      {
          visibleItems: 5,
          itemsToScroll: 1,
          autoPlay: {
              enable: true,
              interval: 8000,
              pauseOnHover: true
          }
      }
    );

    $("#flexiselDemo13").flexisel(
      {
          visibleItems: 5,
          itemsToScroll: 1,
          autoPlay: {
              enable: true,
              interval: 10000,
              pauseOnHover: true
          }
      }
    );

    $("#flexiselDemo14").flexisel(
      {
          visibleItems: 5,
          itemsToScroll: 1,
          autoPlay: {
              enable: true,
              interval: 9000,
              pauseOnHover: true
          }
      }
    );

    $("#flexiselDemo15").flexisel(
      {
          visibleItems: 5,
          itemsToScroll: 1,
          autoPlay: {
              enable: true,
              interval: 7000,
              pauseOnHover: true
          }
      }
    );

});


$(document).ready(function(){
  $(".dropdown").hover(
      function() {
          $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("400");
          $(this).toggleClass('open');
      },
      function() {
          $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("400");
          $(this).toggleClass('open');
      }
  );
});
</script>


</body>
</html>
