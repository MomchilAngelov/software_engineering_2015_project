<?php
			$APIKEY = $_GET["APIKEY"];	
			$server = 'localhost';
			$username = 'root';
			$password = '';
			$dbname = 'my_project';
			
			$conn = mysqli_connect($server,$username,$password,$dbname);
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			$sql = "SELECT count(*) FROM users WHERE APIKey = \"$APIKEY\"";
			$result = mysqli_query($conn,$sql);
			$row = $result->fetch_assoc();
			echo $row["count(*)"]; 
?>