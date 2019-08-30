<style>
  h1,h2,h3,h4,h5,h6 {
    font-variant: small-caps;
    font-family: 'Hepta Slab', cursive;
  }

  button, label {
    font-family: 'Livvic', sans-serif;
  }
</style>

<div id="wrapper">

<!-- Sidebar -->
<?php include APPPATH.'/views/layouts/admin/side_nav.php' ?>

<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?php echo site_url('/seller/product/all') ?>">Products</a>
      </li>
      <li class="breadcrumb-item active">New Product</li>
    </ol>
    <div class="row">
      <div class="col-md-9">
        <h2>Create/Sell a new Product</h2>
      </div>
      <div class="col-md-3">
        <a class="btn btn-danger">Cancel</a>
        <button class="btn btn-success save_product"><span class="fa fa-check"></span> Save Item</button>
      </div>
    </div>
    
  <form class="form" method="POST" action="<?php echo site_url('/seller/product/store'); ?>" enctype="multipart/form-data" id="product_form" msg="Creating new product...">
    <!-- Product Category Form Start -->
    <div class="panel card mb-3">
      <div class="card-body">
        <div class="panel-heading">
          <h4>Product Category</h4>
        </div>
        <hr/>
        <div class="panel-body">
          <div class="row" id="category_chamber">
            <div class="form-group col-md-3">
              <label>Main Category</label>
              <select class="form-control custom-select-sm category">
                <option selected disabled>Select Category</option>
                <?php $categories = $this->CategoryModel->getAllCategories();?>
                <?php foreach($categories as $category){ ?>
                  <option class="" value="<?php echo $category->id?>">
                    <?php echo $category->name ?>
                  </option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group col-md-3" id="">
              <label> Sub Category</label>
              <select class="form-control custom-select-sm" name="category_id" id="subcategory">
                <option selected disabled>Select Sub Category</option>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Product Category Form Ends -->


    <!-- Product Image Form Start -->
    <div class="panel card mb-3">
      <div class="card-body">
        <div class="panel-heading">
          <h4>Product Image</h4>
          <p class="text-info" data-toggle="tooltip" data-placement="top" title="This images will change when you select your product image">
            Product Image Preview. Click on the preview image below to select images
          </p>
          <hr/>
        </div>
        <div class="panel-body">
          <div class="text-centered">
          <div class="text-centered">
            <input type="file" id="imagetoupload" name="product_image[]" accept="jpg/jpeg/png" style="display: none;" multiple/>
            <div id="image_preview" class="text-center">
              <?php $i = 0; while($i < 3){ ?>
                <img id="prev" style="width: 200px;" src="<?php echo site_url('/public/images/system/sys/no-image.png') ?>"/>
              <?php $i++; } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Product Image Form Start -->
  </div>

  <!-- Product Detail Form Start -->
  <div class="panel card mb-3">
    <div class="card-body">
      <div class="panel-heading">
        <h4>Product Detail</h4>
        <p class="text-info" data-toggle="tooltip" data-placement="top" title="This images will change when you select your product image">
          Product Detail
        </p>
        <hr/>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="form-group col-md-12">
            <label>Product Title</label>
            <input type="text" name="name" class="form-control" placeholder="Product Full Name Example: Tecno, Itel.." />
          </div>

          <div class="form-group col-md-6">
            <label>Short Description</label>
            <textarea name="short_description" class="form-control editor"></textarea>
          </div>

          <div class="form-group col-md-6">
            <label>Long Description</label>
            <textarea name="description" class="form-control" id="editor"></textarea>
          </div>

          <div class="form-group col-md-6">
            <label>Brand</label>
            <input type="text" name="brand" class="form-control input-sm" placeholder="Brand"/>
          </div>

          <div class="form-group col-md-6">
            <label>Shipping weight (Kg)</label>
            <input type="text" name="weight" class="form-control input-sm" placeholder="Shipping weight"/>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- Product Detail Form End -->


  <!-- Product Detail Form Start -->
  <div class="panel card mb-3">
    <div class="card-body">
      <div class="panel-heading">
        <h4>Warehouse</h4>
        <p class="text-info" data-toggle="tooltip" data-placement="top" title="This images will change when you select your product image">
          Tell us how you would like to warehouse your products. You can choose to use your own warehouse or one of White Markets's Warehousing Partners. 
          If you choose to warehouse your products with Konga's Warehouse Partners, your product inventory and order fulfillment will be managed 
          entirely by our partners. Learn more
        </p>
        <hr/>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="form-group col-md-12">
            <p>Do you want to use White Market Ware House?</p>
            <input type="radio" name="warehouse" value="Yes"/><label>Yes</label>
            <input type="radio" name="warehouse" value="No"/><label>No</label>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Product Detail Form End -->


  <!-- Product Pricing Form Start -->
  <div class="panel card mb-3">
    <div class="card-body">
      <div class="panel-heading">
        <h4>Pricing And Taxing</h4>
        <hr/>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="form-group col-md-4">
            <label>Price</label>
            <input type="text" id="price" name="price" class="form-control input-sm" placeholder="Price *"/>
          </div>

          <div class="form-group col-md-4">
            <label>Discount Price (optional)</label>
            <input type="text" id="discount_price" name="discount_price" class="form-control input-sm" placeholder="Discount price"/>
          </div>

          <div class="form-group col-md-4">
            <label>Bulk Price (optional)</label>
            <input type="text" name="bulk_price" class="form-control input-sm" placeholder="Bulk price"/>
          </div>

          <div class="form-group col-md-4">
            <label>Charge 5% VAT on this item</label>
            <select type="text" id="vat" name="vat" class="form-control input-sm" placeholder="">
              <option selected disabled>Do you want to charge 5% VAT on this item</option>
              <option value="yes">Yes</option>
              <option value="no">No</option>
            </select>
          </div>

          <div class="form-group col-md-4">
            <label>Total Price</label>
            <input type="text" id="total_price" name="total_price" class="form-control input-sm" readonly/>
          </div>

          <div class="form-group col-md-4">
            <label>Quantity</label>
            <input type="text" name="quantity" class="form-control input-sm" placeholder="Quantity"/>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Product Pricing Form End -->


  <!-- Product Other Options Form Start -->
  <div class="panel card mb-3">
    <div class="card-body">
      <div class="panel-heading">
        <h4>Other Product Options</h4>
        <hr/>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="form-group col-md-4">
            <label>Return Policy</label>
            <input type="text" id="return_policy" name="return_policy" class="form-control input-sm" placeholder="Return policy"/>
          </div>

          <div class="form-group col-md-4">
            <label>Supplier SKU</label>
            <input type="text" name="supplier_sku" class="form-control input-sm" placeholder="Supplier SKU"/>
          </div>

          <div class="form-group col-md-4">
            <label>Model</label>
            <input type="text" name="model" class="form-control input-sm" placeholder="Model"/>
          </div>

          <div class="form-group col-md-4">
            <label>Condition</label>
            <select type="text" id="product_condition" name="product_condition" class="form-control input-sm">
              <option selected disabled>What is the condition of this item</option>
              <option value="yes">Used</option>
              <option value="no">New</option>
            </select>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Product Other Options From End -->

  <!-- Product Warranty Form Start -->
  <div class="panel card mb-3">
    <div class="card-body">
      <div class="panel-heading">
        <h4>Warranty</h4>
        <hr/>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="form-group col-md-12">
            <p>Do you want to provide a warranty?</p>
            <input type="radio" name="warranty" value="yes"/><label>Yes</label>
            <input type="radio" name="warranty" value="no"/><label>No</label>
          </div>

          <div class="col-md-12 row" id="more_warranty_detail" style="display: none">
            <div class="form-group col-md-6">
              <label>Warranty Period</label>
              <select type="text" id="warranty_period" name="warranty_period" class="form-control input-sm">
                <option selected disabled>Select warranty period</option>
                <option value="three_month">Three Months</option>
                <option value="six_month">Six Month</option>
                <option value="one_year">One Year</option>
                <option value="two_year">Two years</option>
                <option value="three_year">Three years</option>
              </select>
            </div>

            <div class="form-group col-md-6">
              <label>Warranty Detail (not more than 200 character)</label>
              <textarea name="warranty_detail" id="warranty_detail" class="form-control"></textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Product Warranty Form End -->

  <!-- Product SEO Form Start -->
  <div class="panel card mb-3">
    <div class="card-body">
      <div class="panel-heading">
        <h4>SEO (Search Engine Optimization)</h4>
        <p>
          Keywords (SEO meta tags describes your store to search engine. Separate each tag with comma (,))
        </p>
        <hr/>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="form-group col-md-6">
            <label>Enter keywords here</label>
            <input name="seo_key" class="form-control"/>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Product SEO Form End -->
   
  <hr/>
  <div class="row">
    <div class="offset-9 col-md-3">
      <a class="btn btn-danger" href="/seller/product/all">Cancel</a>
      <button class="btn btn-success"><span class="fa fa-check"></span> Save Item</button>
    </div>
  </div>
  </form>
 




  <script>
    $(document).ready(function(){
      $('label').addClass('text-info');
      // alert('Hello world');
      var category = $(".category");
      var subcategory = $("#subcategory");
      var category_chamber = $("#category_chamber");
      // var subcategory_id = $("#subcategory_id");
      category.change(function(){
        // alert($(this).val());
        subcategory.html("<option>Loading...</option>");
        $("#catprev").load("<?php echo site_url('/api/getCategoryImageUrl/') ?>"+$(this).val());
        subcategory.load("<?php echo site_url('/api/getSubCategories/') ?>"+$(this).val());
        // subcategory.load
      });


      subcategory.change(function(){
        // alert($(this).val());
        $("#subprev").load("<?php echo site_url('/api/getSubCategoryImageUrl/') ?>"+$(this).val(), (data)=>{console.log(data)}, (err)=>{console.log(err)});
        // subcategory.load
      });

      $("#image_preview").click(function(){
        $("#imagetoupload").trigger('click');
      });

      $("#discount_price").keyup(function(){
        if($("#discount_price").val() === ''){
          $("#total_price").val($("#price").val());
        }else{
          $("#total_price").val($(this).val());
        }
      });

      $("#price").keyup(function(){
        if($("#discount_price").val() === ''){
          $("#total_price").val($(this).val());
        }
      });

      $("#vat").change(function(){
        var total_price = parseInt($("#total_price").val());
        var discount_price = parseInt($("#discount_price").val());
        var price = parseInt($("#price").val());
        var vat = $(this).val();
        // alert(`${total_price} => ${price}`);
        if(discount_price != ''){
          if(vat == 'no' && (total_price != discount_price)){
            var new_price = total_price - ((5/100) * price);
            $("#total_price").val(new_price);
          }

          if(vat == 'yes' && (total_price == discount_price)){
            var new_price = (total_price + ((5/discount_price) * 100));
            $("#total_price").val(new_price);
          }
        }

        if(price != '' && discount_price == ''){
          if(vat == 'no' && (total_price != price)){
            var new_price = total_price - ((5/100) * price);
            $("#total_price").val(new_price);
          }

          if(vat == 'yes' && (total_price == price)){
            var new_price = (total_price + ((5/price) * 100));
            $("#total_price").val(new_price);
          }
        }
      });

      $("input").change(function(e){
        if($(this).attr('name') == 'warranty' && $(this).val() == 'yes'){
          $("#warranty_period").attr('disabled', false);
          $("#warranty_detail").attr('disabled', false);
          $("#more_warranty_detail").show();
        }
        if($(this).attr('name') == 'warranty' && $(this).val() == 'no'){
          $("#warranty_period").attr('disabled', true);
          $("#warranty_detail").attr('disabled', true);
          // $("#more_warranty_detail").hide();
        }
      });

      $(".save_product").click(function(){
        $("#product_form").trigger('submit');
      });

    });
  </script>