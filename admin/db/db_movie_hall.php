<?php
include('db.php');
if (isset($_POST['add'])) {

	$movie=$_POST['movie'];
	$hall=$_POST['hall'];
	$date=$_POST['date'];
	
	
	
	$query="INSERT INTO movie_hall values('','$movie','$hall','$date')";
//echo $query;
	$result=mysqli_query($con,$query);
	if ($result=TRUE) {
		header('location:../movie_hall.php?success=1');
		//echo "Success";

	}else{
		header('location:../movie_hall.php?error=0');
		//echo "Error";
	}
}
if (isset($_POST['update'])) {
	$id=$_POST['id'];
	$movie=$_POST['movie'];
	$hall=$_POST['hall'];
	$date=$_POST['date'];

	$query="UPDATE movie_hall set `movie_id`='$movie', hall_id='$hall',`date`='$date' where ma_id='$id'";
	//echo $query;
	$result=mysqli_query($con,$query);
	if ($result=TRUE) {
		header('location:../movie_hall.php?updated=1');
		//echo "Success";
	}else{
		header('location:../movie_hall.php?error=0');
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