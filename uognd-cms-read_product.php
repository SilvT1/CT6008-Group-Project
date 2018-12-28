<?php
session_start();

/**initially created by Tiago
modified and finalised by Felicia
-TS: created database interaction/login check
-FL: added self-window check, validation, security, changed to 'POST' **/

	// define variables and set to empty values
	/*$loginErr = $errorClass = "";
	$inputuser = $inputpass = "";*/
	$formSubmitted=false;

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$formSubmitted=true;
		exit(header("Location: /uognd-cms-login-success.php"));
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