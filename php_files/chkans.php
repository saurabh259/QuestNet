<?php
//Start the session to see if the user is authenticated user.
session_start();
//Check if the user is authenticated first. Or else redirect to login page
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){
    
    
// Code to be executed when 'Submit' is clicked.
if ($_GET['submit'] == 'SUBMIT  ANSWER'){        
        
//Check all the required fields are filled
if(!($_GET['about'] )){
            header('location:topic.php');
        }
else{
            $about = $_GET['about'];
            $user = '\''.$_SESSION['user'].'\'';
            $tid = '\''.$_GET['tid'].'\'';
			$qid = '\''.$_GET['qid'].'\'';            
		}           
            //Connect to mysql server
$link = mysql_connect('localhost', 'root', '');
            //Check link to the mysql server
if(!$link){
                die('Failed to connect to server: ' . mysql_error());
            }
//Select database
$db = mysql_select_db('questnet');
            if(!$db){
                die("Unable to select database");
            }
			$id=2;      //change it
//Create Insert query
$query = 'INSERT INTO `answer`(Answer_id,User_id,Topic_id,Ques_id,Ans_text) 
                        VALUES 
('.$id.','.$user.','.$tid.','.$qid.',"'.$about.'")';
            echo($query);
//Execute query
$results = mysql_query($query);
            
//Check if query executes successfully
if($results == FALSE)
                echo mysql_error() . '<br>';
          //  else
			//header('location:topic.php');
        }        
    }
// Code to be executed when 'view ans' is clicked.
if ($_GET['submit'] == 'VIEW  ALL  ANSWERS'){        
        
            $user = '\''.$_SESSION['user'].'\'';
            $tid = '\''.$_GET['tid'].'\'';
			$qid = '\''.$_GET['qid'].'\'';                       
                  
            //Connect to mysql server
$link = mysql_connect('localhost', 'root', '');
            //Check link to the mysql server
if(!$link){
                die('Failed to connect to server: ' . mysql_error());
            }
//Select database
$db = mysql_select_db('questnet');
            if(!$db){
                die("Unable to select database");
            }
//select query
$query = 'SELECT Name,Ans_text FROM `answer`,user
		  WHERE user.User_id='.$user.' and Topic_id='.$tid.' and Ques_id='.$qid.' and user.User_id=answer.User_id';
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
	position:absolute;
	top:470px; left:50px;
	-moz-box-shadow:rgba(110,110,110,.5) 10px 10px 10px ;
	font-size:14pt;	
	}
	</style>';            
//Execute query
$results = mysql_query($query);
$count=mysql_num_rows($results);
$qry= 'SELECT timage,Name,About FROM topic where Topic_id='.$tid.'';   
//Execute query
$result = mysql_query($qry);
while ($row = mysql_fetch_assoc($result))
if($count==0)
{
  echo '<img style="border: 1px solid #889932;
    box-shadow: 0 1px #4C6BC7 inset;
    color: blue;
    padding: 5px 15px;
    text-decoration: none;
    text-shadow: 0 -1px 0 #082783;
    position:absolute; top:120px;left:50px;
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
	<div id="txtibox" align="center">
	No Stories, Yet...
	This feed will show you the best content on this topic. You can start contributing by adding a question, writing a post, or requesting reviews.</div>
	';
}
else
{
  echo '<img style="border: 1px solid #889932;
    box-shadow: 0 1px #4C6BC7 inset;
    color: blue;
    padding: 5px 15px;
    text-decoration: none;
    text-shadow: 0 -1px 0 #082783;
    position:absolute; top:120px;left:50px;
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
	 $qry= 'SELECT * FROM question,user where Question_id='.$qid.' and user.User_id=question.User_id';
   
//Execute query
$result = mysql_query($qry);
        echo '<br><br><br><br><br><br><br><br><br>';
		
		
		echo '<div id="disp">';
echo '<table  border="0"  cellpadding="30" cellspacing="70">';
  
//Show the rows in the fetched resultset one by one
while ($row = mysql_fetch_assoc($result))
    {        				
				echo '<tr>';
				echo '<form method="GET" action="">';
				echo '<td><h4 style="color:gray">Question added on '.$row['timest'].'</h4>
				<br><img src="que_images/'.$row ['qimage'].'"width="150" height="150">
				&nbsp;&nbsp;&nbsp;
				<h1 style="font:  25px Century Gothic;"> 
				<b><strong>'.$row['Ques_text'].'</b></strong></h1>
				</form>
				<br><br>
				Question asked by <a href="user.php?uid='.$row["User_id"].'">'.$row['Name'].'</a><hr>
				<br></td></tr>';	
    }

	$qury='SELECT Ans_text,atimest,Name,user.User_id,uimage FROM answer,user WHERE Ques_id='.$qid.' and answer.User_id=user.User_id order by atimest';
$result2 = mysql_query($qury);
while ($row = mysql_fetch_assoc($result2))
	{        	
				
				echo '<tr>';
				
				echo '
				<form method="GET" action="">';
				echo '
				<td><h4 style="color:gray">Answer added on '.$row['atimest'].'</h4>
				<br><img src="user_image/'.$row ['uimage'].'"width="80" height="80">
				<h1 style="font:  32px Century Gothic;position:relative;top:-60px;left:100px">
				<b><strong><em>'.$row['Ans_text'].'</em></b></strong></h1>
				</form>
				<br><br>
				This Question Answered by <a href="user.php?uid='.$row["User_id"].'"><h3>'.$row['Name'].'</h3></a><hr>
				<br></td></tr>';
                	
    }

   

}
}
	
//Check if query executes successfully
/*if($results == FALSE)
                echo mysql_error() . '<br>';*/
          //  else
			//header('location:topic.php');
                
    
