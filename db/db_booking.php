<?php
include('db.php');
if (isset($_POST['book'])) {
	$id=$_POST['id'];
	$date=$_POST['date'];
	$price=$_POST['price'];
	$movie=$_POST['movie'];
$query="INSERT INTO booking values('','$date','$movie','$price','$id')";
//echo $query;
	$result=mysqli_query($con,$query);
	header('location:../index?bookingsuccess');

}


?>