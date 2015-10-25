<?php 
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','tilangonline');
 
$con = mysqli_connect('localhost','root','','tilangonline');
	$kesatuan = $_POST['kesatuan'];	 
	$namaTerdakwa = $_POST['namaTerdakwa'];	 
	$alamatTerdakwa = $_POST['alamatTerdakwa']; 
	$noHp = $_POST['noHp']; 
	$pekerjaanTerdakwa = $_POST['pekerjaanTerdakwa']; 
	$pendidikanTerdakwa = $_POST['pendidikanTerdakwa']; 
	$umurTerdakwa = $_POST['umurTerdakwa']; 
	$tempatLahir = $_POST['tempatLahir']; 
	$tanggalLahir = $_POST['tanggalLahir']; 
	$noKTP = $_POST['noKTP']; 
	$golonganSIM = $_POST['golonganSIM']; 
	$noPlat = $_POST['noPlat']; 
	$jenisKendaraan = $_POST['jenisKendaraan']; 
	$tanggalTilang = $_POST['tanggalTilang']; 
	$jamTilang = $_POST['jamTilang']; 
	$lokasiTilang = $_POST['lokasiTilang']; 
	$wilayahHukum = $_POST['wilayahHukum']; 
	$suratDisita = $_POST['suratDisita']; 
	$sidang = $_POST['sidang']; 
	$pasal = $_POST['pasal']; 
	$denda = $_POST['denda'];
	$foto = $_POST['foto']; 
	$userId = $_POST['userId'];
	$wrnaKertas = $_POST['wrnaKertas'];

 
$sql = "INSERT INTO datatilang (kesatuan, nama_dakwa, alamat, no_hp, pekerjaan, pendidikan, umur, t_lahir, tgl_lahir, no_ktp, sim_gol, no_dd, jns_kendaraan, tgl_tilang, jam_tilang, jalan, wilayah, surat_sita, ambil_sitaan, pasal_dilanggar, jml_denda, foto, id_petugas, kertas)VALUES('$kesatuan','$namaTerdakwa','$alamatTerdakwa', '$noHp', '$pekerjaanTerdakwa', '$pendidikanTerdakwa', '$umurTerdakwa', '$tempatLahir', '$tanggalLahir', '$noKTP', '$golonganSIM', '$noPlat', '$jenisKendaraan','$tanggalTilang','$jamTilang','$lokasiTilang', '$wilayahHukum', '$suratDisita', '$sidang', '$pasal', '$denda', '$foto', '$userId', '$wrnaKertas')";
 
$res = mysqli_query($con,$sql);
 
$check = mysqli_fetch_array($res);

if(isset($check)){
echo 'success';
}else{
echo 'failure';
}

mysqli_close($con);
?>