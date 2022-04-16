<?php

session_start();
$_SESSION['accno']="";
$_SESSION['card']="";
session_destroy();
header("location:index.php");
?>
