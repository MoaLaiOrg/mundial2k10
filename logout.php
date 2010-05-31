<?
include 'utiles.php';
mysql_close();
session_destroy();
header("location:login.php");	
?>

