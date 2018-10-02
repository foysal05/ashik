<?php
//session is started..
session_start();
//fetch or get id from allStudent.php
$id=$_GET['id'];
// Connect to mysql database...
$con = mysqli_connect("Localhost","root","","student-info");
//mySql query.... for selecting a specific student...
$sqlReadData = "SELECT * FROM users WHERE id = $id";
//Exicution of mySql query .... 
$result = mysqli_query($con, $sqlReadData);

//Fetch data from DB
$rows = mysqli_fetch_assoc($result);


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

        <!-- Success message of data stored -->
        <?php if(isset($_SESSION['StudentAddedSuccess'])){ ?>
            <div class="alert-success">
                <strong>Success!</strong> student added successfully...!
            </div>
        <?php }?>

        <!-- Deleted Successfully message-->
        <?php if(isset($_SESSION['Deleted'])){ ?>
            <div class="alert-success">
                <strong>Success!</strong> Student Deleted successfully...!
            </div>
        <?php }?>

    <div class="Content">
        <h1>Student profile. </h1> 
    </div>

    <div class="Tables">
        <table class="table">
            <thead>
                <th>Id</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Password</th>
                <th>Photo</th>
                <th>Action</th>
            </thead>

            <tbody>
                <tr>
                    <td><?php echo $rows['id'];?></td>
                    <td><?php echo $rows['name'];?></td>
                    <td><?php echo $rows['email'];?></td>
                    <td><?php echo $rows['password'];?></td>
                    <td><img src="" alt="photo"></td>
                    <td>
                    <!--Edit button-->
                        <a href="edit.php?id=<?php echo $rows['id']; ?>" class="btn btn-primary"> Edit </a>
                    <!--Delete button-->
                        <a href="delete.php?id=<?php echo $rows['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete the item..??')"> Delete </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>






</body>
</html>

<!--Distroy sessions ....-->
<?php unset($_SESSION['StudentAddedSuccess']);?>
<?php unset($_SESSION['Deleted']);?>
