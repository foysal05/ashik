<?php 
session_start();
if ($_SESSION['customer_login']==TRUE) {

	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>One Movies an Entertainment | Home</title>
		<!-- for-mobile-apps -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="One Movies Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
		Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
	function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //for-mobile-apps -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="css/contactstyle.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/faqstyle.css" type="text/css" media="all" />
	<link href="css/single.css" rel='stylesheet' type='text/css' />
	<link href="css/medile.css" rel='stylesheet' type='text/css' />
	<!-- banner-slider -->
	<link href="css/jquery.slidey.min.css" rel="stylesheet">
	<!-- //banner-slider -->
	<!-- pop-up -->
	<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //pop-up -->
	<!-- font-awesome icons -->
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<!-- //font-awesome icons -->
	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<!-- //js -->
	<!-- banner-bottom-plugin -->
	<link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="all">
	<script src="js/owl.carousel.js"></script>
	<script>
		$(document).ready(function() { 
			$("#owl-demo").owlCarousel({

		  autoPlay: 3000, //Set AutoPlay to 3 seconds

		  items : 5,
		  itemsDesktop : [640,4],
		  itemsDesktopSmall : [414,3]

		});

		}); 
	</script> 
	<!-- //banner-bottom-plugin -->
	<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>
	<!-- start-smoth-scrolling -->
</head>

<body>
	<?php

	if (isset($_GET['success'])) {
		echo "<script>alert('Customer account created successfully');</script>";
	}else if (isset($_GET['exist'])) {
		echo "<script>alert('This email address already exist, Please use another email address');</script>";
	}else if (isset($_GET['error'])) {
		echo "<script>alert('You Entered Wrong Email or Password');</script>";
	}else if (isset($_GET['bookingsuccess'])) {
		echo "<script>alert('Booking Successfully');</script>";
	}


	?>
	<!-- header -->
	<div class="header">
		<div class="container">
			<div class="w3layouts_logo">
				<a href="index"><h1>One<span>Movies</span></h1></a>
			</div>
			<div class="w3_search">
				<form action="#" method="post">
					<input type="text" name="Search" placeholder="Search" required="">
					<input type="submit" value="Go">
				</form>
			</div>
			<div class="w3l_sign_in_register">
				<ul>
					<li><i class="fa fa-phone" aria-hidden="true"></i> (+000) 123 345 653</li>
					<?php
					
					if (isset($_SESSION['customer_login'])==TRUE) {
						echo $_SESSION['email'];
						echo "<li><a href='logout.php'>Logout</a></li>";
					}else{
						?>

						<li><a href="#" data-toggle="modal" data-target="#myModal">Login</a></li>
						<?php
					}
					

					?>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //header -->

	<!-- bootstrap-pop-up -->
	<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					Sign In & Sign Up
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
				<section>
					<div class="modal-body">
						<div class="w3_login_module">
							<div class="module form-module">
								<div class="toggle"><i class="fa fa-times fa-pencil"></i>
									<div class="tooltip">Click Me</div>
								</div>
								<div class="form">
									<h3>Login to your account</h3>
									<form action="db/db_login.php" method="post">
										<input type="email" name="email" placeholder="Email" required="">
										<input type="password" name="password" placeholder="Password" required="">
										<input type="submit" name="login" value="Login">
									</form>
								</div>
								<div class="form">
									<h3>Create an account</h3>
									<form action="db/db_login.php" method="post">
										<input type="text" name="firstname" placeholder="Firstname" required="">
										<input type="text" name="lastname" placeholder="Lastname" required="">

										<input type="email" name="email" placeholder="Email Address" required="">
										<input type="password" name="password" placeholder="Password" required="">
										<input type="text" name="phone" placeholder="Phone Number" required="">
										<input type="text" name="address" placeholder="Address" required="">
										<input type="submit" name="registration" value="Register">
									</form>
								</div>
								<div class="cta"><a href="#">Forgot your password?</a></div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
	<?php


	?>
	<script>
		$('.toggle').click(function(){
		  // Switches the Icon
		  $(this).children('i').toggleClass('fa-pencil');
		  // Switches the forms  
		  $('.form').animate({
		  	height: "toggle",
		  	'padding-top': 'toggle',
		  	'padding-bottom': 'toggle',
		  	opacity: "toggle"
		  }, "slow");
		});
	</script>
	<!-- //bootstrap-pop-up -->
	<!-- nav -->
	<div class="movies_nav">
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="navbar-header navbar-left">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav>
						<h2 style="color: white">New Arrived Movie :</h2></button><marquee>
							<table>
								<tr>
									

									<?php
									include('db/db.php');
									$query="SELECT * FROM movie where status='Continue' ORDER BY mid DESC";
									$result=mysqli_query($con,$query);
                //echo mysqli_error();
									if(mysqli_num_rows($result)>0){

										while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
											echo "<td><h2 style='color:white;'>".$row['movie_name'].",  </h2></td>";
										}
									}

									?>

								</tr>
							</table>
						</marquee>
					</nav>
				</div>
			</nav>	
		</div>
	</div>
	<!-- //nav -->
	<?php

	include('db/db.php');
//include('inc/banner.php');

	?>

<?php
if (isset($_GET['id'])) {
	

?>
	<div class="container-fluid" style="color: #FF8D1B">
		<div class="row">
			<div class="col-md-4">
			</div>
			<div class="col-md-8">
				<div class="card">
					<div class="header">
						<h4 class="title">Booking</h4>
						<!--  <p class="category">Here is a subtitle for this table</p> -->
					</div>
					<div class="content table-responsive table-full-width" style="font-size: 2em;">
						<form action="db/db_booking" method="post">

							<input type="hidden" value="<?php echo $_SESSION['customer_id'];?>" name="id">
							<input type="hidden" value="<?php echo $_GET['id'];?>" name="movie">

							<table>
								<tr>
									<td>Movie Name :</td>
		<td style="text-align: center;"><input readonly="" style=" border: none;" required="" type="text" value="<?php echo $_GET['name']; ?>"></td>
								</tr>
								<tr>
									<td>Date :</td>
									<td><input type="text" id="datepicker" class="form-control" readonly="" required="" name="date"></td>
								</tr>
								<tr>
									<td>Price : (BDT)</td>
									<td style="text-align: center;"><input readonly="" style=" border: none;" required="" type="text" value="<?php echo $_GET['price']; ?>" name="price"></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="submit" class="btn btn-info" value="Booking" name="book"></td>
								</tr>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php

}
?>
     <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Booking History</h4>
                                <!--  <p class="category">Here is a subtitle for this table</p> -->
                            </div>
                            <div class="content table-responsive table-full-width" style="color: black">

                                <table class="table table-hover table-striped">
                                    <thead>
                                       <th style="color: #FF8D1B; text-align: center;">Movie Name</th>
                                        <th style="color: #FF8D1B; text-align: center;">Date</th>
                                        <th style="color: #FF8D1B; text-align: center;">Price(BDT)</th>
                                        
                                    </thead>
                                    <tbody>
                                       <?php

                                       $query="SELECT * FROM booking,customer,movie WHERE booking.cid=customer.cid and booking.movie=movie.mid and booking.cid='".$_SESSION['customer_id']."'";
                                       $result=mysqli_query($con,$query);
                //echo mysqli_error();
                                       if(mysqli_num_rows($result)>0){

                                          while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){


                                              echo"<tr>";
                                              echo "<td style='text-align: center; color:black;'>".$row['movie_name']."</td>";
                                              echo "<td style='text-align: center; color:black;'>".$row['date']."</td>";
                                              echo "<td style='text-align: center; color:black;'>".$row['price']."</td>";
                                              
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
	<!-- pop-up-box -->  
	<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
	<!--//pop-up-box -->
	<div id="small-dialog" class="mfp-hide">
		<iframe src="https://player.vimeo.com/video/164819130?title=0&byline=0"></iframe>
	</div>
	<div id="small-dialog1" class="mfp-hide">
		<iframe src="https://player.vimeo.com/video/148284736"></iframe>
	</div>
	<div id="small-dialog2" class="mfp-hide">
		<iframe src="https://player.vimeo.com/video/165197924?color=ffffff&title=0&byline=0&portrait=0"></iframe>
	</div>
	<script>
		$(document).ready(function() {
			$('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>
	<!-- //Latest-tv-series -->
	<!-- footer -->
	<div class="footer" style="margin-top:200px;">
		<div class="container">
			<div class="w3ls_footer_grid">
				<div class="col-md-6 w3ls_footer_grid_left">
					<div class="w3ls_footer_grid_left1">
						<h2>Subscribe to us</h2>
						<div class="w3ls_footer_grid_left1_pos">
							<form action="#" method="post">
								<input type="email" name="email" placeholder="Your email..." required="">
								<input type="submit" value="Send">
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-6 w3ls_footer_grid_right">
					<a href="index.html"><h2>One<span>Movies</span></h2></a>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="col-md-5 w3ls_footer_grid1_left">
				<p>&copy; 2016 One Movies. All rights reserved </p>
			</div>
			<div class="col-md-7 w3ls_footer_grid1_right">
				
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //footer -->
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
			$(".dropdown").hover(            
				function() {
					$('.dropdown-menu', this).stop( true, true ).slideDown("fast");
					$(this).toggleClass('open');        
				},
				function() {
					$('.dropdown-menu', this).stop( true, true ).slideUp("fast");
					$(this).toggleClass('open');       
				}
				);
		});
	</script>
	<!-- //Bootstrap Core JavaScript -->
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
				*/

				$().UItoTop({ easingType: 'easeOutQuart' });

			});
		</script>
		<!-- //here ends scrolling icon -->
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
	</html>
	<?php
}else{
	header('location:index?loginrequired');
}

?>