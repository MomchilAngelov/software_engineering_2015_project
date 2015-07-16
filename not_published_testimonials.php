<?php 
	session_start()
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/basic.css">
		<title>Awaiting approval</title>
	</head>
	<body>
		<?php
			$APIKEY = $_SESSION["APIKEY"];

			$server = 'localhost';
			$username = 'root';
			$password = '';
			$dbname = 'my_project';
			
			$conn = mysqli_connect($server,$username,$password,$dbname);
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			include('loged_as.php');

			?>	
			<center><h1>This is where all the unpublished posts are!</h1><center>
			<?php
			$sql = "SELECT * FROM users WHERE APIKey = \"$APIKEY\" AND Is_Shown = 0";
			$result = mysqli_query($conn,$sql);
			$numberofpost = -1;
			while($row = $result->fetch_assoc()) {
				$numberofpost++;
				if ($numberofpost == 0){
					continue;
				}
				?>
					<script>
						function deletepost(number){
							xmlhttpp = new XMLHttpRequest();
							link = "http://localhost/Project/delete.php?number="+number+"&APIKEY="+"<?php echo $APIKEY?>";
							console.log(link);
							xmlhttpp.open("GET",link,true);
							xmlhttpp.send();
						
							hide = document.getElementById(number);
							hide.style.display = "none";
							
							hide = document.getElementById("button"+number);
							hide.style.display = "none";
							
						}

						function confirmpost(number){
							xmlhttpp = new XMLHttpRequest();
							link = "http://localhost/Project/confirm.php?number="+number+"&APIKEY"+"<?php echo $APIKEY?>";
							xmlhttpp.open("GET",link,true);
							xmlhttpp.send();
						
							hide = document.getElementById(number);
							hide.style.display = "none";
							
							hide = document.getElementById("button"+number);
							hide.style.display = "none";
						}
					</script>
					<div id = "<?php echo $numberofpost?>">
						<div class = "content-holder">
							<div class = "rate1">
								<ul>
									<li><img src = "<?php echo $row["Link"]?>"></li>
								</ul>
							</div>
							<div class = "main-holder">
								<div class = "title">
									<b><ul class = "basket">
										<li><?php echo "Title: ".$row["Title"]?></li>
										<li><?php echo "Rating: ".$row["Rate"]."/10"?><li>
									</ul></b>
								</div>
								<div class = "content">
									<p><?php echo $row["DATA"]?></p>
								</div>
							</div>
						</div>
						<center>
							<button onclick = "deletepost(<?php echo $numberofpost?>)">Delete this post!</button>
							<button onclick = "confirmpost(<?php echo $numberofpost?>)">Approve this post!</button>
						</center>
					</div>
							<?php }
				?>
				<center><a href = "login.php" id = "backer">Go back!</a><center>
	</body>
</html>