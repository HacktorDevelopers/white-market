<?php  ?>

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
      <li class="breadcrumb-item active">Orders #<?php echo $order->order_id ?></li>
    </ol>

    <!-- DataTables Example -->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-shopping-basket"></i>
            Order #<?php echo $order->order_id ?>
        </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
              <table class="table table-responsive" id="dataTable1" width="100%">
                  <thead>
                      <tr>
                          <th>Order id</th>
                          <th>Order detail</th>
                          <th>Order bill</th>
                          <th>Status</th>
                          <th>Message</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td><?php echo $order->order_id ?></td>
                          <td>
                              <?php foreach(unserialize($order->order_detail) as $det){ ?>
                                <?php echo $det['name'].' N'.$det['price'].' | '.$det['qty'];
                                if(!$det['options']['sorted'])
                                  echo '<a class="fas fa-sort-up btn btn-sm btn-default ajax" href="'.site_url('admin/order/sort/'.$order->order_id."/".$det['rowid']).'" msg="Do you want to sort?"></a>'.br(); ?>
                              <?php } ?>
                          </td>
                          <td><?php echo $this->cart->format_number($order->total_amount); ?></td>
                          <td><?php echo $order->status ?></td>
                          <td><?php echo 'This order is <span class="badge badge-danger">'. $order->status. '</span> because '.$order->msg ?></td>
                          <td>
                            <a class="fa fa-eye btn btn-sm btn-info" href="<?php echo site_url('admin/order/view_order/'.$order->order_id)?>"></a>
                          </td>
                      </tr>
                  </tbody>
              </table>
          </div>
        </div>
      </div>
      
    </div>




    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-shopping-basket"></i>
            Sorted Order
        </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
          <?php if(count($sorted_orders) == 0){ ?>
                <p class="alert alert-warning">No order have been sorted yet</p>
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
                  <?php foreach($sorted_orders as $order){ ?>
                      <tr>
                          <td><?php echo $this->db->where('seller_id', $order->seller_id)->get('sellers')->row()->company_name ?></td>
                          <td><?php echo $order->ordered_product_name ?></td>
                          <td><?php echo $order->ordered_product_qty ?></td>
                          <td><?php echo $order->ordered_product_price ?></td>
                          <td><?php echo $this->cart->format_number(((int)$order->ordered_product_price * (int)$order->ordered_product_qty)) ?></td>
                          <td><?php echo $order->status; ?></td>
                          <td><?php echo 'This order is <span class="badge badge-danger">'. $order->status. '</span> because '.$order->msg ?></td>
                          <td>
                            <a class="fa fa-eye btn btn-sm btn-info" href="<?php echo site_url('admin/order/view_order/'.$order->order_id)?>"></a>
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
    //   // alert("We are almost done here");
    //   var oldqty = $("#oldqty");
    //   var newqty = $("#newqty");

    //   var oldoto = $("#oldoto");
    //   var newoto = $("#newoto");

    //   oldqty.keyup(function(){
    //     newqty.val($(this).val());
    //   });

    //   oldoto.keyup(function(){
    //     newoto.val($(this).val());
    //   });
    });
  </script>
