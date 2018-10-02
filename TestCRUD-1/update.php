<?php 
//fetch or get id from edit.php
$id = $_GET['id'];

//set variables to values.... from the edit form... 
echo $name = $_POST["name"];
echo $email = $_POST["email"];
echo $password = $_POST["password"];
// Connect to mysql database...
$con = mysqli_connect("localhost","root","","student-info");
//SQL query
$sql = "UPDATE users SET name='$name' , email='$email' , password='$password' WHERE id = $id ";



if(mysqli_query($con, $sql)){
//echo "Insert Successfull";

//when data is successfully updated ... web page is redirected to showmyProfile.php
header("Location: showmyProfile.php?id=" . $id);
}
else{
echo "Not inserted";
}

?>