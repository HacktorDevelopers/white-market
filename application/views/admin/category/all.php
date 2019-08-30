

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
      <li class="breadcrumb-item active">Overview</li>
    </ol>

    <!-- DataTables Example -->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-product"></i>
        All Categories <a href="<?php echo site_url('/admin/category/create') ?>" style="float: right" class="btn btn-sm btn-primary">New <span class="fa fa-plus"></span></a></div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-responsive" id="dataTable" style="width:100%" cellspacing="0">
            <thead>
              <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Description</th>
                <th>Subcategories</th>
                <th>Parent</th>
                <th>Created At</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Description</th>
                <th>Subcategories</th>
                <th>Parent</th>
                <th>Created At</th>
                <th>Actions</th>
              </tr>
            </tfoot>
            <tbody>
            <?php foreach($categories as $category){ ?>
              <tr>
                <td><?php echo $category->name ?></td>
                <td><img style="height: 50px; width: 50px" src="<?php echo site_url('/public/images/system/categories/'.strtolower(str_replace(' ', '-', $category->name)).'.jpg') ?>"/></td>
                <td><?php echo character_limiter($category->description, 60); ?></td>
                <td><?php echo count($this->CategoryModel->getSubCategories($category->id)); ?></td>
                <td>
                  <?php echo ($category->parent_id) ? $this->CategoryModel->getCategory($category->parent_id)['name']:'No Parent Category'; ?>
                </td>
                <td><?php echo Carbon\Carbon::create($category->created_at)->diffForHumans(); ?></td>
                <td>
                    <a class="btn btn-sm btn-primary" href="<?php echo site_url('/admin/category/view/'.$category->id) ?>"><i class="fas fa-eye"></i></a>
                    <a class="btn btn-sm btn-warning" href="<?php echo site_url('/admin/category/edit/'.$category->id) ?>"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-sm btn-danger delete_btn" href="<?php echo site_url('/admin/category/delete/'.$category->id) ?>"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>

  </div>
