<?php
session_start();
$errors = array();
require_once "include/connect.php";
if (isset($_SESSION['email'])) {
  	$_SESSION['msg'] = "Already logged in";
  	header('location: feedback.php');
  }
if (isset($_POST['login_user'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($email)) {
  	array_push($errors, "Email is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM user_details WHERE email='$email' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['email'] = $email;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: feedback.php');
  	}else {
  		array_push($errors, "Wrong email/password combination");
  	}
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="theme-color" content="#3c1c77" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" href="assets/image/logo.png" type="image/gif" sizes="16x16">
    <title>Digital Babu|Login</title>
</head>
<body>
    <nav class="navbar navbar-dark navbar-expand-sm navbar-light fixed-top py-1">
                <div class="container">
                        <a href="index.php" class="nav-link text-white"><h5><i class="fa fa-arrow-left fa-lg"></i></h5></a>
               <a class="navbar-brand ml-1 mr-auto order-1 order-md-1" href="index.php">Digital Babu <img src="assets/image/logo.png" height="30px" width="30px"></a>
                    <div class="nav-item dropdown order-2">
                            <a class="nav-link dropdown-toggle text-white" style="text-decoration:none" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-ellipsis-v fa-lg"></span> </a>
                          
                            <div class="dropdown-menu dropdown-menu-right">        
                                    <a class="dropdown-item" href="help.php"><span class="fa fa-question-circle"></span> Help</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="signup.php"><span class="fa fa-user-plus"></span> Signup</a>

                                    
                                </div>
                             
                    </div>
                    
                </div>
               
          </nav>
          <div id="load_screen" class="text-center">
                <div id="loading" class="text-center">
                 <h3>Welcome to Citizen Feedback System</h3>
                 <p> <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                        <span class="sr-only">Loading...</span>
                      </div>
                </div>
          </div>
          <div class="container">
                <div class="row">
                  <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card card-signin my-5">
                      <div class="card-body">
                        <h5 class="card-title text-center">Sign In</h5>
                        <form class="form-signin" method="post" action="login.php">
                        <?php include('errors.php'); ?>
                        <div class="form-label-group">
                            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
                            <label for="inputEmail">Email address</label>
                          </div>
            
                          <div class="form-label-group">
                            <input type="password" class="form-control" placeholder="Password" name="password" id="myInput" required>
                            <label for="myInput">Password</label>
                          </div>
                          <div class="custom-control custom-checkbox mb-3 ml-1">
                                <input type="checkbox" class="custom-control-input" id="check" onclick="myFunction()">
                                <label class="custom-control-label" for="check">Show Password</label>
                          </div>
            
                          
                          <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="login_user" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Please wait.... ">Sign in</button>
                          <p class="d-block text-center mt-2 small" >Don't have an account? <a href="signup.php">Register</a></p>
                         <!-- <hr class="my-4">
                          <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fa fa-google mr-2"></i> Sign in with Google</button>
                          <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fa fa-facebook-f mr-2"></i> Sign in with Facebook</button>
                        --></form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
 <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script> 
<script src="js/preloader.js"></script>
<script src="js/showpass.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script>
$('.btn').on('click', function() {
    var $this = $(this);
  $this.button('loading');
    setTimeout(function() {
       $this.button('reset');
   }, 6000);
});

</script>
</body>
</html>