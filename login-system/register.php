<?php

    session_start();
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>

    <div class="container" style="margin-top: 100px;">
        <div class="row justify-content-center">
            <div class="col-wd-6 col-wd-offset" align="center">

                <h1> Register here.... </h1><br>

                <!--error message-->
                <?php if(isset($_SESSION['Reg_Error_Pass'])){ ?>
                <div class="alert alert-warning">
                <strong>Error!</strong> <?php echo $_SESSION['Reg_Error_Pass']; ?>
                </div>
                <?php }?>

                <!--error message-->
                <?php if(isset($_SESSION['reg_error'])){ ?>
                <div class="alert alert-warning">
                <strong>Error!</strong> <?php echo $_SESSION['reg_error']; ?>
                </div>
                <?php }?>

                <form action="storeuser.php" method="post">
                    <input class="form-control" type="text" name="name" placeholder="Name..." minlength = "6" required><br>
                    <input class="form-control" type="email" name="email" placeholder="Email..." required><br>
                    <input class="form-control" type="password" name="password" placeholder="Password..." minlength = "8" required><br>
                    <input class="form-control" type="password" name="cpassword" placeholder="Confirm-Password..." minlength = "8" required><br>
                    <input class="btn btn-primary" type="submit" name="submit" value="submit">
                    <a href="login.php">Login</a>
                </form>

            </div>
        </div>
    </div>
    <!--Bootstrap-->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>


<?php
//Stop all sessions..
 unset($_SESSION['Reg_Error_Pass']); unset($_SESSION['reg_error']);
 ?>