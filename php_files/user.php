
<html lang="en">

<head>
<meta charset="utf-8"/>
<title>WELCOME TO YOUR PROFILE</title>
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

<img  height="50px" width="3335px" style="border: 1px solid #889932;  position:absolute;top:-100px; left:200px"
    box-shadow: 0 1px #4C6BC7 inset;
    color: blue;
    padding: 5px 15px;
    text-decoration: none;
    text-shadow: 0 -1px 0 #082783;
    
	-webkit-box-shadow:rgba(110,110,110,.5) 5px 5px 10px ;
	-moz-box-shadow:rgba(110,110,110,.5) 5px 5px 10px ;
	-webkit-border-radius:15px" src="2.jpg" class="left" alt="Line" />;

<div id="big_wapper">
<header id="top_header">
<a href="Quest_login.php"><img height="50px" src="logo.jpg"/></img></a>
</header>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<form name="form" action="" method="post" enctype="multipart/form-data" style="position:absolute;top:390px;left:250px">
<input type="file" name="file" />
<input type="submit" name="submit" value="Upload" /> 
</form>

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

	
	<input name="submit" type="submit" value="LOG OUT!" action="log_out.php"  style="-moz-user-select: none;
    background: #2A49A5;
	position:absolute;top:60px; left:1200px;
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


<?php //Start the session to see if the user is authencticated user. session_start();<?php //Start the session to see if the user is authencticated user. 


session_start(); 
$user=$_SESSION['user'];
//Check if the session variable for user authentication is set, if not redirect to login page. 

if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1)
{ 
	
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
$qry3= 'SELECT * FROM user where Sex="M" or sex="MALE" and User_id="'.$user.'"';

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
$result3 = mysql_query($qry3);
$result2= mysql_query($qry2);
        echo '<br>';
		

echo '<div id="disp">';
echo '<table  border="0"  cellpadding="30" cellspacing="70">';
  
//Show updates of topics follwed by user

while ($row = mysql_fetch_assoc($result))
    {        	
				
				echo '<tr>';
				
                	
    }
	echo'</table>';
	
	

$count=mysql_num_rows($result3);
if ($count==0)

{echo 	 '<img  height="150px" width="145px" style="border: 1px solid #889932;  position:absolute;top:-100px; left:-10px"
    box-shadow: 0 1px #4C6BC7 inset;
    color: blue;
    padding: 5px 15px;
    text-decoration: none;
    text-shadow: 0 -1px 0 #082783;
    
	-webkit-box-shadow:rgba(110,110,110,.5) 5px 5px 10px ;
	-moz-box-shadow:rgba(110,110,110,.5) 5px 5px 10px ;
	-webkit-border-radius:15px" src="image/feMale.jpg" class="left" alt="Profile pic" />';
    

	}
else{
echo '<img  height="150px" width="145px" style="border: 1px solid #889932;  position:absolute;top:-100px; left:-10px"
    box-shadow: 0 1px #4C6BC7 inset;
    color: blue;
    padding: 5px 15px;
    text-decoration: none;
    text-shadow: 0 -1px 0 #082783;
    
	-webkit-box-shadow:rgba(110,110,110,.5) 5px 5px 10px ;
	-moz-box-shadow:rgba(110,110,110,.5) 5px 5px 10px ;
	-webkit-border-radius:15px" src="image/male.jpg" class="left" alt="Profile pic" />';
}
	//Show updates of user being followed by current user
	
	if($result2!=NULL)
	
	{echo '<table  border="0"  cellpadding="30" cellspacing="70">';
	echo '<th><h1 >RECENT USER UPDATES</h1></th>';
echo'
<p style="position:absolute;top:100px; left:0px; color:grey;font-size:18px;">
					<b><a href="#">Name, </a></b><b><a href="#">Employment, </a></b><b><a href="#">City</a></b>
<hr width=190% align="left" size="2" style="position:absolute;top:180px; left:0px;">
			<section id="main_section" >



		<div class="contentarea">
						<div class="details" style="position:absolute;top:-270px; left:-100px; color:grey;font-size:24px;"><u><b> USERS PROFILE </b></u><p/> <a href="#"></a> </div>	
		</div>
	
	<h1 style="position:absolute;top:-245px; left:10px; color:blue;font-size:12px;"> <a href="#"> Edit Profile</a>
</a>			</section>
		
style="position:absolute;top:370px; left:50px;">	
	<p/> <p/>

<p style="position:absolute;top:200px; left:0px; color:grey;font-size:18px;">
					<b><a href="#">Following</a></b> 
<p style="position:absolute;top:330px; left:0px; color:grey;font-size:18px;">
					<b><a href="#">Topics</a></b>
<p style="position:absolute;top:460px; left:0px; color:grey;font-size:18px;">
					<b><a href="#">Profile</a></b>';

	while ($row = mysql_fetch_assoc($result2))
    {        	
				
				echo '<tr>';
				
				echo '<td><h4 style="color:gray">Activity registered on '.$row['timest'].'</h4><h1 style="font:  15px Century Gothic;">
				<img style="border: 1px solid #889932;-webkit-border-radius:15px" src="user_image/'.$row ['auimage'].'"width="35" height="35">
				<a href="user.php?uid='.$row["User_id"].'">'.$row['user2'].'</a>
				'.$row['activity'].' : <strong>'.$row['result'].'</strong>
				<img style="border: 1px solid #889932;-webkit-border-radius:15px" src="updates_images/'.$row ['image_act'].'"width="35" height="35"></td></tr>';
    
    }
	echo '</table>';

if(@$_POST ['submit'])
{
$file = $_FILES ['file'];
$name1 = $file ['name'];
$type = $file ['type'];
$size = $file ['size'];
$tmppath = $file ['tmp_name']; 
if($name1!="")
{
if(move_uploaded_file ($tmppath, 'image/'.$name1))//image is a folder in which you will save image
{
$query="insert into user set uimage='.$name1.'";
mysql_query ($query) or die ('could not updated:'.mysql_error());
echo "Your image upload successfully !!";
}
}
}
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