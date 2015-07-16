<html>
	<head>
		<title>Our test site!</title>	
	</head>
	<body>
		<div>
			<h1>Some-Content</h1>
		</div>
		<?php 
$APIKEY = "41737624144122602181603750995891";
$page = file_get_contents('http://localhost/Project/get_all_posts.php?APIKEY='.$APIKEY);
echo $page;
?>

<script>APIKEY = "<?php echo $APIKEY;?>";</script>
<script src = "http://localhost/Project/API1.0.js"></script>

<?php
$page = file_get_contents("http://localhost/Project/1post.php");
echo $page."<br/>";
?>
		<p>More content to test!</p>
	</body>
</html>
