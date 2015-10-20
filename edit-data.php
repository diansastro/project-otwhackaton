<html>
<head>
	<title>Edit Data</title>
	<link rel="stylesheet" href="bootstrap/css/datepicker.min.css">
	<link rel="stylesheet" href="bootstrap/css/datepicker3.min.css">
	<script src="bootstrap/js/jquery-1.9.1.min.js"></script>
	<script src="bootstrap/js/bootstrap-datepicker.min.js"></script>
</head>
<body>
		<script type="text/javascript">
				$(document).ready(function () {
						$('#example1').datepicker({
							format: "dd/mm/yyyy"
						});
					});
				$(document).ready(function () {
						$('#example2').datepicker({
							format: "dd/mm/yyyy"
							});
						});
		</script>
<?php
	include_once 'dbconfig.php';
	if(isset($_POST['btn-update']))
		{
				$id       			 = $_GET['edit_id'];
				$kes			 			 = $_POST['kesatuan'];
				$ndakwa 				 = $_POST['nama_dakwa'];
				$almt		 				 = $_POST['alamat'];
				$nhp 					 	 = $_POST['no_hp'];
				$pkrj 			 	 	 = $_POST['pekerjaan'];
				$pddkn 		 			 = $_POST['pendidikan'];
				$umur 					 = $_POST['umur'];
				$tlhr 				 	 = $_POST['t_lahir'];
				$tglhr 			 		 = $_POST['tgl_lahir'];
				$nktp          	 = $_POST['no_ktp'];
				$simgol				 	 = $_POST['sim_gol'];
				$nodd 					 = $_POST['no_dd'];
				$jnskendara 	 	 = $_POST['jns_kendaraan'];
				$tgltilang 		 	 = $_POST['tgl_tilang'];
				$jmtlg 		 	 		 = $_POST['jam_tilang'];
				$jln 					 	 = $_POST['jalan'];
				$wil 				 		 = $_POST['wilayah'];
				$ssita 		 			 = $_POST['surat_sita'];
				$ambsita 	 	 		 = $_POST['ambil_sitaan'];
				$psllanggar 		 = $_POST['pasal_dilanggar'];

					if($crud->update($id,$kes,$ndakwa,$almt,$nhp,$pkrj,
													 $pddkn,$umur,$tlhr,$tglhr,$nktp,$simgol,$nodd,$jnskendara,
													 $tgltilang,$jmtlg,$jln,$wil,$ssita,$ambsita,$psllanggar))
							{
									$msg = "<div class='alert alert-info'>
													<strong>Selamat</strong> Data berhasil diupdate <a href='view.php'><strong>HOME</strong></a>!
													</div>";
							}
							else
								{
										$msg = "<div class='alert alert-warning'>
													<strong>Maaf!</strong> Gagal mengupdate data!
													</div>";
								}
		}
			if(isset($_GET['edit_id']))
				{
						$id = $_GET['edit_id'];
						extract($crud->getID($id));
				}
?>
	<?php include_once 'header.php'; ?>
			<div class="clearfix"></div>
			<div class="container">
				<?php
					if(isset($msg))
						{
							echo $msg;
						}?>
			</div>
			<div class="clearfix"></div><br />
			<div class="container">
     	<form method='post'>
     			<table class='table'>
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
							<td><input type='text' name='pekerjaan' class='form-control' value="<?php echo $pekerjaan; ?>" required>
									<!--input type='radio' value="<!?php echo $pekerjaan; ?>" name='pekerjaan' id="pekerjaan"/> Petani
									<input type='radio' value="<!?php echo $pekerjaan; ?>" name='pekerjaan' id="pekerjaan"/> Pedagang
									<input type='radio' value="<!?php echo $pekerjaan; ?>" name='pekerjaan' id="pekerjaan"/> Wiraswasta
									<input type='radio' value="<1?php echo $pekerjaan; ?>" name='pekerjaan' id="pekerjaan"/> PNS-->
							</td>
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
							<td><input type="text" name='tgl_lahir' id='example1' class='form-control' value="<?php echo $tgl_lahir; ?>" required></td>
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
							<td><input type='text' name='tgl_tilang' class='form-control' id='example2' value="<?php echo $tgl_tilang; ?>" required></td>
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
    								<span class="glyphicon glyphicon-edit"></span>  Update Data
								</button>
                <a href="view.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; BATAL</a>
            	</td>
        	</tr>
    	</table>
		</form>
	</div>
</body>
<?php include ('footer.php')?>
</html>
