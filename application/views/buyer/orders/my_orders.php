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
                <p class="alert alert-warning">You Dont Have Any Order Now</p>
              <?php }else{ ?>
              <table class="table table-responsive">
                  <thead>
                      <tr>
                          <th>order id</th>
                          <th>order detail</th>
                          <th>order bill</th>
                          <th>status</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php foreach($orders as $order){ ?>
                      <tr>
                          <td><?php echo $order->order_id ?></td>
                          <td>
                              <?php foreach(unserialize($order->order_detail) as $det){ ?>
                                <?php echo $det['name'].' N'.$det['price'].' | '.$det['qty'].br(); ?>
                              <?php } ?>
                          </td>
                          <td><?php echo $this->cart->format_number($order->total_amount); ?></td>
                          <td><?php echo 'Your order is '. $order->status. ' because '.$order->msg ?></td>
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
