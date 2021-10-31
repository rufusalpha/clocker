<!DOCTYPE html>
<html> 
	<head>
			<title>Clocker - log your hours properly :D</title>
			<meta charset="utf-8">
		
			<link rel="stylesheet" href="style/main.css">
			<script src="scripts/jquery-3.6.0.min.js"></script>
			<script src="scripts/timestamp.js"></script>
	
	</head>
	
	<body>
		<div id="timestamp"></div>
		<div class="clock">
  			<div class="hours-container">
   				<div class="hours" id="hours"></div>
  			</div>
  			<div class="minutes-container">
    			<div class="minutes" id="minutes"></div>
  			</div>
			<div class="seconds-container">
				<div class="seconds" id="seconds"></div>
			</div>
		</div>

		<script>
			const degr = 6;
			const hr = document.querySelector('#hours');
			const mn = document.querySelector('#minutes');
			const sc = document.querySelector('#seconds');

			var test = document.getElementsByTagName('timestamp');
			document.write(test);

			setInterval(() => {
				let day = new Date();
				let hh = day.getHours() * 30;
				let mm = day.getMinutes() * degr;
				let ss = day.getSeconds() * degr;
				hr.style.transform = `rotateZ(${(hh)+(mm/12)}deg)`;
				mn.style.transform = `rotateZ(${mm}deg)`;
				sc.style.transform = `rotateZ(${ss}deg)`;
			})
		</script>

		<div class="light-mode"></div>
	</body>
</html>

