<head>
	<link rel="stylesheet" type="text/css" href="css/basic.css">
</head>
<?php 
	session_start();
	session_unset();
	session_destroy(); 
?>
<center><a href = "index.php" id = "backer">Go back with a logoutted values!</a></center>