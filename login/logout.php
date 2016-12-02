<?php
include 'library.php';
session_destroy();
unset($_SESSION['sessionVar']);
header("location:index.php");
?>