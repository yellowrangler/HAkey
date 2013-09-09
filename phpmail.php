<?php

require("Mail.php"); 

$recipients = "tarrant.cutler@gmail.com"; 

$headers["From"]    = "tarrant.cutler@gmail.com"; 
$headers["To"]      = "tarrant.cutlr@gmail.com"; 
$headers["Subject"] = "Test message"; 

$body = "TEST MESSAGE!!!"; 

$params["host"] = "gmail.com"; 
$params["port"] = "587"; 
$params["auth"] = true; 
$params["username"] = "tcutler.business@gmail.com"; 
$params["password"] = "tarryc02653"; 

// Create the mail object using the Mail::factory method 
// $mail_object =& Mail::factory("smtp", $params); 

// $mail_object->send($recipients, $headers, $body);

?>