<?php
if(!$_POST)
	header("Location: home.php");
	
	//echo "you are on insert_record.php file";
	$Fname = $_POST['Full_Name'];
	$Uname = $_POST['User_Name'];
	$Email = $_POST['E_Mail'];
	$Pword = $_POST['Pass_Word'];

	$flag = true;
	$message = "";

//Fname Validation


	if($Fname == "" || is_null($Fname)){
		$flag = false;

        $message = $message . "Please enter your full name";
		//echo "<script type='text/javascript'>alert('$message');</script>";
	}

	if(!preg_match('/^[A-Za-z ]+$/',$Fname)){
		$flag = false;

		$message=  $message . "</br>Name can contain alphabets and space only";
		//echo "<script type='text/javascript'>alert('$message');</script>";
	}

//Email Validation
	if($Email == "" || is_null($Email)){
		$flag = false;

		//$message+= "Please enter your email address";
		//echo "<script type='text/javascript'>alert('$message');</script>";
	}
	
	if(!preg_match('/^([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)@([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)[\\.]([a-z]{2,4})$/',$Email)){
		$flag = false;
		
		//$message+= "The format for email address is incorrect";
		//echo "<script type='text/javascript'>alert('$message');</script>";
	}

//Pword Validation  
	
	if($Pword == "" || is_null($Pword)){
		$flag = false;

		//$message+= "Please enter a password";
		//echo "<script type='text/javascript'>alert('$message');</script>";
	}

	if(!preg_match('/^[a-z0-9]+[.$%^&*()!@_a-z0-9]{5,9}$/',$Pword)){
		$flag = false;

		//$message += "Password must be 6 to 10 characters. First character must be a letter";
		//echo "<script type='text/javascript'>alert('$message');</script>";
	}

	if ( $flag == false)
	{
		echo "<script type='text/javascript'>alert('$message');</script>";	
	}

	if ($flag == true) {
		# code...
	

	//PHP database (MySQL) interaction in 5 steps

	//1. Create a database connection
	mysql_connect("localhost","root","") or die("Could not connect to the server");

	//2.Select a database to use
	mysql_select_db("crud") or die("Could not find the database");

	//echo "Connection to server and database succesfull";

	//3.Perform database query
	$sql = "INSERT INTO users (FullName, UserName, Password, Email)
			VALUES 
			('$Fname','$Uname','$Pword', '$Email')";

	$query = mysql_query($sql);
	//4.Use returned data (if any)

	session_start();
	$_SESSION['crud']=ture;
	$_SESSION['username']=$Uname;
	//$_SESSION['username']=$Uname;
	
	//5.Close connection
	mysql_close();
	header("Location: home.php");

	}


?>