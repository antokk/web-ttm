<?php
echo "<script>";
echo "alert('apa ingin keluar?')";
echo "</script";
session_start();
unset($_SESSION['login']);
session_destroy();
header("Location:login.php");

?>