<!doctype html>

<html lang="en">

<head>
<meta charset="utf-8"/>
<title>Registration!</title>
<link rel="stylesheet" href="main.css">
<style>
#m
{
	position:absolute;
	top:60px;left:120px;
}
</style>
</head>
<body>
<div id="big_wapper">
<header id="top_header">
<a href="Quest_login.php"><img height="50px" src="logo.jpg"/></a>
</header>

<?php
session_start();
$i=0;

$to = $_SESSION['email'];
$len=strlen($to);
$pos=strpos($to,'@');
$str=substr_replace($to,"",0,$pos+1);
$password=$_SESSION['password'];
$name=$_SESSION['username'];

echo '<div id="m"><img  src="mailse.png"/></div>
<br><br><br><br><br><br><br><br><br><h1 align="center">AN ACCOUNT ACTIVATION  LINK HAS BEEN SENT TO '.$to.'</h1><br><br>
<br><br><br><h1 align="center">CLICK <a href="http://'.$str.'"><img align="center" height="50px" width="50px" src="mail2.jpg"/> </a> TO GO TO <i><b>'.$str.'</b> </i></h1>';

$subject="QUESTNET Account Recovery Password";
$message = ' 
  
Your account password has been altered, you can login with the following credentials after you have recovered your account by pressing the url below. 
 
------------------------ 
Username: '.$name.' 
Password: '.$password.' 
------------------------ 
 You can change your password anytime you want after login
Please click this link and enter your new password to recover your account: 
 
http://localhost/~saurabh/QuestNet/Quest_login.php
 
'; // Our message above including the link  
                      
$headers = 'From:noreply@questnet.com' . "\r\n"; // Set from headers  
mail($to, $subject, $message, $headers); // Send our email

?>
</body>
</html>