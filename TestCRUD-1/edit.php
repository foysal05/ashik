<?php 

//session is started..
session_start();
//fetch or get id from allStudent.php
$id = $_GET['id'];
// Connect to mysql database...
$conn = mysqli_connect('localhost','root','','student-info');
//mySql query....
$sqlReadData = "SELECT * FROM users WHERE id = $id";
//Exicution of mySql query .... 
$result = mysqli_query($conn, $sqlReadData);

//Fetch data from DB
$row = mysqli_fetch_assoc($result);

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Crude</title>


    <link rel="stylesheet" href="asset/css/style.css">
</head>

<body>

    <div class="Wrapper">
        <header class="Header">
            <nav class="Nav">
                <ul class="Ul">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="addNewStudent.php">Add New Student</a></li>
                    <li><a href="allStudent.php">View All Student</a></li>
                </ul>
            </nav>
        </header>
    </div>

    <div class="Content">
        <h1> Edit Student: </h1><br>

        <!-- Error for wrong password -->
        <?php if(isset($_SESSION['wrongPasswordError'])){ ?>
        <div class="alert">
            <strong>ERROR!</strong> Check your password....!
        </div>


        <?php }?>
        <!-- Error storing data .... due to some unwanted / unknown problem... -->
        <?php if(isset($_SESSION['errorStoringData'])){ ?>
        <div class="alert">
            <strong>ERROR!</strong> Some unwanted error appeared..!
        </div>


        <?php }?>
        <!-- Success message of data stored -->
        <?php if(isset($_SESSION['StudentAddedSuccess'])){ ?>
        <div class="alert-success">
            <strong>Success!</strong> student added successfully...!
        </div>
        <?php }?>


        <form action="update.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data" class="FrmAddAccount">
            <input type="text" name="name" placeholder="Name" value="<?php echo $row['name'];?>"><br><br>
            <input type="email" name="email" placeholder="Email" value="<?php echo $row['email'];?>" ><br><br>
            <input type="password" name="password" placeholder="Password" value="<?php echo $row['password'];?>"><br><br>
            <input type="password" name="confirm-password" placeholder="Confirm password" value="<?php echo $row['password'];?>"><br><br>

            <!-- Image insert ta kag kore na.. -->
            <!--<input type="file" name="image" id="image"><br><br>-->

            <input type="submit" value="Submit" name="submit" id="insert">
        </form>

    </div>






</body>

</html>


<!--Distroy sessions ....-->
<?php unset($_SESSION['wrongPasswordError']);?>
<?php unset($_SESSION['errorStoringData']);?>
<?php unset($_SESSION['StudentAddedSuccess']);?>
