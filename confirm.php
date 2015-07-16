<?php
	session_start();
	$API = $_SESSION["APIKEY"];
	$post_number = $_GET["number"];
	
	$server = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'my_project';

	$conn = mysqli_connect($server,$username,$password,$dbname);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT * FROM users WHERE APIKey = \"$API\"";
	$result = mysqli_query($conn,$sql);
	$post_number_now = -1;
	while($row = $result->fetch_assoc()){
		$post_number_now++;
		if ($post_number_now == $post_number){
			$ID_to_confirm = $row["ID"];
		}
	}

	$sql = "UPDATE users SET Is_Shown = 1 WHERE ID = \"$ID_to_confirm\"";
	$result = mysqli_query($conn,$sql);
	
?>