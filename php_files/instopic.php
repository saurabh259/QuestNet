<?php
session_start();

if(isset($_POST['name']) && !empty($_POST['name'])) {
	
	mysql_connect("localhost", "root", "") or die(mysql_error()); // Connect to database server(localhost) with username and password.
	mysql_select_db("questnet") or die(mysql_error()); // Select registrations database.
	$about=mysql_escape_string($_POST['about']);
	$name = '\''.$_POST['name'].'\'';
	if(!$_POST['about'])
    $about = 'NULL';
	$about='\''.$about.'\'';
	$id='NULL';
	$admin='\''.$_SESSION["user"].'\'';
	$qry='INSERT INTO topic VALUES ('.$id.','.$name.',0,0,'.$admin.','.$about.',"default.png")';
	//Execute query
	$results = mysql_query($qry);
	$id="select Topic_id from topic where Name=".$name."";
	$run=mysql_query($id);
	$ans=mysql_fetch_assoc($run);
	
	
            
	//Check if query executes successfully
	if($results == TRUE)
	{
		session_start();  
	
	$_SESSION['name']=$_POST['name'];
	$_SESSION['password']=$password_t;
	$_SESSION['username']=$username;
	$_SESSION['tid']=$ans['Topic_id'];
	 header('location:topic1.php');
	}
                else echo mysql_error() . '<br>';
	}

else{
	include('create_topic.php'); 

   echo '<h2 style="position:absolute; font-size:15pt; top:230px; left:460px; color:red">Please fill the mandatory(*) fields  !!!<center>'; 

     exit(); 
 
}