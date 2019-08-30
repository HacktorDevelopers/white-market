        <!-- Slideshow container -->
<div class="slideshow-container card container">
<?php $slideproducts = $this->db->query('SELECT * FROM products ORDER BY RAND() LIMIT 5')->result_array(); ?>
<!-- Full-width images with number and caption text -->
<?php $i = 0; foreach($slideproducts as $product){ ?>
    <div class="mySlides fade row">
        <div class=" col-md-4">
            <h4><?php echo $product['name'] ?></h4>
                <h5>Description</h5>
                <p><?php echo character_limiter($product['description'], 50) ?></p>
            <p class="badge badge-success"><?php echo 'N'.$product['price'] ?></p><br/>
            <a href="<?php echo site_url('/product/'.$product['code']) ?>" class="card-link btn btn-sm btn-danger">veiw full detail</a>
        </div>
        <div class="numbertext"><?php echo ++$i; ?> / <?php echo count($slideproducts); ?></div>
        <div class="col-md-5">
            <img src="<?php echo site_url('public/images/products/'.$product['code'].'/01.jpg') ?>" style="height: 300px; width:100%; margin-left: 40%; border-radius: 10px;">
        </div>
        
    </div>
<?php } ?>

    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
        <!-- The dots/circles -->
    <div style="text-align:center; margin-top: 5px;">
    <?php $i = 0; while($i < count($slideproducts)) { ?>
        <span class="dot" onclick="currentSlide(<?php echo ++$i ?>)"></span>
    <?php } ?>
    </div>
</div>
