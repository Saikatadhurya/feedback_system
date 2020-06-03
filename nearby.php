<?php include_once("include/connect.php"); ?>
<?php 
  session_start(); 

 
 
?>
<!DOCTYPE html>

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
    <link href='select2/dist/css/select2.min.css' rel='stylesheet' type='text/css'>
    <link rel="icon" href="assets/image/logo.png" type="image/gif" sizes="16x16">
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
    <title>Digital Babu|Nearby Office</title>
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
         <!-- Page Content -->
    <div class="container">

            <!-- Page Heading -->
            <h1 class="my-4 d-none d-sm-block">List of Government Office</h1>
            <h4 class="my-4 d-block d-sm-none">List of Government Office</h4>
            <form class="form-signin" id="regForm" action="nearby.php" method="get">

                            <div class="row">
                                
                                        <div class="form-label-group col-4">
                                            <small>Select State:</small>
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
                                        <div class="form-label-group col-4">
                                            <small>Select District:</small>
                                                <select class="form-control selUser" id="district" onchange="fetch_select1(this.value);" name="district"> 
                                                <option>Select District</option>
                                                      
                                                </select>
                                                
                                        </div>
                                        <div class="form-label-group col-4">
                                                <small>Select City:</small>
                                                    <select class="form-control selUser"  id="city" onchange="fetch_select2(this.value);" name="city">
                                                            <option>Select City</option>
                                                            
                                                    </select>
                                                    
                                        </div>

                                <div class="form-label-group mt-2 ml-3">
                                <button class="btn btn-primary text-uppercase btn-sm" type="submit" name="search" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Searching.... "> Search</button>
                                </div>
                              </div>
                              </form>
<?php  

if(isset($_GET['search']))
{
  $state = $_GET['state'];
  $district = $_GET['district'];
  $city = $_GET['city'];
  $query = mysqli_query($db,"select * from office where city_name='$city'");
  
  ?>
              <small><?php echo $city; ?>, <?php echo $district; ?>, <?php echo $state; ?></small>
            
      <hr>
     <?php while($row = mysqli_fetch_assoc($query))
     {?>
            <div class="row">
              <div class="col-md-6">
                <a href="officedetails.php?id=<?php echo $row['id'];?>">
                  <img class="img-fluid rounded mb-3 mb-md-0" style="max-height:300px;" src="image/office/<?php echo $row['image'];?>" alt="<?php echo $row['image'];?>" title="<?php echo $row['image'];?>">
                </a>
              </div>
              <div class="col-md-6">
                <h3><?php echo $row['office_name'];?></h3>
                <p><?php echo $row['description'];?></p>
                <a class="btn btn-primary" href="officedetails.php?id=<?php echo $row['id'];?>">View Details</a>
                <a class="btn btn-danger" href="report.php?id=<?php echo $row['id'];?>">View Report</a>
             
              </div>
            </div>
            <!-- /.row -->
      
            <hr>
      <?php 
     }
     ?>
            <!-- Project Two -->
            
      
            <!-- Pagination 
            <ul class="pagination justify-content-center">
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">2</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                  <span class="sr-only">Next</span>
                </a>
              </li>
            </ul>
            -->
          </div>
          <!-- /.container -->
         
          <footer id="sticky-footer" class="py-4 text-white-50">
                <div class="container text-center">
                  <small>Copyright &copy; Citizen Feedback System</small>
                </div>
        </footer>
        <?php 
              }
            ?> 
 <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script> 
<script src='select2/dist/js/select2.min.js' type='text/javascript'></script>
<script src="js/preloader.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script>
$('.btn').on('click', function() {
    var $this = $(this);
  $this.button('loading');
    setTimeout(function() {
       $this.button('reset');
   }, 4000);
});

</script>
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