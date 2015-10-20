<?php
define('HOST','localhost');
define('USER','root');
<<<<<<< HEAD
define('PASS','root');
define('DB','tilangonline');
 
$con = mysqli_connect('localhost','root','root','tilangonline');
=======
define('PASS','');
define('DB','tilangonline');
 
$con = mysqli_connect('localhost','root','','tilangonline');
>>>>>>> 8c7bb88b448820f58859e5b5da3dc57708487432
 
$username = $_POST['user_id'];
$password = $_POST['password'];
 
$sql = "select * from akun where user_id='$username' and password='$password'";
 
$res = mysqli_query($con,$sql);
 
$check = mysqli_fetch_array($res);
 
if(isset($check)){
echo 'success';
}else{
echo 'failure';
}
 
mysqli_close($con);
?>