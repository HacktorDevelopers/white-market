
  <div id="wrapper">

<!-- Sidebar -->
<?php include APPPATH.'/views/layouts/admin/side_nav.php' ?>

<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Sub Category</a>
      </li>
      <li class="breadcrumb-item active">Edit Sub Category</li>
    </ol>

    <!-- DataTables Example -->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-product"></i>
        #<?php echo $subcategory['id'] ?> <?php echo $subcategory['name'] ?></div>
      <div class="card-body">
      <div class="row">
          <div class="col-md-5 offset-1">
            Fill the field below to update <?php echo $subcategory['name'] ?>
            <form class="form" enctype="multipart/form-data" method="POST" action="<?php echo site_url('/admin/category/subcategory/update') ?>" msg="Updating Sub category: <?php echo $subcategory['name'] ?>">
              <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Category Name" value="<?php echo $subcategory['name'] ?>"/>
                <input type="hidden" name="id" placeholder="Category Name" value="<?php echo $subcategory['id'] ?>"/>
                <input type="hidden" name="category_id" value="<?php echo $subcategory['category_id'] ?>"/>
              </div>

              <div class="form-group">
                <textarea class="form-control" id="editor" name="description" placeholder="Category Description" style="height: 200px;"><?php echo $subcategory['description'] ?></textarea>
              </div>

              <div class="form-group">
                <input type="file" id="imagetoupload" class="form-control" name="category_image" placeholder="choose"/>
              </div>

              <div class="form-group">
                <input type="submit" class="form-control btn btn-block btn-primary" value="Update" />
              </div>
            </form>
          </div>

          <div class="col-md-5">
            <h5>Image Preview</h5>
            <div id="image_preview" style="height: 200px; width: 200px;" class="text-center"><img id="previewing" src="<?php echo site_url('/public/images/system/subcategories/'.strtolower(str_replace(' ', '-', $subcategory['name'])).'.jpg') ?>" style="height: 200px; width: 200px;" /></div>
          </div>
        </div>
      </div>
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>

  </div>
