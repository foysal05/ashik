
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
                        <div class="col-md-8">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Hall Information</h4>
                                </div>
                                <div class="content">
                                    <form action="db/db_hall.php" method="post">


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Hall Name</label>
                                                    <input type="text" class="form-control" 
                                                    value="<?php if(isset($_GET['name'])){ echo $_GET['name']; } ?>" placeholder="Hall Name" name="name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Seat</label>
                                                    <input type="text" class="form-control" onkeypress="return isNumberKey(event)" value="<?php if(isset($_GET['seat'])){ echo $_GET['seat']; } ?>"  placeholder="Total Seat" name="seat" >
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <input type="text" value="<?php if(isset($_GET['description'])){ echo $_GET['description']; } ?>"  class="form-control" placeholder="Description" name="description" >
                                                </div>
                                            </div>
                                        </div>

                                        <?php

                                        if (isset($_GET['update'])) {


                                         ?>



                                         <button type="submit" name="update" class="btn btn-info btn-fill pull-right">Update Hall</button>
                                         <?php
                                     }else{
                                        ?>
                                         <button type="submit" name="add" class="btn btn-info btn-fill pull-right">Add Hall</button>
                                        <?php
                                     }
                                     ?>
                                     <div class="clearfix"></div>
                                 </form>
                             </div>
                         </div>
                     </div>


                 </div>
             </div>
                  <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Hall List</h4>
                                <!--  <p class="category">Here is a subtitle for this table</p> -->
                            </div>
                            <div class="content table-responsive table-full-width">

                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th style='text-align: center'>Hall Name</th>
                                        <th style='text-align: center'>Seat</th>
                                        <th style='text-align: center'>Description</th>
                                        <
                                        <th style='text-align: center'>Edit</th>
                                        <th style='text-align: center'>Delete</th>
                                    </thead>
                                    <tbody>
                                       <?php

                                       $query="SELECT * FROM hall";
                                       $result=mysqli_query($con,$query);
                //echo mysqli_error();
                                       if(mysqli_num_rows($result)>0){

                                          while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){


                                              echo"<tr>";
                                              echo "<td style='text-align: center'>".$row['hall_name']."</td>";
                                              echo "<td style='text-align: center'>".$row['seat']."</td>";
                                              echo "<td style='text-align: center'>".$row['description']."</td>";
                                             
                                              echo "<td style='text-align: center'><a style='color:black; text-decoration: none;' href='hall.php?update&id=".$row['h_id']."&name=".$row['hall_name']."&seat=".$row['seat']."&description=".$row['description']."'><button class='btn btn-info'>Edit</button></a></td>"; 
                                              echo "<td style='text-align: center'><a style='color:black; text-decoration: none;' href='db/db_hall.php?delete&id=".$row['h_id']."'><button class='btn btn-danger'>Delete</button></a></td>"; 

                                              echo"</tr>";

                                          }
                                      }else{
                                        echo"<tr>";
                                        echo "<td>Not Found</td>";
                                        echo"</tr>";
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

         <footer class="footer">
            <div class="container-fluid">
                
               <p class="copyright pull-right">
                &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
            </p>
        </div>
    </footer>

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
