<?php
session_start();

/**initially created by Tiago
modified and finalised by Felicia
-TS: created database interaction
-FL: added self-window check, validation, security, changed to 'POST' **/

$feedback = $_GET['feedback'];

	/* Displays user information and some useful messages */
	$d_ID=$name=$email="";

	// Check if user is logged in using the session variable
	if ( $_SESSION != 0 ) {
	    $d_ID = $_SESSION['_id'];
	    $name = $_SESSION['designer_name'];
	    $email = $_SESSION['designer_email'];

		include 'includes/db.php';

		$sql = "SELECT nd_product_designers.designer_id,product_id,product_title,hero_image,name,email,portfolio_link,picture,phone_number,mini_bio FROM `nd_product_designers` LEFT JOIN `nd_Product` ON nd_Product.designer_id = nd_product_designers.designer_id WHERE nd_product_designers.designer_id=$d_ID";
		    
		$query = mysqli_query($conn, $sql);

		if (!$query) {
		  die ('SQL Error: ' . mysqli_error($conn));
		}
	} else {
	    // Makes it easier to read
	    $_SESSION['message'] = "Session isn't picking up name or email!";
	}

	// define variables and set to empty values
	/*$loginErr = $errorClass = "";
	$inputuser = $inputpass = "";*/
	$formSubmitted=false;
	$userName=$userPhone=$userEmail=$userLink=$userBio;

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$formSubmitted=true;
		//var_dump($_POST);
		$userName=test_input($_POST['name_field']);
		$userPhone=test_input($_POST['phone_field']);
		$userEmail=test_input($_POST['email_field']);
		$userLink=test_input($_POST['link_field']);
		$userBio=test_input($_POST['bio']);

		$_SESSION['designer_name']=$userName;
	    $email = $_SESSION['designer_email']=$userEmail;


		$sqlUpdate = "UPDATE $usertable SET name='$userName', phone_number='$userPhone', email='$userEmail', portfolio_link='$userLink', mini_bio='$userBio' WHERE designer_id='$d_ID'";

		if (mysqli_query($conn, $sqlUpdate)) {
		    $feedback="<p style='padding-bottom:2em; clear:both;'>Changes saved successfully!</p>";
		} else {
		    $feedback="<p style='padding-bottom:2em; clear:both;'>Error updating file, please try again.</p>";
		}	


	    header("Location: /uognd-cms-login-success.php?feedback=$feedback");//force refresh
		mysqli_close($conn);
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