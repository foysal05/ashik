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
                                    <h4 class="title">Movie Info</h4>
                                </div>
                                <div class="content">
                                    <form action="db/db_movie" method="post">


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Movie Name</label>
                                                    <input type="text" class="form-control" 
                                                    value="<?php if(isset($_GET['name'])){ echo $_GET['name'];}?>" placeholder="Movie Name" name="name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Stars Name</label>
                                                    <input type="text" value="<?php if(isset($_GET['stars'])){ echo $_GET['stars'];}?>" class="form-control" placeholder="Stars Name" name="stars" >
                                                </div>
                                            </div>
                                        </div>
                                           <input type="hidden" name="id" value="<?php if(isset($_GET['id'])){ echo $_GET['id'];}?>">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Genres</label>
     <?php //if (isset($_GET['genre'])=='Adventure') { echo "selected"; }?>
     <?php  //if(isset($_GET['genre'])=='Adventure'){ echo "selected"; }?>

<select class="form-control" required="" name="genre">
<option value="">Select Genre</option>
<option value="Biography" <?php  if(isset($_GET['genre'])=='Biography'){ echo "selected"; }?>>Biography</option>
<option value="Crime" <?php  if(isset($_GET['genre'])=='Crime'){ echo "selected"; }?>>Crime</option>
<option value="Family" <?php  if(isset($_GET['genre'])=='Family'){ echo "selected"; }?>>Family</option>
<option value="Horror" <?php  if(isset($_GET['genre'])=='Horror'){ echo "selected"; }?>>Horror</option>
<option value="Romance" <?php  if(isset($_GET['genre'])=='Romance'){ echo "selected"; }?>>Romance</option>
<option value="Sports" <?php  if(isset($_GET['genre'])=='Sports'){ echo "selected"; }?>>Sports</option>
<option value="War" <?php  if(isset($_GET['genre'])=='War'){ echo "selected"; }?>>War</option>
<option value="Adventure" <?php  if(isset($_GET['genre'])=='Adventure'){ echo "selected"; }?>>Adventure</option>
<option value="Comedy" <?php  if(isset($_GET['genre'])=='Comedy'){ echo "selected"; }?>>Comedy</option>
<option value="Documentary" <?php  if(isset($_GET['genre'])=='Documentary'){ echo "selected"; }?>>Documentary</option>
<option value="Fantasy" <?php  if(isset($_GET['genre'])=='Fantasy'){ echo "selected"; }?>>Fantasy</option>
<option value="Thriller" <?php  if(isset($_GET['genre'])=='Thriller'){ echo "selected"; }?>>Thriller</option>
</select>
                                                </div>
                                            </div>
                                            <?php if (isset($_GET['update'])) {

                                                $status=$_GET['status'];

                                                ?>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Status</label>
    <select class="form-control" required="" name="status">
        <option value="">Select</option>
        <option value="Continue"  <?php  if($status=='Continue'){echo "selected"; }?>>Continue</option>
        <option value="Stoped" <?php  if($status=='Stoped'){echo "selected"; }?>>Stoped</option>
    </select>
                                                    </div>
                                                </div> 

                                                <?php
                                            }

                                            ?>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Release Date</label>
                                                    <input type="date" value="<?php if(isset($_GET['release'])){ echo $_GET['release'];}?>" class="form-control" placeholder="Release Date" name="release" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Director</label>
                                                    <input type="text" value="<?php if(isset($_GET['director'])){ echo $_GET['director'];}?>" class="form-control" placeholder="Director" name="director" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Price</label>
                                                    <input type="text" value="<?php if(isset($_GET['price'])){ echo $_GET['price'];}?>" class="form-control" placeholder="Price" name="price" >
                                                </div>
                                            </div>
                                        </div>

                                       
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Movie Description</label>
                                                    <input type="text" class="form-control" placeholder="Movie Description" value="<?php if(isset($_GET['description'])){ echo $_GET['description'];}?>" name="description" >
                                                </div>
                                            </div>
                                        </div>




                                        <?php

                                        if (isset($_GET['update'])) {


                                           ?>



                                           <button type="submit" name="update" class="btn btn-info btn-fill pull-right">Update Movie</button>
                                           <?php
                                       }else{
                                        ?>
                                        <button type="submit" name="add" class="btn btn-info btn-fill pull-right">Add Movie</button>
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
                                <h4 class="title">Movie List</h4>
                                <!--  <p class="category">Here is a subtitle for this table</p> -->
                            </div>
                            <div class="content table-responsive table-full-width">

                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Movie Name</th>
                                        <th>Genre</th>
                                        <th>Release</th>
                                        <th>Stars</th>
                                        
                                        
                                        <th>Director</th>
                                        <th>Status</th>
                                        <th>Price</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </thead>
                                    <tbody>
                                       <?php

                                       $query="SELECT * FROM movie ORDER BY mid DESC";
                                       $result=mysqli_query($con,$query);
                //echo mysqli_error();
                                       if(mysqli_num_rows($result)>0){

                                          while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){


                                              echo"<tr>";
                                              echo "<td style='text-align: center'>".$row['movie_name']."</td>";
                                              echo "<td style='text-align: center'>".$row['genre']."</td>";
                                              echo "<td style='text-align: center'>".$row['release']."</td>";
                                              echo "<td style='text-align: center'>".$row['stars']."</td>";
                                              
                                              echo "<td style='text-align: center'>".$row['director']."</td>";
                                              echo "<td style='text-align: center'>".$row['status']."</td>";
                                              echo "<td style='text-align: center'>".$row['price']."</td>";
                                         // echo "<td style='text-align: center'><a style='color:black; text-decoration: none;' href='customer_details.php?&id=".$row['mid']."'><button class='btn btn-info'>".$row['status']."</button></a></td>"; 
                                              echo "<td style='text-align: center'><a style='color:black; text-decoration: none;' href='movie.php?update&id=".$row['mid']."&name=".$row['movie_name']."&genre=".$row['genre']."&release=".$row['release']."&stars=".$row['stars']."&director=".$row['director']."&status=".$row['status']."&price=".$row['price']."&description=".$row['description']."'><button class='btn btn-info'>Edit</button></a></td>"; 
                                              echo "<td style='text-align: center'><a style='color:black; text-decoration: none;' href='db/db_movie.php?delete&id=".$row['mid']."'><button class='btn btn-danger'>Delete</button></a></td>"; 

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