<?php
include('include/dbcon.php');
include('session.php');

session_unset($_SESSION['id']);
session_destroy();
header('location:index.php');

?>
