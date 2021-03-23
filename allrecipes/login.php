<?php
session_start();
if (isset($_SESSION['user'])) {
  header('location:index.php');
}

  if (isset($_POST['btn-login'])) {
  $arrerrors = array();
  if(empty($_POST['email'])) {
  $arrerrors['email'] = "email is required";  
  }elseif(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
  $arrerrors['email'] = "Invalid Email";  
  }else{
    $email = $_POST['email'];
  }
  if(empty($_POST['password'])) {
  $arrerrors['password'] = "password is required";  
  }else{
    $password = $_POST['password'];
  }
  if(empty($arrerrors)){
     require 'admin/dbconnect.php';
        $query="SELECT * from users where email='$email'";
        $result1 = mysqli_query($conn,$query);
        $row1 = mysqli_num_rows($result1);

    if ($row1>0) {
            //super globab associative array
      while ($checkrow = mysqli_fetch_assoc($result1)) {
                
                if(password_verify($password , $checkrow['password'])){
                   
                    $_SESSION['user']=$email;?>
                    
                   <script> history.go(-2); </script>
          <?php
          }else{

            $fail = "<div class='alert alert-danger' role='alert'>
                  email or password do not match
                </div>";
                }
      }
  }
}else{

      $fail = "<div class='alert alert-danger' role='alert'>
            email or password do not match
          </div>";
          }
}

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Aviato E-Commerce Template">
  
  <meta name="author" content="Themefisher.com">

  <title>delicious blog</title>

  <!-- Mobile Specific Meta-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Favicon -->
  <!-- <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" /> -->
  
  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="plugins/themefisher-font/style.css">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">

</head>

<body id="body">

<section class="signin-page account">
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="block text-center">
          <?php
          if (isset($fail)) {
            echo $fail;
          }
          ?>
           <a class="logo" href="index.php">
            <img src="img/core-img/logo.png" alt="">
          </a>
          <h2 class="text-center">Welcome Back</h2>
          <form class="text-left clearfix" action="" method="POST">
            <div class="form-group">
              <input type="email" name="email" class="form-control"  placeholder="Email">
              <?php 
                      if(isset($arrerrors['email'])){
            ?>
                      
                      <span class="text-danger">
                        <?php echo $arrerrors['email'];?>

                      </span>
                      <?php } ?>
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control" placeholder="Password">
              <?php 
                      if(isset($arrerrors['password'])){
            ?>
                      
                      <span class="text-danger">
                        <?php echo $arrerrors['password'];?>

                      </span>
                      <?php } ?>
            </div>
            <div class="text-center">
              <button type="submit" name="btn-login" class="btn btn-main text-center" >Login</button>
            </div>
          </form>
          <p class="mt-20">New in this site ?<a href="signup.php"> Create New Account</a></p>
        </div>
      </div>
    </div>
  </div>
</section>


  </body>
  </html>