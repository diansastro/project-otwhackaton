<?php
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','tilangonline');
 
$con = mysqli_connect('localhost','root','','tilangonline');
$username = $_POST['hasilCode'];
 
$sql = "select * from datasim where id ='$username'";
 
$res = mysqli_query($con,$sql);
 
$check = mysqli_fetch_array($res);
 
if(isset($check)){
echo 'success';

	
}else{
echo 'failure';
}
 
mysqli_close($con);
?>