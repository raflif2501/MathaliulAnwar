<?php
include 'koneksi.php';
$id = $_GET['id'];
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
$no_hp = $_POST['no_hp'];
$kamar = $_POST['kamar'];
$statuss = $_POST['statuss'];
$jk = $_POST['jk'];
$photoMhs ='';
$photo = $_FILES['photo'];
    if($photo['error'] == 0){
        $fileType = pathinfo($photo['name'], PATHINFO_EXTENSION);
        if($fileType == 'jpg' || $fileType == 'png'){
            $namaBaru = md5(uniqid()) . '.' . $fileType;
            move_uploaded_file($photo['tmp_name'], './uploads/' .$namaBaru);
            $photoMhs = $namaBaru;
        }
    }
$data = "UPDATE mahasiswa SET nim='$nim', first_name='$first_name', 
            tgl_lahir='$tgl_lahir', alamat='$alamat', postal='$postal', 
            kota='$kota', n_ibu='$n_ibu', n_ayah='$n_ayah', 
            p_ayah='$p_ayah', hasil_ayah='$hasil_ayah', tujuan='$tujuan', kamar='$kamar', no_hp='$no_hp', statuss='$statuss', jk='$jk', photo='$photoMhs'
            WHERE id='$id' ";
$query = mysqli_query($koneksi, $data);
// var_dump($data);die;
// apakah query update berhasil?
if( $query ) {
    // kalau berhasil alihkan ke halaman list-siswa.php
    header("location:index.php");
} else {
    // kalau gagal tampilkan pesan
    die("Gagal menyimpan perubahan...");
}
// var_dump($mahasiswa);die;   