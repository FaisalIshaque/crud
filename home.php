<?php
	session_start(); 
	if(!$_SESSION['crud'])
	{
		header("Location: Login.php");
	}
?>
<!DOCTYPE html>
<html>
<body>
<title>Home Page</title>
<blockquote>
<p>
	<a href="all_users.php">+ Show All Users +</a><br>
 	<a href="logout.php">logout</a> 
</p>
</blockquote>

</body>
</html>
