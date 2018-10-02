<?php

// insert image ... user profile pic... 


session_start();
  // Create database connection
  $email = $_SESSION['myemail'];
  $db = mysqli_connect("localhost", "root", "", "login_system");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($db, $_POST['image_text']);

  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "UPDATE users SET image='$image' where email='$email'";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
          $msg = "Profile pic updated successfully...";
  	}else{
          $msg = "Failed to upload image";
          header("Location: storeUserInfo.php");          
      }
      header("Location: userProfile.php");
  }



?>