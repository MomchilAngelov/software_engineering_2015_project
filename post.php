<html>
	<?php
		session_start();
	?>
	<head>
		<title>In here you can write stuff?</title>
		<link rel="stylesheet" type="text/css" href="css/basic.css">
		<link rel="stylesheet" type="text/css" href="bootstrap-3.3.5-dist/css/bootstrap.css">
	</head>
	<body>
		<?php
			if (isset($_GET["APIKEY"])){
				$APIKey = $_GET["APIKEY"];
				$big_guy = 0;
			}
			if (isset($_SESSION["APIKEY"])){
				$APIKey = $_SESSION["APIKEY"];
				$big_guy = 1;
			}
			$title = $_GET["title"];
			$data = $_GET["data"];
			$rate = $_GET["rate"];
			if(isset($_GET["link"])){
				$link = $_GET["link"];
			} else {
				$link = "resourses/background.jpg";
			}
			if (isset($_GET["Is_Shown"])){
				$write = 0;
			} else {
				$write = 1;
			}
			
			$server = 'localhost';
			$username = 'root';
			$password = '';
			$dbname = 'my_project';
			$conn = mysqli_connect($server,$username,$password,$dbname);
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			$sql = "INSERT INTO users VALUES (\"\", \"$APIKey\", \"$data\", \"\", \"\",\"$title\",\"$rate\",\"$link\",\"$write\",\"\")";
			$result = mysqli_query($conn,$sql);
			?> <center>
			<p>Вие постнахте:
			<?php
			echo $title." ".$data." ".$rate."<br/>";
			?>
			Със APIKey:
			<?php
			echo $APIKey.". ";
			?>
			Автоматично ще бъде пратен във вече използващи се и в циркулация testimonials!</p>
			</center>
		<center><img src = "<?php echo $link?>" alt = "Image not valid!"></center>
		<?php 
			if ($big_guy == 1){
				?><center> <a href = "login.php" id = "backer">Обратно</a></center>
				<?php
			}
			?>
	</body>
</html>