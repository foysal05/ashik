
<?php 
//session starts..
session_start();

// Connect to mysql database...
$conn = mysqli_connect('localhost','root','','student-info');

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
                    <li><a class="Active" href="addNewStudent.php">Add New Student</a></li>
                    <li><a href="allStudent.php">View All Student</a></li>
                </ul>
            </nav>
        </header>
    </div>

    <div class="Content">
        <h1> Add new Student: </h1><br>

        <!-- Error for wrong password -->
        <?php if(isset($_SESSION['wrongPasswordError'])){ ?>
        <div class="alert">
            <strong>ERROR!</strong> Check your password....!
        </div>
        <?php }?>

        <!-- Error storing data .... due to some unwanted problem... -->
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


        <form action="storeStudent.php" method="post" enctype="multipart/form-data" class="FrmAddAccount">
            <input type="text" name="name" placeholder="Name"><br><br>
            <input type="email" name="email" placeholder="Email"><br><br>
            <input type="password" name="password" placeholder="Password"><br><br>
            <input type="password" name="confirm-password" placeholder="Confirm password"><br><br>
            <!--<input type="file" name="image" id="image"><br><br>-->

            <input type="submit" value="Submit" name="submit" id="insert">
        </form>

    </div>






</body>
</html>
<!---
<script>
$(document).ready(function(){
    $('#insert').click(function(){
        var image_name = $('#image').val();
        if(image_name = ''){
            alert("Plese select a image.");
            return false;
        }
        else{
            var extension = $('#image').val().split('.').pop().toLowerCase();
            if(jQuery.inArray(extension,['gif','png','jpg','jpeg']) == 1){
                alert('Invalid image formate');
                $('#image').val('');
                return false;
            }
        }
    });
});
</script>
-->



<?php unset($_SESSION['wrongPasswordError']);?>
<?php unset($_SESSION['errorStoringData']);?>
<?php unset($_SESSION['StudentAddedSuccess']);?>
