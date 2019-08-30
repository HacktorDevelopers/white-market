<div class="container-fluid header" id="header">
    <div class="row usefull_links info_links">
        <a class="col" href="<?php echo site_url('about')?>"><span class="fa fa-phone-alt"></span> &nbsp;+2348052845262</a> |
        <a class="col" href="<?php echo site_url('faq')?>"><span class="fas fa-envelope"></span>&nbsp;kabirtoyyib19@gmail.com</a> |
        <a class="col" style="float: right; font-weight: bold" href="<?php echo site_url('/seller/register') ?>">Become a Seller</a> 
        <a class="col" style="float: right; font-weight: bold" href="<?php echo site_url('/seller/register') ?>">Register&nbsp;&nbsp;</a>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-2">
            <div id="logo" class="align-middle text-center">
                <a href="<?php echo site_url() ?>">
                    <img src="<?php echo site_url('/public/images/system/sys/logo.png') ?>" style="height:50px;"/>
                </a>
            </div>
        </div>
        <div class="col-md-6 text-center">
            <form class="form row" id="search-bar" action="<?php echo site_url('/product/search') ?>">
                <div class="form-group col-md-12 text-left" style="display: flex;">
                    <input class="form-control" type="search" placeholder="Search for product, category, brand/seller" name="keyword" id="keyword" value="<?php if(isset($key)) echo $key ?>">
                    <button class="btn btn-sm bg-gold"><span class="fa fa-search"></span></button>
                </div>
            </form>
        </div>

        <div class="col-md-4 text-center" id="header-right">
            
            <div class="btn-group">
                <button type="button" class="btn btn-success dropdown-toggle" id="acct_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user"></i> My Account
                </button>
                <div class="dropdown-menu" arial-lebelledby="acct_dropdown">
                    <?php if($this->session->userdata('user')){ ?>
                        <a class="dropdown-item" href="<?php echo site_url('/'.$this->session->userdata('user')->loggedinas.'/home') ?>">Dashboard</a>
                        <a class="dropdown-item" href="<?php echo site_url('/account/logout') ?>">Logout</a>
                    <?php }else{ ?>
                        <a class="col ajax dropdown-item" href="<?php echo site_url('buyer/login') ?>">Login</a> or
                        <a class="col ajax dropdown-item" href="<?php echo site_url('buyer/register') ?>">Register</a>
                    <?php } ?>
                </div>
            </div>

            <div class="btn-group">
                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-shopping-cart"></i> My Cart (<?php echo $this->cart->total_items() ?>)
                </button>
                <div class="dropdown-menu">
                    <?php if($this->cart->total_items() > 0){ ?>
                        <?php foreach($this->cart->contents() as $item){ ?>
                            <p><?php echo $item['name'] ?></p>
                            <hr/>
                        <?php } ?>
                        <a class="btn btn-block btn-primary text-danger" href="<?php echo site_url('buyer/cart/my_cart') ?>"> View Full Cart</a>
                    <?php }else{ ?>
                        <p class="alert alert-warning">You do not have any item in your cart</p>
                    <?php } ?>
                </div>
            </div>

            <div class="btn-group">
                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-question-circle"></i> Help?
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ask">Ask Question</a> 
                    <a class="dropdown-item" href="<?php echo site_url('faq') ?>">Frequently asked questioins</a>
                    <a class="dropdown-item" href="#">08052845161</a>
                    <a class="dropdown-item" href="#">whitemarket@gmail.com</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a>
                </div>
            </div>


        </div>
    </div>
</div>

