<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="bootstrap/css/site.min.css">
    <title>View Users</title>
    <?php include('header3.php'); ?>
</head>
<style>
    .login-panel {
        margin-top: 150px;
      }
    .table {
        margin-top: 50px;
      }
</style>
<body>
<div class="clearfix"></div>
  <!--div class="container">
    <a href="registration.php" class="btn btn-large btn-primary"><i class="glyphicon glyphicon-plus"></i> &nbsp; Tamabah User</a>
  </div-->
    <div class="clearfix"></div>
    <div class="container">
      <div class="table-responsive">
          <h4 align="center">Data User</h4>
          <a href="registration.php" class="btn btn-large btn-primary"><i class="glyphicon glyphicon-plus"></i> &nbsp; Tamabah User</a>
          <div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->
              <table class="table">
                      <tr class="table-bordered">
                          <th>User Id</th>
                          <th>Password</th>
                          <th>Action</th>
                      </tr>
                  <?php
                      include("dbconfig2.php");
                          $view_users_query = "SELECT * from akun";//select query for viewing users.
                          $run              = mysqli_query($dbcon,$view_users_query);//here run the sql query.

                      while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
                        {

                            $user_id  = $row[0];
                            $password = $row[1];

                            ?>
                            <tr>
                                <!--here showing results in the table -->
                                <td class="danger"><?php echo $user_id;  ?></td>
                                <td class="success"><?php echo $password;  ?></td>
                                <td class="info"><a href="delete_user.php?del=<?php echo $user_id ?>">
                                <i class="btn btn-danger">Hapus</i></a></td>
                            </tr>
                  <?php } ?>
             </table>
          </div>
        </div>
      </div>
        <br></br>
        <?php include('footer.php'); ?>
</body>
</html>
