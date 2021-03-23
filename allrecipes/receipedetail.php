<?php
require("admin/dbconnect.php");
include('partials/headlinks.php');
//include('partials/preloader_search.php');
if(isset($_SESSION['user'])){
    $email = $_SESSION['user'];
    $sqluid = "select * from users where email = '$email'";
    $resultuid = mysqli_query($conn,$sqluid);
    while ($rowuid = mysqli_fetch_assoc($resultuid)) {
        $uid = $rowuid['id'];
    }

}
include('partials/header.php');
?>
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcumb-text text-center">
                    <h2>Recipe</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<div class="receipe-post-area section-padding-80">

    <!-- Receipe Post Search -->
    <div class="receipe-post-search mb-80">
        <div class="container">
            <form action="#" method="post">
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <select name="select1" id="select1">
                            <option value="1">All Receipies Categories</option>
                            <option value="1">All Receipies Categories 2</option>
                            <option value="1">All Receipies Categories 3</option>
                            <option value="1">All Receipies Categories 4</option>
                            <option value="1">All Receipies Categories 5</option>
                        </select>
                    </div>
                    <div class="col-12 col-lg-3">
                        <select name="select1" id="select2">
                            <option value="1">All Receipies Categories</option>
                            <option value="1">All Receipies Categories 2</option>
                            <option value="1">All Receipies Categories 3</option>
                            <option value="1">All Receipies Categories 4</option>
                            <option value="1">All Receipies Categories 5</option>
                        </select>
                    </div>
                    <div class="col-12 col-lg-3">
                        <input type="search" name="search" placeholder="Search Receipies">
                    </div>
                    <div class="col-12 col-lg-3 text-right">
                        <button type="submit" class="btn delicious-btn">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Receipe Slider -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="receipe-slider owl-carousel">
                    <img src="img/bg-img/bg5.jpg" alt="">
                    <img src="img/bg-img/bg5.jpg" alt="">
                    <img src="img/bg-img/bg5.jpg" alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- Receipe Content Area -->
    <div class="receipe-content-area">
        <div class="container">

            <div class="row">
                <?php
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                }
                    $sql = "SELECT recipe.title,users.last_name, recipe.description,recipe.posted_date,recipe.prep,recipe.total_time,recipe.servings,users.id,users.first_name
                    FROM recipe
                    INNER JOIN users ON recipe.user_id=users.id where recipe.id = $id";
                    $result = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                <div class="col-12 col-md-8">
                    <div class="receipe-headline my-5">
                        <span><?php echo $row['posted_date']?></span>
                        <span class="mb-4">Posted BY<span class="text-warning">
                                <?php echo $row['first_name']." "; echo $row['last_name'];?></span></span>
                        <h2><?php echo $row['title']?></h2>
                        <p class="font-weight-bold"><?php echo $row['description']?></p>
                        <div class="receipe-duration">
                            <h6>Prep: <?php echo $row['prep']?> mins</h6>
                            <h6>Cook: <?php echo $row['total_time']?> mins</h6>
                            <h6>Yields: <?php echo $row['servings']?> Servings</h6>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
                <div class="col-12 col-md-4">
                    <div class="receipe-ratings text-right my-5">
                        <div class="ratings">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                        </div>
                        <a href="#" class="btn delicious-btn">Delicious</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-8">
                    <!-- Single Preparation Step -->
                    <?php 
                            $sql1 = "select steps from directions where rec_id=$id";
                            $result1 = mysqli_query($conn,$sql1);
                            $i = 1;
                            while($row1 = mysqli_fetch_assoc($result1)){
                        ?>
                    <div class="single-preparation-step d-flex">
                        <h4><?php echo $i?>.</h4>
                        <p><?php echo $row1['steps']?></p>
                    </div>
                    <?php
                            $i++;    
                    }
                        ?>
                </div>

                <!-- Ingredients -->
                <div class="col-12 col-lg-4">
                    <div class="ingredients">
                        <h4>Ingredients</h4>
                        <!-- Custom Checkbox -->
                        <?php 
                            $sql2 = "select ingredient from ingredients where rec_id = $id";
                            $result2 = mysqli_query($conn,$sql2);
                            while($row2 = mysqli_fetch_assoc($result2)){
                        ?>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label"
                                for="customCheck1"><?php echo $row2['ingredient']?></label>
                        </div>
                        <?php
                            }
                        ?>
                        <!-- Custom Checkbox -->
                    </div>
                </div>
            </div>
            <!-- comments -->
        
                     
            <div class="row">
                <div class="col-md-12 my-4">

                    <h3>All comments<?php
                    $sqlcountcom = "select * from comments where rec_id = $id";
                    $resultcountcom = mysqli_query($conn,$sqlcountcom);
                    $count = mysqli_num_rows($resultcountcom);
                    echo "(".$count.")" ;
                    ?></h3>

                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div id="comments">

                    </div>
                </div>


            </div>
           

            <?php
            if(isset($_SESSION['user'])){
            ?>
            <div class="row">
                <div class="col-md-12 my-4">

                    <h3>Leave a comment</h3>

                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-form-area">
                        <form action="#" method="post">
                            <div class="row">
                                <textarea name="message" class="form-control" id="message" cols="30" rows="10"
                                    placeholder="Message"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn delicious-btn mt-30" id="button" type="submit">Post Comments</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
            <?php
            }else{
            ?>
             <div class="row">
                <div class="col-md-12 my-4">

                    <h3>Sign in to post a comment</h3>

                </div>
            </div>
            <a class="btn delicious-btn mt-30" href="login.php">Login</a>
            <?php
            }
            ?>
        </div>
    </div>
</div>
</div>

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
<script>
$(document).ready(function() {
    function loaddata() {
        $.ajax({
            url: 'loadcomments.php',
            method: 'POST',
            data: {
                recipeid: '<?php echo $id;?>',
                userid: '<?php if(isset($uid)){
                    echo $uid;
                }else{
                    echo 0;
                };?>'
            },
            success: function(data1) {
                $("#comments").html(data1);
            }

        });
    }


    $("#button").click(function(event) {
        event.preventDefault();
        var name = $("#message").val();
        $.ajax({
            url: 'insertcomment.php',
            method: 'POST',
            data: {
                name: name,
                recipeid: '<?php echo $id;?>',
                userid: '<?php if(isset($uid)){
                    echo $uid;
                }else{
                    echo 0;
                };?>'
            },
            success: function(data) {
                loaddata();
            }

        });
    });
    loaddata();
});
</script>


<?php
ob_end_flush();
    include('partials/footer.php');
?>