<?php include_once("include/connect.php"); ?>
<?php 
  session_start(); 
  
  if (!isset($_SESSION['email'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }else{
	  $email = $_SESSION['email'];
  }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">  
    <meta name="theme-color" content="#3c1c77" />
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">   
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/feedback.css">
    <link rel="stylesheet" href="css/login.css">
	    <link rel="stylesheet" href="css/share.css">
    <link rel="manifest" href="manifest.json">
    <link rel="icon" href="assets/image/logo.png" type="image/gif" sizes="16x16">
    <!-- CSS -->
    <link href='select2/dist/css/select2.min.css' rel='stylesheet' type='text/css'>
    <title>Digital Babu|Feedback</title>
    <script type="text/javascript">
        function fetch_select(val)
        {
         $.ajax({
         type: 'post',
         url: 'fetch_data.php',
         data: {
          get_option:val
         },
         success: function (response) {
          document.getElementById("district").innerHTML=response; 
         }
         });
        }
        function fetch_select1(val)
        {
         $.ajax({
         type: 'post',
         url: 'fetch_data.php',
         data: {
          get_option1:val
         },
         success: function (response) {
          document.getElementById("city").innerHTML=response; 
         }
         });
        }
        function fetch_select2(val)
        {
         $.ajax({
         type: 'post',
         url: 'fetch_data.php',
         data: {
          get_option2:val
         },
         success: function (response) {
          document.getElementById("office").innerHTML=response; 
         }
         });
        }
        function fetch_select3(val)
        {
         $.ajax({
         type: 'post',
         url: 'fetch_data.php',
         data: {
          get_option3:val
         },
         success: function (response) {
          document.getElementById("department").innerHTML=response; 
         }
         });
        }
        
        </script>
    
    </head>
    
    <!-- HTML code from Bootply.com editor -->
    
    <body>
            <nav class="navbar navbar-dark navbar-expand-sm navbar-light fixed-top py-1">
                    <div class="container">
                            <a href="index.php" class="nav-link text-white"><h5><i class="fa fa-arrow-left fa-lg"></i></h5></a>
                   <a class="navbar-brand ml-1 mr-auto order-1 order-md-1" href="index.php">Digital Babu <img src="assets/image/logo.png" height="30px" width="30px"></a> 
                        <div class="nav-item dropdown order-2">
                                <a class="nav-link dropdown-toggle text-white" style="text-decoration:none" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-ellipsis-v fa-lg"></span> </a>
                              
                                <div class="dropdown-menu dropdown-menu-right">        
                                        <a class="dropdown-item" href="#help.php"><span class="fa fa-question-circle"></span> Help</a>
                                        <a class="dropdown-item" href="logout.php"><span class="fa fa-sign-in"></span> Logout</a>
                                        
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
              <div class="container-fluid">
                    <div class="row">
                            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                              <div class="card card-signin my-4">
                                <div class="card-body">
                                  <h5 class="card-title text-center">Feedback Form</h5>
                        <form class="form-signin" id="regForm" action="submit.php" method="post" enctype="multipart/form-data">

                            
                                <div class="tab">
                                        <div class="form-label-group">
                                            Select State:
                                                <select class="form-control selUser" id="state" onchange="fetch_select(this.value);" name="state">
                                                        <option>Select State</option>
                                                        <?php

                                                                $select = mysqli_query($db, "select * from state order by state_name");
                                                                while($row=mysqli_fetch_assoc($select))
                                                                {
                                                                    $state=$row['state_name'];
                                                        ?>
                                                        <option value="<?php echo $state; ?>"><?php echo "$state"; ?></option>
                                                                
                                                              <?php
                                                                }
                                                        ?>
                                                </select>
                                                
                                        </div>
                                        <div class="form-label-group">
                                            Select District:
                                                <select class="form-control selUser" id="district" onchange="fetch_select1(this.value);" name="district"> 
                                                <option>Select District</option>
                                                      
                                                </select>
                                                
                                        </div>
                                        <div class="form-label-group">
                                                Select City:
                                                    <select class="form-control selUser"  id="city" onchange="fetch_select2(this.value);" name="city">
                                                            <option>Select City</option>
                                                            
                                                    </select>
                                                    
                                        </div>
                                        
                                        <div class="form-label-group">
                                                Select Government office:
                                                    <select class="form-control selUser" id="office" onchange="fetch_select3(this.value);" name="office">
                                                            <option>Select Office</option>
                                                           
                                                    </select>
                                                    
                                        </div>
                                        <div class="form-label-group">
                                                Select Department:
                                                    <select class="form-control selUser" id="department" name="department">
                                                            <option>Select Department</option>
                                                            
                                                    </select>
                                                    
                                        </div>
                                        
                                </div>
                                
                                
                                
                                <div class="tab text-center" style="">
                                        <ul type="none">
                                            <li>
                                                <div class="form-label-group">
                                                <h5>Is the office is clean?</h5><br>
                                                    <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="clean" value="1">Yes
                                                        </div>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="clean" value="2">No
                                                            </label>
                                                        </div>
                                            </div>
                                            </li>
                                            <hr>
                                            <li>
                                                <div class="form-label-group">
                                                <h5>How is the behavior of office staffs?</h5><br>
                                                  <small>  <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="behavior" value="3">Worst
                                                        </div>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="behavior" value="4">Bad
                                                            </label>
                                                        </div>
                                                         <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="behavior" value="5">Average
                                                            </label>
                                                        </div>
                                                         <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="behavior" value="6">Good
                                                            </label>
                                                        </div>
                                                         <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="behavior" value="7">Excellent
                                                            </label>
                                                        </div>
                                                </div></small>
                                            </li>
                                            <hr>
                                        </ul>
                                    
                                </div>
                                
                                <div class="tab text-center" style="">
                                    <ul type="none">
                                            <li>
                                                <div class="form-label-group">
                                                <h5>How is the response time?</h5><br>
                                                <small><div class="form-check-inline">
                                                        <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="response" value="3">Worst
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="response" value="4">Bad
                                                        </label>
                                                    </div>
                                                     <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="response" value="5">Average
                                                        </label>
                                                    </div>
                                                     <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="response" value="6">Good
                                                        </label>
                                                    </div>
                                                     <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="response" value="7">Excellent
                                                        </label>
                                                    </div>
                                            </div></small>
                                            
                                            </li>
                                            <hr>
                                            <li>
                                                <div class="form-label-group">
                                                <h5>Department is technologically advanced?</h5><br>
                                                <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="technology" value="1">Yes
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="technology" value="2">No
                                                        </label>
                                                    </div>
                                            </li>
                                            <hr>
                                        </ul>
                                </div>
                               
                                    <div class="tab text-center" style="">
                                            <ul type="none">
                                                    <li>
                                                        <div class="form-label-group">
                                                        <h5>Upload Photo (Optional)</h5>
                                                                <input type="file" id="photo" name="document" class="form-control" placeholder="photo">
                                                 
                                                    </div>
                                                    
                                                    </li>
                                                    <hr>
                                                    <h5>Any other Comment ? (Optional)</h5>
                                                    <li>
                                                        <div class="form-label-group">                       
                                                        <input type="text" id="fheader" class="form-control" placeholder="Subject of Feedback" name="subject">
                                                        <label for="fheader">Subject</label>
                                                        <textarea type="text" id="fbody" class="form-control mt-2" name="description" placeholder="Write your feedback here (in less than 100 words)"></textarea>
                                                        
                                                    </li>
                                                    <hr>
                                                </ul>
                                        </div>
                                        <div class="tab text-center" style="">
                                                <ul type="none">
                                                        <li>
                                                                <div class="form-label-group">
                                                                <h5>Overall rating?</h5><br>
                                                                <small><div class="form-check-inline">
                                                                        <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="rating" value="3">Worst
                                                                    </div>
                                                                    <div class="form-check-inline">
                                                                        <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="rating" value="4">Bad
                                                                        </label>
                                                                    </div>
                                                                     <div class="form-check-inline">
                                                                        <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="rating" value="5">Average
                                                                        </label>
                                                                    </div>
                                                                     <div class="form-check-inline">
                                                                        <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="rating" value="6">Good
                                                                        </label>
                                                                    </div>
                                                                     <div class="form-check-inline">
                                                                        <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="rating" value="7">Excellent
                                                                        </label>
                                                                    </div>
                                                            </div>
                                                            <hr>
                                                        </div>
                                                            
                                                            </li>
                                                        
                                                    </ul>
                                            </div>
                                
                                <div style="overflow:auto;" class="ml-2 mr-2">
                                <div>
                                    <button class="btn btn-primary float-left" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                    <button class="btn btn-success float-right" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                </div>
                                </div>
                                
                                <!-- Circles which indicates the steps of the form: -->
                                <div style="text-align:center;margin-top:40px;">
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                </div>
                                
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 <script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script> 
<script src="js/feedback.js"></script>
<script src='select2/dist/js/select2.min.js' type='text/javascript'></script>
<script src="js/preloader.js"></script>

<script>
        $(document).ready(function(){
            
            // Initialize select2
            $(".selUser").select2();

            // Read selected option
            $('#but_read').click(function(){
                var username = $('.selUser option:selected').text();
                var userid = $('.selUser').val();
           

                $('.result').html("id : " + userid + ", name : " + username);
            });
        });
 </script>
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
