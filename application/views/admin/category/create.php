
  <div id="wrapper">

<!-- Sidebar -->
<?php include APPPATH.'/views/layouts/admin/side_nav.php' ?>

<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?php echo site_url('/admin/category') ?>">Categories</a>
      </li>
      <li class="breadcrumb-item active">New Category</li>
    </ol>

    <!-- DataTables Example -->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-product"></i>
        Create a New Category</div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-5 offset-1">
            <form class="form" enctype="multipart/form-data" method="POST" action="<?php echo site_url('/admin/category/store') ?>" msg="Creating Category ...">
              <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Category Name"/>
              </div>

              <div class="form-group">
                <select class="form-control" name="parent_id" placeholder="Category Name">
                  <option selected diabled>Select a parent category</option>
                  <option value="0">None</option>
                  <?php foreach($categories as $category){ ?>
                    <option value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="form-group">
                <textarea class="form-control" id="editor" name="description" placeholder="Category Description" style="height: 200px;"></textarea>
              </div>

              <div class="form-group">
                <input type="text" id="icon" class="form-control" name="icon" placeholder="Category Icon"/>
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
