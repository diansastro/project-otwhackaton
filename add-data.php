<html>
	<head>
		<link rel="stylesheet" href="bootstrap/css/datepicker.css">
	</head>
	<body>
		<script src="bootstrap/js/jquery-1.9.1.min.js"></script>
		<script src="bootstrap/js/bootstrap-datepicker.js"></script>
		<script type="text/javascript">
				$(document).ready(function () {
						$('#example1').datepicker({
							format: "dd/mm/yyyy"
						});
					});
		</script>

<?php
	include_once 'dbconfig.php';
	if(isset($_POST['btn-save']))
	{
		$no_tilang 			 = $_POST['no_tilang'];
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

			if($crud->create($no_tilang,$kesatuan,$nama_dakwa,$alamat,$no_hp,$pekerjaan,
											 $pendidikan,$umur,$t_lahir,$tgl_lahir,$no_ktp,$sim_gol,$no_dd,$jns_kendaraan,
											 $tgl_tilang,$jam_tilang,$jalan,$wilayah,$surat_sita,$ambil_sitaan,$pasal_dilanggar))
				{
					header("Location: add-data.php?inserted");
				}
				else
					{
						header("Location: add-data.php?failure");
					}
		}
?>

<?php include_once 'header.php'; ?>
		<div class="clearfix"></div>
<?php
	if(isset($_GET['inserted']))
		{
			?>
    			<div class="container">
						<div class="alert alert-info">
    					<strong>WOW!</strong> Record was inserted successfully <a href="index.php">HOME</a>!
						</div>
					</div>
    	<?php
		}

		else if(isset($_GET['failure']))
			{
					?>
    				<div class="container">
								<div class="alert alert-warning">
    							<strong>SORRY!</strong> ERROR while inserting record !
								</div>
						</div>
    			<?php
			}
		?>
<div class="clearfix"></div><br />
<div class="container">
	 <form method='post'>
    <table class='table table-bordered'>
        <tr>
            <td>No Tilang</td>
            <td><input type='text' name='no_tilang' class='form-control' required></td>
        </tr>
        <tr>
            <td>Kesatuan</td>
            <td><input type='text' name='Kesatuan' class='form-control' required></td>
        </tr>
        <tr>
            <td>Nama Terdakwa</td>
            <td><input type='text' name='nama_dakwa' class='form-control' required></td>
        </tr>
				<tr>
            <td>Alamat</td>
            <td><input type='text' name='alamat' class='form-control' required></td>
        </tr>
				<tr>
            <td>No Hp</td>
            <td><input type='text' name='no_hp' class='form-control' required></td>
        </tr>
				<tr>
            <td>Pekerjaan</td>
            <td><input type='text' name='pekerjaan' class='form-control' required></td>
        </tr>
				<tr>
            <td>Pendidikan</td>
            <td><input type='text' name='pendidikan' class='form-control' required></td>
        </tr>
				<tr>
            <td>Umur</td>
            <td><input type='text' name='umur' class='form-control' required></td>
        </tr>
				<tr>
            <td>Tempat Lahir</td>
            <td><input type='text' name='t_lahir' class='form-control' required></td>
        </tr>
				<tr>
            <td>Tanggal Lahir</td>
						<td><input type="text" name='tgl_lahir' class='form-control' required></td>
        </tr>
        <tr>
				<tr>
	          <td>No KTP</td>
	          <td><input type='text' name='no_ktp' class='form-control' required></td>
	      </tr>
				<tr>
						<td>SIM Gol</td>
						<td><input type='text' name='sim_gol' class='form-control' required></td>
				</tr>
				<tr>
						<td>No DD</td>
						<td><input type='text' name='no_dd' class='form-control' required></td>
				</tr>
				<tr>
						<td>Jenis Kendaraan</td>
						<td><input type='text' name='jns_kendaraan' class='form-control' required></td>
				</tr>
				<tr>
						<td>Tanggal Tilang</td>
						<td><input type='text' name='tgl_tilang' class='form-control' required></td>
				</tr>
				<tr>
						<td>Jam Tilang</td>
						<td><input type='text' name='jam_tilang' class='form-control' required></td>
				</tr>
				<tr>
						<td>Jalan</td>
						<td><input type='text' name='jalan' class='form-control' required></td>
				</tr>
				<tr>
						<td>Wilayah</td>
						<td><input type='text' name='wilayah' class='form-control' required></td>
				</tr>
				<tr>
						<td>Surat Sita</td>
						<td><input type='text' name='surat_sita' class='form-control' required></td>
				</tr>
				<tr>
						<td>Pengambil Surat</td>
						<td><input type='text' name='ambil_sitaan' class='form-control' required></td>
				</tr>
				<tr>
						<td>Pasal Dilanggar</td>
						<td><input type='text' name='pasal_dilanggar' class='form-control' required></td>
				</tr>
            <td colspan="2">
            		<button type="submit" class="btn btn-primary" name="btn-save">
    							<span class="glyphicon glyphicon-plus"></span> Create New Record
								</button>
            		<a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index</a>
            </td>
        </tr>
    </table>
	</form>
</div>

<?php include_once 'footer.php'; ?>
</body>
</html>
