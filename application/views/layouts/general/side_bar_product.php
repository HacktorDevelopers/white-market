<?php $categories = $this->db->query('SELECT * FROM category  ORDER BY RAND() LIMIT 5')->result(); ?>
<?php $sellers = $this->db->query('SELECT * FROM sellers LEFT JOIN users on users.user_id = sellers.seller_id  ORDER BY RAND() LIMIT 5')->result(); ?>
<div class="card bg-gold" style="position: static !important">
    <h5 class="card-header">
        <a href="<?php echo site_url('product/category/all') ?>" style="color: white !important;" >Categories <span style="float: right;color: black !important;" class="fa fa-caret-right"></span></a>
    </h5>
    <div class="list-group list-group-flush">
        <?php foreach($categories as $category): ?>
            <a class="list-group-item list-group-item-action" href="<?php echo site_url('product/category/'.strtolower(str_replace(' ', '-', $category->name))); ?>"><?php echo $category->name ?></a>
        <?php endforeach; ?>
    </div>
</div>

<div class="card bg-gold">
    <h5 class="card-header">
        <a href="<?php echo site_url('product/seller/all') ?>" style="color: white !important;">Best Sellers <i style="float: right" class="fa fa-caret-right float-right"></i></a>
    </h5>
    <div class="list-group list-group-flush">
        <?php foreach($sellers as $seller): ?>
            <a class="list-group-item list-group-item-action" href="<?php echo site_url('product/seller/'.strtolower(str_replace(' ', '-', $seller->full_name))); ?>"><?php echo $seller->full_name ?></a>
        <?php endforeach; ?>
    </div>
</div>