<?php

 if($_SERVER['REQUEST_METHOD']=='POST'){

 include 'Config.php';
 
 $con = mysql_connect($DB_HOST,$DB_USER,$DB_PASSWORD,$DB_DATABASE);
 
 $user = $_POST['username'];
 $pass = $_POST['password'];
 
 $Sql_Query = "select * from konsumen where username = '$user' and password = '$pass' ";
 
 $check = mysql_fetch_array(mysql_query($con,$Sql_Query));
 
 if(isset($check)){
 
 echo "Data Matched";
 }
 else{
 echo "Invalid Username or Password Please Try Again";
 }
 
 }else{
 echo "Check Again";
 }
mysql_close($con);

?>