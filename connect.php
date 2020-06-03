<?php 

$dbs['db_host'] = "localhost";
$dbs['db_user'] = "wildwingsindia";
$dbs['db_pass'] = "wingsbengal2018";
$dbs['db_name'] = "wildwing_citizenfeedback";

foreach($dbs as $key => $value){
	define(strtoupper($key), $value);
}
$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
?>