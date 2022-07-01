<?php 
  include 'koneksi.php';
  session_start();
	$acara = mysqli_query($koneksi, "SELECT count(*) as agenda FROM acara");
	$semuaAcara = mysqli_fetch_assoc($acara);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mathaliul Anwar</title>
	<link rel="icon" type="image/x-icon" href="img/logo.png">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Mathaliul</span> Anwar</a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="../mathaliul_anwar/img/logo.png" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?= $_SESSION['username']; ?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<li><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a class="active" href="agenda.php"><em class="fa fa-calendar">&nbsp;</em> Agenda</a></li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-3">
				<em class="fa fa-pencil-square-o">&nbsp;</em> Forms<span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-3">
					<li><a class="" href="form.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Form Data Santri
					</a></li>
					<li><a class="" href="formA.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Form Acara
					</a></li>
				</ul>
			</li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-address-card">&nbsp;</em> Data Santri Putra<span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="putrabaru.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Santri baru
					</a></li>
					<li><a class="" href="putralama.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Santri lama
					</a></li>
					<li><a class="" href="putraalumni.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Santri alumni
					</a></li>
				</ul>
			</li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
				<em class="fa fa-address-card-o">&nbsp;</em> Data Santri Putri<span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li><a class="" href="putribaru.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Santri baru
					</a></li>
					<li><a class="" href="putrilama.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Santri lama
					</a></li>
					<li><a class="" href="putrialumni.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Santri alumni
					</a></li>
				</ul>
			</li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-4">
				<em class="fa fa-download">&nbsp;</em> Download Data<span data-toggle="collapse" href="#sub-item-4" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-4">
					<li><a class="" href="putra.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Santri putra
					</a></li>
					<li><a class="" href="putri.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Santri putri
					</a></li>
					<li><a class="" href="alumniputra.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Alumni putra
					</a></li>
					<li><a class="" href="alumniputri.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Alumni putri
					</a></li>
				</ul>
			</li>
			<li><a href="index.php?logout=true"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main table-responsive">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Acara</li>
			</ol>
		</div><!--/.row-->
		<br>
		<?php
			if(isset($_GET['edit']))
			{
				$id = $_GET['id'];
				$acara = mysqli_query($koneksi, "SELECT * FROM acara WHERE id=$id");
				$data = mysqli_fetch_assoc($acara);
		?>
			<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Forms Edit Acara</div>
					<div class="panel-body">
						<div class="col-md-6">
						<form action="editA.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label>Tanggal Acara</label>
									<input type="date" class="form-control" placeholder="" value="<?= $data['tgl_acara'] ?>" name="tgl_acara">
								</div>
								<div class="form-group">
									<label>Nama Acara</label>
									<input class="form-control" placeholder="" value="<?= $data['n_acara'] ?>" name="n_acara">
								</div>
							</div>
								<div class="col-md-6">
									<div class="form-group">
										<div class="form-group">
											<label>Deskripsi Acara</label>
											<textarea class="form-control" rows="3" name="d_acara" required="true"><?= $data['d_acara'] ?></textarea>
										</div>
									</div>
									<div class="form-group">
											<label>Upload Gambar</label>
											<img src="upload/<?= $data['g_acara'] ?>" style="width:100px;"/>
											<input type="file" name="g_acara" required="true" >
											<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg</p>
									</div>
									<!-- </div> -->
									<button type="submit" class="btn btn-primary" name="submitAcara">Simpan</button>
									<button type="reset" class="btn btn-default">Reset</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->		
		<?php }elseif(isset($_GET['show'])){ 
			$id = $_GET['id'];
				$acara = mysqli_query($koneksi, "SELECT * FROM acara WHERE id=$id");
				$data = mysqli_fetch_assoc($acara);
		?>
			<div class="page-content">
				<div class="container">
					<div class="resume-container table-responsive">
						<div class="shadow-1-strong bg-white my-5" id="intro">
							<div class="bg-info text-white">
									<div class="mask" style="background-image: linear-gradient(to right, #30a5ff , #8ad9db);">
										<div class="text-center p-5">
											<br>
											<div class="avatar p-1"><img class="../img-thumbnail shadow-2-strong "
													src="upload/<?= $data['g_acara'] ?>" style="width:50%;"/></div>
											<div class="header-bio mt-3">
												<div data-aos="zoom-in" data-aos-delay="0">
													<h2 class="h1"><?= $data['n_acara'] ?></h2>
													<p><?= $data['tgl_acara'] ?></p>
													<p><?= $data['d_acara'] ?></p>
												</div>
												<br>
											</div>
										</div>
									</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br><br><br>
		<?php }else{ ?>
		<div class="row ">
			<div class="col-md-12">
				<div class="panel panel-default articles">
					<div class="panel-heading">
					Acara
					<a href="formA.php" class="btn btn-success btn-sm">Tambah</a>
						<form role="search" class="pull-right">
							<div class="form-group">
								<input type="text" class="form-control " placeholder="Cari Acara" name="kata_cari">
							</div>
						</form>
						<?php 
								include 'koneksi.php';
								//jika kita klik cari, maka yang tampil query cari ini
								if(isset($_GET['kata_cari'])) {
								//menampung variabel kata_cari dari form pencarian
								$kata_cari = $_GET['kata_cari'];

								//mencari data dengan menggunakan query
								$query = "SELECT * FROM acara WHERE n_acara like '%".$kata_cari."%' ORDER BY tgl_acara DESC";
								} else {
								//jika tidak ada pencarian, default yang dijalankan query ini
									$query = "SELECT * FROM acara  ORDER BY tgl_acara DESC";
								}

								$result = mysqli_query($koneksi, $query);

								if(!$result) {
								die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
								}
								//kalau ini melakukan foreach atau perulangan
								while ($row = mysqli_fetch_assoc($result)) {
								?>
								<div class="panel-body articles-container">
									<div class="article border-bottom">
										<div class="col-xs-12">
											<div class="row">
												<div class="col-xs-2 col-md-2 date">
													<!-- <div class="large"><?php echo $row['tgl_acara']; ?></div> -->
													<div class="text-muted" style="float:left;"><?php echo $row['tgl_acara'];?></div>
												</div>
												<div class="col-xs-10 col-md-10">
													<h4><a href="agenda.php?show&id=<?= $row['id'] ?>"><?php echo $row['n_acara']; ?></a></h4>
													<h6><?php echo $row['d_acara']; ?></h6>
												</div>
											</div>
										</div>
										<a href="agenda.php?edit&id=<?= $row['id'] ?>" class="btn btn-warning btn-sm pull-right">Edit </a>
										<a href="deleteA.php?id='<?= $row['id'] ?>'" class="btn btn-danger btn-sm pull-right" > Delete</a>
										<div class="clear"></div>
									</div><!--End .article-->				
								</div>
								<?php
								}
								?>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		<br><br><br>
		<div class="row">
			<div class="col-sm-12 fixed-bottom">
				<p class="back-link">Mathaliul <a href="">Anwar</a></p>
			</div>
		</div>
	</div>	<!--/.main-->
	  

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	
</body>
</html>
