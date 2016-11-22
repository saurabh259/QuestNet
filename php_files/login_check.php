<?php 

 if ($_POST['submit'] == 'Log In'){ 

 //Collect POST values 

 $login = $_POST['login']; 

 $password = $_POST['password']; 

 if($login && $password){ 

 //Connect to mysql server 
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
 $qry="SELECT * FROM user WHERE User_id = '".$login."' AND Password = md5(".$password.")";

 //Execute query 
 $result=mysql_query($qry); 

 //Check whether the query was successful or not 
 if($result){ 
 $count = mysql_num_rows($result); 
 } 

 else{ 

 //Login failed 
 
 include('Quest_login.php'); 

 echo '<center style="position:absolute;top:290px;left:100px;color:red; font-size:15pt;"><strong>Incorrect username or password !!!</strong></center>'; 
 

 exit(); 

 } 

 

 //if query was successful it should fetch 1 matching record from the table. 

 if( $count >0){ 

 //Check if account is activated or not

 //Create query 
 $qry="SELECT * FROM user WHERE User_id = '".$login."' AND Activate=1";
 
 if(mysql_num_rows(mysql_query($qry))>0){
 session_start(); 

 $_SESSION['IS_AUTHENTICATED'] = 1; 

 $_SESSION['USER_ID'] = $login; 

 header('location:select_topics.php');
}
else { 

	$qry="SELECT * FROM user WHERE User_id = '".$login."' AND Activate=0";
    if(mysql_num_rows(mysql_query($qry))==0){
	session_start();
	$_SESSION['IS_AUTHENTICATED'] = 1; 
	$_SESSION['USER_ID'] = $login; 
	header('location:main_page.php');
	}
	else{
	include('Quest_login.php'); 
 
	echo '<center style="position:absolute;top:290px;left:100px; color:red; font-size:15pt;"><strong>Please Activate your  account first<br> CHECK YOU MAILBOX !!!</strong></center>'; 
 

	exit(); 
	}
  
  

 } 
 }
 else{ 

 //Login failed 


 include('Quest_login.php'); 
 
 echo '<center style="position:absolute;top:290px;left:100px; color:red; font-size:15pt;"><strong>Incorrect username or password !!!</strong></center>'; 
 

 exit(); 

 } 

 

 } 

 else{ 

 include('Quest_login.php'); 

 echo '<center style="position:absolute;top:290px;left:100px; color:red; font-size:15pt;"><strong>Username or Password missing!!!</strong></center>'; 

 exit(); 

 } 

 } 

 else{ 

 header("location: Quest_login.php"); 

 exit(); 

 } 

?> 

 

 


