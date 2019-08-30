<?php $latest_products = $this->ProductModel->getProductsBy('owner_id', $this->session->userdata('user')->user_id); ?>

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
        <!-- Checking for updates-->
        <?php include APPPATH.'/views/layouts/admin/usernotuptodate.php' ?>
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
                    <td><?php echo $latest_product['created_at'] ?></td>
                    <td>
                    <a class="btn btn-sm btn-primary" href="<?php echo site_url('/'.$this->session->userdata('user')->loggedinas.'/product/view/'.$latest_product['code']) ?>"><i class="fas fa-eye"></i></a>
                    <a class="btn btn-sm btn-warning" href="<?php echo site_url("/".$this->session->userdata('user')->loggedinas."/product/edit/".$latest_product['code']) ?>"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-sm btn-danger delete_btn" href="<?php echo site_url("/".$this->session->userdata('user')->loggedinas."/product/delete/".$latest_product['code']) ?>"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>


        <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-shopping-basket"></i>
            My Orders
        </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <?php $orders = $this->SellerOrderModel->findManyBy('seller_id', $this->UserModel->Auth()->user_id)->collections; ?>
          <?php if(count($orders) == 0){ ?>
                <p class="alert alert-warning">You do not have any order</p>
              <?php }else{ ?>
              <table class="table table-responsive" id="dataTable" width="100%">
                  <thead>
                      <tr>
                          <th>Seller</th>
                          <th>Product Name</th>
                          <th>Product Quantity</th>
                          <th>Product Price</th>
                          <th>Order Bill</th>
                          <th>status</th>
                          <th>Message</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php foreach((object)$orders as $order){ ?>
                      <tr>
                          <td><?php echo $this->db->where('seller_id', $order->seller_id)->get('sellers')->row()->company_name ?></td>
                          <td><?php echo $order->ordered_product_name ?></td>
                          <td><?php echo $order->ordered_product_qty ?></td>
                          <td><?php echo $this->cart->format_number($order->ordered_product_price) ?></td>
                          <td><?php echo $this->cart->format_number(((int)$order->ordered_product_price * (int)$order->ordered_product_qty)) ?></td>
                          <td class="badge badge-danger"><?php echo $order->status ?></td>
                          <td><?php echo 'This order is <span class="badge badge-danger">'. $order->status. '</span> because '.$order->msg ?></td>
                          <td>
                            <a class="fa fa-eye btn btn-sm btn-info" href=""></a>
                            <select class="form-control order_options btn btn-primary btn-sm" url="<?php echo site_url('seller/orders/update/status/'.$order->id) ?>">
                              <?php foreach($this->SomeDBFunctions->getPossibleOptions('seller_order', 'status') as $status_option){ ?>
                                <option <?php echo ($status_option == $order->status) ? 'selected':'' ?> value="<?php echo $status_option ?>"><?php echo ucfirst($status_option) ?></option>
                              <?php } ?>
                            </select>
                          </td>
                      </tr>
                    <?php } ?>
                  </tbody>
              </table>
              <?php } ?>

          </div>
        </div>
      </div>
      
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


