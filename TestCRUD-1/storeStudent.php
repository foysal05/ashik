<?php
//sesson start...
session_start();
//set variables to values.... from the edit form... 
echo $name = $_POST["name"];
echo $email = $_POST["email"];
echo $password = $_POST["password"];
echo $confirmpassword = $_POST["confirm-password"];
//echo $image = $_POST["image"];

//connection to DB....
$con = mysqli_connect("localhost","root","","student-info");
//mysql query...
$sql = "INSERT INTO users VALUES (NULL,'$name','$email','$password')";
   

// condition for matching password....
if($password == $confirmpassword){
    //exicution of query...
     if(mysqli_query($con,$sql)){
         //session for successfully adding student.... 
        $_SESSION['StudentAddedSuccess']=1;
        //when data issuccessfully stored ... web page is redirected to allStudent.php
        header("Location: allStudent.php");
    }
    else{
         //session for error adding data.... 
        $_SESSION['errorStoringData'] = 1;
        //when data is not stored / Error ... web page is redirected to addNewStudent.php
        header("Location: addNewStudent.php");
    }
}
else{
    //session for password not matching...
    $_SESSION ['wrongPasswordError'] = 1;
    //when passwords doesnot match... web page is redirected to addNewStudent.php
    header("Location: addNewStudent.php");
}

?>