<?php 
// koneksi database
include 'koneksi.php';

if (isset($_POST['submitUser'])) {
	// menangkap data yang di kirim dari form
	$nim = $_POST['nim'];
	$first_name = $_POST['first_name'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$alamat = $_POST['alamat'];
	$postal = $_POST['postal'];
	$kota = $_POST['kota'];
	$n_ibu = $_POST['n_ibu'];
	$n_ayah = $_POST['n_ayah'];
	$p_ayah = $_POST['p_ayah'];
	$hasil_ayah = $_POST['hasil_ayah'];
	$tujuan = $_POST['tujuan'];
	$kamar = $_POST['kamar'];
	$no_hp = $_POST['no_hp'];
	$statuss = $_POST['statuss'];
	$jk = $_POST['jk'];
	$photoMhs ='';
	$id_mhs = intval("0" . rand(1,9) . rand(1,9) . rand(0,9));
	$photo = $_FILES['photo'];
	if($photo['error'] == 0){
		$fileType = pathinfo($photo['name'], PATHINFO_EXTENSION);
		if($fileType == 'jpg' || $fileType == 'png'){
			$namaBaru = md5(uniqid()) . '.' . $fileType;
			move_uploaded_file($photo['tmp_name'], './uploads/' .$namaBaru);
			$photoMhs = $namaBaru;
		}
	}
	// menginput data ke database
	mysqli_query($koneksi,"insert into mahasiswa values('$id_mhs','$nim','$first_name','$tgl_lahir','$alamat','$postal','$kota','$n_ibu','$n_ayah','$p_ayah','$hasil_ayah','$tujuan','$kamar','$no_hp','$statuss','$jk','$photoMhs')");


	// var_dump($submitUser);die;
	// mengalihkan halaman
	header("Location: ../mathaliul_anwar/index.php");
} elseif (isset($_POST['submitAcara'])) {
	$tgl_acara = $_POST['tgl_acara'];
	$n_acara = $_POST['n_acara'];
	$d_acara = $_POST['d_acara'];
	$photoAcr ='';
	$id_acara = intval("0" . rand(1,9) . rand(1,9) . rand(0,9));
	$g_acara = $_FILES['g_acara'];
	if($g_acara['error'] == 0){
		$fileType = pathinfo($g_acara['name'], PATHINFO_EXTENSION);
		if($fileType == 'jpg' || $fileType == 'png'){
			$namaBaru = md5(uniqid()) . '.' . $fileType;
			move_uploaded_file($g_acara['tmp_name'], './upload/' .$namaBaru);
			$photoAcr = $namaBaru;
		}
	}
	// menginput data ke database
	mysqli_query($koneksi,"insert into acara values('$tgl_acara','$n_acara','$d_acara','$photoAcr','$id_acara')");
	// mengalihkan halaman
	header("Location: ../mathaliul_anwar/agenda.php");
} elseif (isset($_POST['submitLogin'])) {
	
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query 	= mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
	$cek 	= mysqli_num_rows($query);

	if ($cek > 0) {
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['status']	  = true;

		header("Location: ./index.php");
	} else {
		session_start();
		$_SESSION['gagal'] = true;
		header("Location: ./login.php");
	}
} elseif(isset($_POST['submitRegister'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$query = mysqli_query($koneksi, "INSERT INTO user VALUES('','$username','$password')");

	if ($query) {
		session_start();
		$_SESSION['signup'] = $username;
		header("Location: login.php");
	} else {
		echo "<script>alert('Signup Gagal!')</script>";
	}

}

?>