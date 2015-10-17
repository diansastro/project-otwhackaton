<?php
	include_once 'dbconfig.php';
	if(isset($_POST['btn-del']))
		{
			$id = $_GET['delete_id'];
			$crud->delete($id);
			header("Location: delete.php?deleted");
		}
?>
	<?php include_once 'header.php'; ?>
		<br></br>
		<div class="clearfix"></div>
		<div class="container">
			<?php
				if(isset($_GET['deleted']))
					{
							?>
        			<div class="alert alert-success">
    						<strong>Sukses!!</strong> Data berhasil dihapus...
							</div>
        			<?php
					}
				else
				{
						?>
        			<div class="alert alert-danger">
    						<strong>Apakah anda yakin !!</strong> menghapus data ini ?
							</div>
        		<?php
					}
					?>
		</div>
		<div class="clearfix"></div>
		<div class="container">
	 	<?php
	 		if(isset($_GET['delete_id']))
	 			{
		 				?>
							<div class="table-responsive">
         			<table class='table'>
								<tr class="table-bordered">
					 				<th>No</th> <!-- cetak tebal-->
					 				<th>Kesatuan</th>
					 				<th>Terdakwa</th>
					 				<th>Alamat</th>
					 				<th>No Hp</th>
					 				<th>Pekerjaan</th>
					 				<th>Pendidikan</th>
					 				<th>Umur</th>
					 				<th>T Lahir</th>
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
					 				<th>Ambil Surat</th>
					 				<th>Pelanggaran</th>
         			</tr>
         			<?php
         					$stmt = $DB_con->prepare("SELECT * FROM datatilang WHERE id=:id");
         					$stmt->execute(array(":id"=>$_GET['delete_id']));
         					while($row=$stmt->fetch(PDO::FETCH_BOTH))
         						{
             					?>
             						<tr>
             								<td class="active"><?php print($row['id']); ?></td>
             								<td class="success"><?php print($row['kesatuan']); ?></td>
             								<td class="warning"><?php print($row['nama_dakwa']); ?></td>
             								<td class="danger"><?php print($row['alamat']); ?></td>
         	 	 								<td class="info"><?php print($row['no_hp']); ?></td>
						 								<td class="active"><?php print($row['pekerjaan']); ?></td>
						 								<td class="success"><?php print($row['pendidikan']); ?></td>
						 								<td class="warning"><?php print($row['umur']); ?></td>
						 								<td class="danger"><?php print($row['t_lahir']); ?></td>
						 								<td class="info"><?php print($row['tgl_lahir']); ?></td>
						 								<td class="active"><?php print($row['no_ktp']); ?></td>
						 								<td class="success"><?php print($row['sim_gol']); ?></td>
						 								<td class="warning"><?php print($row['no_dd']); ?></td>
						 								<td class="danger"><?php print($row['jns_kendaraan']); ?></td>
						 								<td class="info"><?php print($row['tgl_tilang']); ?></td>
						 								<td class="active"><?php print($row['jam_tilang']); ?></td>
						 								<td class="success"><?php print($row['jalan']); ?></td>
						 								<td class="warning"><?php print($row['wilayah']); ?></td>
						 								<td class="danger"><?php print($row['surat_sita']); ?></td>
						 								<td class="info"><?php print($row['ambil_sitaan']); ?></td>
						 								<td class="active"><?php print($row['pasal_dilanggar']); ?></td>
             						</tr>
             					<?php
         					}
         				?>
         			</table>
        		<?php
	 			}
	 		?>
	</div>
	</div>

	<div class="container">
		<p>
				<?php
						if(isset($_GET['delete_id']))
							{
								?>
  							<form method="post">
    							<input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
    							<button class="btn btn-large btn-primary" type="submit" name="btn-del"><i class="glyphicon glyphicon-trash"></i> &nbsp; YA</button>
    							<a href="view.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; TIDAK</a>
    						</form>
								<?php
							}
							else
							{
								?>
    							<a href="view.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Keembali ke Index</a>
    						<?php
							}
							?>
						<br></br>
							<?php include ('footer.php'); ?>

		</p>
	</div>
