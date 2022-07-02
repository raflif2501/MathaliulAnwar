<?php 
  include 'koneksi.php';
  session_start();

    
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
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i"
		rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
					data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
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
			<li><a href="agenda.php"><em class="fa fa-calendar">&nbsp;</em> Agenda</a></li>
			<li class="parent active"><a data-toggle="collapse" href="#sub-item-3">
					<em class="fa fa-pencil-square-o">&nbsp;</em> Forms<span data-toggle="collapse" href="#sub-item-3"
						class="icon pull-right"><em class="fa fa-plus"></em></span>
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
					<em class="fa fa-address-card">&nbsp;</em> Data Santri Putra<span data-toggle="collapse"
						href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
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
					<em class="fa fa-address-card-o">&nbsp;</em> Data Santri Putri<span data-toggle="collapse"
						href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
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
					<em class="fa fa-download">&nbsp;</em> Download Data<span data-toggle="collapse" href="#sub-item-4"
						class="icon pull-right"><em class="fa fa-plus"></em></span>
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
	</div>
	<!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main table-responsive">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
						<em class="fa fa-home"></em>
					</a></li>
				<li class="active">Form</li>
			</ol>
		</div>
		<!--/.row-->
		<br>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Form Input Data Santri</div>
					<div class="panel-body">
						<div class="col-md-6">
							<form method="post" action="../mathaliul_anwar/aksi.php" enctype="multipart/form-data">
								<div class="form-group">
									<label>NIM</label>
									<input class="form-control" name="nim" placeholder="" required="true">
								</div>
								<div class="form-group">
									<label>Jenis Kelamin</label>
									<select class="form-control" name="jk">
										<option value="Laki - Laki">Laki - Laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
								</div>
								<div class="form-group">
									<label>Alamat</label>
									<input class="form-control" name="alamat" placeholder="" required="true">
								</div>
								<div class="form-group">
									<label>Nama ayah</label>
									<input class="form-control" name="n_ayah" placeholder="" required="true">
								</div>
								<div class="form-group">
									<label>Pekerjaan orang tua</label>
									<input class="form-control" name="p_ayah" placeholder="" required="true">
								</div>
								<div class="form-group">
									<label>No HP</label>
									<input class="form-control" name="no_hp" placeholder="" required="true">
								</div>
								<div class="form-group">
									<label>Asal kota</label>
									<input class="form-control" name="kota" placeholder="" required="true">
								</div>
								<div class="form-group">
									<label>Kamar</label>
									<select class="form-control" name="kamar">
										<option value="Kamar 1">Kamar 1</option>
										<option value="Kamar 2">Kamar 2</option>
									</select>
								</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<div class="form-group">
									<label>Nama lengkap</label>
									<input class="form-control" name="first_name" placeholder="" required="true">
								</div>
								<div class="form-group">
									<label>Tanggal lahir</label>
									<input type="date" class="form-control" name="tgl_lahir" placeholder=""
										required="true">
								</div>
								<div class="form-group">
									<label>Nama ibu</label>
									<input class="form-control" name="n_ibu" placeholder="" required="true">
								</div>
								<div class="form-group">
									<label>Pendapatan orang tua</label>
									<input class="form-control" name="hasil_ayah" placeholder="" required="true">
								</div>
								<div class="form-group">
									<label>Postal kode</label>
									<input class="form-control" name="postal" placeholder="" required="true">
								</div>
								<div class="form-group">
									<label>Tujuan belajar</label>
									<textarea class="form-control" rows="3" name="tujuan" required="true"></textarea>
								</div>
								<div class="form-group">
									<label>Status Santri</label>
									<select class="form-control" name="statuss">
										<option value="Santri Baru">Santri Baru</option>
										<option value="Santri Lama">Santri Lama</option>
										<option value="Alumni">Alumni</option>
									</select>
								</div>
								<div class="form-group">
									<label>Upload Foto</label>
									<input type="file" name="photo" required="true">
									<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg</p>
								</div>
							</div>
							<button type="submit" class="btn btn-primary" name="submitUser">Simpan</button>
							<button type="reset" class="btn btn-default">Reset</button>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/.row-->

	<div class="col-sm-12">
		<p class="back-link">Mathaliul <a href="">Anwar</a></p>
	</div>
	</div>
	<!--/.row-->
	</div>
	<!--/.main-->

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