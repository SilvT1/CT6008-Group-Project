<?php
session_start();

/**started by Tiago
--created email function
--initialised vars
finalised by Felicia
--chaned so on self page
--added check to ensure only runs when form submitted
--added test input function
--added email check to send to right email address
--added subject check
--added form submission check and feedback
--removed renavigation
--modified page so that user can get feedback and submit a new contact form
**/
$who = $why = $name = $email = $message = $recipient="";
$successfulSubmit=false;

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		//var_dump($_POST);
		$who = $_POST['who_field'];
		$why = $_POST['why_field'];
		$name = $_POST['visitor_name'];
		$email = $_POST['email_field'];
		$message = test_input($_POST['message_field']);

		
		switch ($who) {
		    case "media":
		        $recipient = "kieranscott@connect.glos.ac.uk";
		        break;
		    case "web":
		        $recipient = "tiagosilva@connect.glos.ac.uk";
		        break;
		    case "product-design":
		        $recipient = "lukelutman@connect.glos.ac.uk";
		        break;
		    case "web-design":
		        $recipient = "felicialoykowski@connect.glos.ac.uk";
		        break;
		    default:
		        $recipient = "felicialoykowski@connect.glos.ac.uk";
		}

		$emailSubject="Contact from the UoGND website: ";
		switch ($why) {
		    case "query":
		        $emailSubject .= "I have a question";
		        break;
		    case "information":
		        $emailSubject .= "I would like some information";
		        break;
		    case "feedback":
		        $emailSubject .= "I have some feedback";
		        break;
		    case "problem":
		        $emailSubject .= "I have found a problem";
		        break;
		    default:
		        $emailSubject = "Contact from the UoGND website";
		}

		$mailheader = "From: ndContactForm@connect.glos.ac.uk" . "\r\n";
		$messageDetails="Contact from: ".$name
			."\r\nEmail: ".$email
			."\r\nMessage: ".$message;

		$successfulSubmit=mail($recipient, $emailSubject, $messageDetails, $mailheader);

		if(!$successfulSubmit){
			$feedback="Error submitting form. Please try again later.";
		}else{
			$feedback="Thank you for your message!";
			header("location:".$_SERVER['REQUEST_URI']."?feedback=".$feedback);
			exit();
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
?>
