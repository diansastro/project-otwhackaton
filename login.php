
<?php
  session_start();//session starts here
?>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="bootstrap/css/site.min.css">
    <title>Login</title>
</head>
<?php include('header2.php'); ?>
<style>
    .login-panel {
        margin-top: 150px;
</style>
<body style="background-color: #f1f2f6;">
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Sign In</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="login.php">
                        <fieldset>
                            <div class="form-group"  >
                                <input class="form-control" placeholder="Username" name="user_id" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                                <input class="btn btn-lg btn-primary btn-block" type="submit" value="login" name="login" >
                            <!-- Change this to a button or input when using this as a form -->
                          <!--  <a href="index.html" class="btn btn-lg btn-primary btn-block">Login</a> -->
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br></br>
<?php include ('footer.php'); ?>
</body>
</html>
<?php
  include('dbconfig2.php');
  if(isset($_POST['login']))
    {
        session_start();
        $user_id=$_POST['user_id'];
        $password=$_POST['password'];
        $check_user="SELECT * from akun WHERE user_id='$user_id' AND password='$password' ";
        $run=mysqli_query($dbcon,$check_user);
          if(mysqli_num_rows($run))
            {
                echo "<script>window.open('view.php','_self')</script>";
                $_SESSION['user_id']=$user_id;//here session is used and value of $user_email store in $_SESSION.
            }
            else
            {
                echo "<script>alert('Username atau Password Anda Salah!')</script>";
            }
      }
?>
