<?php 
session_start();
include 'koneksi.php';
 
$username = $_POST['username'];
$password = $_POST['password'];
 
$query = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'") or die (mysqli_error($koneksi));
$row = mysqli_fetch_object($query);
$berhasil = mysqli_num_rows($query);
if($berhasil > 0 ){
	$_SESSION['nama'] =  $row->nama_lengkap;
	// $_SESSION['foto'] = $row->foto;
	echo "<script>";
	echo "alert('Berhasil LOGIN');";
	echo "location='index.php';";
	echo "</script>";
}else{
	echo "<script>";
	echo "alert('GAGAL LOGIN');";
	echo "location='login.php';";
	echo "</script>";
}

?>