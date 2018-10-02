<?php

//sesson start...
session_start();
//fetch or get id from allStudent.php
$id = $_GET['id'];
// Connect to mysql database...
$con = mysqli_connect("Localhost","root","","student-info");
//SQL query...
$sql = "DELETE FROM users WHERE id = $id";

if(mysqli_query($con, $sql)){
    $_SESSION ['Deleted'] = 1;
    //when data issuccessfully deleted ... web page is redirected to allStudent.php
    header("Location: allStudent.php");
}
else {
    echo "Not Deleted";
}

?>