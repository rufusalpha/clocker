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

		<div class="form-logout" <?php if(!isset($_SESSION['UID'])) { echo 'style="visibility: hidden;"';} ?> >
		
			<form method="POST" action="backend/refresh.php">
				<input class="btn" type="submit" name="refresh" value="Log Out">
			</form>
		</div> <!-- form-logut -->

		<div class="form-login" <?php if(isset($_SESSION['UID'])) { echo 'style="visibility: hidden;"'; } ?> >
			<h1>Sign in</h1>
			<form method="POST" action="backend/login.php" name="form_login" >
				<input class="txt" type="text" name="login" placeholder="login">
				<input class="txt" type="password" name="passwd" placeholder="password">
				<input class="btn" type="submit" name="sumbit" value="Send">
			</form>
		

		</div> <!-- form-login -->

		<?php 
			if( isset($_SESSION['UID']) ){	include("clocker.php"); }
		?>
	</body>
</html>

