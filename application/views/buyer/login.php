<div class="container-fluid">
  <div class="row no-gutter">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center">
              <img style="height: 70px; width: 150px;" src="<?php echo site_url('public/images/system/sys/logo.png') ?>"/>
            </div>
            <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="login-heading mb-4 text-center">Welcome back!</h3>
              <form class="form" action="<?php echo site_url('/account/login') ?>" method="POST" msg="Logging In">
                <div class="form-group">
                  <label for="">Email address</label>
                  <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
                  <input type="hidden" name="acct_type" class="form-control" value="buyer" readonly>
                </div>

                <div class="form-group">
                  <label for="">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>

                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">Remember password</label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Sign in</button>
                <div class="text-center">
                  <a class="small" href="#">Forgot password?</a> | 
                  <a class="small" href="<?php echo site_url('buyer/register') ?>">Dont have an account? Register</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>