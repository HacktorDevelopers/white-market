
<?php
    // $product_rating = $this->db->query("SELECT * FROM product_rating WHERE product_id = '".$product['product_id']."'")->result_array();
    // $avg_rating = $this->db->where('product_id', $product['product_id'])->select('AVG(rate) as avg_rating')->from('product_rating')->get()->row()->avg_rating;
    $subcategories = $this->db->where('category_id', $category['id'])->get('sub_category')->result();
    // $seller_rating = $this->db->query("SELECT * FROM seller_rating WHERE seller_id = '".$product['user_id']."'")->result_array();
?>
  <div id="wrapper">

<!-- Sidebar -->
<?php include APPPATH.'/views/layouts/admin/side_nav.php' ?>

<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?php echo site_url('/admin/category') ?>">Category</a>
      </li>
      <li class="breadcrumb-item active">#<?php echo $category['id'] ?></li>
    </ol>

    <!-- DataTables Example -->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-product"></i>
        <?php echo $category['name'] ?> <a href="<?php echo site_url('/admin/category/create') ?>" style="float: right" class="btn btn-sm btn-primary"> <span class="fa fa-plus"></span> New</a> &nbsp;
        <a href="<?php echo site_url('/admin/category/edit/'.$category['id']) ?>" style="float: right" class="btn btn-sm btn-primary"> <span class="fa fa-edit"></span> Edit</a>
        <a class="btn btn-sm btn-danger fa fa-trash-alt delete_btn" style="float: right" href="<?php echo site_url('/admin/category/delete/'.$category['id']) ?>"> Delete</a>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-3">
            <div>
              <h4><?php echo $category['name'] ?></h4>
              <hr/>
              <div class="text-center">
                <img style="height: 200px; width: 200px;" src="<?php echo site_url('public/images/system/categories/'.strtolower(str_replace(' ', '-', $category['name'])).'.jpg') ?>"/>
              </div>
              <p>
                <?php echo $category['description'] ?>
              </p>
            </div>
          </div>
          <div class="col-md-9">
            <h4>
              Sub Categories <span class="badge badge-warning float-right"><?php echo count($subcategories) ?></span>
              <a href="<?php echo site_url('/admin/category/subcategory/create/'.$category['id']) ?>" style="float: right;  " class="badge badge-primary btn-primary"> <span class="fa fa-plus"></span></a> 
            </h4>
            <hr/>
            
              <?php if(count($subcategories) > 0){ ?>
                <div class="row">
                <?php foreach($subcategories as $subcategory){ ?>
                  
                  <a class="col-md-3" href="<?php echo site_url('/admin/category/subcategory/view/'.$subcategory->id) ?>">
                    <div class="card">
                      <img style="height: 200px; width: 200px;" class=" card-img" src="<?php echo site_url('public/images/system/subcategories/'.strtolower(str_replace(' ', '-', $subcategory->name)).'.jpg') ?>"/>
                      <div class="card-img-bottom"><h5 class="text-success bg-dark"><?php echo $subcategory->name?></h5></div>
                    </div>
                  </a>
                  
                <?php } ?>
                </div>
              <?php } ?>
          </div>
        </div>
      </div>
    </div>

  </div>
