<html>
	<?php
		session_start();
	?>
	<head>
		<title>This is where you can see all your published posts!</title>
		<link rel="stylesheet" type="text/css" href="css/basic.css">
		<link rel="stylesheet" type="text/css" href="bootstrap-3.3.5-dist/css/bootstrap.css">
	</head>
	<body>
		<?php
			if(isset($_SESSION["APIKEY"])){
				$APIKey = $_SESSION["APIKEY"];
				$authored_user = 1;
				$APIKEY = $APIKey;
			}

			if(isset($_GET["APIKEY"])){
				$APIKey = $_GET["APIKEY"];
				$authored_user = 0;
			}
			$server = 'localhost';
			$username = 'root';
			$password = '';
			$dbname = 'my_project';
			$conn = mysqli_connect($server,$username,$password,$dbname);
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			if($authored_user == 1)
				include('loged_as.php');

			$sql = "SELECT title,rate,data,link from users WHERE APIKey = \"$APIKey\" AND Is_Shown = 1";
			$result = mysqli_query($conn,$sql);
			$numberofpost = 0;
			?>
			<div id = "content">
				<h1>Testimonials</h1>
			</div>
			<?php
			while($row = $result->fetch_assoc()) {
				$numberofpost++;
				if ($numberofpost > 10 && $authored_user == 0){
					break;
				}
				?>
					<div class = "content-holder" id = "<?php echo $numberofpost?>">
						<div class = "rate">
							<ul>
								<li><img src = "<?php echo $row["link"]?>"></li>
							</ul>
						</div>
						<div class = "main-holder">
							<div class = "title">
								<b><ul class = "basket">
									<li><?php echo "Title: ".$row["title"]?></li>
									<li><?php echo "Rating: ".$row["rate"]."/10"?><li>
								</ul></b>
							</div>
							<div class = "content">
								<p><?php echo $row["data"]?></p>
							</div>
						</div>
					</div>
				<?php
							if($authored_user == 1){ ?>
								<script>
									function deletepost(number){
										xmlhttpp = new XMLHttpRequest();
										APIKey = "<?php echo $APIKey?>";
										link = "http://localhost/Project/delete.php?number="+number+"&APIKEY="+APIKey;
										console.log(link);
										xmlhttpp.open("GET",link,true);
										xmlhttpp.send();
										document.getElementById(number).style.display = "none";
										document.getElementById("button"+number).style.display = "none";
									}
								</script>
								<center><button id = "<?php echo "button".$numberofpost?>" onclick = "deletepost(<?php echo $numberofpost?>)">Delete this post!</button></center>
							<?php }
			}
				?>
		<?php if($authored_user == 1){ ?>
			<a href = "login.php" id = "backer">Върни се</a>
		<?php }?>
	</body>
</html>