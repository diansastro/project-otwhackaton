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
         			<table class='table'>
         				<tr>
					 				<th>No Tilang</th> <!-- cetak tebal-->
					 				<th>Kesatuan</th>
					 				<th>Nama Terdakwa</th>
					 				<th>Alamat</th>
					 				<th>No Hp</th>
					 				<th>Pekerjaan</th>
					 				<th>Pendidikan</th>
					 				<th>Umur</th>
					 				<th>Tempat Lahir</th>
					 				<th>Tanggal Lahir</th>
					 				<th>No KTP</th>
					 				<th>SIM Gol</th>
					 				<th>No DD</th>
					 				<th>Jenis Kendaraan</th>
					 				<th>Tanggal Tilang</th>
					 				<th>Jam Tilang</th>
					 				<th>Jalan</th>
					 				<th>Wilayah</th>
					 				<th>Surat Sita</th>
					 				<th>Pengambil Surat</th>
					 				<th>Pasal Dilanggar</th>
         			</tr>
         			<?php
         					$stmt = $DB_con->prepare("SELECT * FROM datatilang WHERE id=:id");
         					$stmt->execute(array(":id"=>$_GET['delete_id']));
         					while($row=$stmt->fetch(PDO::FETCH_BOTH))
         						{
             					?>
             						<tr>
             								<td><?php print($row['id']); ?></td>
             								<td><?php print($row['kesatuan']); ?></td>
             								<td><?php print($row['nama_dakwa']); ?></td>
             								<td><?php print($row['alamat']); ?></td>
         	 	 								<td><?php print($row['no_hp']); ?></td>
						 								<td><?php print($row['pekerjaan']); ?></td>
						 								<td><?php print($row['pendidikan']); ?></td>
						 								<td><?php print($row['umur']); ?></td>
						 								<td><?php print($row['t_lahir']); ?></td>
						 								<td><?php print($row['tgl_lahir']); ?></td>
						 								<td><?php print($row['no_ktp']); ?></td>
						 								<td><?php print($row['sim_gol']); ?></td>
						 								<td><?php print($row['no_dd']); ?></td>
						 								<td><?php print($row['jns_kendaraan']); ?></td>
						 								<td><?php print($row['tgl_tilang']); ?></td>
						 								<td><?php print($row['jam_tilang']); ?></td>
						 								<td><?php print($row['jalan']); ?></td>
						 								<td><?php print($row['wilayah']); ?></td>
						 								<td><?php print($row['surat_sita']); ?></td>
						 								<td><?php print($row['ambil_sitaan']); ?></td>
						 								<td><?php print($row['pasal_dilanggar']); ?></td>
             						</tr>
             					<?php
         					}
         				?>
         			</table>
        		<?php
	 			}
	 		?>
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
    							<a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; TIDAK</a>
    						</form>
								<?php
							}
							else
							{
								?>
    							<a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Keembali ke Index</a>
    						<?php
							}
							?>
		</p>
	</div>
<?php include_once 'footer.php'; ?>
