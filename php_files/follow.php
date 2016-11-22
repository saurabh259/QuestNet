<?php
session_start();
$topic=$_GET['id'];
//Connect to mysql server 
$user=$_SESSION['user'];

 $link = mysql_connect('localhost', 'root',''); 

 

 //Check link to the mysql server 

 if(!$link) { 

 die('Failed to connect to server: ' . mysql_error()); 

 } 

 

 //Select database 

 $db = mysql_select_db('questnet'); 

 if(!$db) { 

 die("Unable to select database"); 

 } 
 //Create query 
 
$qry = "INSERT INTO tfollow VALUES ('".$user."' ,".$topic.")";
   echo $qry; 
$results = mysql_query($qry);
      
		
		session_start();  
		header('location:select_topics.php'); 
	
?>