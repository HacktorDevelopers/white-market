

  <div id="wrapper">

<!-- Sidebar -->
<?php include APPPATH.'/views/layouts/admin/side_nav.php' ?>

<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?php echo site_url('/admin/settings/menus') ?>">Settings Menu SubMenu</a>
      </li>
      <li class="breadcrumb-item active">Edit Sub Menu</li>
    </ol>

    <!-- DataTables Example -->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-product"></i>
        <?php echo $submen->name ?>  <?php echo $submen->url ?>
        </div>
      <div class="card-body">
        <div class="row">
            <div class="col-md-4 offset-4">
                <form class="form" action="<?php echo site_url('/admin/settings/submenu/update') ?>" method="POST" msg="Updating Sub Menu...">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Menu Display Name" value="<?php echo $submen->name ?>"/>
                        <input type="hidden" name="id" value="<?php echo $submen->id ?>"/>
                    </div>

                    <div class="form-group">
                        <input type="text" name="url" class="form-control" placeholder="Menu url" value="<?php echo $submen->url ?>"/>
                    </div>

                    <div class="form-group">
                        <select name="menu_id" class="form-control">
                            <option seleted disables>Select menu</option>
                            <?php foreach($menues as $menu){ ?>
                                <option <?php echo ($menu->id == $submen->menu_id) ? 'selected' : ''; ?> value="<?php echo $menu->id ?>"><?php echo $menu->name?> &gt; <?php echo $menu->acct_type?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-block btn-primary" value="Create Menu"/>
                    </div>
                </form>
            </div>
        </div>
      </div>
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>

  </div>
