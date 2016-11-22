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

<hgroup>

<h2 style="font:  20px Century Gothic;">Welcome to Questnet! The first step is to let us know what you're interested in.<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Choose any 5 or more TOPICS to continue  </h2>
</hgroup>
<img src="status2.png" style="position:absolute;top:-70px; left:100px"></img>

</section>


<?php
 
    //Start the session to see if the user is authencticated user.
session_start();
//Check if the session variable for user authentication is set, if not redirect to login page.
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){
//Connect to mysql server 
$_SESSION['user']=$_SESSION['USER_ID'];

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
 
$qry = 'SELECT * FROM topic';
    
//Execute query
$result = mysql_query($qry);
        echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
   
    


echo '<table  border="0"  cellpadding="30" cellspacing="70">';
$column=1;  
//Show the rows in the fetched resultset one by one
while ($row = mysql_fetch_assoc($result))
    {        	
				if($column%3==1)
				echo '<tr>';
				
				echo '<td align="center"><h1 style="font:  20px Century Gothic;"> <strong>       
                '.$row['Name'].'<br><span style="color:#2A49A5; font-size:15px">'.$row['Num_follower'].' Followers</span></strong><br></h1>
				<img style="border: 1px solid #889932;
    box-shadow: 0 1px #4C6BC7 inset;
    color: blue;
    padding: 5px 15px;
    text-decoration: none;
    text-shadow: 0 -1px 0 #082783;
    
	-webkit-box-shadow:rgba(110,110,110,.5) 5px 5px 10px ;
	-moz-box-shadow:rgba(110,110,110,.5) 5px 5px 10px ;
	-webkit-border-radius:15px" src="image/'.$row ['timage'].'"width="210" height="205"><br>';
                echo'<br><form name="follow" method="post" action="follow.php?id='.$row["Topic_id"].'">
<input type="submit" value="FOLLOW "style="-moz-user-select: none;background: #2A49A5;
    border: 1px solid #082783;
    box-shadow: 0 1px #4C6BC7 inset;
    color: white;
    padding: 5px 10px;
    text-decoration: none;
    text-shadow: 0 -1px 0 #082783;
    cursor:pointer;
	font:15px bold Century Gothic;
	-webkit-box-shadow:rgba(110,110,110,.5) 5px 5px 10px ;
	-moz-box-shadow:rgba(110,110,110,.5) 5px 5px 10px ;
	-webkit-border-radius:5px
	"></input>
	</form></td>';
	
		if($column%3==0)
				{
					
					echo '</tr>';
				}
				
		$column++;		
				
    }
   }
   else{
        header('location:Quest_login.php');  
        exit();
    }
   
    
?>
<form name="continue" method="post" action="main_page.php">
<input type="submit" value="Save & Continue "style="position:absolute; top:350%; left:45%;-moz-user-select: none;background: #2A49A5;
    border: 1px solid #082783;
    box-shadow: 0 1px #4C6BC7 inset;
    color: white;
    padding: 25px 45px;
    text-decoration: none;
    text-shadow: 0 -1px 0 #082783;
    cursor:pointer;
	font:20px Century Gothic;
	"></input>
	</form>
	
<footer id="the_footer">
Copyright  2013
</footer>



</body>
</html>

