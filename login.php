<?php
if($_POST){
	
	$username = $_POST['Username'];
	$password = $_POST['Password'];

	$error = "";

	//1. Create a database connection
	mysql_connect("localhost","root","") or die("Could not connect to the server");

	//2.Select a database to use
	mysql_select_db("crud") or die("Could not find the database");

	$query ="SELECT * FROM users WHERE UserName='$username' and Password='$password'";
	
	$result = mysql_query($query);

	if(mysql_num_rows($result)==1)
	{
		session_start();
		$_SESSION['username']=$username;
		$_SESSION['crud']=true;
		header('Location: Home.php');
	}
	else
	{
		$error = "Wrong Username or Password";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<h3><?php
		 	if(isset($error)){
		 	 echo $error; 
		 	}
		 ?></h3>
	<h2>Login</h2>
	<form action="login.php" method="POST">
		<input placeholder="Username" name="Username" type="text" autofocus>
		<input placeholder="Password" name="Password" type="password">
		<input name="Login" type="submit" value="Login"><br/><br/>
		<a href="register.php">Click Here To Sign Up</a>
	</form>

</body>
</html>