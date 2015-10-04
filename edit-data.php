<?php
	include_once 'dbconfig.php';
	if(isset($_POST['btn-update']))
		{
				$no_tilang			 = $_GET ['edit_id'];
				$kesatuan 			 = $_POST['kesatuan'];
				$nama_dakwa 		 = $_POST['nama_dakwa'];
				$alamat 				 = $_POST['alamat'];
				$no_hp 					 = $_POST['no_hp'];
				$pekerjaan 			 = $_POST['pekerjaan'];
				$pendidikan 		 = $_POST['pendidikan'];
				$umur 					 = $_POST['umur'];
				$t_lahir 				 = $_POST['t_lahir'];
				$tgl_lahir 			 = $_POST['tgl_lahir'];
				$no_ktp          = $_POST['no_ktp'];
				$sim_gol				 = $_POST['sim_gol'];
				$no_dd 					 = $_POST['no_dd'];
				$jns_kendaraan 	 = $_POST['jns_kendaraan'];
				$tgl_tilang 		 = $_POST['tgl_tilang'];
				$jam_tilang 		 = $_POST['jam_tilang'];
				$jalan 					 = $_POST['jalan'];
				$wilayah 				 = $_POST['wilayah'];
				$surat_sita 		 = $_POST['surat_sita'];
				$ambil_sitaan 	 = $_POST['ambil_sitaan'];
				$pasal_dilanggar = $_POST['pasal_dilanggar'];

				if($crud->update($no_tilang,$kesatuan,$nama_dakwa,$alamat,$no_hp,$pekerjaan,
												 $pendidikan,$umur,$t_lahir,$tgl_lahir,$no_ktp,$sim_gol,$no_dd,$jns_kendaraan,
												 $tgl_tilang,$jam_tilang,$jalan,$wilayah,$surat_sita,$ambil_sitaan,$pasal_dilanggar))
					{
						$msg = "<div class='alert alert-info'>
										<strong>WOW!</strong> Record was updated successfully <a href='index.php'>HOME</a>!
										</div>";
					}
					else
						{
							$msg = "<div class='alert alert-warning'>
											<strong>SORRY!</strong> ERROR while updating record !
											</div>";
						}
		}

	if(isset($_GET['edit_id']))
		{
			$no_tilang = $_GET['edit_id'];
			extract($crud->getID($no_tilang));
		}

?>
<?php include_once 'header.php'; ?>
	<div class="clearfix"></div>
	<div class="container">

		<?php
			if(isset($msg))
				{
					echo $msg;
				}
		?>
	</div>
	<div class="clearfix"></div><br />
	<div class="container">
     <form method='post'>
     		<table class='table table-bordered'>
        	<tr>
            	<td>No Tilang</td>
            	<td><input type='text' name='no_tilang' class='form-control' value="<?php echo $no_tilang; ?>" required></td>
        	</tr>
        	<tr>
            	<td>Kesatuan</td>
            	<td><input type='text' name='kesatuan' class='form-control' value="<?php echo $kesatuan; ?>" required></td>
        	</tr>
					<tr>
							<td>Nama Terdakwa</td>
							<td><input type='text' name='nama_dakwa' class='form-control' value="<?php echo $nama_dakwa; ?>" required></td>
					</tr>
					<tr>
							<td>Alamat</td>
							<td><input type='text' name='alamat' class='form-control' value="<?php echo $alamat; ?>" required></td>
					</tr>
					<tr>
							<td>No Hp</td>
							<td><input type='text' name='no_hp' class='form-control' value="<?php echo $no_hp; ?>" required></td>
					</tr>
					<tr>
							<td>Pekerjaan</td>
							<td><input type='text' name='pekerjaan' class='form-control' value="<?php echo $pekerjaan; ?>" required></td>
					</tr>
					<tr>
							<td>Pendidikan</td>
							<td><input type='text' name='pendidikan' class='form-control' value="<?php echo $pendidikan; ?>" required></td>
					</tr>
					<tr>
							<td>Umur</td>
							<td><input type='text' name='umur' class='form-control' value="<?php echo $umur; ?>" required></td>
					</tr>
					<tr>
							<td>Tempat Lahir</td>
							<td><input type='text' name='t_lahir' class='form-control' value="<?php echo $t_lahir; ?>" required></td>
					</tr>
					<tr>
							<td>Tanggal Lahir</td>
							<td><input type="text" name='tgl_lahir' id="example1" class='form-control' value="<?php echo $tgl_lahir; ?>" required></td>
					</tr>
					<tr>
							<td>No KTP</td>
							<td><input type='text' name='no_ktp' class='form-control' value="<?php echo $no_ktp; ?>" required></td>
					</tr>
					<tr>
							<td>SIM Gol</td>
							<td><input type='text' name='sim_gol' class='form-control' value="<?php echo $sim_gol; ?>" required></td>
					</tr>
					<tr>
							<td>No DD</td>
							<td><input type='text' name='no_dd' class='form-control' value="<?php echo $no_dd; ?>" required></td>
					</tr>
					<tr>
							<td>Jenis Kendaraan</td>
							<td><input type='text' name='jns_kendaraan' class='form-control' value="<?php echo $jns_kendaraan; ?>" required></td>
					</tr>
					<tr>
							<td>Tanggal Tilang</td>
							<td><input type='text' name='tgl_tilang' class='form-control' value="<?php echo $tgl_tilang; ?>" required></td>
					</tr>
					<tr>
							<td>Jam Tilang</td>
							<td><input type='text' name='jam_tilang' class='form-control' value="<?php echo $jam_tilang; ?>" required></td>
					</tr>
					<tr>
							<td>Jalan</td>
							<td><input type='text' name='jalan' class='form-control' value="<?php echo $jalan; ?>" required></td>
					</tr>
					<tr>
							<td>Wilayah</td>
							<td><input type='text' name='wilayah' class='form-control' value="<?php echo $wilayah; ?>" required></td>
					</tr>
					<tr>
							<td>Surat Sita</td>
							<td><input type='text' name='surat_sita' class='form-control' value="<?php echo $surat_sita; ?>" required></td>
					</tr>
					<tr>
							<td>Pengambil Surat</td>
							<td><input type='text' name='ambil_sitaan' class='form-control' value="<?php echo $ambil_sitaan; ?>" required></td>
					</tr>
					<tr>
							<td>Pasal Dilanggar</td>
							<td><input type='text' name='pasal_dilanggar' class='form-control' value="<?php echo $pasal_dilanggar; ?>" required></td>
					</tr>
            	<td colspan="2">
                <button type="submit" class="btn btn-primary" name="btn-update">
    								<span class="glyphicon glyphicon-edit"></span>  Update this Record
								</button>
                <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; CANCEL</a>
            	</td>
        	</tr>
    	</table>
		</form>
	</div>
<?php include_once 'footer.php'; ?>
