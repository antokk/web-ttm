<?php
session_start();
if(!session_is_registered("login"))
{
session_destroy();
header("Location:index.php");
}
?>