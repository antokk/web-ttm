<?php
include ("koneksi.php");
$id = $_GET['id'];
$action = $_GET['aksi'];
switch($action){
case 'kabko':
	$query = mysqli_query($koneksi,"DELETE FROM kabko WHERE kode_kabko='$id'");
	if($query){
		echo "<script>";
		echo "alert('Berhasil Dihapus');";
		echo "location='kabko.php'";
		echo "</script>";
	}else{
		
	}
break;

case 'user':
	$query = mysqli_query($koneksi,"DELETE FROM user WHERE id_user='$id'");
	if($query){
		echo "<script>";
		echo "alert('Berhasil Dihapus');";
		echo "location='user.php'";
		echo "</script>";
	}else{
	
	}
break;

case 'mata_kuliah':
	$query = mysqli_query($koneksi,"DELETE FROM mata_kuliah WHERE id_mk='$id'");
	if($query){
		echo "<script>";
		echo "alert('Berhasil Dihapus');";
		echo "location='matakuliah.php'";
		echo "</script>";
	}else{
		
	}
break;

case 'tutor':
	$query = mysqli_query($koneksi,"DELETE FROM tutor WHERE id_tutor='$id'");
	if($query){
		echo "<script>";
		echo "alert('Berhasil Dihapus');";
		echo "location='tutor.php'";
		echo "</script>";
	}else{
		
	}
break;

case 'kelas':
	$query = mysqli_query($koneksi,"DELETE FROM kelas WHERE id_kelas='$id'");
	if($query){
		echo "<script>";
		echo "alert('Berhasil Dihapus');";
		echo "location='kelas.php'";
		echo "</script>";
	}else{
		
	}
break;

case 'lokasi_tutorial':
	$query = mysqli_query($koneksi,"DELETE FROM lokasi_tutorial WHERE id_lokasi='$id'");
	if($query){
		echo "<script>";
		echo "alert('Berhasil Dihapus');";
		echo "location='lokasi_tutorial.php'";
		echo "</script>";
	}else{
		
	}
break;

case 'semester':
	$query = mysqli_query($koneksi,"DELETE FROM semester WHERE semester='$id'");
	if($query){
		echo "<script>";
		echo "alert('Berhasil Dihapus');";
		echo "location='semester.php'";
		echo "</script>";
	}else{
		
	}
break;

case 'absensi':
	$query = mysqli_query($koneksi,"DELETE FROM absensi WHERE absensi='$id'");
	if($query){
		echo "<script>";
		echo "alert('Berhasil Dihapus');";
		echo "location='lihatdataabsensi.php'";
		echo "</script>";
	}else{
		
	}
break;

}
?>