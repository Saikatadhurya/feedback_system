<?php
// Include config file
session_start();
require_once "include/connect.php";
      $errors= array();
	  if (isset($_SESSION['email'])) {
  	$_SESSION['msg'] = "Already logged in";
  	header('location: index.php');
  }
if (isset($_POST['reg_user'])) {
	 $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
	 $middle_last_name = mysqli_real_escape_string($db, $_POST['middle_last_name']);
	 $email = mysqli_real_escape_string($db, $_POST['email']);
	 $mobile = mysqli_real_escape_string($db, $_POST['mobile']);
	 $address = mysqli_real_escape_string($db, $_POST['address']);
	 $aadhar_no = mysqli_real_escape_string($db, $_POST['aadhar_no']);
	 $password = mysqli_real_escape_string($db, $_POST['password']);
	 $confirm_password = mysqli_real_escape_string($db, $_POST['confirm_password']);
	 $dob = mysqli_real_escape_string($db, $_POST['dob']);
	 $doc_name = $_FILES['document']['name'];
      $doc_size = $_FILES['document']['size'];
      $doc_tmp = $_FILES['document']['tmp_name'];
      $doc_type = $_FILES['document']['type'];
	  $tmp = explode('.', $_FILES['document']['name']);
      $doc_ext=strtolower(end($tmp));
      $docname = $first_name."_".$aadhar_no.".".$doc_ext;
      $doc_extensions= array("jpeg","jpg","png","pdf");
      
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  if (empty($first_name)) { array_push($errors, "First name is required"); }
  if (empty($middle_last_name)) { array_push($errors, "Middle Name and Last Name are required"); }
  if (empty($aadhar_no)) { array_push($errors, "Aadhar number is required"); }
  if (empty($dob)) { array_push($errors, "Date of Birth is required"); }
  if (empty($address)) { array_push($errors, "Address is required"); }
  if (empty($mobile)) { array_push($errors, "Phone number is required"); }
  
  if ($password != $confirm_password) {
	array_push($errors, "The two passwords do not match");
  }
  
  $user_check_query = "SELECT * FROM user_details WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
   if ($user) { // if user exists
   
    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }
  if (count($errors) == 0) {
  	$password = md5($password);//encrypt the password before saving in the database

  	$query = "INSERT INTO user_details (first_name, middle_last_name, email, mobile, address, aadhar_image, aadhar_no, dob, password) 
  			  VALUES('$first_name', '$middle_last_name','$email', '$mobile', '$address', '$docname', '$aadhar_no', '$dob', '$password')";
  	if(mysqli_query($db, $query))
	{
    move_uploaded_file($doc_tmp,"assets/image/membersdoc/".$docname);
  	$_SESSION['email'] = $email;
  	$_SESSION['success'] = "You are now logged in";
	
  	header('location: index.php');
	}else
	{
		array_push($errors, "Not possible.");
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
    <title>Digital Babu|Signup</title>
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
                                    <a class="dropdown-item" href="login.php"><span class="fa fa-sign-in"></span> Login</a>
                                    
                                    
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
                  <div class="col-lg-10 col-xl-9 mx-auto">
                    <div class="card card-signin flex-row my-5">
                      <div class="card-img-left d-none d-md-flex">
                         <!-- Background image for card set in CSS! -->
                      </div>
                      <div class="card-body">
                        <h5 class="card-title text-center">Register</h5>
                        <form class="form-signin" method="post" action="signup.php" enctype="multipart/form-data">
                        <?php include('errors.php'); ?>
                            <div class="row">
                                <div class="col-sm-5">
                                <div class="form-label-group">
                                    <input type="text" id="fname" class="form-control" placeholder="First Name" name="first_name" required autofocus>
                                    <label for="fname">First Name</label>
                                </div>
                                </div>
                                <div class="col-sm">
                                <div class="form-label-group">
                                        <input type="text" id="mlname" class="form-control" placeholder="Middle and Last Name" name="middle_last_name" required>
                                        <label for="mlname"> Middle and Last Name</label>
                                    </div>
                                </div>

                            </div>
            
                          <div class="form-label-group">
                            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required>
                            <label for="inputEmail">Email address</label>
                          </div>
                          <div class="form-label-group">
                                <input type="number"  id="mobile" class="form-control" placeholder="Mobile address" name="mobile" required>
                                <label for="mobile">Mobile number</label>
                            </div>
                          <div class="form-label-group">
                            <input type="text" id="address" class="form-control" placeholder="Address" name="address" required>
                            <label for="address">Address</label>
                          </div>
                          <div class="form-label-group">
                                <input type="file" id="aadhar" class="form-control" placeholder="Aadhar" name="document" required>
                                <label for="aadhar">Aadhar Card</label>
                            </div>
                            <div class="form-label-group">
                                    <input type="text" id="ano" class="form-control" placeholder="Aadhar Card Number" name="aadhar_no" required>
                                    <label for="ano">Enter Aadhar Card Number</label>
                            </div>
                            <div class="form-label-group">
                                    <input type="date" id="dob" class="form-control" name="dob" required>
                                    <label for="dob">Date of Birth</label>
                            </div>
                          <hr>
            
                          <div class="form-label-group">
                            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
                            <label for="inputPassword">Password</label>
                          </div>
                          
                          <div class="form-label-group">
                            <input type="password" id="inputConfirmPassword" class="form-control" placeholder="Password" name="confirm_password" required>
                            <label for="inputConfirmPassword">Confirm password</label>
                          </div>
            
                          <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="reg_user" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Please wait.... ">Register</button>
                          <p class="d-block text-center mt-2 small" >Already have an account? <a href="login.php">Log In</a></p>
                         <!-- <hr class="my-4">
                          <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fa fa-google mr-2"></i> Sign up with Google</button>
                          <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fa fa-facebook-f mr-2"></i> Sign up with Facebook</button>
                       --> </form>
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
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script>
$('.btn').on('click', function() {
    var $this = $(this);
  $this.button('loading');
    setTimeout(function() {
       $this.button('reset');
   }, 8000);
});

</script>
</body>
</html>
