        <!-- Slideshow container -->
<div class="slideshow-container">

<!-- Full-width images with number and caption text -->
<?php $i = 0; foreach($products as $product){ ?>
    <div class="mySlides fade">
        <div class="description">
            <h3>description</h3>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde aliquam totam ea, amet qui iste quod maxime ipsam? Ducimus dolore optio recusandae repudiandae odio placeat reprehenderit perferendis labore, explicabo porro.
            <p class="badge badge-success"><?php echo $product['price'] ?></p>
        </div>
        <div class="numbertext"><?php echo ++$i; ?> / <?php echo count($products); ?></div>
        <img src="public/images/shoe<?php echo rand(0, 6);?>.jpg" style="width:100%; height: 300px;">
        <div class="text"><?php echo $product['name'] ?></div>
    </div>
<?php } ?>

    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
    <br>

    <!-- The dots/circles -->
<div style="text-align:center">
<?php $i = 0; while($i < count($products)) { ?>
    <span class="dot" onclick="currentSlide(<?php echo ++$i ?>)"></span>
<?php } ?>
</div>

