<?php //Start the session to see if the user is authencticated user. session_start();<?php //Start the session to see if the user is authencticated user. 
session_start(); 
$topic=$_GET['tid'];
$user=$_SESSION['user'];
//Check if the session variable for user authentication is set, if not redirect to login page. 
		
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1)
{   
require('header.html');require('searchbox.html');
	echo '<br><br><br><br><br><br>';
	echo '<style type="text/css">
	#txtibox{
	background-color:white;
	padding: 10px;
	 border: 10px solid #F0F0F0;
    -webkit-border-radius:15px;
	-webkit-box-shadow:rgba(110,110,110,.5) 10px 10px 10px ;
	-moz-border-radius:15px;
	-moz-box-shadow:rgba(110,110,110,.5) 10px 10px 10px ;
	font-size:14pt;	
	}
	</style>';
	
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
 
$qry= 'SELECT timage,Name,About FROM topic where Topic_id='.$topic.'';
   
//Execute query
$result = mysql_query($qry);
while ($row = mysql_fetch_assoc($result))

 echo '<img style="border: 1px solid #889932;
    box-shadow: 0 1px #4C6BC7 inset;
    color: blue;
    padding: 5px 15px;
    text-decoration: none;
    text-shadow: 0 -1px 0 #082783;
    position:absolute; left:50px; top:100px;
	-webkit-box-shadow:rgba(110,110,110,.5) 5px 5px 10px ;
	-moz-box-shadow:rgba(110,110,110,.5) 5px 5px 10px ;
	-webkit-border-radius:15px" src="image/'.$row ['timage'].'"width="210" height="205">
	<h1 style="position:absolute; top:170px; left:320px; color:blue">'.$row['Name'].'</h1>
	<h3 style="position:absolute; top:230px; left:320px;"><em>'.$row['About'].'</em></h1>
	<input type="submit" value="FOLLOW "style="-moz-user-select: none;background: #2A49A5;
    border: 1px solid #082783;
    box-shadow: 0 1px #4C6BC7 inset;
    color: white;
	position:absolute; top:200px; left:820px;
    padding: 5px 10px;
    text-decoration: none;
    text-shadow: 0 -1px 0 #082783;
    cursor:pointer;
	font:15px bold Century Gothic;
	-webkit-box-shadow:rgba(110,110,110,.5) 5px 5px 10px ;
	-moz-box-shadow:rgba(110,110,110,.5) 5px 5px 10px ;
	-webkit-border-radius:5px
	"></input>
	<input type="submit" value="ADD  QUESTION" action="add_question.php" style="-moz-user-select: none;background: #2A49A5;
	border: 1px solid #082783;
    box-shadow: 0 1px #4C6BC7 inset;
    color: white;
	position:absolute; top:200px; left:950px;
    padding: 5px 10px;
    text-decoration: none;
    text-shadow: 0 -1px 0 #082783;
    cursor:pointer;
	font:15px bold Century Gothic;
	-webkit-box-shadow:rgba(110,110,110,.5) 5px 5px 10px ;
	-moz-box-shadow:rgba(110,110,110,.5) 5px 5px 10px ;
	-webkit-border-radius:5px
	"></input>
	<input type="submit" value="ADD  POST"style="-moz-user-select: none;background: #2A49A5;
    border: 1px solid #082783;
    box-shadow: 0 1px #4C6BC7 inset;
    color: white;
	position:absolute; top:200px; left:1130px;
    padding: 5px 10px;
    text-decoration: none;
    text-shadow: 0 -1px 0 #082783;
    cursor:pointer;
	font:15px bold Century Gothic;
	-webkit-box-shadow:rgba(110,110,110,.5) 5px 5px 10px ;
	-moz-box-shadow:rgba(110,110,110,.5) 5px 5px 10px ;
	-webkit-border-radius:5px
	"></input>
	';

$qry = 'SELECT * FROM question,user where question.Topic_id='.$topic.' and user.User_id=question.User_id order by timest ';
 $result = mysql_query($qry);
 $count=mysql_num_rows($result);
if($count==0)
{
echo '<div id="txtibox" align="center">
	No Questions, Yet...
	This feed will show you the best content on this topic. You can start contributing by adding a question, writing a post, or requesting reviews.</div>
	';
}
else
{ 
//Show the rows in the fetched resultset one by one
				echo '<table style="position:absolute;top:400px;left:50px;">';
while ($row = mysql_fetch_assoc($result))
	{        
				echo '<tr>';
				echo '
				<form method="GET" action="chkans.php">';
				$r=$row['Question_id'];
				echo '	
				<td><h4 style="color:gray">Question added on '.$row['timest'].'</h4><h1 style="font:  15px Century Gothic;"> 
				<b><strong>'.$row['Ques_text'].'</b></strong></h1>
				<br><img src="que_images/'.$row ['qimage'].'"width="150" height="150"/>
				&nbsp;&nbsp;&nbsp;
				<textarea style="width:600px;height:150px" name="about" type="text"  id="txtibox" placeholder="Add Your Answer"></textarea><br><br>
				<input type="submit" name="submit" value="SUBMIT  ANSWER"style="-moz-user-select: none;background: #2A49A5;
				border: 1px solid #082783;
				box-shadow: 0 1px #4C6BC7 inset;
				color: white;
				position:relative; left:180px;
				padding: 5px 10px;
				text-decoration: none;
				text-shadow: 0 -1px 0 #082783;
				cursor:pointer;
				font:15px bold Century Gothic;
				-webkit-box-shadow:rgba(110,110,110,.5) 5px 5px 10px ;
				-moz-box-shadow:rgba(110,110,110,.5) 5px 5px 10px ;
				-webkit-border-radius:5px";
				></input>
				<input type="hidden" name="tid" value="'.$topic.'">
				<input type="hidden" name="qid" value="'.$r.'">
				<input type="submit" name="submit" value="VIEW  ALL  ANSWERS"style="-moz-user-select: none;background: #2A49A5;
				border: 1px solid #082783;
				box-shadow: 0 1px #4C6BC7 inset;
				color: white;
				position:relative; left:420px;
				padding: 5px 10px;
				text-decoration: none;
				text-shadow: 0 -1px 0 #082783;
				cursor:pointer;
				font:15px bold Century Gothic;
				-webkit-box-shadow:rgba(110,110,110,.5) 5px 5px 10px ;
				-moz-box-shadow:rgba(110,110,110,.5) 5px 5px 10px ;
				-webkit-border-radius:5px
				"
				></input></form>
				<br><br>
				Question asked by <a href="user.php?uid='.$row["User_id"].'">'.$row['User_id'].'</a><hr>
				<br><br><br><br><br><br></td></tr>';
                	
    }

   }}
   

else
{
 header('location:index.php');
 exit(); 
} ?>