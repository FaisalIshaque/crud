<?php

	session_start();
	if(!$_SESSION['crud'])
	{
		header("Location: Login.php");
	}

$fname = $_POST['fullname'];
$pword = $_POST['password'];
$email = $_POST['email'];


//1.creat database connection
mysql_connect("localhost","root","") or die("could not connect to the database");

//2.select a database
mysql_select_db("crud") or die("could not find the database");

//3.perform query on database
$sql = "UPDATE users SET FullName='$fname', Password='$pword', Email='$email'
WHERE Id='$id'";

$result = mysql_query($sql);
//4.use returned data (if any)

//5.close connection
mysql_close();
header("Location: all_users.php");
?>