<?php
	session_unset();
?>
<html>
	<head>
		<title>Momo's Website</title>
		<link rel="stylesheet" type="text/css" href="css/basic.css">
		<link rel="stylesheet" type="text/css" href="bootstrap-3.3.5-dist/css/bootstrap.css">
	</head>
	<body>
		<script>
			function myFunction(element, hide_this){
				id = element.id;
				id_to_hide = hide_this.id;
				document.getElementById(id_to_hide).style.display = "none";
				console.log(id);
				if(document.getElementById(id).style.display == "inline-block"){
					document.getElementById(id).style.display = "none";
				} else {
					document.getElementById(id).style.display = "inline-block";
				} 
			}
		</script>
		<center>
			<button class = "index-button" type = "button" onclick = "myFunction(register, login)">Register Now!</button>
			<button class = "index-button"type = "button" onclick = "myFunction(login, register)">Login Now!</button>
			<br/>
			<div id = "register">
				<h1>Регистрация</h1>
				<form id = "form1" action="register.php" method="post">
					<div class = "data_input">
						<p class = "text">Username*: </p><input type="text" name="username" required><br/>
						<p class = "text">Password*: </p><input type="password" name="password" required><br/>
						<p class = "text">E-mail*: </p><input type = "text" name = "email" required><br/>
					</div>
					<input class = "index-button" type="submit" value = "Register">
				</form>
			</div>
			<div id = "login">
				<h1>Вход</h1>
				<form id = "form2" action="login.php" method="post">
					<div class = "data_input">
						<p class = "text">Username*: </p><input type="text" name="username1" required><br>
						<p class = "text">Password*: </p><input type="password" name="password1" required><br>
					</div>
					<input class = "index-button" type="submit" value = "Login">
				</form>
			</div>
		</center>
	</body>
</html>