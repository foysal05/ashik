<?php

    session_start();

    if(isset($_POST['submit'])){
        $con = new mysqli('localhost','root','','login_system');

        $name = $con->real_escape_string($_POST['name']);
        $email =  $con->real_escape_string($_POST['email']);
        $password =  $con->real_escape_string($_POST['password']);
        $cpassword =  $con->real_escape_string($_POST['cpassword']);


        // check if user with the same email exists....
        $sqlcheck = "SELECT * FROM users WHERE email='$email'";
        $resultcheck = mysqli_query($con, $sqlcheck);
        $rowcount = mysqli_num_rows($resultcheck);

        if($rowcount == 1){
            $_SESSION['reg_error']="Use a different email. Account with this email exists";
            header("Location: register.php");
        }
        else{

            if($password != $cpassword){
                $_SESSION[ 'Reg_Error_Pass' ] = "The passwords does not match.";
                header("Location: register.php");
            }

            else{
                $hash = password_hash($password, PASSWORD_BCRYPT);
                $con->query("INSERT INTO users (name,email,password) VALUES ('$name', '$email', '$hash')");
                $_SESSION[ 'Success_Reg' ] = "Account Successfully created. Please Login.";
                header("Location: Login.php");
            }
        }
    }


?>

