<?php
 
    //Start the session to see if the user is authencticated user.
session_start();
include('header.html');
include('searchbox.html');
//Check if the session variable for user authentication is set, if not redirect to login page.
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){
	
	$string=mysql_escape_string($_POST['text']);
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
	 
	 //Selecting TOPICS
	$qry='SELECT * from topic where Name like "%'.$string.'%"';

	//Execute query
	$result = mysql_query($qry);
	echo '<div id="disp">';
	echo '<table  border="0"  cellpadding="15" cellspacing="15">';
	  
	
	
	$count = mysql_num_rows($result);
	if($count==0)
	echo '<br><br><br><br><th style="font-size:25pt;align=center ;"> NO TOPICS FOUND!!<br><br><hr></th> <h1>Search Again</h1>';
	else {
	echo '<br><br><br><br><th style="font-size:25pt">TOPICS FOUND -</th>';
	while ($row = mysql_fetch_assoc($result))
	{
		echo '<tr>';
		echo '<td><li><a href="topic1.php?tid='.$row['Topic_id'].'">'.$row['Name'].'</li></a></td></tr>';
	}
	echo '<tr><td><br><hr></td></tr><br><br>';
	}
	
	echo '</table>';
	//Selecting USERS
	$qry='SELECT * from user where Name like "%'.$string.'%"';

	//Execute query
	$result = mysql_query($qry);
	echo '<table  border="0"  cellpadding="20" cellspacing="20">';
	
	$count = mysql_num_rows($result);
	if($count==0)
	echo '<th style="font-size:25pt;align=center ;"> NO USERS FOUND!!</th>';
	else {
	echo '<th style="font-size:25pt">USERS FOUND -</th>';
	while ($row = mysql_fetch_assoc($result))
	{
		echo '<tr>';
		echo '<td><li style="font-size:15pt"><a href="user.php?tid='.$row['User'].'">'.$row['Name'].'</li></a></td></tr>';
	}
	}
	echo '</table>';
	echo '</div>';
	}
	
	
	?>