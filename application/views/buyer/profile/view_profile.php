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
      <li class="breadcrumb-item active">View Profile</li>
    </ol>

    <!-- DataTables Example -->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-user"></i>
        My Account<a href="<?php echo site_url('/'.$profile->loggedinas.'/profile/edit_profile') ?>" style="float: right" class="btn btn-sm btn-primary"><span class="fa fa-edit"></span></a>
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
                        <table style="width: 100%" class="table">
                            <tr>
                                <td>Full Name</td>
                                <td><?php echo $profile->full_name ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?php echo $profile->email ?></td>
                            </tr>
                        </table>
                        
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
                        <table style="width: 100%" class="table">
                            <tr>
                                <td>Phone Number</td>
                                <td><?php echo ($contact) ? $contact->phone_number : 'Not Set'  ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?php echo ($contact) ? $contact->email : 'Not Set'  ?></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td><?php echo ($contact) ? $contact->address : 'Not Set'  ?></td>
                            </tr>
                        </table>
                        
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
                    <table style="width: 100%" class="table">
                        <tr>
                            <td>Business name</td>
                            <td><?php echo ($seller_info) ? $seller_info->company_name : 'Not Set'  ?></td>
                        </tr>
                        <tr>
                            <td>No of products</td>
                            <td><?php echo count($this->ProductModel->getProductsBy('owner_id', $seller_info->seller_id)) ?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><?php echo ($seller_info) ? $seller_info->logo : 'Not Set'  ?></td>
                        </tr>
                    </table>
                    
                </div>
            </div>
        <?php }else{ ?>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Become a Seller
                    </div>
                    <div class="card-body text-center">
                        <a class="btn btn-large btn-primary slink" msg="Do you want to become a seller?" href="<?php echo site_url('account/addtoaccounttype/seller') ?>">Become a Seller</a>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
      </div>
      
    </div>

  </div>
