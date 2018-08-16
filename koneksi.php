<?php 
// isi nama host, username mysql, dan password mysql anda
// $host = mysqli_connect("localhost","root","");
 
// isikan dengan nama database yang akan di hubungkan
// $db = mysqli_select_db("ttm");

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "ttm";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die (mysqli_error());


?>