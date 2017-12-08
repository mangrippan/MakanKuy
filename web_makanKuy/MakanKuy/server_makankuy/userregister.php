<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

include 'DatabaseConfig.php';

 $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASSWORD,$DB_DATABASE);

 $email = $_POST['email'];
 $nama = $_POST['nama'];
 $user = $_POST['username'];
 $pass = $_POST['password'];
 $no = $_POST['no_telp'];

 $CheckSQL = "SELECT * FROM konsumen WHERE user='$username'";
 
 $check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));
 
 if(isset($check)){

 echo 'Username Already Exist';

 }
else{ 
$Sql_Query = "INSERT INTO konsumen (nama,email,username,password,no_telp) values ('$nama','$email','$user','$pass','$no')";

 if(mysqli_query($con,$Sql_Query))
{
 echo 'Registration Successfully';
}
else
{
 echo 'Something went wrong';
 }
 }
}
 mysqli_close($con);
?>