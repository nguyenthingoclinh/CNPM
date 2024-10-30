<?php
include "classND.php"; 
$user = new User(); 
$user->dangXuat();
header('Location: dangnhap.php');
?>