<?php
	
	session_start();
	if(!$_SESSION['crud'])
	{
		header("Location: Login.php");
	}
	
	echo $id = $_GET['id'];

	//1.Conntect to the server
	mysql_connect("localhost","root","") or die("Could not connect to the server");

	//2.Select a database
	mysql_select_db("crud") or die("could not find the database");

	//3.Perform query on database
	$sql ="DELETE FROM users WHERE Id=$id";
	$result = mysql_query($sql);
	//4.Use returned data (if any)

	//5.close connection
	mysql_close();
	header("Location: all_users.php");
?>

