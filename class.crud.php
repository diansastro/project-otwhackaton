<?php
	class crud
	{
		private $db;
		function __construct($DB_con)
			{
				$this->db = $DB_con;
			}

		public function create($no_tilang,$kesatuan,$nama_dakwa,$alamat,$no_hp,$pekerjaan,
													$pendidikan,$umur,$t_lahir,$tgl_lahir,$no_ktp,$sim_gol,$no_dd,$jns_kendaraan,
													$tgl_tilang,$jam_tilang,$jalan,$wilayah,$surat_sita,$ambil_sitaan,$pasal_dilanggar)
				{
						try
						{
							$stmt = $this->db->prepare("INSERT INTO datatilang(no_tilang,kesatuan,nama_dakwa,alamat,
																no_hp,pekerjaan,pendidikan,umur,t_lahir,tgl_lahir,no_ktp,sim_gol,
																no_dd,jns_kendaraan,tgl_tilang,jam_tilang,jalan,wilayah,surat_sita,
																ambil_sitaan,pasal_dilanggar)
																VALUES(:no_tilang, :kesatuan, :nama_dakwa, :alamat,
																			 :no_hp, :pekerjaan, :pendidikan, :umur, :t_lahir, :tgl_lahir,
																			 :no_ktp, :sim_gol, :no_dd, :jns_kendaraan, :tgl_tilang, :jam_tilang,
																			 :jalan, :wilayah, :surat_sita, :ambil_sitaan, :pasal_dilanggar)");
						 $stmt->bindparam(":no_tilang",$no_tilang);
						 $stmt->bindparam(":kesatuan",$kesatuan);
						 $stmt->bindparam(":nama_dakwa",$nama_dakwa);
						 $stmt->bindparam(":alamat",$alamat);
						 $stmt->bindparam(":no_hp",$no_hp);
						 $stmt->bindparam(":pekerjaan",$pekerjaan);
						 $stmt->bindparam(":pendidikan",$pendidikan);
						 $stmt->bindparam(":umur",$umur);
						 $stmt->bindparam(":t_lahir",$t_lahir);
						 $stmt->bindparam(":tgl_lahir",$tgl_lahir);
						 $stmt->bindparam(":no_ktp",$no_ktp);
						 $stmt->bindparam(":sim_gol",$sim_gol);
						 $stmt->bindparam(":no_dd",$no_dd);
						 $stmt->bindparam(":jns_kendaraan",$jns_kendaraan);
						 $stmt->bindparam(":tgl_tilang",$tgl_tilang);
						 $stmt->bindparam(":jam_tilang",$jam_tilang);
						 $stmt->bindparam(":jalan",$jalan);
						 $stmt->bindparam(":wilayah",$wilayah);
						 $stmt->bindparam(":surat_sita",$surat_sita);
						 $stmt->bindparam(":ambil_sitaan",$ambil_sitaan);
						 $stmt->bindparam(":pasal_dilanggar",$pasal_dilanggar);
						 $stmt->execute();
						 return true;
					 }
					catch(PDOException $e)
						{
								echo $e->getMessage();
								return false;
						}
			}

		public function getID($no_tilang)
			{
					$stmt = $this->db->prepare("SELECT * FROM datatilang WHERE id=:no_tilang");
					$stmt->execute(array(":id"=>$no_tilang));
					$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
					return $editRow;
			}

			public function update($no_tilang,$kesatuan,$nama_dakwa,$alamat,$no_hp,$pekerjaan,
														$pendidikan,$umur,$t_lahir,$tgl_lahir,$no_ktp,$sim_gol,$no_dd,$jns_kendaraan,
														$tgl_tilang,$jam_tilang,$jalan,$wilayah,$surat_sita,$ambil_sitaan,$pasal_dilanggar)
				{
					try
					{
						$stmt=$this->db->prepare("UPDATE datatilang SET no_tilang=:no_tilang, kesatuan=:kesatuan, nama_dakwa=:nama_dakwa,
																														alamat=:alamat, no_hp=:no_hp, pekerjaan=:pekerjaan,
																														pendidikan=:pendidikan, umur=:umur, t_lahir=:t_lahir,
																														tgl_lahir=:tgl_lahir, no_ktp=:no_ktp, sim_gol=:sim_gol,
																														no_dd=:no_dd, jns_kendaraan=:jns_kendaraan, tgl_tilang=:tgl_tilang,
																														jam_tilang=:jam_tilang, jalan=:jalan, wilayah=:wilayah, surat_sita=:surat_sita,
																														ambil_sitaan=:ambil_sitaan, pasal_dilanggar=:pasal_dilanggar
																			WHERE id=:no_tilang");
						$stmt->bindparam(":no_tilang",$no_tilang);
						$stmt->bindparam(":kesatuan",$kesatuan);
						$stmt->bindparam(":nama_dakwa",$nama_dakwa);
						$stmt->bindparam(":alamat",$alamat);
						$stmt->bindparam(":no_hp",$no_hp);
						$stmt->bindparam(":pekerjaan",$pekerjaan);
						$stmt->bindparam(":pendidikan",$pendidikan);
						$stmt->bindparam(":umur",$umur);
						$stmt->bindparam(":t_lahir",$t_lahir);
						$stmt->bindparam(":tgl_lahir",$tgl_lahir);
						$stmt->bindparam(":no_ktp",$no_ktp);
						$stmt->bindparam(":sim_gol",$sim_gol);
						$stmt->bindparam(":no_dd",$no_dd);
						$stmt->bindparam(":jns_kendaraan",$jns_kendaraan);
						$stmt->bindparam(":tgl_tilang",$tgl_tilang);
						$stmt->bindparam(":jam_tilang",$jam_tilang);
						$stmt->bindparam(":jalan",$jalan);
						$stmt->bindparam(":wilayah",$wilayah);
						$stmt->bindparam(":surat_sita",$surat_sita);
						$stmt->bindparam(":ambil_sitaan",$ambil_sitaan);
						$stmt->bindparam(":pasal_dilanggar",$pasal_dilanggar);
						$stmt->execute();
						return true;

					}
						catch(PDOException $e)
							{
								echo $e->getMessage();
								return false;
							}
			}

			public function delete($no_tilang){
					$stmt = $this->db->prepare("DELETE FROM datatilang WHERE id=:no_tilang");
					$stmt->bindparam(":id",$no_tilang);
					$stmt->execute();
			return true;
			}

	/* paging */

		public function dataview($query)
		{
			$stmt = $this->db->prepare($query);
			$stmt->execute();
			if($stmt->rowCount()>0)
				{
					while($row=$stmt->fetch(PDO::FETCH_ASSOC))
						{
							?>
                <tr>
                <td><?php print($row['no_tilang']); ?></td>
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
                <td align="center">
                	<a href="edit-data.php?edit_id=<?php print($row['no_tilang']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
                </td>
                <td align="center">
                	<a href="delete.php?delete_id=<?php print($row['no_tilang']); ?>"><i class="glyphicon glyphicon-remove-circle"></i></a>
                </td>
            		</tr>
          			<?php
						}
				 }
			 else
			 	{
					?>
            	<tr>
            	<td>Nothing here...</td>
            	</tr>
            	<?php
				}
			}

			public function paging($query,$records_per_page)
			{
				$starting_position=0;
				if(isset($_GET["page_no"]))
					{
						$starting_position=($_GET["page_no"]-1)*$records_per_page;
					}
						$query2=$query." limit $starting_position,$records_per_page";
						return $query2;
			}
			public function paginglink($query,$records_per_page)
			{
				$self = $_SERVER['PHP_SELF'];
				$stmt = $this->db->prepare($query);
				$stmt->execute();
				$total_no_of_records = $stmt->rowCount();

				if($total_no_of_records > 0)
					{
						?><ul class="pagination"><?php
						$total_no_of_pages=ceil($total_no_of_records/$records_per_page);
						$current_page=1;
						if(isset($_GET["page_no"]))
							{
								$current_page=$_GET["page_no"];
							}

							if($current_page!=1)
								{
									$previous =$current_page-1;
									echo "<li><a href='".$self."?page_no=1'>First</a></li>";
									echo "<li><a href='".$self."?page_no=".$previous."'>Previous</a></li>";
								}
						 for($i=1;$i<=$total_no_of_pages;$i++)
						 {
							 if($i==$current_page)
							 	{
									echo "<li><a href='".$self."?page_no=".$i."' style='color:red;'>".$i."</a></li>";
								}
									else
										{
											echo "<li><a href='".$self."?page_no=".$i."'>".$i."</a></li>";
										}
							}
			if($current_page!=$total_no_of_pages)
			{
				$next=$current_page+1;
				echo "<li><a href='".$self."?page_no=".$next."'>Next</a></li>";
				echo "<li><a href='".$self."?page_no=".$total_no_of_pages."'>Last</a></li>";
			}
			?></ul><?php
		}
	}
	/* paging */
}
