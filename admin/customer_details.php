
<?php 
session_start();
if (isset($_SESSION['admin_login'])==TRUE) {
 
?>
<!doctype html>
<html lang="en">
<?php 
include('inc/head.php');
include('../db/db.php');

?>
<body>

    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

            <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->




            <?php include('inc/side_bar.php');?>

            <div class="main-panel">
              <?php include('inc/top_bar.php');?>


              <?php

              $query="SELECT * FROM customer where customer.cid='".$_GET['id']."'";
              $result=mysqli_query($con,$query);
                //echo mysqli_error();
              if(mysqli_num_rows($result)>0){

                  while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){

                    ?>
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="header">
                                            <h4 class="title">Edit Profile</h4>
                                        </div>
                                        <div class="content">
                                            <form>
                                               

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>First Name</label>
                                                            <input type="text" class="form-control" placeholder="Company" name="firstname" value="<?php echo $row['firstname'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Last Name</label>
                                                            <input type="text" class="form-control" placeholder="Last Name" name="lastname" value="<?php echo $row['lastname'];?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="row">
                                                  
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Email address</label>
                                                            <input type="email" name="email" value="<?php echo $row['email'];?>" class="form-control" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Phone</label>
                                                            <input type="text" name="phone" value="<?php echo $row['phone'];?>" class="form-control" placeholder="Phone">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <input type="text" class="form-control" placeholder="Home Address" name="address" value="<?php echo $row['address'];?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                
                                               

                                                <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                                <div class="clearfix"></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card card-user">
                                        <div class="image">
                                            <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                                        </div>
                                        <div class="content">
                                            <div class="author">
                                               <a href="#">
                                                <img class="avatar border-gray" src="assets/img/faces/face-3.jpg" alt="..."/>

                                                <h4 class="title"><?php echo $row['firstname']." ".$row['lastname'];?><br />
                                                   <small><?php echo $row['email'];?></small>
                                               </h4>
                                           </a>
                                       </div>
                                       <!-- <p class="description text-center"> "Lamborghini Mercy <br>
                                        Your chick she so thirsty <br>
                                        I'm in that two seat Lambo"
                                    </p> -->
                                </div>
                                <hr>
                                <div class="text-center">
                                    <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                                    <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                                    <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

<?php
}
}
?>
             <?php include('inc/footer.php');?>


    </div>
</div>


</body>

<!--   Core JS Files   -->
<script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>

</html>
<?php
}else{
    header('location:../index');
}

?>
