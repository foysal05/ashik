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