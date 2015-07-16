<html>
	<?php
		session_start();
	?>
	<head>
		<title>Loged user</title>
		<link rel="stylesheet" type="text/css" href="css/basic.css">
	</head>
	<body>
		<?php
			$server = 'localhost';
			$username = 'root';
			$password = '';
			$dbname = 'my_project';
			

			$conn = mysqli_connect($server,$username,$password,$dbname);
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}


			if (isset($_POST['username1'])){
				$name = $_POST['username1'];
			}

			if (isset($_POST['password1'])){
				$pass = $_POST['password1'];
				check_for_user($name,$pass);
			}


			function check_for_user($name, $pass){
				$sql = "SELECT * FROM users WHERE User = \"$name\" AND Pass = \"$pass\"";
				global $conn;
				$result = mysqli_query($conn,$sql);
				if (mysqli_num_rows($result) > 0){
					$row = mysqli_fetch_assoc($result);
					$_SESSION["APIKEY"] = $row["APIKey"];
					$_SESSION["LOGED"] = 1;
				} else {?>
					<center><h1>Invalid accuont!<h1><a href = "index.php" id = "backer">Go back!</a></center>
				<?php
				}
			}


			if (!(isset($_SESSION["LOGED"]))){
				$_SESSION["LOGED"] = 0;
			}
			if ($_SESSION["LOGED"] == 1){
				$APIKEY = $_SESSION["APIKEY"];
				include('loged_as.php');
				?>

				<center><h1>This is the section if you are logged in! Just copy paste the code below and get started!</h1></center>
				<p>Your API Key is: <?php echo $APIKEY?></p></center>

					<div id = "form-login">
						<form id = "form3" action="post.php" method="get">
							<p>Titile*: </p><input type="text" name="title" required><br/>
							<p>Comment*: </p><input type="text" name="data" required><br/>
							<p>Rating*: </p><input type="text" name="rate" required><br/>
							<p>Link to image*: </p><input type = "text" name = "link" required><br/>
							<input type="submit" value="Submit a post!">
						</form>
					</div>
					<button class = "index-button" style = "display: block; margin-top: 15px" onclick = "location.href = 'get_all_posts.php'">See all testimonials</button>
					<button class = "index-button" style = "display: block; margin-top: 15px; margin-bottom: 15px;" onclick = "location.href = 'not_published_testimonials.php'">Not published yet</button>
		
				<?php
			}
			

			if ($_SESSION["LOGED"] == 1){ ?>	
				<script>
					data_for_API = "<?php echo $APIKEY?>";
					console.log(data_for_API);


					String.prototype.insert = function (index, string) {
					  if (index > 0)
					    return this.substring(0, index) + string + this.substring(index, this.length);
					  else
					    return string + this;
					};


					function showIframeContent(id) {
						var iframe = document.getElementById(id);
						try {
							var doc = (iframe.contentDocument)? iframe.contentDocument: iframe.contentWindow.document;
							doc.body.innerHTML = doc.body.innerHTML.insert(103,data_for_API);
							data = doc.body.innerHTML;
						}
						catch(e) {
							alert(e.message);
						}
						return false;
					}

					function hide() {
						document.getElementById("hide-this").style.display = "none";
						document.getElementById("content-box-1234").style.display = "block";
						showIframeContent("content-box-1234");
					}
					</script>

					<button onclick = "hide()" id = "hide-this" class = "btn">Generate Code to Paste!</button>
					<iframe id = 'content-box-1234' src = "http://localhost/Project/copythis.html"> </iframe>
					<br/>
			<?php }?>
	</body>
</html>