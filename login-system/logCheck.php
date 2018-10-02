<?php
session_start();

if(isset($_POST['login'])){
    //connect to database......
    $con = new mysqli('localhost','root','','login_system');
    //Get email and password from login form......
    $email =  $con->real_escape_string($_POST['email']);
    $password =  $con->real_escape_string($_POST['password']);
    //mysql query.......
    $sql = $con->query("SELECT * FROM users where email='$email'");

    if($sql->num_rows > 0) {
        //Store data all data in a array...........
        $data = $sql->fetch_array();

        if(password_verify($password, $data['password'])){
            //user login session is created.....
            $_SESSION['login'] = true;
            //session for fetching user data by email......
            $_SESSION['myemail'] = $email; 
            //session for login success message....
            $_SESSION['loginSuccess'] = "Successfull log-in.";
            //After successfull login user is redirected to userProfile.php.....
            header("Location: userProfile.php");
        }
        else{
            //session for displaying wrong password....
            $_SESSION['WrongPass'] = "Wrong password!";
            header("Location: login.php");
        }
    }
    else{
        //session for displaying no account message...
        $_SESSION['NoAccount'] = "No Account available!";
        header("Location: login.php");
    }
}

?>