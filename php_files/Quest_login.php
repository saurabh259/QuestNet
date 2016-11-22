
<?php 

session_start(); 

session_unset(); 

session_destroy(); 

?>
<!DOCTYPE html>
<head>
	<title>	Questnet </title>
	

	<style type="text/css">
			
			body{
				background-image:url('back.jpg');
				background-size: 730px 700px;
				background-repeat:no-repeat;
			}
			
			#logo{ 
				position:absolute;
				top:150px;
				left:30px;
			}
			
			#text{
			color:white;
			position:absolute;
			top:238px;
			left:60px;
			}
			form{
			color:black;
			position:absolute;
			top:0px;
			left:750px;
			}
			
			#signup{
			position:absolute;
			top:520px;
			left:200px;
			font-size:25pt;
			}
			a:link{color:black;}
			a:visited{color:black;}
			
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
	<div id="text"><h2><em>YOUR BEST SOURCE FOR KNOWLEDGE </em></h2></div>
	<div id="logo"><img src="logo.jpg" width="300px"></img></div>
	<img src="earth.png" style="position:absolute;top:520px; left:290px;"></img>
	

	<form name="login" method="post" action="login_check.php">
			
			<h1 style="color:#0055ed; text-shadow: 0 0 0.2em #87F, 0 0 0.2em #87F;font-size:35pt">Log In <hr></h1>
			<br>
			<h3>&nbsp;&nbsp;&nbsp;Username:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password:<br>
			<input  name="login" style="height:25px; 400px; font-size:12pt;" type="text"  placeholder="Enter Username" id="txtbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input style="height:25px; font-size:12pt" name="password" type="password" value="" placeholder="Enter Password" id="txtbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="submit" type="submit" value="Log In"  style="-moz-user-select: none;
    background: #2A49A5;
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
			 
			 <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="recover.php">Forgot Password?</a>
			</h4>
			<br>
			<br>&nbsp <h1 style="color:#0055bb;text-shadow: 0 0 .2em #87F, 0 0 0.2em #87F,0 0 0.2em #87F ;font-size:30pt">New to QuestNet ?<hr></h1>
			<p> <strong style="font-size:12pt;">Its FREE and takes only a minute to get access to 
			<ul style="font-size:20pt;">
			<li>Our Experts</li>
			<li>Other Users</li>
			<li>Realtime answers in no time</li>
			<li>And more....</li>
			</p>
			<div id="signup"> <br><u><strong><a href="register.php"><img style="position:absolute;top:-40px ; left:120px;" src="sign_up.jpg" width="120px" height="120px"></img></u></strong></a> </h2></div>
			 
	</form>
    

	
</body>

<?php
?>