<html>
	<head>
		<link rel="stylesheet" href="bootstrap/css/datepicker.css">
		<script src="bootstrap/js/jquery-1.9.1.min.js"></script>
		<script src="bootstrap/js/bootstrap-datepicker.js"></script>
	</head>
	<body>
		<script type="text/javascript">
				$(document).ready(function () {
						$('#example3').datepicker({
							format: "dd/mm/yyyy"
						});
					});
				$(document).ready(function () {
						$('#example4').datepicker({
							format: "dd/mm/yyyy"
							});
						});
		</script>

<?php
	include_once 'dbconfig.php';
	if(isset($_POST['btn-save']))
	{
		$kes	 			 = $_POST['kesatuan'];
		$ndakwa 		 = $_POST['nama_dakwa'];
		$almt				 = $_POST['alamat'];
		$nhp 				 = $_POST['no_hp'];
		$pkrj 			 = $_POST['pekerjaan'];
		$pddkn	 		 = $_POST['pendidikan'];
		$umur 			 = $_POST['umur'];
		$tlhr				 = $_POST['t_lahir'];
		$tglhr 			 = $_POST['tgl_lahir'];
		$nktp        = $_POST['no_ktp'];
		$simgol			 = $_POST['sim_gol'];
		$nodd 			 = $_POST['no_dd'];
		$jnskendara	 = $_POST['jns_kendaraan'];
		$tgltilang 	 = $_POST['tgl_tilang'];
		$jmtlg	 		 = $_POST['jam_tilang'];
		$jln 				 = $_POST['jalan'];
		$wil				 = $_POST['wilayah'];
		$ssita	 		 = $_POST['surat_sita'];
		$ambsita	 	 = $_POST['ambil_sitaan'];
		$psllanggar  = $_POST['pasal_dilanggar'];

			if($crud->create($kes,$ndakwa,$almt,$nhp,$pkrj,
											$pddkn,$umur,$tlhr,$tglhr,$nktp,$simgol,$nodd,$jnskendara,
											$tgltilang,$jmtlg,$jln,$wil,$ssita,$ambsita,$psllanggar))
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
            <td>Kesatuan</td>
            <td><input type='text' name='kesatuan' class='form-control' required></td>
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
						<td><input type="text" name='tgl_lahir'  id ='example3' class='form-control' required></td>
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
						<td><input type='text' name='tgl_tilang' id = 'example4' class='form-control' required></td>
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
