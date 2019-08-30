<?php $seller_info = $this->db->get_where('sellers', ['seller_id'=>$profile->user_id])->row(); ?>

  <div id="wrapper">

<!-- Sidebar -->
<?php include APPPATH.'/views/layouts/admin/side_nav.php' ?>

<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?php echo site_url('/admin/settings/menus') ?>">Profile</a>
      </li>
      <li class="breadcrumb-item active">Edit Profile</li>
    </ol>

    <!-- DataTables Example -->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-user"></i>
            My Account<a href="#" style="float: right" data-toggle="modal" data-target="#newMenu" class="btn btn-sm btn-primary"><span class="fa fa-edit"></span></a>
        </div>
      <div class="card-body">
        <div class="row">
            <div class="col-md-2">
                <img style="width: 100%" src="<?php echo ($seller_info) ? $seller_info->logo : '' ?>">
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        Personal Information
                    </div>
                    <div class="card-bod">
                        <form class="form" action="<?php echo site_url('/'.$profile->loggedinas.'/profile/update') ?>" method="POST" msg="Updating profile">
                        <table style="width: 100%" class="table">
                            <tr>
                                <td>Full Name</td>
                                <td><input type="text" class="form-control" name="full_name" value="<?php echo $profile->full_name ?>"/></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="email" name="email" class="form-control" value="<?php echo $profile->email ?>"/></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" class="btn btn-sm btn-warning" value="Update"/></td>
                            </tr>
                        </table>
                        </form>
                    </div>
                </div>
                
            </div>

            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        Contact Information
                    </div>
                    <div class="card-body">
                        <?php $contact = $this->db->get_where('contacts', ['user_id'=>$profile->user_id])->row(); ?>

                        <form class="form" action="<?php echo site_url('/'.$profile->loggedinas.'/profile/update/contacts') ?>" method="POST" msg="Updating Contact info">
                        <table style="width: 100%" class="table">
                            <tr>
                                <td>Phone Number</td>
                                <td><input type="text" class="form-control" name="phone_number" value="<?php echo ($contact) ? $contact->phone_number : 'Not Set'  ?>"/></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="text" class="form-control" name="email" value="<?php echo ($contact) ? $contact->email : 'Not Set'  ?>"/></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td><input type="text" class="form-control" name="address" value="<?php echo ($contact) ? $contact->address : 'Not Set'  ?>"/></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" class="btn btn-sm btn-warning" value="Update"/></td>
                            </tr>
                        </table>
                        </form>
                    </div>
                </div>
                
            </div>
        
        <?php if($seller_info){ ?>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Business Information
                    </div>
                </div>
                <div class="card-body">
                    
                    <form class="form" action="<?php echo site_url('/'.$profile->loggedinas.'/profile/update/sellers') ?>" method="POST" msg="Updating Business Info">
                    <table style="width: 100%" class="table">
                        <tr>
                            <td>Business name</td>
                            <td><input type="text" class="form-control" name="company_name" value="<?php echo ($seller_info) ? $seller_info->company_name : 'Not Set'  ?>"/></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" class="btn btn-sm btn-warning" value="Update"/></td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        <?php } ?>
        </div>
      </div>
      
    </div>

  </div>
