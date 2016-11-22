
<html lang="en">

<head>
<meta charset="utf-8"/>
<title>Registration!</title>
<link rel="stylesheet" href="main.css">
<style>
#txtbox{
			background-color:white;
			padding: 5px;
			 border: 1px solid #F0F0F0;
			-webkit-border-radius:15px;
			-webkit-box-shadow:rgba(110,110,110,.5) 10px 10px 10px ;
			-moz-border-radius:15px;
			-moz-box-shadow:rgba(110,110,110,.5) 10px 10px 10px ;
			font-size:14pt;
	
}
</style>
</head>

<body>
<div id="big_wapper">
<header id="top_header">
<a href="Quest_login.php"><img height="50px" src="logo.jpg"/></img></a>
</header>

<form style="position:absolute;top:10px;left:500px" name="search" action="search_results.php" method="post">
<input name="login" style="height:35px; width:500px; font-size:12pt;" type="text"   placeholder="Search here for Users and Topics you want to follow!" id="txtbox"></input>
<input name="submit" type="submit" value="Search!"  style="-moz-user-select: none;
    background: #2A49A5;
	position:relative ; left:50px ;
    border: 1px solid #082783;
    box-shadow: 0 1px #4C6BC7 inset;
    color: white;
    padding: 5px 15px;
    text-decoration: none;
    text-shadow: 0 -1px 0 #082783;
    cursor:pointer;
	-webkit-box-shadow:rgba(110,110,110,.5) 5px 5px 10px ;
	-moz-box-shadow:rgba(110,110,110,.5) 5px 5px 10px ;
	-webkit-border-radius:5px;
	">
</form>
<?php //Start the session to see if the user is authencticated user. session_start();<?php //Start the session to see if the user is authencticated user. 


session_start(); 
$user=$_SESSION['user'];
//Check if the session variable for user authentication is set, if not redirect to login page. 

if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1)
{ 
	echo '<a href="log_out.php">Log Out </a> </br></br></br>';
	
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
 
$qry = 'SELECT * FROM topic ,tfollow ,question where topic.topic_id=topic and question.Topic_id=topic.topic_id and user="'.$user.'" order by timest desc';
$qry2='SELECT user2, activity, timest,auimage,
CASE 
WHEN ques IS NOT NULL 
THEN (
SELECT Ques_text
FROM question
WHERE ques = Question_id
)

when topic is not null
then (
SELECT name
FROM topic
WHERE topic = Topic_id
)

when userf is not null
then (
SELECT name
FROM user
WHERE userf = User_id
) END AS result,
CASE 
WHEN ques IS NOT NULL 
THEN (
SELECT qimage as image_act
FROM question
WHERE ques = Question_id
)

when topic is not null
then (
SELECT timage as image_act
FROM topic
WHERE topic = Topic_id
)

when userf is not null
then (
SELECT uimage as image_act
FROM user
WHERE userf = User_id
)

END AS image_act

FROM activity,ufollow where user=user2 and user1="'.$user.'" order by timest desc';
//Execute query
	
$result = mysql_query($qry);
$result2= mysql_query($qry2);
        echo '<br>';
		

echo '<div id="disp">';
echo '<table  border="0"  cellpadding="30" cellspacing="70">';
  
//Show updates of topics follwed by user
echo '<th><h1>RECENT TOPIC UPDATES</h1></th>';
while ($row = mysql_fetch_assoc($result))
    {        	
				
				echo '<tr>';
				
				echo '<td><h4 style="color:gray">Question added on '.$row['timest'].' under <a href="topic1.php?tid='.$row['Topic_id'].'">'.$row['Name'].'</a> topic</h4><h1 style="font:  15px Century Gothic;"> 
				<a href="topic.php?tid='.$row["Topic_id"].'&qid='.$row['Question_id'].'"><img style="border: 1px solid #889932;-webkit-border-radius:15px" src="image/'.$row ['timage'].'"width="70" height="70"><strong>       
                '.$row['Ques_text'].'</a></strong></h1><br><img src="que_images/'.$row ['qimage'].'"width="150" height="150"> Question asked by <a href="user.php?uid='.$row["User_id"].'">'.$row['User_id'].'</a><hr>
				</td></tr>';
                	
    }
	echo'</table>';
	
	//Show updates of user being followed by current user
	
	if($result2!=NULL)
	{echo '<table  border="0"  cellpadding="30" cellspacing="70">';
	echo '<th><h1>RECENT USER UPDATES</h1></th>';
	while ($row = mysql_fetch_assoc($result2))
    {        	
				
				echo '<tr>';
				
				echo '<td><h4 style="color:gray">Activity registered on '.$row['timest'].'</h4><h1 style="font:  15px Century Gothic;">
				<img style="border: 1px solid #889932;-webkit-border-radius:15px" src="user_image/'.$row ['auimage'].'"width="70" height="70">
				<a href="user.php?uid='.$row["User_id"].'">'.$row['user2'].'</a>
				'.$row['activity'].' : <strong>'.$row['result'].'</strong>
				<img style="border: 1px solid #889932;-webkit-border-radius:15px" src="updates_images/'.$row ['image_act'].'"width="55" height="55"></td></tr>';
                
    }
	echo '</table>';
	}
	
}
 

else
{
 header('location:index.php');
 exit(); 
} ?>
</div>
</body>
</html>