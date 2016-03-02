<?php  

	session_start();
	if(!$_SESSION['crud'])
	{
		header("Location: Login.php");
	}

	$id = $_REQUEST['id'];
	
	//1. Create a database connection
	mysql_connect("localhost","root","") or die("Could not connect to the server");

	//2.Select database to use
	mysql_select_db("crud") or die("Could not find database");

	//3.Perform database query
	$sql = "SELECT * FROM users WHERE Id = $id LIMIT 1";
	$result = mysql_query($sql);

	//4.Use returned data (if any)
	$row = mysql_fetch_array($result);
?>

<!DOCTYPE html>
<html>
<script src="update_validation.js"></script>
<head>
	<title>Update User</title>
</head>
<body>
<form name="update" action="update_record.php" method="POST" onsubmit="return validateUpdate()">
<blockquote>
	<h3>Update the following record</h3>
	id : 		<input type="text" 		name="id" 		id="id" 		value="<?php echo $row['Id']; ?>" readonly="readonly"/><br/>
	full name : <input type="text" 		name="fullname" id="fullname"   value="<?php echo $row['FullName']; ?>"/><br/>
	user name : <input type="text" 		name="username" id="username"   value="<?php echo $row['UserName']; ?>" readonly="readonly"/><br/>
	email 	  : <input type="email" 	name="email"    id="email" 		value="<?php echo $row['Email']; ?>"/><br/>
	password  : <input type="password" 	name="password" id="password" 	value="<?php echo $row['Password']; ?>"/><br/>

	<input type="submit" name="submit" value="Update"/>
	<input type="button" name="cancel" value="cancel" onclick="location.href='all_users.php'"/><br/>
</blockquote>
</form>

</body>
</html>

<?php
	//5.Close connection
	mysql_close();
?>
