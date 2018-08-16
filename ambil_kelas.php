<?php
	require_once("koneksi.php");
	$lokasi_tutorial = $_GET['lokasi_tutorial'];
	$kelas = mysqli_query($koneksi,"SELECT id_kelas,nama_kelas FROM kelas WHERE id_lokasi = '$lokasi_tutorial' order by nama_kelas");
	echo "<option>-- Pilih Kelas --</option>";
	while($l = mysqli_fetch_array($kelas)){
	echo "<option value=\"".$l['id_kelas']."\">".$l['nama_kelas']."</option>\n";
	}
?>