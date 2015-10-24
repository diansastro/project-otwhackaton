<?php
  include('dbconfig2.php');
  $delete_id    = $_GET['del'];
  $delete_query = "DELETE from akun WHERE user_id='$delete_id'";//delete query
  $run          = mysqli_query($dbcon,$delete_query);
    if($run)
      {
          //javascript function to open in the same window
          echo"<script>window.open('view_users.php?del=user has been deleted','_self')</script>";
          //"<script>alert('Username atau Password Anda Salah!')</script>";
      }

?>
