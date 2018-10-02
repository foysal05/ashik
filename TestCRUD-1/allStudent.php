<?php
//session start
session_start();

// connecting to database
$con = mysqli_connect("Localhost","root","","student-info");
//mysql query...
$sqlReadData = "SELECT * FROM users";

//exicuting query...
$result = mysqli_query($con, $sqlReadData);
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
                    <li><a class="Active" href="allStudent.php">View All Student</a></li>
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

        <!-- Deleted Successfully -->
        <?php if(isset($_SESSION['Deleted'])){ ?>
            <div class="alert-success">
                <strong>Success!</strong> Student Deleted successfully...!
            </div>
        <?php }?>

    <div class="Content">
        <h1>All students are shown. </h1> 
    </div>

    <div class="Tables">
        <table class="table">
            <thead>
                <th>Id</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Photo</th>
                <th>Action</th>
            </thead>

            <tbody>

            <?php // Using while loop to repeate all the data's from table
                while($row = mysqli_fetch_assoc($result)){ 
            ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><img src="" alt="photo"></td>
                    <td>
                        <a href="showmyProfile.php?id=<?php echo $row['id']; ?>" class="btn btn-info"> View </a>
                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary"> Edit </a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete the item..??')"> Delete </a>
                    </td>
                </tr>
                <!--end of while loop-->
                <?php }?>
                
            </tbody>
        </table>
    </div>






</body>
</html>


<?php unset($_SESSION['StudentAddedSuccess']);?>
<?php unset($_SESSION['Deleted']);?>
