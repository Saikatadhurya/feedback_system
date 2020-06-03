<?php
include_once("include/connect.php");
if(isset($_POST['get_option']))
{
 $state = $_POST['get_option'];
 $state = mysqli_real_escape_string($db, $state);
 $find=mysqli_query($db,"select * from district where state_name='$state'");
 ?>
<option>Select District</option>>
<?php 
 while($row=mysqli_fetch_assoc($find))
 {
     $district_name=$row['district_name'];
  ?>
  <option value="<?php echo $district_name; ?>"><?php echo "$district_name"; ?></option>
  <?php
 }
 exit;
}

if(isset($_POST['get_option1']))
{
 $district = $_POST['get_option1'];
 $district = mysqli_real_escape_string($db, $district);
 $find=mysqli_query($db,"select * from city where district_name='$district'");
 ?>
<option>Select City</option>
<?php 
 while($row=mysqli_fetch_assoc($find))
 {
     $city_name=$row['city_name'];
  ?>
  <option value="<?php echo $city_name; ?>"><?php echo "$city_name"; ?></option>
  <?php
 }
 exit;
}

if(isset($_POST['get_option2']))
{
 $city = $_POST['get_option2'];
 $city = mysqli_real_escape_string($db, $city);
 $find=mysqli_query($db,"select * from office where city_name='$city'");
 ?>
<option>Select Office</option>
<?php 
 while($row=mysqli_fetch_assoc($find))
 {
     $office_name=$row['office_name'];
  ?>
  <option value="<?php echo $office_name; ?>"><?php echo "$office_name"; ?></option>
  <?php
 }
 exit;
}


if(isset($_POST['get_option3']))
{
 $office = $_POST['get_option3'];
 $office = mysqli_real_escape_string($db, $office);
 $find=mysqli_query($db,"select * from department where office_name='$office' group by department_name");
 ?>
<option>Select Department</option>
<?php 
 while($row=mysqli_fetch_assoc($find))
 {
     $department_name=$row['department_name'];
  ?>
  <option value="<?php echo $department_name; ?>"><?php echo "$department_name"; ?></option>
  <?php
 }
 exit;
}
?>
?>