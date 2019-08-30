

  <div id="wrapper">

<!-- Sidebar -->
<?php include APPPATH.'/views/layouts/admin/side_nav.php' ?>

<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?php echo site_url('/'.$this->session->userdata('user')->acct_type.'/log/all') ?>">Activity Log</a>
      </li>
      <li class="breadcrumb-item active">Overview</li>
    </ol>

    <!-- DataTables Example -->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-product"></i>
        <?php echo $pt ?>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>User Id</th>
                <th>Action</th>
                <th>Created At</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>User Id</th>
                <th>Action</th>
                <th>Created At</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
            <?php foreach($logs as $log){ ?>
              <tr>
                <td><?php echo $log['owner_id'] ?></td>
                <?php if($log['owner_id'] == $this->session->userdata('user')->user_id){ ?>
                  <td><?php echo $log['action'] ?></td>
                <?php }else{ $user = $this->UserModel->getUserBy('user_id', $log['owner_id']);?>
                  <td><?php echo str_replace('You', $user['full_name'], $log['action']) ?></td>
                <?php } ?>
                <td><?php echo Carbon\Carbon::create($log['created_at'])->diffForHumans() ?></td>
                <td>
                    <a class="btn btn-sm btn-primary" href="<?php echo site_url('/'.$this->session->userdata('user')->acct_type.'/log/view/'.$log['owner_id']) ?>"><i class="fas fa-eye"></i></a>
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