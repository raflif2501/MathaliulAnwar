<?php
    include 'koneksi.php';
    session_start();
?>
<html>
<head>
  <title>Data Santri Putra</title>
	<link rel="icon" type="image/x-icon" href="img/logo.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
            <center>
                <h2>Data Santri</h2>
                <h4>Mathaliul Anwar</h4>
                <hr>
            </center>
				<div class="data-tables datatable-dark">
                <table class="table tablesorter " id="mauexport">
								<thead class=" text-primary">
									<tr>
									<th>
										NIM
									</th>
                                    <th>
										Nama Lengkap
									</th>
                                    <th>
										Jenis Kelamin
									</th>
									<th>
										Tanggal Lahir
									</th>
									<th>
										Kota
									</th>
									<th>
										Status
									</th>
									<th>
										NO HP
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
								$query = "SELECT * FROM mahasiswa WHERE first_name like '%".$kata_cari."%' AND statuss='Santri Baru' AND jk='Laki - Laki'";
								} else {
								//jika tidak ada pencarian, default yang dijalankan query ini
									$query = "SELECT * FROM mahasiswa WHERE statuss='Alumni' AND jk='Laki - Laki'";
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
								<td class="cap"><?php echo $row['nim']; ?></td>
								<td class="upper"><?php echo $row['first_name']; ?></td>
								<td class="cap"><?php echo $row['jk']; ?></td>
								<td class="upper"><?php echo $row['tgl_lahir']; ?></td>
								<td class="cap"><?php echo $row['kota']; ?></td>
								<td class="cap"><?php echo $row['statuss']; ?></td>
								<td class="cap"><?php echo $row['no_hp']; ?></td>
								</tr>
								<?php
								}
								?>
							</table>
				</div>
</div>
	
<script>
$(document).ready(function() {
    $('#mauexport').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy','csv','excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>