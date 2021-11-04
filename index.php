<?php ob_start(); session_start(); ?>

<!DOCTYPE html>
<html lang="pl"> 
	<head>
			<title>Clocker - log your hours properly :D</title>
			<meta charset="utf-8">
		
			<link rel="stylesheet" href="style/main.css">
			<link rel="stylesheet" href="style/clock.css">
			<link rel="preconnect" href="https://fonts.googleapis.com">
			<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
			<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet"> 

			<script src="scripts/jquery-3.6.0.min.js"></script>
			<script src="scripts/timestamp.js"></script>
			<script src="scripts/scroll.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/ScrollMagic.min.js" integrity="sha512-kDuUo39RGApdfHkM1WQL8Pg9BYtYGS5rD14AzePsD4SEaixw7v/ykAkLMdsSjuBCNFE6/FAP+WIHh6N6QZJl5w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/plugins/debug.addIndicators.min.js" integrity="sha512-hFyYiBIWCYSyo98oFGWjG5V8HEV4g5O2pxu0mzU8qIMC7lrrwtcKWoRDZcpRL0ywIIM2d/XsBJ9iXNLFf6kIgw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/plugins/animation.gsap.min.js" integrity="sha512-7nSmgdAZ7oPdT5aa2a4YauI8Y1xgaj6zZtQo9+EIEhpcNEiRHPAtyTKYckBQ0lmg1xQKrdWweHBcN/D0tdnvCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenLite.min.js" integrity="sha512-pvDW4tehKKsohH97164HwKwRGFpzayEFWTVbk8HuUoLIQ7Jp+WLN5XYokVuoCj2aT6dy8ihbW8SRTG1k0W4mSQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TimelineLite.min.js" integrity="sha512-tSIDeirKC6suYILHqqPuZH3s0MvD4a5vCHXhBIcdmq4gQXZ2IB3fEYA5x2f3D2p/CbSqzKEvuTEVbS5VZ2u+ew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/plugins/CSSPlugin.min.js" integrity="sha512-ocsFo48WU8Xq6Y1Lwi7psXRAujG9E4TKNR4q1DbrKzaaxOMTEoao/a+mDoB+cYzY4lwbyxvqjkp/ZA1/MNlfsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/plugins/BezierPlugin.min.js" integrity="sha512-plyexAULVlTExvDn2yUZFJV9F8q+53MC/GpU9dEuNGXmrrI3J8Rcffjvxg3OOBALBvF+UILPLIBEoCeF2maqTQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>	
	</head>
	
	<body>
		<div id="timestamp"></div> <!--timestamp-->
		<div class="user" >
			<?php
				if( isset($_SESSION['valid']) && $_SESSION['valid'] ){
					echo '<img src="images/user.png" style="width: 30px; height: 30px; filter: drop-shadow(1px 2px 2px #000);filter: invert(0.5);"><h2>' . $_SESSION['uname'] . "</h2>";
				}
			?>

		</div> <!-- user -->

		<div class="form-logout" <?php if(!isset($_SESSION['UID'])) { echo 'style="visibility: hidden;"';} ?> >
		
			<form method="POST" action="backend/refresh.php">
				<input class="btn" id="logout" type="submit" name="refresh" value="Log Out">
			</form>
		</div> <!-- form-logout -->

		<div class="form-login" <?php if(isset($_SESSION['UID'])) { echo 'style="visibility: hidden;"'; } ?> >
			<h1>Sign in</h1>
			<form method="POST" action="backend/login.php" name="form_login" >
				<input class="txt" type="text" name="login" placeholder="login">
				<input class="txt" type="password" name="passwd" placeholder="password">
				<input class="btn" id="submit" type="submit" name="sumbit" value="Send">
			</form>
		

		</div> <!-- form-login -->
		
		<?php 
			if( isset($_SESSION['UID']) ){	include("clocker.php"); }
		?>

		<div class="userData" <?php if(!isset($_SESSION['UID'])) { echo 'style="visibility: hidden;"'; } ?> >
			<?php
				if( isset($_SESSION['valid']) && $_SESSION['valid'] ){
					include 'tabler.php';
				}
			?>

		</div> <!-- userData -->
		
	</body>
</html>

<!-- copyright (C) 2021 Jakub Millan -->