<?php

	session_start();
	if(!$_SESSION['crud'])
	{
		header("Location: Login.php");
	}


	//1. Create a database connection
	mysql_connect("localhost","root","") or die("Could not connect to the server");

	//2.Select a database to use
	mysql_select_db("crud") or die("Could not find database");

	//3.Perform database query
	$sql = "SELECT * FROM users";
	$result = mysql_query($sql);
?>

<html>
<body>
<head>
<title>View All Users</title>
</head>
<blockquote>
<table border="1">
		<tr>
		<td>Id</td>
		<td>Full Name</td>
		<td>User Name</td>
		<td>Email</td>
		</tr>

	<?php
		//4. Use returned data (if any)
		//echo "You are on the view all_users.php";	
	while ($row = mysql_fetch_assoc($result)) {
		
		echo "<tr>";
		echo "<td>".$row['Id']."</td>";
		echo "<td>".$row['FullName']."</td>";
		echo "<td>".$row['UserName']."</td>";
		echo "<td>".$row['Email']."</td>";

		//echo "<td>".$row['Password']."</td>";
		echo "<td><a href=\"update_user.php?id=".$row['Id']."\"> Update User</a></td>";

		if ($_SESSION['username']!=$row['UserName'])
		{
			echo "<td><a href=\"delete_user.php?id=".$row['Id']."\"> Delete User</a></td>";
		}
		echo "</tr>";
	
	}
	?>
</table>
</blockquote>

<input type="button" name="Home" value="Home" onclick="location.href='Home.php'">

</body>
</html>
<?php
	//5.Close database connection
	mysql_close();
?>