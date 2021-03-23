<?php
include('partials/headlinks.php');
include('partials/preloader_search.php');
include('partials/header.php');
include('partials/slider.php');
?>
<section class="top-catagory-area section-padding-80-0">
    <div class="container">
        <div class="row">
            <!-- Top Catagory Area -->
            <div class="col-12 col-lg-6">
                <div class="single-top-catagory">
                    <img src="img/bg-img/bg2.jpg" alt="">
                    <!-- Content -->
                    <div class="top-cta-content">
                        <h3>Strawberry Cake</h3>
                        <h6>Simple &amp; Delicios</h6>
                        <a href="receipe-post.html" class="btn delicious-btn">See Full Receipe</a>
                    </div>
                </div>
            </div>
            <!-- Top Catagory Area -->
            <div class="col-12 col-lg-6">
                <div class="single-top-catagory">
                    <img src="img/bg-img/bg3.jpg" alt="">
                    <!-- Content -->
                    <div class="top-cta-content">
                        <h3>Chinesse Noodles</h3>
                        <h6>Simple &amp; Delicios</h6>
                        <a href="receipe-post.html" class="btn delicious-btn">See Full Receipe</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Top Catagory Area End ##### -->

<!-- ##### Best Receipe Area Start ##### -->
<section class="best-receipe-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading">
                    <h3>New Receipies</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Single Best Receipe Area -->
            <?php
                $sql = "select id,title,image,status from recipe where status = 1 order by id desc limit 6";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($result)){
                    ?>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-best-receipe-area mb-30">
                    <img style="height:500;width:500" src="images/recipes/<?php 
                        echo $row['image'];
                    ?>" alt="">
                    <div class="receipe-content">
                        <a href="receipedetail.php?id=<?php echo $row['id'];?>">
                            <h5><?php 
                        echo $row['title'];
                    ?></h5>
                        </a>
                        <div class="ratings">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>

            <?php }

               ?>



        </div>
    </div>
</section>
<section class="cta-area bg-img bg-overlay" style="background-image: url(img/bg-img/bg4.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <!-- Cta Content -->
                <div class="cta-content text-center">
                    <h2>Gluten Free Receipies</h2>
                    <p>Fusce nec ante vitae lacus aliquet vulputate. Donec scelerisque accumsan molestie. Vestibulum
                        ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras sed accumsan
                        neque. Ut vulputate, lectus vel aliquam congue, risus leo elementum nibh</p>
                    <a href="#" class="btn delicious-btn">Discover all the receipies</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### CTA Area End ##### -->

<!-- ##### Small Receipe Area Start ##### -->
<section class="small-receipe-area section-padding-80-0">
    <div class="container">
        <div class="row">

            <!-- Small Receipe Area -->
            <?php
                $sql4 = "select id,title,posted_date,image,status from recipe where status = 1  limit 9";
                $result4 = mysqli_query($conn,$sql4);
                while($row4 = mysqli_fetch_assoc($result4)){
                    ?>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-small-receipe-area d-flex">
                    <!-- Receipe Thumb -->
                    <div class="receipe-thumb">
                        <img class="img-thumbnail" src="images/recipes/<?php 
                        echo $row4['image'];
                    ?>" alt="">
                    </div>
                    <!-- Receipe Content -->
                    <div class="receipe-content">
                        <span><?php echo $row4['posted_date']?></span>
                        <a href="receipedetail.php?id=<?php echo $row4['id'];?>">
                            <h5><?php echo $row4['title']?></h5>
                        </a>
                        <div class="ratings">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                        </div>
                        <p> <?php $cid = $row4['id'];
                          $sqlcountcom = "select * from comments where rec_id = $cid";
                          $resultcountcom = mysqli_query($conn,$sqlcountcom);
                          $count = mysqli_num_rows($resultcountcom);
                        
                        echo $count ; ?> Comments</p>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>

        </div>
    </div>
</section>
<!-- ##### Small Receipe Area End ##### -->

<!-- ##### Quote Subscribe Area Start ##### -->
<section class="quote-subscribe-adds">
    <div class="container">
        <div class="row align-items-end">
            <!-- Quote -->
            <div class="col-12 col-lg-4">
                <div class="quote-area text-center">
                    <span>"</span>
                    <h4>Nothing is better than going home to family and eating good food and relaxing</h4>
                    <p>John Smith</p>
                    <div class="date-comments d-flex justify-content-between">
                        <div class="date">January 04, 2018</div>
                        <div class="comments">2 Comments</div>
                    </div>
                </div>
            </div>

            <!-- Newsletter -->
            <div class="col-12 col-lg-4">
                <div class="newsletter-area">
                    <h4>Subscribe to our newsletter</h4>
                    <!-- Form -->
                    <div class="newsletter-form bg-img bg-overlay" style="background-image: url(img/bg-img/bg1.jpg);">
                        <form action="#" method="post">
                            <input type="email" name="email" placeholder="Subscribe to newsletter">
                            <button type="submit" class="btn delicious-btn w-100">Subscribe</button>
                        </form>
                        <p>Fusce nec ante vitae lacus aliquet vulputate. Donec sceleri sque accumsan molestie.
                            Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia.</p>
                    </div>
                </div>
            </div>

            <!-- Adds -->
            <div class="col-12 col-lg-4">
                <div class="delicious-add">
                    <img src="img/bg-img/add.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Quote Subscribe Area End ##### -->

<!-- ##### Follow Us Instagram Area Start ##### -->
<div class="follow-us-instagram">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h5>Follow Us Instragram</h5>
            </div>
        </div>
    </div>
    <!-- Instagram Feeds -->
    <div class="insta-feeds d-flex flex-wrap">
        <!-- Single Insta Feeds -->
        <div class="single-insta-feeds">
            <img src="img/bg-img/insta1.jpg" alt="">
            <!-- Icon -->
            <div class="insta-icon">
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
        </div>

        <!-- Single Insta Feeds -->
        <div class="single-insta-feeds">
            <img src="img/bg-img/insta2.jpg" alt="">
            <!-- Icon -->
            <div class="insta-icon">
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
        </div>

        <!-- Single Insta Feeds -->
        <div class="single-insta-feeds">
            <img src="img/bg-img/insta3.jpg" alt="">
            <!-- Icon -->
            <div class="insta-icon">
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
        </div>

        <!-- Single Insta Feeds -->
        <div class="single-insta-feeds">
            <img src="img/bg-img/insta4.jpg" alt="">
            <!-- Icon -->
            <div class="insta-icon">
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
        </div>

        <!-- Single Insta Feeds -->
        <div class="single-insta-feeds">
            <img src="img/bg-img/insta5.jpg" alt="">
            <!-- Icon -->
            <div class="insta-icon">
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
        </div>

        <!-- Single Insta Feeds -->
        <div class="single-insta-feeds">
            <img src="img/bg-img/insta6.jpg" alt="">
            <!-- Icon -->
            <div class="insta-icon">
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
        </div>

        <!-- Single Insta Feeds -->
        <div class="single-insta-feeds">
            <img src="img/bg-img/insta7.jpg" alt="">
            <!-- Icon -->
            <div class="insta-icon">
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- ##### Follow Us Instagram Area End ##### -->

<!-- ##### Footer Area Start ##### -->
<?php
    include('partials/footer.php');
    ?>