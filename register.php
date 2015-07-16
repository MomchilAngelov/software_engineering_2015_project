<?php
		session_start();
?>
<html>
	<head>
		<title>Registration section</title>
		<link rel="stylesheet" type="text/css" href="css/basic.css">
		<link rel="stylesheet" type="text/css" href="bootstrap-3.3.5-dist/css/bootstrap.css">
	</head>
	
	<body>
		<?php
			function generateAPIKey() {
				$digits = '0123456789';
				$digitsLength = strlen($digits);
				$APIKey = '';
				for ($i = 0; $i < 32; $i++) {
					$APIKey .= $digits[rand(0, $digitsLength - 1)];
				}
				return $APIKey;
			}
			
			$APIKey = generateAPIKey();
			$condition = 1;
		
			$server = 'localhost';
			$username = 'root';
			$password = '';
			$dbname = 'my_project';
			$false = 0;
			$conn = mysqli_connect($server,$username,$password,$dbname);
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			function check_duplicate($API){
				global $conn; 
				$sql = "SELECT * from users WHERE ID > 0";
				$result = mysqli_query($conn, $sql);
				$isthere = false;
				while($row = $result->fetch_assoc()) {
					if ($API == $row["APIKey"]){
						return true;
					}
				}
				return $isthere;
			}
			$name = $_POST["username"];
			$pass = $_POST["password"];
			$email = $_POST["email"];
		?>
		<?php
			$sql = "SELECT * FROM users WHERE User LIKE \"$name\"";
			$result = mysqli_query($conn,$sql);
			if (mysqli_num_rows($result) > 0){
				?>
				<center><h1>Вече има регистрирано такова име!</h1>
					<h1>Моля опитайте пак с друго име!</h1>
					<a href = "index.php" id = "backer">Обратно</a>
				</center>
				<?php 
					$false = 1;
			} else {
				while(check_duplicate($APIKey)){
					$APIKey = generateAPIKey();
				}
				$sql = "INSERT INTO users VALUES (\"\", \"$APIKey\", \"\", \"$name\", \"$pass\",\"\",\"\",\"\",\"\",\"$email\")";
				$result = mysqli_query($conn, $sql);
			}
		?>
			<?php
				if($false != 1){ ?>
					<center><h1 id = "header1">Успешна Регистрация!</h1></center>
					<center><h2>Вие ще бъдете известени с и-мейл за това ваше деяние!</h2></center>
					<center><h1>Вашият API Key е: <?php echo $APIKey;?></h1></center>
						<center><a id = "backer" href = "index.php">Обратно</a></center><?php
				}?>
			<script>
				xmlhttpp = new XMLHttpRequest();
				link = "http://localhost/Project/send_mail.php?APIKEY="+"<?php echo $APIKey?>";
				console.log(link);
				xmlhttpp.open("GET",link,true);
				xmlhttpp.send();
			</script>


	</body>
</html>