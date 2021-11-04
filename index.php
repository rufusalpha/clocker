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
	</head>
	
	<body>
		<div id="timestamp"></div> <!--timestamp-->
		<div class="user" <?php if(!isset($_SESSION['UID'])) { echo 'style="visibility: hidden;"';} ?> >
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