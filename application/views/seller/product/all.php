

  <div id="wrapper">

<!-- Sidebar -->
<?php include APPPATH.'/views/layouts/admin/side_nav.php' ?>

<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?php echo site_url('/'.$this->session->userdata('user')->acct_type.'/product/all') ?>">Products</a>
      </li>
      <li class="breadcrumb-item active">Overview</li>
    </ol>

    <!-- DataTables Example -->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-product"></i>
        All Products <a href="<?php echo site_url('/seller/product/create'); ?>" style="float: right" class="btn btn-sm btn-primary">New <span class="fa fa-plus"></span></a></div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Owner</th>
                <th>Code</th>
                <th>Category</th>
                <th>Price</th>
                <th>Views</th>
                <th>Created At</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Owner</th>
                <th>Code</th>
                <th>Category</th>
                <th>Price</th>
                <th>Views</th>
                <th>Created At</th>
                <th>Actions</th>
              </tr>
            </tfoot>
            <tbody>
            <?php foreach($seller_product as $product){ ?>
              <tr>
                <td><?php echo character_limiter($product['name'], 10) ?></td>
                <td><img style="height: 50px; width: 50px" src="<?php echo site_url('/public/images/products/'.$product['code'].'/01.jpg') ?>"/></td>
                <td><?php echo $this->UserModel->getUserBy('user_id', $product['owner_id'])['full_name']; ?></td>
                <td><?php echo $product['code']; ?></td>
                <td><?php echo $this->SubCategoryModel->getSubCategory($product['category_id'])['name'] ?></td>
                <td><?php echo $this->cart->format_number($product['price']) ?></td>
                <td><?php echo $product['views'] ?></td>
                <td><?php echo Carbon\Carbon::create($product['created_at'])->diffForHumans(); ?></td>
                <td>
                    <a class="btn btn-sm btn-primary" href="<?php echo site_url('/'.$this->session->userdata('user')->loggedinas.'/product/view/'.$product['code']) ?>"><i class="fas fa-eye"></i></a>
                    <a class="btn btn-sm btn-warning" href="<?php echo site_url("/".$this->session->userdata('user')->loggedinas."/product/edit/".$product['code']) ?>"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-sm btn-danger delete_btn" href="<?php echo site_url("/".$this->session->userdata('user')->loggedinas."/product/delete/".$product['code']) ?>"><i class="fas fa-trash"></i></a>
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