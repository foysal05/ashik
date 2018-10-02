<?php
session_start();
  
    if(!isset($_SESSION['login'])){
        header("Location: login.php");
        die();
    }
    else{

        $email = $_SESSION['myemail'];
        $con = new mysqli('localhost','root','','login_system');
        $sql = "SELECT * FROM users where email = '$email'";
        $fetchinfo = mysqli_query($con, $sql);

        $info = mysqli_fetch_assoc($fetchinfo);
    }

?>
<!--Commented codes are for testing purpose...-->
<?php
    //echo "<pre>";
    //var_dump($info);
    //echo "</pre>";
    //echo $email;
?>
<!--
    <?php 
    //if(isset($_SESSION['myemail'])){ ?>
        <div class="alert alert-warning">
            <?php //echo $_SESSION['myemail']; ?>
        </div>
    <?php //}?>
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Profile</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="Profile">

    <div class="Profile_Pic_Box">
        <img class="Profile_Pic" src="<?php echo "image/" . $info['image']?>" alt="Profile Image"><br>
    </div>
    <br>
    <form action="storeUserInfo.php" method="post" enctype="multipart/form-data">
        <input type="file" name = "image"><br><br>
        <input type="submit" name = "upload" value="upload"><br>
    </form>

    <p>User Info: </p>
    <p>Name: <?php echo $info['name']?> </p>
    <p>email: <?php echo $info['email']?> </p>


</div>



<a href="logout.php">Logout</a>

</body>
</html>