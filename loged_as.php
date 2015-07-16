<?php
	$sql = "SELECT User FROM users WHERE APIKey = \"$APIKEY\"";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
?>
<center>
	<p id = "greetings">
		Currenlty logged in as <em><?php echo $row["User"]?></em>
		<button id = "evil-button" onclick = "location.href = 'logout.php'">Logout</button>
	</p>
<center>