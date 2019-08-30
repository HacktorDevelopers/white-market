

  <div id="wrapper">

<!-- Sidebar -->
<?php include APPPATH.'/views/layouts/admin/side_nav.php' ?>

<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?php echo site_url('/admin/seller') ?>">Sellers</a>
      </li>
      <li class="breadcrumb-item active">Overview</li>
    </ol>

    <!-- DataTables Example -->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-product"></i>
        All Sellers <a href="<?php echo site_url('/admin/seller/create') ?>" style="float: right" class="btn btn-sm btn-primary">New <span class="fa fa-plus"></span></a></div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-responsive" id="dataTable" style="width:100%" cellspacing="0">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Image</th>
                <th>Company/Brand Name</th>
                <th>Number of products</th>
                <th>Created At</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Image</th>
                <th>Company/Brand Name</th>
                <th>Number of products</th>
                <th>Created At</th>
                <th>Actions</th>
              </tr>
            </tfoot>
            <tbody>
            <?php foreach($sellers as $seller){ ?>
              <tr>
                <td><?php echo $seller->full_name ?></td>
                <td><?php echo $seller->email ?></td>
                <td><img style="height: 50px; width: 50px" src="<?php echo $seller->image ?>"/></td>
                <td><?php echo character_limiter($seller->company_name, 60); ?></td>
                <td><?php echo count($this->ProductModel->getProductsBy('owner_id',$seller->user_id)); ?></td>
                <td><?php echo Carbon\Carbon::create($seller->created_at)->diffForHumans(); ?></td>
                <td>
                    <a class="btn btn-sm btn-primary" href="<?php echo site_url('/admin/seller/view/'.$seller->user_id) ?>"><i class="fas fa-eye"></i></a>
                    <a class="btn btn-sm btn-warning" href="<?php echo site_url('/admin/seller/edit/'.$seller->user_id) ?>"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-sm btn-danger delete_btn" href="<?php echo site_url('/admin/seller/delete/'.$seller->user_id) ?>"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>

  </div>
