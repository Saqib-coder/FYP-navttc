<?php
if (isset($_POST['btn-signup'])) {
  $arrerrors = array();
  if(empty($_POST['firstname'])) {
  $arrerrors['firstname'] = "firstname is required";  
  }else{
    $firstname = $_POST['firstname'];
  }if(empty($_POST['lastname'])) {
  $arrerrors['lastname'] = "lastname is required";  
  }else{
    $lastname = $_POST['lastname'];
  }if(empty($_POST['email'])) {
  $arrerrors['email'] = "email is required";  
  }elseif(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
  $arrerrors['email'] = "Invalid Email";  
  }else{
    $email = $_POST['email'];
  }
  if(empty($_POST['password'])) {
  $arrerrors['password'] = "password is required";  
  }if(empty($_POST['confirmpassword'])) {
  $arrerrors['confirmpassword'] = "confirm password is required"; 
  }elseif(!($_POST['password'] == $_POST['confirmpassword'])){
  $arrerrors['confirmpassword'] = "password and confirm password do not match"; 

  }else{
    
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  }
  
  if(empty($_POST['dob'])) {
  $arrerrors['dob'] = "dob is required";  
  }else{
    $dob = $_POST['dob'];
  }
  if(empty($_POST['gender'])) {
  $arrerrors['gender'] = "gender is required";  
  }else{
    $gender = $_POST['gender'];
  }if(empty($_POST['phone'])) {
  $arrerrors['phone'] = "phone is required";  
  }else{
    $phone = $_POST['phone'];
  }if(empty($_POST['address'])) {
  $arrerrors['address'] = "address is required";  
  }else{
    $address = $_POST['address'];
  }

  if(empty($arrerrors)){
    
    require 'admin/dbconnect.php';
    $sql = "insert into users(first_name,last_name,email,password,DOB,Gender,Phone_number,Address,added_on)values('$firstname','$lastname','$email','$password','$dob','$gender','$phone','$address',now())";
    $result = mysqli_query($conn,$sql);
    if ($result) {
      $success = "<div class='alert alert-success' role='alert'>
      you have been successfully registered!
      </div>";
    }

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
          <?php if(isset($success)){
            echo $success;
          }?>
          <a class="logo" href="index.php">
            <img src="img/core-img/logo.png" alt="">
          </a>
          
          <h2 class="text-center">Create Your Account</h2>
          <form class="text-left clearfix" action="" method="POST">
            <div class="form-group">
              <input type="text" class="form-control" name="firstname"  placeholder="First Name">
               <?php 
                      if(isset($arrerrors['firstname'])){
            ?>
                      
                      <span class="text-danger">
                        <?php echo $arrerrors['firstname'];?>

                      </span>
                      <?php } ?>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="lastname"  placeholder="Last Name">
               <?php 
                      if(isset($arrerrors['lastname'])){
            ?>
                      
                      <span class="text-danger">
                        <?php echo $arrerrors['lastname'];?>

                      </span>
                      <?php } ?>
            </div>
            <div class="form-group">
              <input placeholder="Date of birth" class="form-control" type="text" onfocus="(this.type='date')" name="dob">
              <?php 
                      if(isset($arrerrors['dob'])){
            ?>
                      
                      <span class="text-danger">
                        <?php echo $arrerrors['dob'];?>

                      </span>
                      <?php } ?>
            </div>
              <div class="form-group">
              <h5>Gender</h5>
             <label>Male</label>
             <input type="radio" name="gender"  value="male">
             &nbsp;&nbsp;
             <label>Female</label>
             <input type="radio" name="gender"  value="Female">
             <?php 
                      if(isset($arrerrors['gender'])){
            ?>
                      
                      <span class="text-danger">
                        <?php echo $arrerrors['gender'];?>

                      </span>
                      <?php } ?> 
            </div>
            <div class="form-group">
              <input type="email" class="form-control" name="email" placeholder="Email">
              <?php 
                      if(isset($arrerrors['email'])){
            ?>
                      
                      <span class="text-danger">
                        <?php echo $arrerrors['email'];?>

                      </span>
                      <?php } ?>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="password"  placeholder="Password">
               <?php 
                      if(isset($arrerrors['password'])){
            ?>
                      
                      <span class="text-danger">
                        <?php echo $arrerrors['password'];?>

                      </span>
                      <?php } ?>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="confirmpassword"  placeholder="confirm Password">
              <?php 
                      if(isset($arrerrors['confirmpassword'])){
            ?>
                      
                      <span class="text-danger">
                        <?php echo $arrerrors['confirmpassword'];?>

                      </span>
                      <?php } ?>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="phone"  placeholder="Phone Number">
           
            <?php 
                      if(isset($arrerrors['phone'])){
            ?>
                      
                      <span class="text-danger">
                        <?php echo $arrerrors['phone'];?>

                      </span>
                      <?php } ?>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="address" placeholder="Address">
              <?php 
                      if(isset($arrerrors['address'])){
            ?>
                      
                      <span class="text-danger">
                        <?php echo $arrerrors['address'];?>

                      </span>
                      <?php } ?>
            </div>
          
            
            <div class="text-center">
              <button type="submit" class="btn btn-main text-center" name="btn-signup">Sign Up</button>
            </div>
          </form>
          <p class="mt-20">Already have an account ?<a href="login.php"> Login</a></p>
          <!-- <p><a href="forget-password.html"> Forgot your password?</a></p> -->
        </div>
      </div>
    </div>
  </div>
</section>

    <!-- 
    Essential Scripts
    =====================================-->
    
   

  </body>
  </html>
