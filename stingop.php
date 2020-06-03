<?php
// Database configuration
$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "feedback_system";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>
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
  
if (isset($_POST['submit'])) {

	 $operation = mysqli_real_escape_string($db, $_POST['operation']);
	 $location = mysqli_real_escape_string($db, $_POST['location']);
   $description = mysqli_real_escape_string($db, $_POST['description']);
   $email = $_SESSION['email'];
   if (empty($operation)) { array_push($errors, "Operation title is required"); }
  if (empty($location)) { array_push($errors, "Location is required"); }
  if (empty($description)) { array_push($errors, "Description is required"); }
  
  if (count($errors) == 0) {
  
      $targetDir = "assets/sting/image/";
      $allowTypes = array('jpg','png','jpeg','gif');
    
      $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
      array_filter($_FILES['files']['name']);
          foreach($_FILES['files']['name'] as $key=>$val){
              // File upload path
              $fileName = basename($_FILES['files']['name'][$key]);
              $targetFilePath = $targetDir . $fileName;
              
              // Check whether file type is valid
              $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
              if(in_array($fileType, $allowTypes)){
                  // Upload file to server
                  if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
                      // Image db insert sql
                      $insertValuesSQL .= "('".$email."','".$fileName."', NOW(),'".$operation."'),";
                  }else{
                      $errorUpload .= $_FILES['files']['name'][$key].', ';
                  }
              }else{
                  $errorUploadType .= $_FILES['files']['name'][$key].', ';
              }
          }
          
          if(!empty($insertValuesSQL)){
              $insertValuesSQL = trim($insertValuesSQL,',');
              // Insert image file name into database
              $insert = $db->query("INSERT INTO stingimages (email, file_name, uploaded_on,operation) VALUES $insertValuesSQL");
             
          }
          
          $post = $db->query("INSERT INTO stingdes (email, operation, location, description) VALUES ('".$email."','".$operation."', '".$location."', '".$description."')");
           $_SESSION['succ'] = "Successfully Submitted";
           header('Location:stingop.php');
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
    <meta name="theme-color" content="#c41b0c" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/sting.css">
    <link rel="icon" href="assets/image/logo.png" type="image/gif" sizes="16x16">
    <title>Sting Operation</title>
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
               <h3>String Operation</h3>
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
                        <h5 class="card-title text-center text-danger d-none d-sm-block font-weight-bold"><i class="fa fa-bullseye"></i> Post Your Sting Operation <i class="fa fa-bullseye"></i></h5>
                        <h5 class="text-center text-danger d-block d-sm-none font-weight-bold"><i class="fa fa-bullseye"></i> Post Your Sting Operation <i class="fa fa-bullseye"></i></h5>
                        
                        <hr>
						<div class="container alert alert-danger p-3 shadow">
						<h6>Someone asking for Bribe? Someone behaving rudely in public? Witnessing something Illegal?
							Don't tolerate any longer. We will help you RAISE your Voice.
							Just post some details about the situation and we will do the rest.</h6>
						<hr class="bg-danger">
						<ul>
						<li>Stay completely anonymous, We will not snitch on you</li>
						<li>We will handle the uploading, marketing, and management so that your content reaches the right audience</li>
						<li>We will help you in legal matters related to your content</li>
						<li>We will take your content to the right people who can take action</li>
						</ul>
					</div>
					<hr>
                        <form class="form-signin" method="post" action="stingop.php" enctype="multipart/form-data">
                        <?php include('errors.php'); ?>
                      <?php if (isset($_SESSION['succ'])){?>

                          <div class="alert alert-success"><?php echo $_SESSION['succ'];?></div>

                      <?php } ?>
                          <div class="form-label-group">
                            <input type="text" id="operation" class="form-control" placeholder="Operation Name" name="operation" required>
                            <label for="operation">Operation Name</label>
                          </div>
                          <div class="form-label-group">
                            <input type="text" id="location" class="form-control" placeholder="location" name="location" required>
                            <label for="location">Location</label>
                          </div>
                                      
                          <div class="form-label-group">
                           <textarea class="form-control" placeholder="Description of the Sting operation" name="description" rows="6"></textarea>
                          </div>

                          <div class="form-label-group">
                                <input type="file" name="files[]" class="form-control" multiple >
                                <label for="aadhar">Upload Images</label>
                          </div>
                           
                          <div class="form-label-group">
                                <input type="file" id="video" class="form-control" placeholder="video" name="video">
                                <label for="video">Upload Videos</label>
                            </div>
                            <div class="form-label-group">
                                <input type="file" id="audio" class="form-control" placeholder="audio" name="audio">
                                <label for="audio">Upload Audios</label>
                            </div> 
            
                          
                            <!-- <hr class="my-4">
                          <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fa fa-google mr-2"></i> Sign up with Google</button>
                          <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fa fa-facebook-f mr-2"></i> Sign up with Facebook</button>
                       --> 
                       <a href="https://upi.link/s/paydigitalbabusting" target="_blank" type="submit" class="btn btn-lg btn-danger btn-block text-light text-uppercase"  data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> If already paid then submit ">Pay ₹49</a>
					   <button type="submit" class="btn btn-lg btn-danger btn-block text-light text-uppercase" name="submit" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Please wait.... ">Submit &nbsp;</button>

  
    
    </form>
</div>
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
   }, 40000);
});

</script>
</body>
</html>
