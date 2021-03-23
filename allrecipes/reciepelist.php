<?php
require"admin/dbconnect.php";
include('partials/headlinks.php');
include('partials/preloader_search.php');
include('partials/header.php');


?>
<h1 class="text-center">All Reciepes</h1>

<section class="best-receipe-area my-4">
    <div class="container">
        <div class="row">
            <!-- Single Best Receipe Area -->
            <?php
                $sql = "SELECT * FROM recipe where status = 1
                ORDER BY RAND() ";
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