<?php 
include('include/dbcon.php');
$get_id=$_GET['book_id'];
mysqli_query($con,"delete from book where book_id = '$get_id' ")or die(mysqli_error($con));
header('location:book.php');	
?>