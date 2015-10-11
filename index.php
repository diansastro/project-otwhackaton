<?php
	include_once 'dbconfig.php';
?>
<?php include_once 'header.php'; ?>
		<div class="clearfix"></div>
			<div class="container">
					<a href="add-data.php" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Add Records</a>
			</div>
			<div class="clearfix"></div><br />
				<div class="container">
	 				<table class='table table-bordered table-responsive' text-align:"justify">
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
     					<th colspan="3" align="center">Actions</th>
     			</tr>
					<?php
							$query = "SELECT * FROM datatilang";
							$records_per_page=3;
							$newquery = $crud->paging($query,$records_per_page);
							$crud->dataview($newquery);
	 				?>

					<tr>
        		<td colspan="7" align="center">
 							<div class="pagination-wrap">
            			<?php $crud->paginglink($query,$records_per_page);?>
        			</div>
        		</td>
    		</tr>
			</table>
		</div>
<!--?php include_once 'footer.php'; ?>
