<?php
include('db.php');
if (isset($_POST['add'])) {
	$name=$_POST['name'];
	$seat=$_POST['seat'];
	$description=$_POST['description'];

	$result=mysqli_query($con,"INSERT INTO hall values('','$name','$seat','$description')");
	if ($result=TRUE) {
		header('location:../hall.php?success=1');
		//echo "Success";
	}else{
		header('location:../hall.php?error=0');
		//echo "Error";
	}
}
if (isset($_POST['update'])) {
	$id=$_POST['id'];
	$name=$_POST['name'];
	$seat=$_POST['seat'];
	$description=$_POST['description'];
}


?>