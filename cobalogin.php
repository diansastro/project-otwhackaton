<?php
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','cmsprodi');
 
$con = mysqli_connect('localhost','root','','cmsprodi');
 
$username = $_POST['user'];
$password = $_POST['pass'];
 
$sql = "select * from admin where user_id='$username' and password='$password'";
 
$res = mysqli_query($con,$sql);
 
$check = mysqli_fetch_array($res);
 
if(isset($check)){
echo 'success';
}else{
echo 'failure';
}
 
mysqli_close($con);
?>