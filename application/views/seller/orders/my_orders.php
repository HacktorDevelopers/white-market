<?php

?>

  <div id="wrapper">

<!-- Sidebar -->
<?php include APPPATH.'/views/layouts/admin/side_nav.php' ?>

<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?php echo site_url('/buyer/order/my_order') ?>">Orders</a>
      </li>
      <li class="breadcrumb-item active">My Orders</li>
    </ol>

    <!-- DataTables Example -->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-shopping-basket"></i>
            My Orders
        </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
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
                  <?php foreach($orders as $order){ ?>
                      <tr>
                          <td><?php echo $this->db->where('seller_id', $order->seller_id)->get('sellers')->row()->company_name ?></td>
                          <td><?php echo $order->ordered_product_name ?></td>
                          <td><?php echo $order->ordered_product_qty ?></td>
                          <td><?php echo $this->cart->format_number($order->ordered_product_price) ?></td>
                          <td><?php echo $this->cart->format_number(((int)$order->ordered_product_price * (int)$order->ordered_product_qty)) ?></td>
                          <td>
                            <?php echo $order->status ?>
                            
                          </td>
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

  <script>
    $(document).ready(function(){
      
    });
  </script>
