<?php
session_start();
if(isset($_SESSION['admin'])){
    header('location:index.php');

}

if(isset($_POST['btn-submit'])) {
   
    $password = trim($_POST['pass']);
    $email = trim($_POST['email']);
    $arrErrors = array();
    if(empty($_POST['email'])){
        $arrErrors['email']='Email can not be empty';
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $arrErrors['email']='Invalid Email';

    }
    if(empty($_POST['pass'])) {
        $arrErrors['pass']='password can not be empty';
        
    }
    if (empty($arrErrors)) {

                if($email=='admin@gmail.com' && $password=='admin123'){

                    if(!empty($_POST['remember'])){
                        setcookie('member-email',$email,time()+84600);
                        setcookie('member-password',$password,time()+84600);
                        $_SESSION['admin']=$email;
                        header('location:index.php');                    
                    }elseif(empty($_POST['remember'])) {
                       setcookie('member-email','');
                       setcookie('member-password','');
                       $_SESSION['admin']=$email;
                       header('location:index.php');
                   }

               }else{
                $arrErrors['wrongauth']='Email or password do not match';

            }
        }



    }







?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style type="text/css">
        img{
            object-fit:cover;
        }
    </style>
</head>

<body class="bg-gradient-info">
          <form action="" method="POST">
        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <img width="400px" height="600px" src="img/login1.jpg">
                                </div>

                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4" style="font-weight: 900; font-size: 50px"><b>Login Form</b></h1>
                                        </div>
                                         <?php
                if (isset($arrErrors['wrongauth'])){
                    ?>
                    <div class="alert alert-danger  fade show" role="alert">
   <?php echo $arrErrors['wrongauth']; ?>
 
</div>
                    <?php
                }


                ?>
                                        <form class="user">
                                            <div class="form-group">
                                                <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." <?php if(isset($email)){
                                                    echo "value=$email";
                                                    }?> name="email">
                                                <?php
                if (isset($arrErrors['email'])){
                    ?>
                    <span  style="color: red"> <?php echo $arrErrors['email'];?> </span>
                    <?php
                }


                ?>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="pass">
                                                <?php
                if (isset($arrErrors['pass'])){
                    ?>
                    <span  style="color: red"> <?php echo $arrErrors['pass'];?> </span>
                    <?php
                }


                ?>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck" name="remember">
                                                    <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                                </div>
                                            </div>
                                            <br>
                                            <button  class="btn btn-info btn-user btn-block" name="btn-submit" type="submit">
                                                Login
                                            </button>
                                       <!--  <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a> -->
                                   
                                   <!--  <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>