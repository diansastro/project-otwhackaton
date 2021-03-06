<?php
	class crud
	{
		private $db;
		function __construct($DB_con)
			{
				$this->db = $DB_con;
			}

		public function create($kes,$ndakwa,$almt,$nhp,$pkrj,$pddkn,$umur,$tlhir,$tglhr,$nktp,$simgol,$nodd,$jnskendara,
													 $tgltilang,$jmtlg,$jln,$wil,$ssita,$ambsita,$psllanggar,$foto,$denda,$petugas,$kertas)
				{
						try
						{
							$stmt = $this->db->prepare("INSERT INTO datatilang(kesatuan,nama_dakwa,alamat,
																no_hp,pekerjaan,pendidikan,umur,t_lahir,tgl_lahir,no_ktp,sim_gol,
																no_dd,jns_kendaraan,tgl_tilang,jam_tilang,jalan,wilayah,surat_sita,
																ambil_sitaan,pasal_dilanggar,foto,jml_denda,id_petugas,kertas) VALUES(:kes, :ndakwa, :almt,
																:nhp, :pkrj, :pddkn, :umur, :tlhir, :tglhr, :nktp, :simgol, :nodd,
																:jnskendara, :tgltilang, :jmtlg, :jln, :wil, :ssita, :ambsita, :psllanggar, :foto, :denda, :petugas, :kertas)");

						 $stmt->bindparam(":kes",$kes);
						 $stmt->bindparam(":petugas",$petugas);
						 $stmt->bindparam(":ndakwa",$ndakwa);
						 $stmt->bindparam(":foto",$foto);
						 $stmt->bindparam(":almt",$almt);
						 $stmt->bindparam(":nhp",$nhp);
						 $stmt->bindparam(":pkrj",$pkrj);
						 $stmt->bindparam(":pddkn",$pddkn);
						 $stmt->bindparam(":umur",$umur);
						 $stmt->bindparam(":tlhir",$tlhir);
						 $stmt->bindparam(":tglhr",$tglhr);
						 $stmt->bindparam(":nktp",$nktp);
						 $stmt->bindparam(":simgol",$simgol);
						 $stmt->bindparam(":nodd",$nodd);
						 $stmt->bindparam(":jnskendara",$jnskendara);
						 $stmt->bindparam(":tgltilang",$tgltilang);
						 $stmt->bindparam(":jmtlg",$jmtlg);
						 $stmt->bindparam(":jln",$jln);
						 $stmt->bindparam(":wil",$wil);
						 $stmt->bindparam(":ssita",$ssita);
						 $stmt->bindparam(":ambsita",$ambsita);
						 $stmt->bindparam(":psllanggar",$psllanggar);
						 $stmt->bindparam(":denda",$denda);
						 $stmt->bindparam(":kertas",$kertas);
						 $stmt->execute();
						 return true;
					 }
					catch(PDOException $e)
						{
								echo $e->getMessage();
								return false;
						}
			}

			public function getID($id)
					{
					$stmt = $this->db->prepare("SELECT * FROM datatilang WHERE id=:id");
					$stmt->execute(array(":id"=>$id));
					$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
					return $editRow;
				}

			public function update($id,$kes,$ndakwa,$almt,$nhp,$pkrj,
											$pddkn,$umur,$tlhr,$tglhr,$nktp,$simgol,$nodd,$jnskendara,
											$tgltilang,$jmtlg,$jln,$wil,$ssita,$ambsita,$psllanggar,$denda)
				{
					try
					{
						$stmt=$this->db->prepare("UPDATE datatilang SET kesatuan=:kes, nama_dakwa=:ndakwa, alamat=:almt,
																														no_hp=:nhp, pekerjaan=:pkrj, pendidikan=:pddkn, umur=:umur,
																														t_lahir=:tlhir, tgl_lahir=:tglhr, no_ktp=:nktp, sim_gol=:simgol,
																														no_dd=:nodd,jns_kendaraan=:jnskendara, tgl_tilang=:tgltilang,
																														jam_tilang=:jmtlg, jalan=:jln, wilayah=:wil, surat_sita=:ssita,
																														ambil_sitaan=:ambsita, pasal_dilanggar=:psllanggar, jml_denda=:denda
																													  WHERE id=:id ");
						$stmt->bindparam(":kes",$kes);
						$stmt->bindparam(":ndakwa",$ndakwa);
						$stmt->bindparam(":almt",$almt);
						$stmt->bindparam(":nhp",$nhp);
						$stmt->bindparam(":pkrj",$pkrj);
						$stmt->bindparam(":pddkn",$pddkn);
						$stmt->bindparam(":umur",$umur);
						$stmt->bindparam(":tlhir",$tlhr);
						$stmt->bindparam(":tglhr",$tglhr);
						$stmt->bindparam(":nktp",$nktp);
						$stmt->bindparam(":simgol",$simgol);
					  $stmt->bindparam(":nodd",$nodd);
						$stmt->bindparam(":jnskendara",$jnskendara);
						$stmt->bindparam(":tgltilang",$tgltilang);
						$stmt->bindparam(":jmtlg",$jmtlg);
						$stmt->bindparam(":jln",$jln);
						$stmt->bindparam(":wil",$wil);
			    	$stmt->bindparam(":ssita",$ssita);
						$stmt->bindparam(":ambsita",$ambsita);
						$stmt->bindparam(":psllanggar",$psllanggar);
						$stmt->bindparam(":denda",$denda);
						$stmt->bindparam(":id",$id);
					  $stmt->execute();
						return true;

					}
					catch(PDOException $e)
						{
							echo $e->getMessage();
							return false;
						}
			}

			public function delete($id)
				{
					$stmt = $this->db->prepare("DELETE FROM datatilang WHERE id=:id");
					$stmt->bindparam(":id",$id);
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
                		<td  class="active"> <?php print($row['id']); ?></td>
                		<td  class="success"><?php print($row['kesatuan']); ?></td>
										<td	 class="info"> 	 <?php print($row['id_petugas']); ?></td>
                		<td  class="warning"><?php print($row['nama_dakwa']); ?></td>
										<?php echo "<td><img id='image_canv' width=90 src='".$row['foto']."' alt='NO IMAGE!!!'/></td>";?>
                		<td  class="danger"> <?php print($row['alamat']); ?></td>
                		<td  class="info">	 <?php print($row['no_hp']); ?></td>
										<td  class="active"> <?php print($row['pekerjaan']); ?></td>
										<td  class="success"><?php print($row['pendidikan']); ?></td>
										<td  class="warning"><?php print($row['umur']); ?></td>
										<td	 class="danger"> <?php print($row['t_lahir']); ?></td>
										<td	 class="info">	 <?php print($row['tgl_lahir']); ?></td>
										<td  class="active"> <?php print($row['no_ktp']); ?></td>
										<td	 class="success"><?php print($row['sim_gol']); ?></td>
										<td	 class="warning"><?php print($row['no_dd']); ?></td>
										<td	 class="danger"> <?php print($row['jns_kendaraan']); ?></td>
										<td	 class="info">	 <?php print($row['tgl_tilang']); ?></td>
										<td	 class="active"> <?php print($row['jam_tilang']); ?></td>
										<td  class="success"><?php print($row['jalan']); ?></td>
										<td	 class="warning"><?php print($row['wilayah']); ?></td>
										<td	 class="danger"> <?php print($row['surat_sita']); ?></td>
										<td	 class="info"> 	 <?php print($row['ambil_sitaan']); ?></td>
										<td	 class="active"> <?php print($row['pasal_dilanggar']); ?></td>
										<td	 class="success"><?php print($row['jml_denda']); ?></td>
										<td	 class="warning"><?php print($row['kertas']); ?></td>
                		<td  class="danger" align="center">
                				<a href="edit-data.php?edit_id=<?php print($row['id']); ?>"><i class="btn btn-primary">Edit</i></a>
                		</td>
                		<td class="info" align="center">
                			<a href="delete.php?delete_id=<?php print($row['id']); ?>"><i class="btn btn-danger">Hapus</i></a>
                		</td>
										<!--td class="active" align="center">
											<a href="print.php?onClick=<?php print($row['id']); ?>"><i class="btn btn-info" name="onClick">Print</i></a>
										</td-->
            		</tr>
          			<?php
							}
				 	}
			 		else
			 			{
							?>
            		<tr>
            			<td>Data tidak ditemukan...</td>
            		</tr>
            	<?php
						}
			}

			public function paging($query,$records_per_page)
			{
				$starting_position=0;
				if(isset($_GET["page_no"]))
					{
						$starting_position=($_GET["page_no"]-1)*
						$records_per_page;
					}
						$query2=$query." limit $starting_position,
						$records_per_page";
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
