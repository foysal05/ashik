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

              <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Regular Customer List</h4>
                                    <!--  <p class="category">Here is a subtitle for this table</p> -->
                                </div>
                                <div class="content table-responsive table-full-width">

                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>Fullname</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Details</th>
                                        </thead>
                                        <tbody>
                                           <?php

                                           $query="SELECT * FROM customer where customer.cid NOT IN (SELECT cus_id from customer_movie)";
                                           $result=mysqli_query($con,$query);
                //echo mysqli_error();
                                           if(mysqli_num_rows($result)>0){

                                              while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){

                                                
                                              echo"<tr>";
                                               echo "<td style='text-align: center'>".$row['firstname']." ".$row['lastname']."</td>";
                                            echo "<td style='text-align: center'>".$row['email']."</td>";
                                            echo "<td style='text-align: center'>".$row['phone']."</td>";
                                            echo "<td style='text-align: center'>".$row['address']."</td>";
                         echo "<td style='text-align: center'><a style='color:white; text-decoration: none;' href='customer_details.php?view&id=".$row['cid']."'><button class='btn btn-info'>Details</button></a></td>"; 
                                                   
                                              echo"</tr>";
                                               
                                            }
                                        }

                                                ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>




                        </div>
                    </div>
                </div>

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
