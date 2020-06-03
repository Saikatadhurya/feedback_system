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
    <link rel="icon" href="assets/image/logo.png" type="image/gif" sizes="16x16">
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
          <div class="container mb-4">

                <!-- Portfolio Item Heading -->
                <h1 class="my-4 d-none d-sm-block"><?php echo $row['office_name'];?></h1>
                <h4 class="my-4 d-block d-sm-none"><?php echo $row['office_name'];?></h4>
                <small><?php echo $row['city_name'];?></small>
              <hr>
                <!-- Portfolio Item Row -->
                <div class="row">
              
                  <div class="col-md-6">
                    <img class="img-fluid" src="image/office/<?php echo $row['image'];?>" alt="<?php echo $row['image'];?>">
                  </div>
              
                  <div class="col-md-6">
                    <h3 class="my-3">Description</h3>
                    <p><?php echo $row['description'];?></p>
                    <a class="btn btn-success btn-block" href="feedback.php"><strong>Give Feedback and Leave Comment</strong></a>
                    <a class="btn btn-danger btn-block" href="report.php?id=<?php echo $row['id'];?>"><strong>View Report</strong></a>
                  </div>
                  
                </div>
                <div class="row">
                 <div class="ml-3"> 
                <h3 class="my-4 d-none d-sm-block">Ratings</h3>
                <h5 class="my-4 d-block d-sm-none">Ratings</h5>
  </div>
  <div class="col-12">
<div class="row">
  <div class="col-12 col-sm-4 mb-2">
      <a class="btn btn-success btn-block" data-toggle="collapse" href="#ques1" role="button" aria-expanded="false" aria-controls="ques1">
          Overall Rating
        </a>
        <div class="collapse" id="ques1">
        <div class="card card-body">
        <?php $query = mysqli_query($db,"select * from department where office_id='$office_id'"); ?>
        
              <div id="chartContainer" style="height: 200px; width: 100%;"></div>
              <hr>
        <ul>
        <?php 
        $w=0;
        $b=0;
        $a=0;
        $g=0;
        $e=0;
        while($row = mysqli_fetch_assoc($query)){   
          $dept_id = $row['id'];
          $dept_name = $row['department_name'];
          ?>
         <li>
           <div class="row">
              <div class="col-sm-5">
                  <?php echo $dept_name;?>
              </div>
              <div class="col-sm-7">
             
                <small><b>Worst</b>: 
                <?php $query1 = mysqli_query($db,"select * from response where dept_id='$dept_id' and ques_id=5 and ans_id=3");
                        $row = mysqli_fetch_assoc($query1);
                        echo $row['counter']; $w = $w + $row['counter'];?></small><br>
                <small><b>Bad</b>: <?php $query1 = mysqli_query($db,"select * from response where dept_id='$dept_id' and ques_id=5 and ans_id=4");
                        $row = mysqli_fetch_assoc($query1);
                        echo $row['counter']; $b = $b + $row['counter'];?></small><br>
                <small><b>Average</b>: <?php $query1 = mysqli_query($db,"select * from response where dept_id='$dept_id' and ques_id=5 and ans_id=5");
                        $row = mysqli_fetch_assoc($query1);
                        echo $row['counter']; $a = $a + $row['counter'];?></small><br>
                <small><b>Good</b>: <?php $query1 = mysqli_query($db,"select * from response where dept_id='$dept_id' and ques_id=5 and ans_id=6");
                        $row = mysqli_fetch_assoc($query1);
                        echo $row['counter']; $g = $g + $row['counter'];?></small><br>
                <small><b>Excellent</b>: <?php $query1 = mysqli_query($db,"select * from response where dept_id='$dept_id' and ques_id=5 and ans_id=7");
                        $row = mysqli_fetch_assoc($query1);
                        echo $row['counter']; $e = $e + $row['counter'];?></small><hr>
              </div>
        </div>
      </li>
        <?php } ?>
        </ul> 
    <?php
        $dataPoints = array( 
	array("y" => $w,"label" => "Worst" ),
	array("y" => $b,"label" => "Bad" ),
	array("y" => $a,"label" => "Average" ),
	array("y" => $g,"label" => "Good" ),
	array("y" => $e,"label" => "Excellent" )
);
 
?>
  
      </div>
      </div>
  </div>
  <div class="col-12 col-sm-4">
      <a class="btn btn-info btn-block" data-toggle="collapse" href="#ques2" role="button" aria-expanded="false" aria-controls="ques2">
      Office is clean?
        </a>
        <div class="collapse" id="ques2">
        <div class="card card-body">
        <?php $query = mysqli_query($db,"select * from department where office_id='$office_id'"); ?>
        
        <div id="chartContainer1" style="height: 200px; width: 100%;"></div>
        <hr>
        <ul>
        <?php 
        $y=0;
        $n=0;
        while($row = mysqli_fetch_assoc($query)){   
          $dept_id = $row['id'];
          $dept_name = $row['department_name'];
          ?>
         <li>
           <div class="row">
              <div class="col-5">
                  <?php echo $dept_name;?>
              </div>
              <div class="col-7">
                <small><b>Yes</b>: 
                <?php $query1 = mysqli_query($db,"select * from response where dept_id='$dept_id' and ques_id=1 and ans_id=1");
                        $row = mysqli_fetch_assoc($query1);
                        echo $row['counter']; $y = $y + $row['counter'];?></small><br>
                <small><b>No</b>: <?php $query1 = mysqli_query($db,"select * from response where dept_id='$dept_id' and ques_id=1 and ans_id=2");
                        $row = mysqli_fetch_assoc($query1);
                        echo $row['counter']; $n = $n + $row['counter'];?></small><hr>
              </div>
        </div>
      </li>
        <?php } ?>
        </ul> 
        <?php
        $dataPoints1 = array( 
	array("y" => $y,"label" => "Yes" ),
	array("y" => $n,"label" => "No" )
);
 
?>
    
       </div>
      </div>
  </div>
  <div class="col-12 col-sm-4">
      <a class="btn btn-warning btn-block" data-toggle="collapse" href="#ques3" role="button" aria-expanded="false" aria-controls="ques3">
      Behavior of office staffs
        </a>
        <div class="collapse" id="ques3">
        <div class="card card-body">
        <?php $query = mysqli_query($db,"select * from department where office_id='$office_id'"); ?>
        
        <div id="chartContainer2" style="height: 200px; width: 100%;"></div>
        <hr>
        <ul>
        <?php 
        $w=0;
        $b=0;
        $a=0;
        $g=0;
        $e=0;
        while($row = mysqli_fetch_assoc($query)){   
          $dept_id = $row['id'];
          $dept_name = $row['department_name'];
          ?>
         <li>
           <div class="row">
              <div class="col-5">
                  <?php echo $dept_name;?>
              </div>
              <div class="col-7">
                <small><b>Worst</b>: 
                <?php $query1 = mysqli_query($db,"select * from response where dept_id='$dept_id' and ques_id=2 and ans_id=3");
                        $row = mysqli_fetch_assoc($query1);
                        echo $row['counter']; $w = $w + $row['counter'];?></small><br>
                <small><b>Bad</b>: <?php $query1 = mysqli_query($db,"select * from response where dept_id='$dept_id' and ques_id=2 and ans_id=4");
                        $row = mysqli_fetch_assoc($query1);
                        echo $row['counter']; $b = $b + $row['counter'];?></small><br>
                <small><b>Average</b>: <?php $query1 = mysqli_query($db,"select * from response where dept_id='$dept_id' and ques_id=2 and ans_id=5");
                        $row = mysqli_fetch_assoc($query1);
                        echo $row['counter']; $a = $a + $row['counter'];?></small><br>
                <small><b>Good</b>: <?php $query1 = mysqli_query($db,"select * from response where dept_id='$dept_id' and ques_id=2 and ans_id=6");
                        $row = mysqli_fetch_assoc($query1);
                        echo $row['counter']; $g = $g + $row['counter'];?></small><br>
                <small><b>Excellent</b>: <?php $query1 = mysqli_query($db,"select * from response where dept_id='$dept_id' and ques_id=2 and ans_id=7");
                        $row = mysqli_fetch_assoc($query1);
                        echo $row['counter']; $e = $e + $row['counter'];?></small><hr>
              </div>
        </div>
      </li>
        <?php } ?>
        </ul> 
        <?php
        $dataPoints2 = array( 
	array("y" => $w,"label" => "Worst" ),
	array("y" => $b,"label" => "Bad" ),
	array("y" => $a,"label" => "Average" ),
	array("y" => $g,"label" => "Good" ),
	array("y" => $e,"label" => "Excellent" )
);
 
?>
       </div>
      </div>
  </div>
  <div class="col-12 col-sm-4">
      <a class="btn btn-danger btn-block" data-toggle="collapse" href="#ques4" role="button" aria-expanded="false" aria-controls="ques4">
      Response time
        </a>
        <div class="collapse" id="ques4">
        <div class="card card-body">
        <?php $query = mysqli_query($db,"select * from department where office_id='$office_id'"); ?>
        
        <div id="chartContainer3" style="height: 200px; width: 100%;"></div>
        <hr>
        <ul>
        <?php 
         $w=0;
         $b=0;
         $a=0;
         $g=0;
         $e=0;
         while($row = mysqli_fetch_assoc($query)){   
          $dept_id = $row['id'];
          $dept_name = $row['department_name'];
          ?>
         <li>
           <div class="row">
              <div class="col-5">
                  <?php echo $dept_name;?>
              </div>
              <div class="col-7">
                <small><b>Worst</b>: 
                <?php $query1 = mysqli_query($db,"select * from response where dept_id='$dept_id' and ques_id=3 and ans_id=3");
                        $row = mysqli_fetch_assoc($query1);
                        echo $row['counter']; $w = $w + $row['counter'];?></small><br>
                <small><b>Bad</b>: <?php $query1 = mysqli_query($db,"select * from response where dept_id='$dept_id' and ques_id=3 and ans_id=4");
                        $row = mysqli_fetch_assoc($query1);
                        echo $row['counter']; $b = $b + $row['counter'];?></small><br>
                <small><b>Average</b>: <?php $query1 = mysqli_query($db,"select * from response where dept_id='$dept_id' and ques_id=3 and ans_id=5");
                        $row = mysqli_fetch_assoc($query1);
                        echo $row['counter']; $a = $a + $row['counter'];?></small><br>
                <small><b>Good</b>: <?php $query1 = mysqli_query($db,"select * from response where dept_id='$dept_id' and ques_id=3 and ans_id=6");
                        $row = mysqli_fetch_assoc($query1);
                        echo $row['counter']; $g = $g + $row['counter'];?></small><br>
                <small><b>Excellent</b>: <?php $query1 = mysqli_query($db,"select * from response where dept_id='$dept_id' and ques_id=3 and ans_id=7");
                        $row = mysqli_fetch_assoc($query1);
                        echo $row['counter']; $e = $e + $row['counter'];?></small><hr>
              </div>
        </div>
      </li>
        <?php } ?>
        </ul> 
        <?php
        $dataPoints3 = array( 
	array("y" => $w,"label" => "Worst" ),
	array("y" => $b,"label" => "Bad" ),
	array("y" => $a,"label" => "Average" ),
	array("y" => $g,"label" => "Good" ),
	array("y" => $e,"label" => "Excellent" )
);
 
?>
    
      </div>
      </div>
  </div>
  <div class="col-12 col-sm-4">
      <a class="btn btn-light btn-block" data-toggle="collapse" href="#ques5" role="button" aria-expanded="false" aria-controls="ques5">
      Technologically advanced
        </a>
        <div class="collapse" id="ques5">
        <div class="card card-body">
        <?php $query = mysqli_query($db,"select * from department where office_id='$office_id'"); ?>
        
        <div id="chartContainer4" style="height: 200px; width: 100%;"></div>
        <hr>
        <ul>
        <?php
        $y=0;
        $n=0;
        while($row = mysqli_fetch_assoc($query)){   
          $dept_id = $row['id'];
          $dept_name = $row['department_name'];
          ?>
         <li>
           <div class="row">
              <div class="col-5">
                  <?php echo $dept_name;?>
              </div>
              <div class="col-7">
                <small><b>Yes</b>: 
                <?php $query1 = mysqli_query($db,"select * from response where dept_id='$dept_id' and ques_id=4 and ans_id=1");
                        $row = mysqli_fetch_assoc($query1);
                        echo $row['counter']; $y = $y + $row['counter']; ?></small><br>
                <small><b>No</b>: <?php $query1 = mysqli_query($db,"select * from response where dept_id='$dept_id' and ques_id=4 and ans_id=2");
                        $row = mysqli_fetch_assoc($query1);
                        echo $row['counter']; $n = $n + $row['counter'];?></small><hr>
              </div>
        </div>
      </li>
        <?php } ?>
        </ul>  
        <?php
        $dataPoints4 = array( 
	array("y" => $y,"label" => "Yes" ),
	array("y" => $n,"label" => "No" )
);
 
?>
    
      </div>
      </div>
  </div>
 
  </div>

  </div>
  

                </div>
                <!-- /.row -->
              
                <!-- Related Projects Row -->
        </div>   
                <div class="col-lg-12">
        <div class="card card-outline-secondary my-4">
          <div class="card-header">
            Reviews
          </div>
          <?php $query = mysqli_query($db,"select * from other_feedback where dept_id in(select id from department where office_id='$office_id') order by id desc");
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
          <div class="card-body">
            <h5><span class="badge badge-success"><?php echo $res;?> <i class="fa fa-star"></i></span><b> <?php echo $row['subject'];?></b></h5>
            <p><b>Department:</b> <?php  echo $rows['department_name'];?></p>
            <p><?php echo $row['description'];?></p>
            <small class="text-muted">Posted by <?php echo $name;?> on <?php echo $row['timestamp'];?></small>
            <hr>
			</div>
           <?php 
      }
          }
          ?>
            <a href="feedback.php" class="btn btn-success">Leave a Review</a>
          
        </div>
        <!-- /.card -->

     
              <!-- /.container -->
        </div>
          <footer id="sticky-footer" class="py-4 text-white-50">
                <div class="container text-center">
                  <small>Copyright &copy; Citizen Feedback System</small>
                </div>
        </footer>
 <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script> 
<script src="js/preloader.js"></script>
<script src="js/canvasjs.min.js"></script>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
width:300,
height:200,
title: {
		text: "For all Departments"
	},
	axisY: {
		title: "Number of customers",
  },
  axisX: {
		title: "Rating",
	},
	data: [{
		type: "bar",
		indexLabel: "{y}",
		indexLabelPlacement: "inside",
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "white",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

var chart1 = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,
width:300,
height:200,
title: {
		text: "For all Departments"
	},
	axisY: {
		title: "Number of customers",
  },
  axisX: {
		title: "Rating",
	},
	data: [{
		type: "bar",
		indexLabel: "{y}",
		indexLabelPlacement: "inside",
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "white",
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	}]
});
chart1.render();

var chart2 = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,
width:300,
height:200,
title: {
		text: "For all Departments"
	},
	axisY: {
		title: "Number of customers",
  },
  axisX: {
		title: "Rating",
	},
	data: [{
		type: "bar",
		indexLabel: "{y}",
		indexLabelPlacement: "inside",
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "white",
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
});
chart2.render();

var chart3 = new CanvasJS.Chart("chartContainer3", {
	animationEnabled: true,
width:300,
height:200,
title: {
		text: "For all Departments"
	},
	axisY: {
		title: "Number of customers",
  },
  axisX: {
		title: "Rating",
	},
	data: [{
		type: "bar",
		indexLabel: "{y}",
		indexLabelPlacement: "inside",
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "white",
		dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
	}]
});
chart3.render();
 
var chart4 = new CanvasJS.Chart("chartContainer4", {
	animationEnabled: true,
width:300,
height:200,
title: {
		text: "For all Departments"
	},
	axisY: {
		title: "Number of customers",
  },
  axisX: {
		title: "Rating",
	},
	data: [{
		type: "bar",
		indexLabel: "{y}",
		indexLabelPlacement: "inside",
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "white",
		dataPoints: <?php echo json_encode($dataPoints4, JSON_NUMERIC_CHECK); ?>
	}]
});
chart4.render();
 
}
</script>

 
</body>
</html>
