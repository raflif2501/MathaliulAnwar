<?php 
  include 'koneksi.php';
  session_start();
	$santri = mysqli_query($koneksi, "SELECT count(*) as status FROM mahasiswa");
	$semuaSantri = mysqli_fetch_assoc($santri);
	$hasil = $semuaSantri["status"] * 1 / 100;
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
			<li class="parent"><a data-toggle="collapse" href="#sub-item-1">
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
			<li class="parent active"><a data-toggle="collapse" href="#sub-item-2">
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
				<li class="active">Data Alumni Santri Putri</li>
			</ol>
		</div><!--/.row-->
		<br>
		<div class="row">
		</div><!--/.row-->
		
		<?php
			if(isset($_GET['edit']))
			{
				$id = $_GET['id'];
				$santri = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id=$id");
				$data = mysqli_fetch_assoc($santri);
		?>
			<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Forms Edit Data</div>
					<div class="panel-body">
						<div class="col-md-6">
						<form action="edit.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">
							<div class="form-group">
									<label>NIM</label>
									<input class="form-control" placeholder="" value="<?= $data['nim'] ?>" name="nim">
								</div>
								<div class="form-group">
										<label>Jenis Kelamin</label>
										<select class="form-control" name="jk">
										<option value="<?= $data['jk'] ?>"><?= $data['jk'] ?></option>
											<option value="Laki - Laki">Laki - Laki</option>
											<option value="Perempuan">Perempuan</option>
										</select>
								</div>
								<div class="form-group">
									<label>Alamat</label>
									<input class="form-control" placeholder="" value="<?= $data['alamat'] ?>" name="alamat">
								</div>
								<div class="form-group">
									<label>Nama ayah</label>
									<input class="form-control" placeholder="" value="<?= $data['n_ayah'] ?>" name="n_ayah">
								</div>
								<div class="form-group">
									<label>Pekerjaan orang tua</label>
									<input class="form-control" placeholder="" value="<?= $data['p_ayah'] ?>" name="p_ayah">
								</div>
								<div class="form-group">
									<label>No HP</label>
									<input class="form-control" placeholder="" value="<?= $data['no_hp'] ?>" name="no_hp">
								</div>
								<div class="form-group">
									<label>Asal kota</label>
									<input class="form-control" placeholder="" value="<?= $data['kota'] ?>" name="kota">
								</div>
								<div class="form-group">
										<label>Kamar</label>
										<select class="form-control" name="kamar">
											<option value="<?= $data['kamar'] ?>"><?= $data['kamar'] ?></option>
											<option value="Kamar 1">Kamar 1</option>
											<option value="Kamar 2">Kamar 2</option>
											<!-- <option>Option 3</option>
											<option>Option 4</option> -->
										</select>
								</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<div class="form-group">
											<label>Nama lengkap</label>
											<input class="form-control" placeholder="" value="<?= $data['first_name'] ?>" name="first_name">
										</div>
										<div class="form-group">
											<label>Tanggal lahir</label>
											<input type="date" class="form-control" placeholder="" value="<?= $data['tgl_lahir'] ?>" name="tgl_lahir">
										</div>
										<div class="form-group">
											<label>Nama ibu</label>
											<input class="form-control" placeholder="" value="<?= $data['n_ibu'] ?>" name="n_ibu">
										</div>
										<div class="form-group">
											<label>Pendapatan orang tua</label>
											<input class="form-control" placeholder="" value="<?= $data['hasil_ayah'] ?>" name="hasil_ayah">
										</div>
										<div class="form-group">
											<label>Postal kode</label>
											<input class="form-control" placeholder="" value="<?= $data['postal'] ?>" name="postal">
										</div>
										<div class="form-group">
											<label>Tujuan belajar</label>
											<input class="form-control" placeholder="" value="<?= $data['tujuan'] ?>" name="tujuan">
										</div>
										<div class="form-group">
										<label>Status Santri</label>
										<select class="form-control" name="statuss">
											<option value="<?= $data['statuss'] ?>"><?= $data['statuss'] ?></option>
											<option value="Santri Baru">Santri Baru</option>
											<option value="Santri Lama">Santri Lama</option>
											<option value="Alumni">Alumni</option>
										</select>
										</div>
										<div class="form-group">
											<label>Upload Foto</label>
											<img src="uploads/<?= $data['photo'] ?>" width="100px" height="100px" /></br>
            			                    <input name="photo" type="file" required="true">
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
		</div><!--/.row-->	
		<?php }elseif(isset($_GET['show'])){ 
			$id = $_GET['id'];
				$santri = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id=$id");
				$data = mysqli_fetch_assoc($santri);
		?>
	<div class="page-content">
        <div class="container">
            <div class="resume-container">
                <div class="shadow-1-strong bg-white my-5" id="intro">
                    <div class="bg-info text-white">
                            <div class="mask" style="background-image: linear-gradient(to right, #30a5ff , #8ad9db);">
                                <div class="text-center p-5">
									<br>
                                    <div class="avatar p-1"><img class="../img-thumbnail shadow-2-strong"
                                            src="uploads/<?= $data['photo'] ?>" width="160" height="160" /></div>
                                    <div class="header-bio mt-3">
                                        <div data-aos="zoom-in" data-aos-delay="0">
                                            <h2 class="h1"><?= $data['first_name'] ?></h2>
                                            <p>NIM : <?= $data['nim'] ?></p>
                                        </div>
                                        <div class="header-social mb-3 d-print-none" data-aos="zoom-in"
                                            data-aos-delay="200">
                                            <nav role="navigation">
                                                <ul class="nav justify-content-center">
													<i class="fa fa-venus-mars"> <?= $data['jk'] ?>			&emsp;</i>
                                                    <i class="fa fa-street-view"> <?= $data['alamat'] ?>	&emsp;</i>
													<i class="fa fa-bed"> <?= $data['kamar'] ?>				&emsp;</i>
													<i class="fa fa-genderless"> <?= $data['statuss'] ?>	&emsp;</i>
                                                </ul>
                                            </nav>
                                        </div>
										<br>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="shadow-1-strong bg-white my-5 p-5" id="about">
                    <div class="about-section">
                        <div class="row">
                            <div class="col-md-6">
                                <h2 class="h2 fw-light mb-4">Tujuan Belajar</h2>
                                <p><?= $data['tujuan'] ?>.</p>
                            </div>
                            <div class="col-md-3 offset-lg-1">
                                <div class="row mt-2">
                                    <h2 class="h2 fw-light mb-4">&nbsp;   Profil</h2>
                                    <div class="col-sm-5">
                                        <div class="pb-2 fw-bolder">Kota</div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="pb-2">: <?= $data['kota'] ?></div>
                                    </div>
									<div class="col-sm-5">
                                        <div class="pb-2 fw-bolder">Postal Code</div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="pb-2">: <?= $data['postal'] ?></div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="pb-2 fw-bolder">Nama Ayah</div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="pb-2">: <?= $data['n_ayah'] ?></div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="pb-2 fw-bolder">Nama Ibu</div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="pb-2">: <?= $data['n_ibu'] ?></div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="pb-2 fw-bolder">No HP</div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="pb-2">: <?= $data['no_hp'] ?></div>
                                    </div>
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
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Data Mahasiswa Putri
						<a href="form.php" class="btn btn-success btn-sm">Tambah</a>
						<form role="search" class="pull-right">
							<div class="form-group">
								<input type="text" class="form-control " placeholder="Cari Data Alumni" name="kata_cari">
							</div>
						</form>	
					</div>
					<div class="panel-body">
						<div class="canvas-wrapper table-responsive">
                        <table class="table tablesorter " id="">
								<thead class=" text-primary">
									<tr>
									<th>
										Nama Lengkap
									</th>
									<th>
										Tanggal Lahir
									</th>
									<th>
										Kamar/Blok
									</th>
									<th>
										Nama Ayah
									</th>
									<th>
										Nama Ibu
									</th>
									<th>
										Action
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
								$query = "SELECT * FROM mahasiswa WHERE statuss='Alumni' ".$kata_cari."%' AND statuss='Alumni' AND jk='Perempuan'";
								} else {
								//jika tidak ada pencarian, default yang dijalankan query ini
									$query = "SELECT * FROM mahasiswa WHERE statuss='Alumni' AND jk='Perempuan'";
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
								<td class="upper"><?php echo $row['tgl_lahir']; ?></td>
								<td class="upper"><?php echo $row['kamar']; ?></td>
								<td class="upper"><?php echo $row['n_ayah']; ?></td>
								<td class="upper"><?php echo $row['n_ibu']; ?></td>
								<td>
									<a href="putrialumni.php?show&id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Show</a>
									<a href="putrialumni.php?edit&id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
									<a href="delete.php?id='<?= $row['id'] ?>'" class="btn btn-danger btn-sm">Delete</a>
								</td>
								</tr>
								<?php
								}
								?>
							</table>
						</div> 
					</div>
				</div>
			</div>
		</div><!--/.row-->
		<?php } ?>
			
					
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
</body>
</html>