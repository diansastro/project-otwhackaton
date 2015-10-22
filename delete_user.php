<?php
  include("dbconfig2.php");
  $delete_id    = $_GET['del'];
  $delete_query = "delete  from akun WHERE id='$delete_id'";//delete query
  $run          = mysqli_query($dbcon,$delete_query);
    if($run)
      {
          //javascript function to open in the same window
          echo "<script>window.open('view_users.php?deleted=user Telah dihapus','_self')</script>";
      }

?>
