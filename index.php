<?php 
session_start(); 
include_once("include/connect.php");
  if (isset($_SESSION['email'])) {
	  $email = $_SESSION['email'];
  }
  if (isset($_SESSION['succ'])) {
 $_SESSION['succ'] = NULL;
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
    <link rel="manifest" href="manifest.json">
    <link rel="icon" href="assets/image/logo.png" type="image/gif" sizes="16x16">
    <title>Digital Babu</title>
</head>
<body>
    <nav class="navbar navbar-dark navbar-expand-md shadow fixed-top">
                <div class="container">
                        <button class="navbar-toggler order-0 order-md-0" style="outline:none; border:none;" type="button" data-toggle="collapse" data-target="#Navbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                        
                    <a class="navbar-brand ml-1 mr-auto order-1 order-md-1 py-0" href="#">Digital Babu <img src="assets/image/logo.png" height="30px" width="30px"></a>
                    <div class="collapse navbar-collapse order-3 order-md-2" id="Navbar">
                        <ul class="navbar-nav ml-md-auto mr-md-3">
                                <li class="nav-item"><a class="nav-link" href="feedback.php"><span class="fa fa-info-circle fa-lg"></span> Give Your Feedback</a></li>
                                <li class="nav-item"><a class="nav-link" href="nearby.php"><span class="fa fa-building fa-lg"></span> Nearby Government Office</a></li>
								 <li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								  <i class="fa fa-gift"></i> Premium Services <i class="fa fa-caret-down  fa-lg"></i>
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								  <a class="dropdown-item" href="stingop.php"><i class="fa fa-ban fa-lg mr-2"></i> Sting Operation</a>
								  <div class="dropdown-divider"></div>
								  <a class="dropdown-item" href="relmanager.php"><i class="fa fa-user mr-2"></i> Relationship Manager</a>
								  <div class="dropdown-divider"></div>
								  <a class="dropdown-item" href="legal.php"><i class="fa fa-gavel mr-2"></i> Legal help</a>
								</div>
							  </li>
                                <li class="nav-item d-md-block d-none"><a class="nav-link" href="help.php"><span class="fa fa-question-circle"></span> Help</a></li>
                                <?php if (!isset($_SESSION['email'])) 
                                     { ?>
                                <li class="nav-item d-md-block d-none"><a class="nav-link" href="login_now.php"><span class="fa fa-sign-in"></span> Login</a></li>
                                <li class="nav-item d-md-block d-none"><a class="nav-link" href="signup.php"><span class="fa fa-user-plus"></span> Signup</a></li>
                                <?php }

                                else{

                                ?>
                                <li class="nav-item d-md-block d-none"><a class="nav-link" href="logout.php"><span class="fa fa-sign-in"></span> Logout</a></li>
                                  <?php

                                  }

                                  ?>
                        </ul>
                    </div>
                    <div class="nav-item dropdown order-2 d-md-none d-block">
                            <a class="nav-link dropdown-toggle text-white" style="text-decoration:none" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-ellipsis-v fa-lg"></span> </a>
                          
                            <div class="dropdown-menu dropdown-menu-right">        
                                    <a class="dropdown-item" href="help.php"><span class="fa fa-question-circle"></span> Help</a>
                                    <div class="dropdown-divider"></div>
                                    <?php if (!isset($_SESSION['email'])) 

	                                  { ?>
                                    <a class="dropdown-item" href="login_now.php"><span class="fa fa-sign-in"></span> Login</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="signup.php"><span class="fa fa-user-plus"></span> Signup</a>
                                    <?php }

                                    else{

                                    ?>
                                    <a class="dropdown-item" href="logout.php"><span class="fa fa-sign-in"></span> Logout</a>
                                      <?php

                                      }

                                      ?>

                                    
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
          <header class="masthead">
                <div class="container h-100">
                  <div class="row h-100 align-items-center text-white-50">
                    <div class="col-12 text-center">
                      <h1 class="font-weight-bold">Welcome to Citizen Feedback Portal</h1>
                      <p class="lead">Your feedback is Extremely valuable for us !!</p>
					  <?php if (!isset($_SESSION['email'])) 
	                                  { ?>
                      <a href="feedback.php"><button type="button" class="btn btn-outline-light btn-lg">Login and Give your Feedback</button></a>
									  <?php }
									  else{?>
					  <a href="feedback.php"><button type="button" class="btn btn-outline-light btn-lg">Give your Feedback</button></a>
									  <?php }?>
					  <?php 
		
                        $query = mysqli_query($db,"select * from district");
                        $district = mysqli_num_rows($query);
                        $query = mysqli_query($db,"select * from city");
                        $city = mysqli_num_rows($query);
                        $query = mysqli_query($db,"select * from office");
                        $office = mysqli_num_rows($query);
                        $query = mysqli_query($db,"select * from other_feedback");
		                $review = mysqli_num_rows($query);
                        ?>
                    <div class="d-none d-sm-block p-5">
                      <div class="row mt-sm-5">                
                            <div class="col-6 col-sm-3"><h4><i class="fa fa-map-marker"></i> <?php echo $district; ?> Districts</h4></div>
                            <div class="col-6 col-sm-3"><h4><i class="fa fa-map"></i> <?php echo $city; ?> Cities</h4></div>
                            <div class="col-6 col-sm-3"><h4><i class="fa fa-building"></i> <?php echo $office; ?> Offices</h4></div>
                            <div class="col-6 col-sm-3"><h4><i class="fa fa-pencil"></i> <?php echo $review; ?> Reviews</h4></div>
                        </div>
                     </div>

                     <div class="d-block d-sm-none">
                        <div class="row mt-5">                
                            <div class="col-6 col-sm-3"><h6><i class="fa fa-map-marker"></i> <?php echo $district; ?> Districts</h6></div>
                            <div class="col-6 col-sm-3"><h6><i class="fa fa-map"></i>  <?php echo $city; ?> Cities</h6></div>
                            <div class="col-6 col-sm-3"><h6><i class="fa fa-building"></i> <?php echo $office; ?> Offices</h6></div>
                            <div class="col-6 col-sm-3"><h6><i class="fa fa-pencil"></i> <?php echo $review; ?> Reviews</h6></div>
                        </div>
	                </div>
                    </div>
                  </div>
                </div>
              </header>
              
              <!-- Page Content -->
              <section class="py-5">
                <div class="container">
                  <h2 class="font-weight-light">About the Application</h2>
                  <p>Digital Babu is an web application which allows the user to share there experience after visiting the government offices. It also allow the government to check whether there departments are working properly. </div>
              </section>

            <footer id="sticky-footer" class="py-4 text-white-50">
                    <div class="container text-center">
                      <small>Copyright &copy; Digital Babu</small>
                    </div>
            </footer>
 <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script> 
<script src="js/preloader.js"></script>
<script>
    if ('serviceWorker' in navigator) {
      console.log("Will service worker register?");
      navigator.serviceWorker.register('service-worker.js').then(function(reg){
        console.log("Yes it did.");
      }).catch(function(err) {
        console.log("No it didn't. This happened: ", err)
      });
    }
  </script>    
</body>
</html>