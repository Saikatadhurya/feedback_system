<?php include_once("include/connect.php"); ?>
<?php 
  session_start(); 

    $office_id = $_GET['id'];
    $query = mysqli_query($db,"select * from office where id='$office_id'");
    $row = mysqli_fetch_assoc($query);
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
    <link rel="stylesheet" href="css/report.css">
    <link rel="stylesheet" href="css/share.css">
	
    <link rel="icon" href="assets/image/logo.png" type="image/gif" sizes="16x16">
    <title>Digital Babu|Report</title>
    <style>
           .yellow {
  color: yellow;
}
.orange {
  color:orange;
}

.text-blue{
    color:#0A229E;
}
.small-text{
    line-height:18px;
}

</style>
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
                 <h3>Welcome to Citizen Feedback System</h3>
                 <p> <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                        <span class="sr-only">Loading...</span>
                      </div>
                </div>
          </div>
          <div class="container">
                <div class="share-dialog">
  <header>
    <h3 class="dialog-title">Share this Report</h3>
    <button class="close-button"><svg><use href="#close"></use></svg></button>
  </header>
  <div class="targets">
    <a class="button">
      <svg>
        <use href="#facebook"></use>
      </svg>
      <span>Facebook</span>
    </a>
    
    <a class="button">
      <svg>
        <use href="#twitter"></use>
      </svg>
      <span>Twitter</span>
    </a>
    
    <a class="button">
      <svg>
        <use href="#linkedin"></use>
      </svg>
      <span>LinkedIn</span>
    </a>
    
    <a class="button">
      <svg>
        <use href="#email"></use>
      </svg>
      <span>Email</span>
    </a>
  </div>
  <div class="link">
    <div class="pen-url">https://citizenfeedback.wildwingsindia.in/report.php?id=<?php echo $office_id; ?></div>
    <button class="copy-link">Copy Link</button>
  </div>
</div>
                <div class="row">
                  <div class="col-sm-9 col-md-7 col-lg-6 mx-auto">
                    <div class="card card-signin my-4">
                      <div class="card-header" style="margin-bottom:-15px;">
                          
                            
                          <div class="row">
                              <div class="col-1 ml-1 ml-sm-0"><a href="tel:<?php echo $row['phone_no'];?>"><h5 class="text-center text-light"><i class="fa fa-phone-square fa-lg float-left"></i></h5></a></div>
                              <div class="col-9 ml-1 ml-sm-0 col-sm-10"> <h6 class="text-center text-light"><?php echo $row['office_name'];?></h6></div>
                              <div class="col-1 ml-2 ml-sm-0"><h5 class="text-center text-light share-button"><i class="fa fa-telegram fa-lg float-right mt-2 mr-0"></i></h5></div>
							    
                            </div>
<script>
const shareButton = document.querySelector('.share-button');
const shareDialog = document.querySelector('.share-dialog');
const closeButton = document.querySelector('.close-button');
pageUrl = "https://citizenfeedback.wildwingsindia.in/report.php?id=<?php echo $office_id; ?>";
shareButton.addEventListener('click', event => {
  if (navigator.share) { 
   navigator.share({
      title: 'Report',
      url: pageUrl
    }).then(() => {
      console.log('Thanks for sharing!');
    })
    .catch(console.error);
    } else {
        shareDialog.classList.add('is-open');
    }
});

closeButton.addEventListener('click', event => {
  shareDialog.classList.remove('is-open');
});
</script>

							<?php 
                                 $result = mysqli_query($db,"SELECT SUM(counter) AS value_sum FROM `response` WHERE ques_id = 1 and ans_id = 1 and dept_id in (SELECT id from department where office_id = '$office_id')");
                                 $row = mysqli_fetch_assoc($result); 
                                 $yes = $row['value_sum'];
                                 $result = mysqli_query($db,"SELECT SUM(counter) AS value_sum FROM `response` WHERE ques_id = 1 and ans_id = 2 and dept_id in (SELECT id from department where office_id = '$office_id')");
                                 $row = mysqli_fetch_assoc($result); 
                                 $no = $row['value_sum'];
                                 $sum = $yes + $no;
								 if($sum !=0){
                                 $res = floor($yes / $sum * 5);
								 }else{
									 $res=0;
								 }
                                 
                            ?>
                         <?php 
                                 $result = mysqli_query($db,"SELECT SUM(counter) AS value_sum FROM `response` WHERE ques_id = 2 and ans_id = 3 and dept_id in (SELECT id from department where office_id = '$office_id')");
                                 $row = mysqli_fetch_assoc($result); 
                                 $worst = $row['value_sum'];
                                 $result = mysqli_query($db,"SELECT SUM(counter) AS value_sum FROM `response` WHERE ques_id = 2 and ans_id = 4 and dept_id in (SELECT id from department where office_id = '$office_id')");
                                 $row = mysqli_fetch_assoc($result); 
                                 $bad = $row['value_sum'];
                                 $result = mysqli_query($db,"SELECT SUM(counter) AS value_sum FROM `response` WHERE ques_id = 2 and ans_id = 5 and dept_id in (SELECT id from department where office_id = '$office_id')");
                                 $row = mysqli_fetch_assoc($result); 
                                 $average = $row['value_sum'];
                                 $result = mysqli_query($db,"SELECT SUM(counter) AS value_sum FROM `response` WHERE ques_id = 2 and ans_id = 6 and dept_id in (SELECT id from department where office_id = '$office_id')");
                                 $row = mysqli_fetch_assoc($result); 
                                 $good = $row['value_sum'];
                                 $result = mysqli_query($db,"SELECT SUM(counter) AS value_sum FROM `response` WHERE ques_id = 2 and ans_id = 7 and dept_id in (SELECT id from department where office_id = '$office_id')");
                                 $row = mysqli_fetch_assoc($result); 
                                 $excellent = $row['value_sum'];
                                 $sum = $worst + $bad + $average + $good + $excellent;
									if($sum !=0){
                                 $res1 = floor(($worst * 1 + $bad * 2 + $average * 3 + $good * 4 + $excellent * 5)/$sum);
									}else{
										$res1=0;
									}
		
                            ?>
                            <?php 
                                 $result = mysqli_query($db,"SELECT SUM(counter) AS value_sum FROM `response` WHERE ques_id = 3 and ans_id = 3 and dept_id in (SELECT id from department where office_id = '$office_id')");
                                 $row = mysqli_fetch_assoc($result); 
                                 $worst = $row['value_sum'];
                                 $result = mysqli_query($db,"SELECT SUM(counter) AS value_sum FROM `response` WHERE ques_id = 3 and ans_id = 4 and dept_id in (SELECT id from department where office_id = '$office_id')");
                                 $row = mysqli_fetch_assoc($result); 
                                 $bad = $row['value_sum'];
                                 $result = mysqli_query($db,"SELECT SUM(counter) AS value_sum FROM `response` WHERE ques_id = 3 and ans_id = 5 and dept_id in (SELECT id from department where office_id = '$office_id')");
                                 $row = mysqli_fetch_assoc($result); 
                                 $average = $row['value_sum'];
                                 $result = mysqli_query($db,"SELECT SUM(counter) AS value_sum FROM `response` WHERE ques_id = 3 and ans_id = 6 and dept_id in (SELECT id from department where office_id = '$office_id')");
                                 $row = mysqli_fetch_assoc($result); 
                                 $good = $row['value_sum'];
                                 $result = mysqli_query($db,"SELECT SUM(counter) AS value_sum FROM `response` WHERE ques_id = 3 and ans_id = 7 and dept_id in (SELECT id from department where office_id = '$office_id')");
                                 $row = mysqli_fetch_assoc($result); 
                                 $excellent = $row['value_sum'];
                                 $sum = $worst + $bad + $average + $good + $excellent;
									if($sum !=0){
                                 $res2 = floor(($worst * 1 + $bad * 2 + $average * 3 + $good * 4 + $excellent * 5)/$sum);
									}else{
										$res2=0;
									}
                                 
                            ?>
                             <?php 
                                 $result = mysqli_query($db,"SELECT SUM(counter) AS value_sum FROM `response` WHERE ques_id = 4 and ans_id = 1 and dept_id in (SELECT id from department where office_id = '$office_id')");
                                 $row = mysqli_fetch_assoc($result); 
                                 $yes = $row['value_sum'];
                                 $result = mysqli_query($db,"SELECT SUM(counter) AS value_sum FROM `response` WHERE ques_id = 4 and ans_id = 2 and dept_id in (SELECT id from department where office_id = '$office_id')");
                                 $row = mysqli_fetch_assoc($result); 
                                 $no = $row['value_sum'];
                                 $sum = $yes + $no;
								 if($sum !=0){
                                 $res3 = floor($yes / $sum * 5);
                                 }else{
									 $res3=0;
								 }
                                 $avg = floor(($res + $res1 + $res2 + $res3)/4)
                            ?>
                        <div class="row">
                            <div class="offset-md-5 offset-4"></div>
                                <div class="text-light ml-2 ml-sm-0">
                                
                                <?php switch($avg){
                                case 1: ?>
                            <i class="fa fa-sm fa-star yellow"></i>
                                <i class="fa fa-sm fa-star-o yellow"></i>
                                <i class="fa fa-sm fa-star-o yellow"></i>
                                <i class="fa fa-sm fa-star-o yellow"></i>
                                <i class="fa fa-sm fa-star-o yellow"></i>
                            <?php break; 
                            case 2:
                            ?>
                            <i class="fa fa-sm fa-star yellow"></i>
                                <i class="fa fa-sm fa-star yellow"></i>
                                <i class="fa fa-sm fa-star-o yellow"></i>
                                <i class="fa fa-sm fa-star-o yellow"></i>
                                <i class="fa fa-sm fa-star-o yellow"></i>
                            <?php break; 
                            case 3:
                            ?>
                             <i class="fa fa-sm fa-star yellow"></i>
                                <i class="fa fa-sm fa-star yellow"></i>
                                <i class="fa fa-sm fa-star yellow"></i>
                                <i class="fa fa-sm fa-star-o yellow"></i>
                                <i class="fa fa-sm fa-star-o yellow"></i>
                            <?php break; 
                            case 4:
                            ?>
                             <i class="fa fa-sm fa-star yellow"></i>
                                <i class="fa fa-sm fa-star yellow"></i>
                                <i class="fa fa-sm fa-star yellow"></i>
                                <i class="fa fa-sm fa-star yellow"></i>
                                <i class="fa fa-sm fa-star-o yellow"></i>
                            <?php break; 
                            case 5:
                            ?> <i class="fa fa-sm fa-star yellow"></i>
                            <i class="fa fa-sm fa-star yellow"></i>
                            <i class="fa fa-sm fa-star yellow"></i>
                            <i class="fa fa-sm fa-star yellow"></i>
                            <i class="fa fa-sm fa-star yellow"></i>
                        <?php break;
                            }
                        ?>
                             </div>
                             <div class="col-12">
                             <p class="text-white text-center">  
                            Average Rating : <?php echo $avg; ?>   
                            </p>
                            </div>
                                   
                        </div>
                        
                        </div>
                     <div class="card-body"> 
                  <?php   $query = mysqli_query($db,"select * from other_feedback where dept_id in(select id from department where office_id='$office_id') order by id desc");
          while($row = mysqli_fetch_assoc($query))
          {
            $description =  $row['description'];
            if($description != "")
            {
                $res_id = $row['res_id'];
                $id=$row['dept_id'];
                $querys = mysqli_query($db,"select * from department where id=$id");
                $rows = mysqli_fetch_assoc($querys);
                $em = $row['email'];
                $q = mysqli_query($db,"select * from user_details where email='$em'");
                $ro = mysqli_fetch_assoc($q);
                $name = $ro['first_name']." ".$ro['middle_last_name'];
                $query1 = mysqli_query($db,"select * from user_response where email='$em' and ques_id=5 and dept_id=$id and res_id=$res_id");
                $row1 = mysqli_fetch_assoc($query1);
                $ans = $row1['ans_id'];
                 if($ans == 3)
                     $res =1;
                 if($ans == 4)
                     $res = 2;
                 if($ans == 5)
                     $res =3;
                 if($ans == 6)
                     $res =4;
                 if($ans == 7)
                     $res =5;

            ?>
                     <div class="card mt-3">
                      <div class="card-header"> 
                        <div class="row">
                            <div class="col-8">
                                <small class="text-blue font-weight-bold align-self-center small-text"><?php echo $row['subject'];?> </small>
                            </div>
                            <?php switch($res){
                                case 1: ?>
                            <small class="font-weight-bold align-self-center"><i class="fa fa-sm fa-star orange"></i>
                                <i class="fa fa-sm fa-star-o orange"></i>
                                <i class="fa fa-sm fa-star-o orange"></i>
                                <i class="fa fa-sm fa-star-o orange"></i>
                                <i class="fa fa-sm fa-star-o orange"></i></small> 
                            <?php break; 
                            case 2:
                            ?>
                            <small class="font-weight-bold align-self-center"><i class="fa fa-sm fa-star orange"></i>
                                <i class="fa fa-sm fa-star orange"></i>
                                <i class="fa fa-sm fa-star-o orange"></i>
                                <i class="fa fa-sm fa-star-o orange"></i>
                                <i class="fa fa-sm fa-star-o orange"></i></small> 
                            <?php break; 
                            case 3:
                            ?>
                             <small class="font-weight-bold align-self-center"><i class="fa fa-sm fa-star orange"></i>
                                <i class="fa fa-sm fa-star orange"></i>
                                <i class="fa fa-sm fa-star orange"></i>
                                <i class="fa fa-sm fa-star-o orange"></i>
                                <i class="fa fa-sm fa-star-o orange"></i></small> 
                            <?php break; 
                            case 4:
                            ?>
                             <small class="font-weight-bold align-self-center"><i class="fa fa-sm fa-star orange"></i>
                                <i class="fa fa-sm fa-star orange"></i>
                                <i class="fa fa-sm fa-star orange"></i>
                                <i class="fa fa-sm fa-star orange"></i>
                                <i class="fa fa-sm fa-star-o orange"></i></small> 
                            <?php break; 
                            case 5:
                            ?> <small class="font-weight-bold align-self-center"><i class="fa fa-sm fa-star orange"></i>
                            <i class="fa fa-sm fa-star orange"></i>
                            <i class="fa fa-sm fa-star orange"></i>
                            <i class="fa fa-sm fa-star orange"></i>
                            <i class="fa fa-sm fa-star orange"></i></small> 
                        <?php break;
                            }
                        ?>
                        </div>
                      </div>
                      <div class="card-body small-text"> 
                        <small><?php echo $description;?>
                        </small>
                        
                      </div>
                      </div>
          <?php }
        } ?>
                     
                    <div class="row">
                        <div class="col-12 mt-3">
                            <a href="feedback.php" class="btn btn-success btn-block">POST REVIEW</a>
                        </div>
                    </div>      
                      </div>
                    </div>
                  </div>
                </div>
				<svg class="hidden">
  <defs>
    <symbol id="share-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share"><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path><polyline points="16 6 12 2 8 6"></polyline><line x1="12" y1="2" x2="12" y2="15"></line></symbol>
    
    <symbol id="facebook" viewBox="0 0 24 24" fill="#3b5998" stroke="#3b5998" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></symbol>
    
    <symbol id="twitter" viewBox="0 0 24 24" fill="#1da1f2" stroke="#1da1f2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></symbol>
    
    <symbol id="email" viewBox="0 0 24 24" fill="#777" stroke="#fafafa" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></symbol>
    
    <symbol id="linkedin" viewBox="0 0 24 24" fill="#0077B5" stroke="#0077B5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></symbol>
    
    <symbol id="close" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="9" x2="15" y2="15"></line><line x1="15" y1="9" x2="9" y2="15"></line></symbol>
  </defs>
</svg>
              </div>
 <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script> 
<script src="js/preloader.js"></script>
<script src="js/showpass.js"></script>
</body>
</html>
