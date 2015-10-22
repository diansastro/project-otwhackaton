<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="bootstrap/css/site.min.css">
    <title>Admin Login</title>
    <?php include('header2.php'); ?>
</head>
<style>
    .login-panel {
        margin-top: 150px;
</style>
<body style="background-color: #f1f2f6;">
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Sign In</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="admin_login.php">
                        <fieldset>
                            <div class="form-group"  >
                                <input class="form-control" placeholder="Name" name="useradmin" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password_admin" type="password" value="">
                            </div>
                              <input class="btn btn-lg btn-success btn-block" type="submit" value="admin_login" name="admin_login" >
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>
</body>
</html>
<?php
    include('dbconfig2.php');
    if(isset($_POST['admin_login']))//this will tell us what to do if some data has been post through form with button.
    {
      $useradmin      = $_POST['useradmin'];
      $password_admin = $_POST['password_admin'];
      $admin_query    = "SELECT * from admin where useradmin='$useradmin' AND password_admin='$password_admin'";
      $run_query      = mysqli_query($dbcon,$admin_query);
        if(mysqli_num_rows($run_query)>0)
            {
              echo "<script>window.open('view_users.php','_self')</script>";
            }
        else
          {
            echo"<script>alert('Admin Details are incorrect..!')</script>";}
          }
?>
