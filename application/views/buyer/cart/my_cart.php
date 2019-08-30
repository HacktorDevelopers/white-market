

  <div id="wrapper">

<!-- Sidebar -->
<?php include APPPATH.'/views/layouts/admin/side_nav.php' ?>

<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?php echo site_url('/admin/settings/menus') ?>">Cart</a>
      </li>
      <li class="breadcrumb-item active">My Cart</li>
    </ol>

    <!-- DataTables Example -->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-shopping-cart"></i>
        Cart
        </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <?php if(count($this->cart->contents()) > 0){ ?>
            <table class="table">
              <thead>
                <th>Product Name</th>
                <th>Image</th>
                <th>Amount</th>
                <th>Quantity</th>
                <th>Extra Info</th>
                <th>Sub Total</th>
                <th>Action</th>
              </thead>
              <tbody>
                <?php foreach($this->cart->contents() as $item){ ?>
                  <tr>
                    <td><?php echo $item['name'] ?></td>
                    <td><?php echo $item['options']['product_id'] ?></td>
                    <td><?php echo $this->cart->format_number($item['price']) ?></td>
                    <td><input type="text" class="form-control" id="oldqty" value="<?php echo $item['qty'] ?>"/></td>
                    <td><textarea id="oldoto" class="form-control"><?php echo $item['options']['other_options'] ?></textarea></td>
                    <td><?php echo $this->cart->format_number($item['subtotal']) ?></td>
                    <td>
                      <a class="fa fa-trash delete_btn btn btn-sm btn-danger" href="<?php echo site_url('buyer/deletefromcart/'.$item['rowid']) ?>"></a>
                      <form action="<?php echo site_url('buyer/updatecart') ?>" msg="Updating Cart Content..." method="POST">
                        <input type="hidden" id="newqty" name="qty" value="<?php echo $item['qty'] ?>"/>
                        <input type="hidden" id="newoto" name="oto" value="<?php echo $item['options']['other_options'] ?>"/>
                        <input type="hidden" name="rowid" value="<?php echo $item['rowid'] ?>"/>
                        <input type="hidden" name="owner_id" value="<?php echo $item['options']['seller_id'] ?>"/>
                        <input type="hidden" name="product_id" value="<?php echo $item['options']['product_id'] ?>"/>
                        <button class="fas fa-save btn btn-sm btn-warning"></button>
                      </form>
                    </td>
                  </tr>
                <?php } ?>
                <tr>
                  <td colspan="2">Total <?php echo $this->cart->format_number($this->cart->total()) ?></td>
                  <td colspan="2">
                    <a class="btn btn-sm btn-success" href="<?php echo site_url('buyer/checkout') ?>"> Check Out</a>
                  </td>
                  <td colspan="2">Payment type: Pay On Delivery</td>
                </tr>
              </tbody>
            </table>
              <?php }else{ ?>
                <p class="alert alert-warning">Your Cart Is Empty. Go to the <a href="<?php echo site_url('market') ?>">Market</a></p>
              <?php } ?>
          </div>
        </div>
      </div>
      
    </div>

  </div>

  <script>
    $(document).ready(function(){
      // alert("We are almost done here");
      var oldqty = $("#oldqty");
      var newqty = $("#newqty");

      var oldoto = $("#oldoto");
      var newoto = $("#newoto");

      oldqty.keyup(function(){
        newqty.val($(this).val());
      });

      oldoto.keyup(function(){
        newoto.val($(this).val());
      });
    });
  </script>
