<?php
session_start();

$email = $_GET['email_dropdown'];
$emailSubject = $_GET['email_subject'];
$message = $_GET['email_message'];

$formcontent="Message: $message";
$recipient = "$email";
$subject = "$emailSubject";
$mailheader = "From: ndContactForm@connect.glos.ac.uk" . "\r\n";

mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
header('Location: Contact_Us.php');
?>
