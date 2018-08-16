<?php
	require_once("koneksi.php");
	$kabko = $_GET['kabko'];
	$lokasi_tutorial = mysqli_query($koneksi,"SELECT id_lokasi,nama_lokasi FROM lokasi_tutorial WHERE kode_kabko = '$kabko' order by nama_lokasi");
	echo "<option>-- Pilih Lokasi Tutorial --</option>";
	while($l = mysqli_fetch_array($lokasi_tutorial)){
	echo "<option value=\"".$l['id_lokasi']."\">".$l['nama_lokasi']."</option>\n";
	}
?>