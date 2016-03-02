<?php
	session_start();
	if(!$_SESSION['crud'])
	{
		header("Location: Login.php");
	}
?>

<?php

	$id = $_GET['id'];

	//1.create database connection
	mysql_connect("localhost","root","") or die("Could not connect to the server");

	//2.select database
	mysql_select_db("crud") or die("could not connect to the database");

	//3.perform database query
	$sql = "SELECT * FROM users WHERE Id = $id";
	$result = mysql_query($sql);

	//4.use returned data (if any)
	$row = mysql_fetch_array($result);
	echo "<h3>Are you sure you want to delete the following record</h3><br/>";
	echo "Id: ".$row['Id']."<br/>";
	echo "Full name: ".$row['FullName']."<br/>";
	echo "User Name: ".$row['UserName']."<br/>";
	echo "User Name: ".$row['Email']."<br/>";

	echo "Password : <br/><br/><br/>";
	echo "<a href='delete_record.php?id=".$row['Id']."'><b>Yes<b/></a><br/>";	
	echo "<a href='all_users.php'><b>No</b></a>";

	//5.close database connection
	mysql_close();
	
?>
