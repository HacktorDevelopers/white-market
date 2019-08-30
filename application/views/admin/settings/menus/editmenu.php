

  <div id="wrapper">

<!-- Sidebar -->
<?php include APPPATH.'/views/layouts/admin/side_nav.php' ?>

<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?php echo site_url('/admin/product/all') ?>">Settings Menu</a>
      </li>
      <li class="breadcrumb-item active">Edit Menu</li>
    </ol>

    <!-- DataTables Example -->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-product"></i>
        <?php echo $men->name ?></div>
      <div class="card-body">
        <div class="row">
            <div class="col-md-4 offset-4">
                <form class="form" action="<?php echo site_url('/admin/settings/menus/update') ?>" method="POST" msg="Updating Activity Log">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Menu Display Name" value="<?php echo $men->name ?>"/>
                        <input type="hidden" name="id" value="<?php echo $men->id ?>"/>
                    </div>

                    <div class="form-group">
                        <input type="text" name="url" class="form-control" placeholder="Menu url" value="<?php echo $men->url ?>"/>
                    </div>

                    <div class="form-group">
                        <input type="text" name="fafa" class="form-control" placeholder="Icon: font awesome icon: fa-exit" value="<?php echo $men->fafa ?>"/>
                    </div>

                    <div class="form-group">
                        <input type="text" name="acct_type" class="form-control" placeholder="admin,seller,buyer" value="<?php echo $men->acct_type ?>"/>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-block btn-primary" value="Update Menu"/>
                    </div>
                </form>
            </div>
        </div>
      </div>
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>

  </div>
