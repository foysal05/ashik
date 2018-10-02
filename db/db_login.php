<?php
include('db.php');

session_start();
if (isset($_POST['login'])) {

	$email = mysqli_real_escape_string($con, $_POST['email']);
	
	$password=mysqli_real_escape_string($con, $_POST['password']);
	//$password=md5($_POST['password']);



	$query="SELECT * FROM users where email='$email' and password='$password' and status='Active'";
	
	$result=mysqli_query($con,$query);
	$query1="SELECT * FROM customer where email='$email' and password='$password'";
// echo $query."<br>";
// 	echo $query1."<br>";
	$result1=mysqli_query($con,$query1);
	if ($row = mysqli_fetch_array($result)) {
		
		$_SESSION['user_id']=$row['u_id'];
		$_SESSION['email']=$email;		
		$_SESSION['fullname']=$row['fullname'];
		$_SESSION['status']=$row['status'];
		$_SESSION['level']=$row['level'];
		
		
		$_SESSION['admin_login']=TRUE;	
		//echo "Admin";

		header("Location:../admin");
		
	}else if ($row = mysqli_fetch_array($result1)) {
		
		$_SESSION['customer_id']=$row['cid'];
		$_SESSION['email']=$email;		
		$_SESSION['fullname']=$row['firstname']." ".$row['lastname'];
		
		
	//echo "customer";
		
		$_SESSION['customer_login']=TRUE;	
		header("Location:../index");
		
	}else{
		header("Location:../index.php?error");
		//echo "error";
	}






}
if (isset($_POST['registration'])) {

	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$password=$_POST['password'];

	$query="select * FROM customer where email='$email'";
	
	$result=mysqli_query($con,$query);
	$num=mysqli_num_rows($result);
	
	if($num==0){
//echo $password;
		$query="INSERT INTO customer values ('','$firstname','$lastname','$email','$phone','$address','$password')";
		$result=mysqli_query($con,$query);
		//echo $query;
		header('location:../index.php?success');

	}else{
		header('location:../index.php?exist');
	}
}

