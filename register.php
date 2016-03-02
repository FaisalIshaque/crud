<?php
	session_start();
	$message = "";

	if(isset($_SESSION['crud']))
	{
		header("Location: home.php");
	}
?>

<!DOCTYPE html>
<html>
<!-- <script src="registration_validation.js"></script> -->
<body>
<title>Add User</title>

<form id="register" name="register" action="insert_record.php" method="POST" onsubmit="return validateRegistration()">
<h2>Registration Page</h2>
<blockquote>
<p>
	Full Name: <input type="text"  		name="Full_Name" id="Full_Name" placeholder="eg. James Marlow"/><h4><?php if (isset($_SESSION['err_msg_NameNull'])) {
	$message = $_SESSION['err_msg_NameNull'];
	echo $message;
	session_destroy();
	} ?></h4><br/><br/>
	
	User Name: <input type="text"  		name="User_Name" id="User_Name" placeholder="Enter a user name"/><br/><br/>
    
    E-mail:    <input type="email" 		name="E_Mail" 	 id="E_Mail"><br/><h4><?php if (isset($_SESSION['err_msg_EmailNull'])) {
	$message = $_SESSION['err_msg_EmailNull'];
	echo $message;
	session_destroy();
	} ?></h4><br/>
	
	Password:  <input type="password" 	name="Pass_Word" id="Pass_Word" maxlength="10"/><h4><?php if (isset($_SESSION['err_msg_PassNull'])) {
	$message = $_SESSION['err_msg_PassNull'];
	echo $message;
	session_destroy();
	} ?></h4><br/><br/>

	<input type="submit" name="submit" value="Sign Up"/>
	<input type="reset" name="reset" value="clear"/><br/><br/>
	<a href="login.php">Already Have An Account</a>
</p>
</blockquote>

</form>
</body>
</html>