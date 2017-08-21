<?php 
session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
include('../includes/dbcon.php');
date_default_timezone_set("Asia/Manila");
?>
