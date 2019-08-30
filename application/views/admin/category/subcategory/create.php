

  <div id="wrapper">

<!-- Sidebar -->
<?php include APPPATH.'/views/layouts/admin/side_nav.php' ?>

<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?php echo site_url('/admin/category') ?>">Categories > Subcategory</a>
      </li>
      <li class="breadcrumb-item active">New SubCategory</li>
    </ol>
    <!-- DataTables Example -->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-product"></i>
        Create a New Sub Category for <span class="badge badge-danger"><?php echo $category['name'] ?></span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-5 offset-1">
            Fill the form below to create new category
            <form class="form" enctype="multipart/form-data" method="POST" action="<?php echo site_url('/admin/category/subcategory/store/'.$category['id']) ?>" msg="creating Sub Category for <?php echo $category['name'] ?>">
              <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Sub Category Name"/>
                <input type="hidden" name="category_id" value="<?php echo $category['id'] ?>"/>
              </div>

              <div class="form-group">
                <input type="text" class="form-control" name="category" placeholder="Category Name" value="<?php echo $category['name'] ?>" readonly/>
              </div>

              <div class="form-group">
                <textarea class="form-control" id="editor" name="description" placeholder="Sub Category Description" style="height: 200px;"></textarea>
              </div>

              <div class="form-group">
                <input type="file" id="imagetoupload" class="form-control" name="category_image" placeholder="choose"/>
              </div>

              <div class="form-group">
                <input type="submit" class="form-control btn btn-block btn-primary" value="Create"\/>
              </div>
            </form>
          </div>

          <div class="col-md-5">
            <h5>Image Preview</h5>
            <div id="image_preview" style="height: 200px; width: 200px;" class="text-center"><img id="previewing" src="<?php echo site_url('/public/images/system/sys/no-image.png') ?>" style="height: 200px; width: 200px;" /></div>
          </div>
        </div>
      </div>
    </div>

  </div>
