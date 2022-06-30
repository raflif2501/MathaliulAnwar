<?php
include 'koneksi.php';
$id = $_GET['id'];
$tgl_acara = $_POST['tgl_acara'];
$n_acara = $_POST['n_acara'];
$d_acara = $_POST['d_acara'];
$photoAcr ='';
$g_acara = $_FILES['g_acara'];
	if($g_acara['error'] == 0){
		$fileType = pathinfo($g_acara['name'], PATHINFO_EXTENSION);
		if($fileType == 'jpg' || $fileType == 'png'){
			$namaBaru = md5(uniqid()) . '.' . $fileType;
			move_uploaded_file($g_acara['tmp_name'], './upload/' .$namaBaru);
			$photoAcr = $namaBaru;
		}
	}
$data = "UPDATE acara SET tgl_acara='$tgl_acara', n_acara='$n_acara', d_acara='$d_acara', g_acara='$photoAcr'
            WHERE id='$id' ";
$query = mysqli_query($koneksi, $data);
// var_dump($data);die;   

// apakah query update berhasil?
if( $query ) {
    // kalau berhasil alihkan ke halaman list-siswa.php
    header("location:agenda.php");
} else {
    // kalau gagal tampilkan pesan
    die("Gagal menyimpan perubahan...");
}
// var_dump($mahasiswa);die;   