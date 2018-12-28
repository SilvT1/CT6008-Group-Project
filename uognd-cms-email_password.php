<?php
session_start();

    $emailSubject = "Retrieving Password";
	$loginErr = $errorClass = "";
	$inputuser = "";
    
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$email = $_POST['email_field'];

		//Sample Database Connection Syntax for PHP and MySQL.
		include 'includes/db.php';		
		$connection = mysqli_connect($hostname,$username, $password) or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.'),history.go(-1)</script></html>");
		mysqli_select_db($connection, $dbname);

		# Check If Record Exists
		
		$query = "SELECT * FROM $usertable WHERE $designer_email = '$email' COLLATE latin1_bin;";	                                  
		
		$result = mysqli_query($connection, $query);
	 
	//If username and password exist in our database then create a session.
	    $row = mysqli_fetch_assoc($result);
		if (mysqli_num_rows($result) == 1) { 
			$message = $row['password'];


			$formcontent="Your forgotten password is $message";
			$recipient = "$email";
			$subject = "$emailSubject";
			$mailheader = "From: ndContactForm@connect.glos.ac.uk" . "\r\n";

			mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
			header('Location: uognd-cms-login.php');
		}else{
			$loginErr="Email does not exist. Please try again.";
			$errorClass = " error";
		}
	}
?>
