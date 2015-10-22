<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="bootstrap/css/site.min.css">
    <title>Registration</title>
</head>
<?php include('header2.php'); ?>
<style>
    .login-panel {
        margin-top: 150px;
</style>
<body style="background-color: #f1f2f6;">
<div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
    <div class="row"><!-- row class is used for grid system in Bootstrap-->
        <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
            <div class="login-panel panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Registration</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="registration.php">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Username" name="user_id" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                            <input class="btn btn-lg btn-primary btn-block" type="submit" value="register" name="register" >
                        </fieldset>
                    </form>
                    <center><b>Already registered ?</b> <br></b><a href="login.php">Login here</a></center><!--for centered text-->
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<br></br>
<?php include('footer.php'); ?>
</html>
<?php
  include ('dbconfig2.php');
  if(isset($_POST['register']))
    {
        $user_id=$_POST['user_id'];
        $password=$_POST['password'];
          if($user_id=='')
              {
                //javascript use for input checking
                echo"<script>alert('Please enter the name')</script>";
                exit();//this use if first is not work then other will not show
              }

          if($password=='')
            {
                echo"<script>alert('Please enter the password')</script>";
                exit();
            }

          //insert the user into the database.
          $insert_user="INSERT INTO akun (user_id,password) VALUES ('$user_id','$password')";
          if(mysqli_query($dbcon,$insert_user))
            {
                echo"<script>window.open('welcome.php','_self')</script>";
            }
  }
?>
