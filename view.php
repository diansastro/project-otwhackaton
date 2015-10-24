<?php
	session_start();
	if(!isset($_SESSION['user_id'])) {
			header('Location:index.php');
		}
?>
<?php include_once 'dbconfig.php'; ?>
<?php include ('header3.php'); ?>
<br></br>
		<div class="clearfix"></div>
			<div class="container">
					<a href="add-data.php" class="btn btn-large btn-primary"><i class="glyphicon glyphicon-plus"></i> &nbsp; Tamabah Data</a>
			</div>
			<div class="clearfix"></div></br>
				<div class="container">
					<div class="row">
						<form method="POST">
							<div class="col-md-6">
								<div class="input-group form-search">
									<input type="text" class="form-control search-query"  placeholder="Cari berdasarkan No Tilang" id="cariid" name="cariid">
										<span class="input-group-btn">
													<button type="submit" class="btn btn-primary" data-type="last" id="cari" name="cari">Cari</button>
										</span>
								</div>
							</div>
						</form>
					</div>
					</br>
				<div class="table-responsive">
	 				<table class='table'>
						<tr class="table-bordered">
			        <th>No</th> <!-- cetak tebal-->
			        <th>Kesatuan</th>
							<th>Petugas</th>
			        <th>Terdakwa</th>
							<th>Foto</th>
			        <th>Alamat</th>
			        <th>No Hp</th>
			        <th>Pekerjaan</th>
			        <th>Pendidikan</th>
			        <th>Umur</th>
			        <th>T_Lahir</th>
			        <th>Tgl Lahir</th>
				      <th>No KTP</th>
							<th>SIM</th>
							<th>No DD</th>
							<th>Kendaraan</th>
							<th>Tgl Tilang</th>
							<th>Jam</th>
							<th>Jalan</th>
							<th>Wilayah</th>
							<th>Disita</th>
							<th>Sidang</th>
							<th>Pelanggaran</th>
							<th>Denda</th>
							<th>Kertas</th>
     					<th colspan="3" style='text-align:center';>Actions</th>
     			</tr>
					<?php
							$query = "SELECT * FROM datatilang";
							$records_per_page=3;
							$newquery = $crud->paging($query,$records_per_page);
							$crud->dataview($newquery);
	 				?>
					<tr>
        		<td colspan="14" align="center">
 							<div class="pagination-wrap">
            			<?php $crud->paginglink($query,$records_per_page);?>
        			</div>
        		</td>
    			</tr>
			</table>
		</div>
		</div>
		<?php include('footer.php');  ?>
		<?php
			if(isset($_POST['cari'])){
				/*session_start();
				$id1 = $_POST['cariid'];
				$_SESSION['cariid']=$id1;*/
				$id1 = $_POST['cariid'];
				if($id1 != null){
					echo "<script> location.replace('search.php?id1=".$id1."');</script>";
					}
			}
		 ?>
<script type="text/javascript">
 		var t;
 				window.onload=resetTimer;
 				document.onkeypress=resetTimer;
 		function logout()
 			{
 				alert("You are now logged out.")
 				location.href='logout.php'
 			}
 		function resetTimer()
 			{
 				clearTimeout(t);
 				//t=setTimeout(logout,1800000) //logs out in 30 minutes
				t=setTimeout(logout,60000) //logout in 1 minutes
 			}
 </script>
