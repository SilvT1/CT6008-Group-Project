<?php
session_start();

    $inputDesignerId = $_SESSION['_id'];
    $inputuser = $_GET['email_field']; 
    $inputpass = $_GET['password_field'];
	//Sample Database Connection Syntax for PHP and MySQL.
	
	//Connect To Database
	
	$hostname="localhost";
	$username="";
	$password="";
	$dbname="";
	$usertable="";
	$designer_email = "";
	$designer_password = "";
	$designer_id = "";
	$designer_name = "";
	
	
	$connection = mysqli_connect($hostname,$username, $password) or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.'),history.go(-1)</script></html>");
	mysqli_select_db($connection, $dbname);
	
	


	# Check If Record Exists
	
	$query = "SELECT * FROM $usertable WHERE $designer_id = '$inputDesignerId';";	                                  
	
	$result = mysqli_query($connection, $query);
 
//If username and password exist in our database then create a session.
    $row = mysqli_fetch_assoc($result);
    

	if (mysqli_num_rows($result) == 1) { 
	    $_SESSION['designer_id'] = $row['designer_id']; // Initializing Session
		$_SESSION['designer_name'] = $row['name'];
		$_SESSION['designer_email'] = $row['email'];
	    header('Location: CMS_ProductDesigner.php');
	    exit();
    die(); } else { header('Location: Login_failed.html'); 
    die ("Invalid Username/Password"); }
?>
