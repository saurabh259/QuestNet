<!doctype html>

<html lang="en">

<head>
<meta charset="utf-8"/>
<title>Registration!</title>
<link rel="stylesheet" href="main.css">
</head>

<body>
<div id="big_wapper">
<header id="top_header">
<a href="Quest_login.php"><img height="50px" src="logo.jpg"/></img></a>
</header>



<section id="main_section" >
<article>
<header>
</header>

<?php
			mysql_connect("localhost", "root", "") or die(mysql_error()); // Connect to database server with username and password.  
            mysql_select_db("questnet") or die(mysql_error()); // Select registration database.  
			
			if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){  
			// Verify data  
			$email = mysql_escape_string($_GET['email']); // Set email variable  
			$hash = mysql_escape_string($_GET['hash']); // Set hash variable  
			
			$search = mysql_query("SELECT Email, Hash, Activate FROM user WHERE email='".$email."' AND hash='".$hash."' AND Activate=0") or die(mysql_error());   
			$match  = mysql_num_rows($search);  
			  
			if($match>0){
			mysql_query("UPDATE user SET Activate='1' WHERE email='".$email."' AND hash='".$hash."' AND Activate='0'") or die(mysql_error());  
			echo '<br><br><br>Congratulations!! Your account has been activated. Click NEXT button to continue'; 
			echo '<a href="select_topics.php"><input type="submit" name="submit" value="NEXT" style=" position:absolute;top:200px; left:300px;-moz-user-select: none;background: #2A49A5;
    border: 1px solid #082783;
    box-shadow: 0 1px #4C6BC7 inset;
	color: white;
	padding: 5px 50px;
    text-decoration: none;
    text-shadow: 0 -1px 0 #082783;
    cursor:pointer;
	border:1px solid black;
    -webkit-border-radius:5px;
	-webkit-box-shadow:rgba(110,110,110,.5) 10px 10px 10px ;
	-moz-border-radius:5px;
	-moz-box-shadow:rgba(110,110,110,.5) 10px 10px 10px ;
	font:20px Century Gothic;"/></a> '
	;
			}	
			
			else{  
			// Invalid approach
			echo '<br><br><br><br><br><br>The url is either invalid or you already have activated your account.';
			echo '<a href="Quest_login.php"><input type="submit" name="submit" value="GO BACK!!" style=" position:absolute;top:200px; left:300px;-moz-user-select: none;background: #2A49A5;
    border: 1px solid #082783;
    box-shadow: 0 1px #4C6BC7 inset;
	
    color: white;
	padding: 5px 50px;
    text-decoration: none;
    text-shadow: 0 -1px 0 #082783;
    cursor:pointer;
	border:1px solid black;
    -webkit-border-radius:5px;
	-webkit-box-shadow:rgba(110,110,110,.5) 10px 10px 10px ;
	-moz-border-radius:5px;
	-moz-box-shadow:rgba(110,110,110,.5) 10px 10px 10px ;
	font:20px Century Gothic;"/></a> ';
			}
			}
?>