<br/>
    
  <!-- Footer -->
  <hr style="height: 2px; background-color: gold"/>
  <footer class="footer" style="background-color: white !important">
    <div class="container">
      <div class="row">
        <div class="col-lg-2">
          <a href="<?php echo site_url() ?>"><img src="<?php echo site_url('public/images/system/sys/logo.png') ?>" style="width: 100%"/></a>
        </div>
        <div class="col-lg-4 h-100 text-left text-lg-left my-auto">
          <h5>Usefull Links</h5><hr/>
          <ul class="list-inline mb-2">
            <li class="list-inline-item">
              <a href="<?php echo site_url('about') ?>">About</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="<?php echo site_url('faq') ?>">FAQ</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="<?php echo site_url('t_and_c') ?>">Terms of Use</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="<?php echo site_url('privacy') ?>">Privacy Policy</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="<?php echo site_url('/seller/register') ?>">Become a Seller</a>
            </li>
          </ul>
          <hr/>
        </div>

        <div class="col-lg-3 h-100 text-left text-lg-left my-auto">
          <h5>My Account</h5><hr/>
          <ul class="list-inline mb-2">
            <?php if($this->session->userdata('user')){ ?>
              <li class="list-inline-item">
                <a href="<?php echo site_url($this->session->userdata('user')->loggedinas.'/home') ?>">Dashboard</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="<?php echo site_url('account/logout') ?>">Logout</a>
              </li>
            <?php }else{ ?>
              <li class="list-inline-item">
                <a href="<?php echo site_url('buyer/login') ?>">Login</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="<?php echo site_url('buyer/register') ?>">Register</a>
              </li>
            <?php } ?>
          </ul>
          <hr/>
        </div>

        <div class="col-lg-3 h-100 text-left text-lg-right my-auto">
          <h5>Follow Us</h5><hr/>
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
          <hr/>
        </div>
      </div>
    </div>
    <p class="small mb-4 mb-lg-0 bg-dark text-center">&copy; <?php echo date('Y'); ?> Your Website 2019. All Rights Reserved. White Market</p>
  </footer>
</body>

</html>


    <button class="btn btn-sm btn-success" id="goup" style="display: none; position: fixed; bottom: 10px; right: 10px;"><span class="fa fa-caret-up"></span></button>
    
    <script src="<?php echo site_url('public/js/jquery.min.js')?>"></script>
    <script src="<?php echo site_url('public/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo site_url('public/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
    <script src="<?php echo site_url('public/vendor/notify/notify.min.js') ?>"></script>
    <script src="<?php echo site_url('public/js/main.js')?>"></script>
    <script src="<?php echo site_url('public/js/slider.js')?>"></script>
    <script src="<?php echo site_url('public/js/product_image.js')?>"></script>
    <script src="<?php echo site_url('public/js/search.js')?>"></script>
    <script src="<?php echo site_url('public/js/forms.js')?>"></script>
    

    <?php include 'forms.php'; ?>
</body>
</html>