<?php
  session_start();//session starts here
  include('header2.php')
?>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="bootstrap/css/site.min.css">
    <title>Login</title>
</head>
<style>
    .login-panel {
        margin-top: 150px;
      }
    .login-panel{
      background-color: rgba(255,255,255,0.4);
    }
</style>
<body>
<div class="tempe" style="background: url('logo.png')no-repeat center fixed;">
<div class="container">
  <div class="clearfix">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>User Sign In</strong></h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="login.php">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="User Id" name="user_id" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                                <input class="btn btn-lg" type="submit" value="login" name="login" >
                            <!-- Change this to a button or input when using this as a form -->
                          <!--  <a href="index.html" class="btn btn-lg btn-primary btn-block">Login</a> -->
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
</div>
<br></br>
<br></br>
<?php include ('footer.php'); ?>
</body>
</html>
<?php
  include('dbconfig2.php');
  if(isset($_POST['login']))
    {
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
