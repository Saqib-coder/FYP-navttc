<header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-between">
                    <!-- Breaking News -->
                    <div class="col-12 col-sm-6">
                        <div class="breaking-news">
                            <div id="breakingNewsTicker" class="ticker">
                                <ul>
                                    <li><a href="#"><span class="text-success">Hello Delicious!</span></a></li>
                                    <li><a href="#"><span class="text-success">Welcome to Delicious blog family.</span></a></li>
                                    <li><a href="#"><span class="text-success">Sign up to the site to post your own Delicious Reciepes!</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Top Social Info -->
                    <div class="col-12 col-sm-6">
                        <div class="top-social-info text-right">
                            <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="delicious-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="deliciousNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="index.php"><img src="img/core-img/logo.png" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li class="active"><a href="index.php">Home</a></li>
                                    <li><a href="#">Explore Recipe</a>
                                        <ul class="dropdown" style="width:200px">
                                        <?php 
                                        require('admin/dbconnect.php');
                                        ?>
                                            <?php 
                                            $sql = "SELECT * FROM `categories`";
                                            $result = mysqli_query($conn,$sql);
                                            while($row = mysqli_fetch_assoc($result)){
                                                 $subcatid = $row['cat_id']; ?>
                                             <li><a><?php echo $row['cat_name'];?></a>
                                                <ul class="dropdown text-nowrap ml-3" style="width:270px">
                                                <?php 
                                            $sql1 = "SELECT * FROM `subcategories` where cat_id =  $subcatid";
                                            $result1 = mysqli_query($conn,$sql1);
                                            while($row1 = mysqli_fetch_assoc($result1)){?>
                                                    <li class="text-nowrap"><a href="allrecipe.php?id=<?php echo $row1['sub_id'];?>"><?php echo $row1['sub_name'];?></a></li>
                                                    <?php }
                                                    ?>
                                                </ul>
                                            </li>
                                            <?php
                                            }
                                            
                                            ?>
                                           
                                        </ul>
                                    </li>
                                    <li><a href="reciepelist.php">Receipies</a></li>
                                  
                                    <li><a href="contact.php">Contact</a></li>
                                    <li><a href="#">Account</a>
                                        <ul class="dropdown">
                                            <?php
                                            if(isset($_SESSION['user'])){?>
                                            <li><a href="addReciepes.php">Add a Reciepe</a>
                                            </li>
                                            <li><a href="logout.php">logout</a>
                                            </li>    
                                            <?php
                                            }else{?>
                                             <li><a href="signup.php">Sign up</a>
                                            </li>
                                            <li><a href="login.php">login</a>
                                            </li>
                                           
                                            <?php
                                            }
                                            ?>
                                            
                                        </ul>
                                    </li>
                                </ul>

                                <!-- Newsletter Form -->
                                <div class="search-btn">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </div>

                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>