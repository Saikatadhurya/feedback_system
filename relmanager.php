<?php
// Include config file
session_start();

      $errors= array();
      if (!isset($_SESSION['email'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login_now.php');
    }else{
        $email = $_SESSION['email'];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="theme-color" content="#1A237E" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/relleg.css">
    <link rel="icon" href="assets/image/logo.png" type="image/gif" sizes="16x16">
    <title>Digital Babu|Relationship Manager</title>
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
                                    
                                    
                                </div>
                             
                    </div>
                    
                </div>
               
          </nav>
          <div id="load_screen" class="text-center">
              <div id="loading" class="text-center">
               <h3>Loading...</h3>
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
                        <h5 class="card-title text-center text-primary d-none d-sm-block font-weight-bold"> Book a Relationship Manager Now</h5>
                        <h5 class="text-center text-primary d-block d-sm-none font-weight-bold"> Book a Relationship Manager Now </h5>
                        
							<hr>
					<div class="container text bg-light p-3 shadow">
						<h6>Unable to figure out how to handle a government task?
						Don't worry! Our Relationship Manager will handle everything for you.
						All you need to do is Relax and your Relationship Manager will handle the rest.</h6>
						<hr class="bg-primary">
						<ul>
						<p class="font-weight-bold">Services offered by the Relationship Manager : </p>
						<li>Full information about how to proceed with your application</li>
						<li>Assistance in online form filling</li>
						<li>Online alternatives to physically visiting an office</li>
						<li>Assistance in legal issues and connecting you with the right people</li>
						</ul>
					</div>
					<div class="text-center text-light mt-2"><a href="https://upi.link/s/paydigitalbaburelation" target="_blank" class="btn btn-lg btn-block btn-primary">Pay ₹99 and book now</a></div>
					<p class="text-success small"><b>*Refundable</b></p>
					</div>
                      </div>
                    </div>
                  </div>
                </div>
              
 <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script> 
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script src="js/preloader.js"></script>  
<script>
$('.btn').on('click', function() {
    var $this = $(this);
  $this.button('loading');
    setTimeout(function() {
       $this.button('reset');
   }, 15000);
});

</script>
</body>
</html>
