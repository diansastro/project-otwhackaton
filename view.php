<?php include_once 'dbconfig.php'; ?>
<?php include_once 'header.php'; ?>
<br></br>
		<div class="clearfix"></div>
			<div class="container">
					<a href="add-data.php" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Tamabah Data</a>
			</div>
			<div class="clearfix"></div><br></br>
				<div class="container">
					<div class="table-responsive">
	 				<table class='table'>
						<thead>
						<tr class="table-bordered">
			        <th>No</th> <!-- cetak tebal-->
			        <th>Kesatuan</th>
			        <th>Terdakwa</th>
			        <th>Alamat</th>
			        <th>No Hp</th>
			        <th>Pekerjaan</th>
			        <th>Pendidikan</th>
			        <th>Umur</th>
			        <th>T_Lahir</th>
			        <th>Tgl_Lahir</th>
				      <th>No KTP</th>
							<th>SIM</th>
							<th>No DD</th>
							<th>Kendaraan</th>
							<th>Tgl_Tilang</th>
							<th>Jam_Tilang</th>
							<th>Jalan</th>
							<th>Wilayah</th>
							<th>Disita</th>
							<th>Sidang</th>
							<th>Pelanggaran</th>
     					<th colspan="3" align="center">Actions</th>
     			</tr>
				</thead>
					<?php
							$query = "SELECT * FROM datatilang";
							$records_per_page=5;
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
		</div>
		<br></br>
		<?php include('footer.php');  ?>