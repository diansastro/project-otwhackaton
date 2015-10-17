<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="stylesheet" href="bootstrap/css/site.min.css">
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">
		<!-- <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'> -->
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
		<!--[if lt IE 9]>
		  <script src="js/html5shiv.js"></script>
		  <script src="js/respond.min.js"></script>
		<![endif]-->
		<script type="text/javascript" src="bootstrap/js/site.min.js"></script>
	</head>

	<body style="background-color: #f1f2f6;">
		<!-- Ini Menux-->
		<?php include('index_menu.php'); ?>
		<!-- Ini Sliderx-->
		<?php include('index_slider.php'); ?>
		<!-- Ini Listx-->
		<!--div class='container'>
			<div class='row'>
				<div class='col-md-12' align=center>
					<div>
						<!--h2 class='page-header'>DAFTAR KATEGORI PENELITIAN</h2>
							<div class="example">
								<div class="row">
								<?php
									include('connect_db.php');
									$sql = 'SELECT * FROM kategori';
									$result = $conn->query($sql);

									while($row = $result->fetch_assoc()) {
										?>
											<a href="index_list.php?kode=<?php echo $row['kode'];?>">
											<div class="col-lg-3 col-sm-6">
											  <div class="thumbnail">
												<img class="img-rounded" style="padding:20px" src="images/icon/<?php echo $row['kode']; ?>.jpg" alt="Image not found" onError="this.onerror=null;this.src='images/icon/no_image.png';" />
												<div class="caption text-center">
												  <h3><?php echo $row['kategori']; ?></h3>
												  <p>Sedikit Penjelasan</p>
												  </div>
											  </div>
											</div>
											</a>
										<?php
									}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Ini Footerx-->
		<div class="footer">
			<div class="clearfix">
				<dl class="footer-nav">
					<dt class="nav-title">Recent Post</dt>
					<dd class="nav-item"><a href="#">Web Design</a></dd>
				</dl>
			</div>
		<div class="footer-copyright text-center">Copyright &copy; 2015 <a href='index.php'> Hasanuddin University Research </a> </div>
		</div>
	</body>
 </html>
