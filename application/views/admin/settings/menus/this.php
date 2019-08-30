
<?php
    $submens = $this->db->where('menu_id', $men->id)->get('submenu')->result();
?>
  <div id="wrapper">

<!-- Sidebar -->
<?php include APPPATH.'/views/layouts/admin/side_nav.php' ?>

<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?php echo site_url('/admin/settings/menus') ?>">Settings</a>
      </li>
      <li class="breadcrumb-item active">#<?php echo $men->id ?></li>
    </ol>

    <!-- DataTables Example -->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-product"></i>
        <?php echo $men->name ?> <a href="#" style="float: right" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#newSubMenu"> <span class="fa fa-plus"></span> New</a> &nbsp;
        
      </div>
      <div class="card-body">
      <div class="table-responsive">
          <table class="table table-bordered table-responsive" id="dataTable" style="width:100%" cellspacing="0">
            <thead>
              <tr>
                <th>Name</th>
                <th>Url</th>
                <th>Created At</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Name</th>
                <th>Url</th>
                <th>Created At</th>
                <th>Actions</th>
              </tr>
            </tfoot>
            <tbody>
            <?php foreach($submens as $menu){ ?>
              <tr>
                <td><?php echo $menu->name ?></td>
                <td><?php echo character_limiter($menu->url, 60); ?></td>
                <td><?php echo Carbon\Carbon::create($menu->created_at)->diffForHumans(); ?></td>
                <td>
                    
                    <a class="btn btn-sm btn-warning" href="<?php echo site_url('/admin/settings/submenu/edit/'.$menu->id) ?>"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-sm btn-danger delete_btn" href="<?php echo site_url('/admin/settings/submenu/delete/'.$menu->id) ?>"><i class="fa fa-trash"></i></a>
                    <!--<a class="btn btn-sm btn-warning" href="<?php //echo site_url('/admin/menu/edit/'.$menu->id) ?>"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-sm btn-danger delete_btn" href="<?php //echo site_url('/admin/menu/delete/'.$menu->id) ?>"><i class="fa fa-trash"></i></a>-->
                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
