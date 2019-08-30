<?php $latest_products = $this->db->order_by('created_at', 'DESC')->get('products')->result_array(); ?>

  <div id="wrapper">

    <!-- Sidebar -->
    <?php include APPPATH.'/views/layouts/admin/side_nav.php' ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <?php include APPPATH.'/views/layouts/admin/dashtabs.php' ?>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fab fa-product-hunt"></i>
            Recent Products</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Created At</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Created At</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php foreach($latest_products as $latest_product){ ?>
                    <?php $images = array_diff(scandir(APPPATH.'../public/images/products/'.$latest_product['code']), ['.', '..']); ?>
                  <tr>
                    <td><?php echo $latest_product['name'] ?></td>
                    <td><img style="height: 100px; width: 100px;" src="<?php echo site_url('/public/images/products/'.$latest_product['code'].'/'.$images[2]) ?>" /></td>
                    <td><?php echo $this->cart->format_number($latest_product['price']) ?></td>
                    <td><?php echo $this->SubCategoryModel->getSubCategory($latest_product['category_id'])['name'] ?></td>
                    <td><?php echo Carbon\Carbon::create($latest_product['created_at'])->diffForHumans(); ?></td>
                    <td>
                      <a class="btn btn-sm btn-primary" href="<?php echo site_url('/admin/product/view/'.$latest_product['code']) ?>"><i class="fas fa-eye"></i></a>
                      <?php if($this->session->userdata('user')->user_id == $latest_product['owner_id']){ ?>
                        <a class="btn btn-sm btn-warning" href="<?php echo site_url("/admin/product/edit/".$latest_product['code']) ?>"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-sm btn-danger delete_btn" href="<?php echo site_url("/admin/product/delete/".$latest_product['code']) ?>"><i class="fas fa-trash"></i></a>
                      <?php } ?>
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
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->


