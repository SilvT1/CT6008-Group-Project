<?php
session_start();

/**initially created by Tiago
modified and finalised by Felicia
-TS: created database interaction/login check
-FL: added self-window check, validation, security, changed to 'POST' **/

	// define variables and set to empty values
	$loginErr = $errorClass = "";
	$inputuser = $inputpass = "";

	if($_SESSION['_id']!=""){
		exit(header("Location: /uognd-cms-login-success.php"));//redirect user
	}


	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$inputuser = test_input($_POST["email_field"]);
		$inputpass = test_input($_POST["password_field"]);
	
		//Connect To Database
		include 'includes/db.php';	
		mysqli_select_db($conn, $dbname);

		# Check If Record Exists	
		$query = "SELECT * FROM $usertable WHERE $designer_email = '$inputuser' and $designer_password = '$inputpass' COLLATE latin1_bin;";	                                  
		
		$result = mysqli_query($conn, $query);
	 
		//If username and password exist in our database then create a session.
	    $row = mysqli_fetch_assoc($result);
		if (mysqli_num_rows($result) == 1) { 
		    $_SESSION['_id'] = $row['designer_id']; // Initializing Session
			$_SESSION['designer_name'] = $row['name'];
			$_SESSION['designer_email'] = $row['email'];

	    	exit(header("Location: /uognd-cms-login-success.php"));//redirect user
		} else {
			/** Unsuccessful login: give user visual feedback**/
			$loginErr = "<br />Invalid username/password. Please try again.";
			$errorClass = " error";
		}
	}

	function test_input($data) {
		/*  1. Strip unnecessary characters
			2. Remove backslashes (\)
			3. ensure security by preventing user malicious code entry */
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	/*if (headers_sent()) {
   		die("Redirect failed. Please click on this link: <a href=\"CMS_ProductDesigner.php\" />");
	} else {
	    exit(header("Location: /CMS_ProductDesigner.php"));
	}*/
?>