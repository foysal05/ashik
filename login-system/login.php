<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>

    <div class="container" style="margin-top: 100px;">
        <div class="row justify-content-center">
            <div class="col-wd-6 col-wd-offset" align="center">

                <h1> Login here.... </h1><br>

                <!--error message-->
                <?php if(isset($_SESSION['WrongPass'])){ ?>
                    <div class="alert alert-warning">
                        <strong>Error!</strong> 
                        <?php echo $_SESSION['WrongPass']; ?>
                    </div>
                <?php }?>

                <!--error message-->
                <?php if(isset($_SESSION['NoAccount'])){ ?>
                    <div class="alert alert-warning">
                        <strong>Error!</strong> 
                        <?php echo $_SESSION['NoAccount']; ?>
                    </div>
                <?php }?>

                <form action="logCheck.php" method="post">
                    <input class="form-control" type="email" name="email" placeholder="Email..." required><br>
                    <input class="form-control" type="password" name="password" placeholder="Password..." minlength = "8" required><br>
                    <input class="btn btn-primary" type="submit" name="login" value="Login">
                    <a href="register.php">Register</a>
                </form>

            </div>
        </div>
    </div>
    
</body>
</html>

<?php 
  //stop all the sessions...
    unset($_SESSION['WrongPass']); 
    unset($_SESSION['NoAccount']);
?>

