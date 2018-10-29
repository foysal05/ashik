<?php
include('db.php');
if (isset($_POST['add'])) {

	$name=$_POST['name'];
	$stars=$_POST['stars'];
	$genre=$_POST['genre'];
	$release=$_POST['release'];
	$director=$_POST['director'];
	
	$price=$_POST['price'];
	//$description=$_POST['description'];
	$description = mysqli_real_escape_string($con, $_POST['description']);
	$query="INSERT INTO movie values('','$name','$genre','$release','$director','$stars','$description','Continue','$price')";
//echo $query;
	$result=mysqli_query($con,$query);
	if ($result=TRUE) {
		header('location:../movie.php?success=1');
		//echo "Success";
	}else{
		header('location:../movie.php?error=0');
		//echo "Error";
	}
}
if (isset($_POST['update'])) {
	$id=$_POST['id'];
	$name=$_POST['name'];
	$stars=$_POST['stars'];
	$genre=$_POST['genre'];
	$release=$_POST['release'];
	$director=$_POST['director'];
	
	$description=$_POST['description'];
	$status=$_POST['status'];
	$price=$_POST['price'];

	$query="UPDATE movie set `movie_name`='$name', stars='$stars',genre='$genre',`release`='$release',director='$director',description='$description',`status`='$status',price='$price' where mid='$id'";
	//echo $query;
	$result=mysqli_query($con,$query);
	if ($result=TRUE) {
		header('location:../movie.php?updated=1');
		//echo "Success";
	}else{
		header('location:../movie.php?error=0');
		//echo "Error";
	}
}
if (isset($_GET['delete'])) {
	$id=$_GET['id'];

	$result=mysqli_query($con,"DELETE from movie where mid='$id'");
	if ($result=TRUE) {
		header('location:../movie.php?deleted=1');
		//echo "Success";
	}else{
		header('location:../movie.php?error=0');
		//echo "Error";
	}
}

?>