

<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="loginTitle">Login</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form class="form" action="<?php echo site_url('/account/login') ?>" method="POST" msg="Login in progress...">
              <div class="form-group">
                  <input type="email" placeholder="Email" name="email" class="form-control"/>
              </div>
              <div class="form-group">
                  <input type="password" placeholder="Password" name="password" class="form-control"/>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Login</button>
              </div>
          </form>
          <p>Don't have an account? <a href="#" class="ajax" data-dismiss="modal" data-toggle="modal" data-target="#register" onclick="document.getElementById('login').style.display = 'none'">Register</a></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="loginTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="loginTitle">Register</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form class="form" action="<?php echo site_url('/account/register') ?>" method="POST" msg="Registration in progress...">
              <div class="form-group">
                  <input type="text" placeholder="Full Name" name="full_name" class="form-control"/>
              </div>

              <div class="form-group">
                  <input type="email" placeholder="Email" name="email" class="form-control"/>
                  <input type="hidden" placeholder="Email" name="acct_type" class="form-control" value="buyer"/>
              </div>

              <div class="form-group">
                  <input type="password" placeholder="Password" name="password" class="form-control"/>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Register</button>
              </div>
          </form>
          <p>Aready have an account? <a href="#" class="ajax" data-dismiss="modal" data-toggle="modal" data-target="#login" onclick="document.getElementById('register').style.display = 'none'">Login</a></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        
      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="registerasbuyer" tabindex="-1" role="dialog" aria-labelledby="loginTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="loginTitle">Become a Seller</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form class="form" action="<?php echo site_url('/account/register') ?>" method="POST" msg="Registration in progress...">
              <div class="form-group">
                  <input type="text" placeholder="Full Name" name="full_name" class="form-control"/>
              </div>

              <div class="form-group">
                  <input type="email" placeholder="Email" name="email" class="form-control"/>
                  <input type="hidden" placeholder="Email" name="acct_type" class="form-control" value="seller"/>
              </div>

              <div class="form-group">
                  <input type="password" placeholder="Password" name="password" class="form-control"/>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Register</button>
              </div>
          </form>
          <p>Aready have an account? <a href="#" class="ajax" data-dismiss="modal" data-toggle="modal" data-target="#login" onclick="document.getElementById('register').style.display = 'none'">Login</a></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        
      </div>
    </div>
  </div>
</div>





<div class="modal fade" id="ask" tabindex="-1" role="dialog" aria-labelledby="loginTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="loginTitle">Ask your question here</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form class="form">
              <div class="form-group">
                  <input type="email" placeholder="Email" name="email" class="form-control"/>
              </div>
              <div class="form-group">
                  <textarea class="form-control" placeholder="Your question here"></textarea>
              </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Send</button>
      </div>
    </div>
  </div>
</div>

<!-- <script src="<?php //echo site_url('public/js/forms.js') ?>">
</script> -->