<?php $this->load->view('user/include/header.php') ?>
<!-- main header end -->

<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Property</h1>
            <ul class="breadcrumbs">
                <li><a href="<?= base_url() ?>userview">Home</a></li>
                <li class="active">Property</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub banner end -->

<!-- Properties list fullwidth start -->
<div class="properties-list-fullwidth content-area-2">
    <div class="container">
        <div class="row">
        <?php 
        foreach ($properties as $property)
        {

        ?>    
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="property-box">
                    <div class="property-thumbnail">
                        <a href="properties-details.html" class="property-img">
                            <div class="tag button alt featured">Featured</div>
                            <div class="price-ratings-box">
                                <p class="price">
                                    Rp. <?php echo $property['price'];?>
                                </p>
                                <div class="ratings">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                            </div>
                            <?php foreach ($images as $image):?>
                            <?php if ($image['property_id'] == $property['id']):?>
                            <img src="<?= base_url() ?>assets/image/properties/<?= $image['image']?>" alt="Property-1" class="img-fluid" style="width: 500; height: 200px;">
                            <?php break;endif;?>
                            <?php endforeach;?>
                        </a>
                        <div class="property-overlay">
                            <a href="properties-details.php?id=<?php echo $property['id'];?>" class="overlay-link">
                                <i class="fa fa-link"></i>
                            </a>
                           <!-- <a class="overlay-link property-video" title="Test Title">
                                <i class="fa fa-video-camera"></i>
                            </a>-->
                            <div class="property-magnify-gallery">
                                <?php foreach ($images as $image):?>
                                <?php if ($image['property_id'] == $property['id']):?>
                                <a href="<?= base_url() ?>assets/image/properties/<?= $image['image']?>" class="overlay-link">
                                    <i class="fa fa-expand"></i>
                                </a>
                                <?php break; endif;?>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                    <div class="detail">
                        <h1 class="title">
                            <a href="properties-details.php?id=<?php echo $property['id'];?>"><?php echo $property['nama_properti'];?></a>
                        </h1>
                        <div class="location">
                            <a href="properties-details.php?id=<?php echo $property['id'];?>">
                                <i class="fa fa-map-marker"></i><?php echo $property['address'];?>
                            </a>
                        </div>
                        <ul class="facilities-list clearfix">
                            <li>
                                <i class="flaticon-bed"></i> <?php echo $property['bedroom'];?> : Bedroom
                            </li>
                            <li>
                                <i class="flaticon-bath"></i> <?php echo $property['hall'];?> : Hall
                            </li>
                            <li>
                                <i class="flaticon-square-layouting-with-black-square-in-east-area"></i>Status : <?php echo $property['sold'];?>
                            </li>
                            <li>
                                <i class="fa fa-coffee"></i> <?php echo $property['kitchen'];?> : kitchen
                            </li>
                        </ul>
                    </div>
                    <div class="footer">
                        <a href="#">
                            <i class="fa fa-user"></i> <?php echo $admin['full_name'];?>
                        </a>
                        <span>
                            <i class="fa fa-calendar-o"></i> 2 years ago
                        </span>
                    </div>
                </div>
            </div>
            <?php } ?>
            
        </div>
    </div>
</div>
<!-- Properties list fullwidth end -->

<!-- Footer start -->
<?php $this->load->view('user/include/footer.php') ?>