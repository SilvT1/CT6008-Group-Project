<?php
session_start();

    $inputuser = $_GET['email_field']; 
	$email = $_GET['email_field'];
    $emailSubject = "Retrieving Password";
    
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
	
	$query = "SELECT * FROM $usertable WHERE $designer_email = '$inputuser' COLLATE latin1_bin;";	                                  
	
	$result = mysqli_query($connection, $query);
 
//If username and password exist in our database then create a session.
    $row = mysqli_fetch_assoc($result);
	$message = $row['password'];



$formcontent="Your forgotten password is $message";
$recipient = "$email";
$subject = "$emailSubject";
$mailheader = "From: ndContactForm@connect.glos.ac.uk" . "\r\n";

mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
header('Location: Forgot_Password.php');
?>
