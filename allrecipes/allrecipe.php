<?php
require"admin/dbconnect.php";
include('partials/headlinks.php');
include('partials/preloader_search.php');
include('partials/header.php');
if(isset($_GET['id'])){
     $id = $_GET['id'];
}

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
<section class="best-receipe-area">
    <div class="container">
        <div class="row">
            <!-- Single Best Receipe Area -->
            <?php
                $sql = "select * from recipe where sub_id = $id and status = 1";
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
    <?php
    include('partials/footer.php');
    ?>