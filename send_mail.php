<?php
	$APIKEY = $_GET["APIKEY"];
	if(isset(["NEW"])){
		$congratulations = 1;
	} else {
		$congratulations = 0;
	}

	$server = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'my_project';
	
	$conn = mysqli_connect($server,$username,$password,$dbname);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT email FROM users WHERE APIKey = \"$APIKEY\"";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	$to_mail = $row["email"];
	if($congratulations == 1){
		$subject = "Happy Cruising This Ship Of Love";
		$message = "<center><h1>Welcome aboard the train!</h1></center>\n";
		$message .= "	In my web application, you can make use of your testimonials\nAnd do some random stuff, like <b>approving</b> your testimonial\n and <b>posting</b> them and <b>managing</b> them";
	} else {
		$subject = "You have been visited by a friendly maan, and he left you a message!";
		$message = "You have a new testimonial! Go check it out!";
	}
	mail($to_mail, $subject, $message, null);
?>