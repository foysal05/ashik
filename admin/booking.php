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
                                    <h4 class="title">Booking History</h4>
                                    <!--  <p class="category">Here is a subtitle for this table</p> -->
                                </div>
                                <div class="content table-responsive table-full-width">

                                    <table class="table table-hover table-striped">
                                        <thead>
                                        <th style="color: #FF8D1B; text-align: center;">Movie Name</th>
                                        <th style="color: #FF8D1B; text-align: center;">Date</th>
                                        <th style="color: #FF8D1B; text-align: center;">Price</th>
                                        <th style="color: #FF8D1B; text-align: center;">Customer Name</th>
                                        </thead>
                                        <tbody>
                                           <?php

                                           $query="SELECT * FROM booking,customer,movie WHERE booking.cid=customer.cid and booking.movie=movie.mid";
                                           $result=mysqli_query($con,$query);
                //echo mysqli_error();
                                           if(mysqli_num_rows($result)>0){

                                              while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){

                                                
                                              echo"<tr>";
                                               echo "<td style='text-align: center'>".$row['movie_name']." ".$row['lastname']."</td>";
                                            echo "<td style='text-align: center'>".$row['date']."</td>";
                                            echo "<td style='text-align: center'>".$row['price']."</td>";
                                            echo "<td style='text-align: center'>".$row['firstname']." ".$row['lastname']."</td>";
                     
                                                   
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
