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

<?php
if (isset($_GET['success'])) {
 echo "<script>alert('Movie Assigned Successfully');</script>";
}else if (isset($_GET['updated'])) {
 echo "<script>alert('Movie Assigned Updated');</script>";
}


?>


      <?php include('inc/side_bar.php');?>

      <div class="main-panel">
        <?php include('inc/top_bar.php');?>



        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-8">
                <div class="card">
                  <div class="header">
                    <h4 class="title">Assigning Movie in Hall</h4>
                  </div>
                  <div class="content">
                    <form action="db/db_movie_hall" method="post">


                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Movie Name</label>
                            <select name="movie" class="form-control">
                             <option>Select Movie</option>
                             <?php

                             $query="SELECT * FROM movie ORDER BY mid DESC";
                             $result=mysqli_query($con,$query);
                //echo mysqli_error();
                             if(mysqli_num_rows($result)>0){

                              while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                ?>

                                <?php echo "<option value='" . $row['mid'] . "'"?>
                                <?php //if($_GET['movie']==$row['mid']) echo "selected"; 
                                if (isset($_GET['movie'])==$row['mid']) echo "selected"; 
                                  
                                


                                ?> 
                                <?php echo ">" . $row['movie_name'] . "</option>"; ?>


                                <?php
                              }
                            }
//if($_GET['movie']==$row['mid']){echo "selected"; }
                            ?>

                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Hall No</label>
                          <select name="hall" class="form-control">
                           <option>Select Hall</option>
                           <?php

                           $query="SELECT * FROM hall";
                           $result=mysqli_query($con,$query);
                //echo mysqli_error();
                           if(mysqli_num_rows($result)>0){

                            while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                             // echo "<option value='".$row['h_id']."'>".$row['hall_name']."</option>";
                               ?>
                                
                                <?php echo "<option value='" . $row['h_id'] . "'"?>
                                <?php if (isset($_GET['hall'])==$row['h_id']) echo "selected"; 

                                 ?> 
                                <?php echo ">" . $row['hall_name'] . "</option>"; ?>


                                <?php

                            }
                          }

                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
<input type="hidden" name="id" value="<?php if(isset($_GET['id'])){ echo $_GET['id'];}?>">
                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Date</label>
                        <input type="text" readonly="" value="<?php if(isset($_GET['date'])){ echo $_GET['date'];}?>" class="form-control" id="datepicker"  name="date" >
                      </div>
                    </div>
                    
                  </div>

                  <?php

if (isset($_GET['update'])) {
  ?>
<button type="submit" name="update" class="btn btn-info btn-fill pull-right">Update</button>
  <?php
 
}else{
  ?>
  <button type="submit" name="add" class="btn btn-info btn-fill pull-right">Done</button>
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
                <h4 class="title">Assigning Movie in Hall</h4>
                <!--  <p class="category">Here is a subtitle for this table</p> -->
              </div>
              <div class="content table-responsive table-full-width">

                <table class="table table-hover table-striped">
                  <thead>
                    <th style='text-align: center'>Movie Name</th>
                    <th style='text-align: center'>Hall No</th>
                    <th style='text-align: center'>Date</th>
                    <th style='text-align: center'>Edit</th>

                  </thead>
                  <tbody>
                   <?php

                   $query="SELECT * FROM movie_hall,movie,hall WHERE movie_hall.movie_id=movie.mid and movie_hall.hall_id=hall.h_id ORDER BY ma_id DESC";
                   $result=mysqli_query($con,$query);
                //echo mysqli_error();
                   if(mysqli_num_rows($result)>0){

                    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){


                      echo"<tr>";
                      echo "<td style='text-align: center'>".$row['movie_name']."</td>";
                      echo "<td style='text-align: center'>".$row['hall_name']."</td>";
                      echo "<td style='text-align: center'>".$row['date']."</td>";
                      

                      echo "<td style='text-align: center'><a style='color:black; text-decoration: none;' href='movie_hall.php?update&id=".$row['ma_id']."&movie=".$row['mid']."&hall=".$row['h_id']."&date=".$row['date']."'><button class='btn btn-info'>Edit</button></a></td>"; 
                      //echo "<td style='text-align: center'><a style='color:black; text-decoration: none;' href='db/db_movie.php?delete&id=".$row['mid']."'><button class='btn btn-danger'>Delete</button></a></td>"; 

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

  <?php include('inc/footer.php');?>


</div>
</div>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({
     minDate: 'today',
   });

  } );
</script>
</body>

<!--   Core JS Files   -->
<!-- <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script> -->
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
