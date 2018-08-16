<?php
	require_once("koneksi.php");
	$semester = $_GET['semester'];
	$mata_kuliah = mysqli_query($koneksi,"SELECT id_mk,kode_mk,nama_mk FROM mata_kuliah WHERE semester = '$semester' order by nama_mk");
	echo "<option>-- Pilih Mata Kuliah --</option>";
	while($m = mysqli_fetch_array($mata_kuliah)){
	echo "<option value=\"".$m['id_mk']."\">".$m['nama_mk']."</option>\n";
	}
?>