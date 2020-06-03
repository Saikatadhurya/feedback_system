<?php
include_once "include/connect.php";
session_start(); 

  if (isset($_SESSION['email'])) {
	  $email = $_SESSION['email'];
  }
  error_reporting(0);
$state = $_POST['state'];
$district = $_POST['district'];
$city = $_POST['city'];
$office = $_POST['office'];
$department = $_POST['department'];
$clean = $_POST['clean'];
$behavior = $_POST['behavior'];
$response = $_POST['response'];
$technology = $_POST['technology'];
$rating = $_POST['rating'];
$doc_name = $_FILES['document']['name'];
      $doc_size = $_FILES['document']['size'];
      $doc_tmp = $_FILES['document']['tmp_name'];
      $doc_type = $_FILES['document']['type'];
	  $tmp = explode('.', $_FILES['document']['name']);
      $doc_ext=strtolower(end($tmp));
      $docname = $email.".".$doc_ext;
      $doc_extensions= array("jpeg","jpg","png","pdf");
     

$q1 = mysqli_query($db,"select * from department where department_name = '$department' and office_name='$office' and city_name='$city'");
$row = mysqli_fetch_assoc($q1);
$dept_id=$row['id']; 
$result = mysqli_query($db,"select res_id from user_response where dept_id ='$dept_id' and email='$email' group by res_id order by res_id desc");
$row = mysqli_fetch_assoc($result);
$r_id = $row['res_id'];
//clean
$result = mysqli_query($db,"select * from response where dept_id ='$dept_id' and ques_id = 1 and ans_id= '$clean'");
$rowcount = mysqli_num_rows($result);
if($rowcount == 0 )
    $query = "INSERT INTO response (dept_id,ques_id,ans_id,counter) VALUES($dept_id,1,$clean,1)";
else
    {
        $rows = mysqli_fetch_assoc($result);
        $res_id = $rows['id'];
        $count = $rows['counter'];
        $count++;
        $query = "UPDATE response set counter = '$count' where id='$res_id'";
    }
$result1 = mysqli_query($db,"select * from user_response where dept_id ='$dept_id' and ques_id = 1 and email='$email' and res_id='$r_id'");
$rowcount = mysqli_num_rows($result1);
if($rowcount == 0)
{
    $response_id =1;
	$res = "INSERT INTO user_response (email,res_id,dept_id,ques_id,ans_id) VALUES('$email','$response_id',$dept_id,1,$clean)";
}
    else{
	 $row = mysqli_fetch_assoc($result1);
	 $response_id = $row['res_id'];
	 $response_id++;
	 $res = "INSERT INTO user_response (email,res_id,dept_id,ques_id,ans_id) VALUES('$email','$response_id',$dept_id,1,$clean)";
}
//behavior
$result = mysqli_query($db,"select * from response where dept_id ='$dept_id' and ques_id = 2 and ans_id= '$behavior'");
$rowcount = mysqli_num_rows($result);
if($rowcount == 0 )
    $query1 = "INSERT INTO response (dept_id,ques_id,ans_id,counter) VALUES($dept_id,2,$behavior,1)";
else
    {
        $rows = mysqli_fetch_assoc($result);
        $res_id = $rows['id'];
        $count = $rows['counter'];
        $count++;
        $query1 = "UPDATE response set counter = '$count' where id='$res_id'";
    }
    $result1 = mysqli_query($db,"select * from user_response where dept_id ='$dept_id' and ques_id = 2 and email='$email' and res_id='$r_id'");
$rowcount = mysqli_num_rows($result1);
if($rowcount == 0)
{   
    $response_id =1;
	$res1 = "INSERT INTO user_response (email,res_id,dept_id,ques_id,ans_id) VALUES('$email','$response_id',$dept_id,2,$behavior)";
}
    else{
	 $row = mysqli_fetch_assoc($result1);
	 $response_id = $row['res_id'];
	 $response_id++;
	 $res1 = "INSERT INTO user_response (email,res_id,dept_id,ques_id,ans_id) VALUES('$email','$response_id',$dept_id,2,$behavior)";
}

//response
$result = mysqli_query($db,"select * from response where dept_id ='$dept_id' and ques_id = 3 and ans_id= '$response'");
$rowcount = mysqli_num_rows($result);
if($rowcount == 0 )
    $query2 = "INSERT INTO response (dept_id,ques_id,ans_id,counter) VALUES($dept_id,3,$response,1)";
else
    {
        $rows = mysqli_fetch_assoc($result);
        $res_id = $rows['id'];
        $count = $rows['counter'];
        $count++;
        $query2 = "UPDATE response set counter = '$count' where id='$res_id'";
    }

    $result1 = mysqli_query($db,"select * from user_response where dept_id ='$dept_id' and ques_id = 3 and email='$email' and res_id='$r_id'");
    $rowcount = mysqli_num_rows($result1);
    if($rowcount == 0)
    {
        $response_id =1;
        $res2 = "INSERT INTO user_response (email,res_id,dept_id,ques_id,ans_id) VALUES('$email','$response_id',$dept_id,3,$response)";
    }
        else{
         $row = mysqli_fetch_assoc($result1);
         $response_id = $row['res_id'];
         $response_id++;
         $res2 = "INSERT INTO user_response (email,res_id,dept_id,ques_id,ans_id) VALUES('$email','$response_id',$dept_id,3,$response)";
    }
    

 //technology
$result = mysqli_query($db,"select * from response where dept_id ='$dept_id' and ques_id = 4 and ans_id= '$technology'");
$rowcount = mysqli_num_rows($result);
if($rowcount == 0 )
    $query3 = "INSERT INTO response (dept_id,ques_id,ans_id,counter) VALUES($dept_id,4,$technology,1)";
else
    {
        $rows = mysqli_fetch_assoc($result);
        $res_id = $rows['id'];
        $count = $rows['counter'];
        $count++;
        $query3 = "UPDATE response set counter = '$count' where id='$res_id'";
    }  
    $result1 = mysqli_query($db,"select * from user_response where dept_id ='$dept_id' and ques_id = 4 and email='$email' and res_id='$r_id'");
    $rowcount = mysqli_num_rows($result1);
    if($rowcount == 0)
    {
        $response_id =1;
        $res3 = "INSERT INTO user_response (email,res_id,dept_id,ques_id,ans_id) VALUES('$email','$response_id',$dept_id,4,$technology)";
    }
    else{
         $row = mysqli_fetch_assoc($result1);
         $response_id = $row['res_id'];
         $response_id++;
         $res3 = "INSERT INTO user_response (email,res_id,dept_id,ques_id,ans_id) VALUES('$email','$response_id',$dept_id,4,$technology)";
    }
    

 //rating
 $result = mysqli_query($db,"select * from response where dept_id ='$dept_id' and ques_id = 5 and ans_id= '$rating'");
 $rowcount = mysqli_num_rows($result);
 if($rowcount == 0 )
     $query4 = "INSERT INTO response (dept_id,ques_id,ans_id,counter) VALUES($dept_id,5,$rating,1)";
 else
     {
         $rows = mysqli_fetch_assoc($result);
         $res_id = $rows['id'];
         $count = $rows['counter'];
         $count++;
         $query4 = "UPDATE response set counter = '$count' where id='$res_id'";
     }  
     $result1 = mysqli_query($db,"select * from user_response where dept_id ='$dept_id' and ques_id = 5 and email='$email' and res_id='$r_id'");
     $rowcount = mysqli_num_rows($result1);
     if($rowcount == 0)
     {
        $response_id =1;
         $res4 = "INSERT INTO user_response (email,res_id,dept_id,ques_id,ans_id) VALUES('$email','$response_id',$dept_id,5,$rating)";
     }
         else{
          $row = mysqli_fetch_assoc($result1);
          $response_id = $row['res_id'];
          $response_id++;
          $res4 = "INSERT INTO user_response (email,res_id,dept_id,ques_id,ans_id) VALUES('$email','$response_id',$dept_id,5,$rating)";
     }
          

if(isset($_POST['subject']) and isset($_POST['description']))
{
$subject = $_POST['subject'];
$description = $_POST['description'];
$subject = mysqli_real_escape_string($db, $_POST['subject']);
$description = mysqli_real_escape_string($db, $_POST['description']);
$que = "INSERT INTO other_feedback (dept_id,email,res_id, timestamp,subject,description,image) VALUES($dept_id,'$email','$response_id', now(),'$subject','$description','$docname')";

}
	

if(mysqli_query($db,$query) and mysqli_query($db,$query1) and mysqli_query($db,$query2) and mysqli_query($db,$query3) and mysqli_query($db,$query4) and mysqli_query($db,$res) and mysqli_query($db,$res1) and mysqli_query($db,$res2) and mysqli_query($db,$res3) and mysqli_query($db,$res4))
{
    if(mysqli_query($db,$que))
{
    move_uploaded_file($doc_tmp,"assets/image/feedback/".$docname);
}
    echo ("<script>alert('Feedback Submited you will be contact soon')</script>");
    echo"<script>window.open('index.php','_self')</script>"; 
}
else{
    echo ("<script>alert('Failed, please attempt all questions(which are not optional)')</script>");
	echo"<script>window.open('index.php','_self')</script>"; 
}			
?>