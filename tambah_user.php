<?php
include "koneksi.php";
if(isset($_POST['btn'])){
	 $id = $_POST['id'];
     $us = $_POST['us'];
	 $ps = $_POST['ps'];
     $nm = $_POST['nm'];
	 $np = $_POST['np'];
	 $lv = $_POST['lv'];
     $stmt = mysqli_query($koneksi,"INSERT INTO user(id_user, username, password, nama_lengkap, nip, level) VALUES ('$id', '$us', '$ps', '$nm', '$np', '$lv')") or die (mysqli_error($koneksi));

    if($stmt){
		echo "<script>";
		echo "alert('Data Berhasil Disimpan');";
		echo "</script>";
		
	}else{
		echo "<script>";
		echo "alert('Data GAGAL Disimpan');";
		echo "</script>";
	}
 
}
?>
<form method="post">
<p><input type="int" placeholder="ID User" name="id"/></p>
<p><input type="text" placeholder="User Name" name="us"/></p>
<p><input type="text" placeholder="Password" name="ps"/></p>
<p><input type="varchar" placeholder="Nama lengkap" name="nm"/></p>
<p><input type="int" placeholder="NIP" name="np"/></p>
<p><input type="text" placeholder="Level" name="lv"/></p>
<input type="submit" value="Save" name="btn"/>
</form>

