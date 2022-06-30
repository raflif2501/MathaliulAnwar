<?php 
  include 'koneksi.php';
  session_start();

  if (!$_SESSION['status'] == true) {
	header("Location: ../mathaliul_anwar/login.php");
  }

  if (isset($_GET['logout']) == true) {
	session_destroy();
	header("Location: ../mathaliul_anwar/login.php");
  }

	$santri = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
	$semuaSantri = mysqli_num_rows($santri);
	$putra = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE jk='Laki - Laki'");
	$santriPutra = mysqli_num_rows($putra);
	$putri = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE jk='Perempuan'");
	$santriPutri = mysqli_num_rows($putri);
	$alumni = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE statuss='Alumni'");
	$santriAlumni = mysqli_num_rows($alumni);
	$hasilPutra = $santriPutra;
	$hasilPutri = $santriPutri;
	$hasilAlumni = $santriAlumni;
	$hasil = $santriPutra + $santriPutri;
	// var_dump($hasil);die;
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
			<li class="active"><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="agenda.php"><em class="fa fa-calendar">&nbsp;</em> Agenda</a></li>
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
			<li><a href="index.php?logout=true"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main table-responsive">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
  		<br>
		<div class="row">
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Santri Putra</h4>
						<div class="easypiechart" id="easypiechart-blue" data-percent="<?= $hasilPutra ?>" ><span class="percent"><?= $hasilPutra ?></span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Santri Putri</h4>
						<div class="easypiechart" id="easypiechart-orange" data-percent="<?= $hasilPutri ?>" ><span class="percent"><?= $hasilPutri ?></span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Santri Aktif</h4>
						<div class="easypiechart" id="easypiechart-teal" data-percent="<?= $hasil ?>" ><span class="percent"><?= $hasil ?></span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Alumni</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="<?= $hasilAlumni ?>" ><span class="percent"><?= $hasilAlumni ?></span></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">	
						Alumni
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
					</div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<table class="table tablesorter " id="">
								<thead class=" text-primary">
									<tr>
									<th>
										Nama
									</th>
									<th>
										Kamar/Blok
									</th>
									<th>
										Kota
									</th>
									</tr>
								</thead>

								<?php 
								include 'koneksi.php';
								//jika kita klik cari, maka yang tampil query cari ini
								if(isset($_GET['kata_cari'])) {
								//menampung variabel kata_cari dari form pencarian
								$kata_cari = $_GET['kata_cari'];

								//mencari data dengan menggunakan query
								$query = "SELECT * FROM mahasiswa WHERE first_name like '%".$kata_cari."%' ORDER BY blog ASC";
								} else {
								//jika tidak ada pencarian, default yang dijalankan query ini
								$query = "SELECT * FROM mahasiswa where statuss='Alumni'";
								}
								
								$result = mysqli_query($koneksi, $query);

								if(!$result) {
								die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
								}
								//kalau ini melakukan foreach atau perulangan
								while ($row = mysqli_fetch_assoc($result)) {
								?>
								<tr>
								<style type="text/css">
									.upper { text-transform: uppercase; }
									.cap   { text-transform: capitalize; }
								</style>
								<td class="cap"> <?php echo $row['first_name']; ?></td>
								<td class="upper"><?php echo $row['kamar']; ?></td>
								<td class="upper"><?php echo $row['kota']; ?></td>
								</tr>
								<?php
								}
								?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">	
						Santri Putra
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
					</div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<table class="table tablesorter " id="">
								<thead class=" text-primary">
									<tr>
									<th>
										Nama
									</th>
									<th>
										Kamar/Blok
									</th>
									<th>
										Kota
									</th>
									</tr>
								</thead>

								<?php 
								include 'koneksi.php';
								//jika kita klik cari, maka yang tampil query cari ini
								if(isset($_GET['kata_cari'])) {
								//menampung variabel kata_cari dari form pencarian
								$kata_cari = $_GET['kata_cari'];

								//mencari data dengan menggunakan query
								$query = "SELECT * FROM mahasiswa WHERE first_name like '%".$kata_cari."%' ORDER BY blog ASC";
								} else {
								//jika tidak ada pencarian, default yang dijalankan query ini
								$query = "SELECT * FROM mahasiswa where jk='Laki - Laki'";
								}
								
								$result = mysqli_query($koneksi, $query);

								if(!$result) {
								die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
								}
								//kalau ini melakukan foreach atau perulangan
								while ($row = mysqli_fetch_assoc($result)) {
								?>
								<tr>
								<style type="text/css">
									.upper { text-transform: uppercase; }
									.cap   { text-transform: capitalize; }
								</style>
								<td class="cap"> <?php echo $row['first_name']; ?></td>
								<td class="upper"><?php echo $row['kamar']; ?></td>
								<td class="upper"><?php echo $row['kota']; ?></td>
								</tr>
								<?php
								}
								?>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Santri Putri
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
						<table class="table tablesorter " id="">
								<thead class=" text-primary">
									<tr>
									<th>
										Nama
									</th>
									<th>
										Kamar/Blok
									</th>
									<th>
										Kota
									</th>
									</tr>
								</thead>

								<?php 
								include 'koneksi.php';
								//jika kita klik cari, maka yang tampil query cari ini
								if(isset($_GET['kata_cari'])) {
								//menampung variabel kata_cari dari form pencarian
								$kata_cari = $_GET['kata_cari'];

								//mencari data dengan menggunakan query
								$query = "SELECT * FROM mahasiswa WHERE first_name like '%".$kata_cari."%' ORDER BY blog ASC";
								} else {
								//jika tidak ada pencarian, default yang dijalankan query ini
								$query = "SELECT * FROM mahasiswa WHERE jk='Perempuan'";
								}
								$result = mysqli_query($koneksi, $query);

								if(!$result) {
								die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
								}
								//kalau ini melakukan foreach atau perulangan
								while ($row = mysqli_fetch_assoc($result)) {
								?>
								<tr>
								<style type="text/css">
									.upper { text-transform: uppercase; }
									.cap   { text-transform: capitalize; }
								</style>
								<td class="cap"><?php echo $row['first_name']; ?></td>
								<td class="upper"><?php echo $row['kamar']; ?></td>
								<td class="upper"><?php echo $row['kota']; ?></td>
								</tr>
								<?php
								}
								?>
							</table>
						</div>
					</div>
				</div>
			</div>
		<div class="row">
			<div class="col-sm-12">
				<p class="back-link">Mathaliul <a href="">Anwar</a></p>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>
		
</body>
</html>