<!-- Logout Modal-->
<?php if($this->session->userdata('user')){ ?>
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Do you want to logout</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?php echo site_url('/'.$this->session->userdata('user')->acct_type.'/logout') ?>">Logout</a>
        </div>
        </div>
    </div>
</div>



<?php if($this->session->userdata('user')->acct_type == 'admin'){ ?>
<!-- New Menu Modal-->
<div class="modal fade" id="newMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Menu</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" action="<?php echo site_url('/admin/settings/menus/store') ?>" method="POST" msg="Creating new menu...">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Menu Display Name"/>
                    </div>

                    <div class="form-group">
                        <input type="text" name="url" class="form-control" placeholder="Menu url"/>
                    </div>

                    <div class="form-group">
                        <input type="text" name="fafa" class="form-control" placeholder="Icon: font awesome icon: fa-exit"/>
                    </div>

                    <div class="form-group">
                        <input type="text" name="acct_type" class="form-control" placeholder="admin,seller,buyer"/>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-block btn-primary" value="Create Menu"/>
                    </div>
                </form>
            </div>
       
        </div>
    </div>
</div>


<!-- Sub me Menu Modal-->
<div class="modal fade" id="newSubMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Sub Menu</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" action="<?php echo site_url('/admin/settings/submenu/store') ?>" method="POST" msg="Creating new menu...">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Menu Display Name"/>
                    </div>

                    <div class="form-group">
                        <input type="text" name="url" class="form-control" placeholder="Menu url"/>
                    </div>

                    <div class="form-group">
                        <select name="menu_id" class="form-control">
                            <option seleted disables>Select menu</option>
                            <?php foreach($menues as $menu){ ?>
                                <option value="<?php echo $menu->id ?>"><?php echo $menu->name?> &gt; <?php echo $menu->acct_type?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-block btn-primary" value="Create Menu"/>
                    </div>
                </form>
            </div>
       
        </div>
    </div>
</div>


<?php } ?>
<?php } ?>