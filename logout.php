<?php
//Tiago

session_start();
if(session_destroy())
{
header("Location: uognd-cms-login.php");
}
 
?>