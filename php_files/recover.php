	<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Recover!</title>
<style type="text/css">
*{
margin:0px;
padding:0px;
}
h1{
font: bold 20px Tahoma;
}
h2{
font: bold 14px Tahoma;
}
header, section, footer, aside, nav, article, hgroup{
display:block;
}
body{
width:100%;
display: -webkit-box;
-webkit-box-pack: center;
}
#big_wrapper{
max-width: 1000px;
margin: 20px 0px;
display:-webkit-box;
-webkit-box-orient: vertical;
-webkit-box-flex: 1;
}
#top_header{
position:absolute;
	left:-900px;
	top:0px;
	background-color:#E0E0E0;
     background-size:100% 1000%;
	 background-repeat:no-repeat;
padding:1px 1000px;
-webkit-box-shadow:rgba(110,110,110,.5) 10px 10px 10px ;
}
#top_menu{
border:red;
background:blue;
color:white;
}
#top_menu li{
display:inline-block;
list-style:none;
padding: 5px;
font: bold 14px Tahoma;
}
#new_div{
display:-webkit-box;
-webkit-box-orient:horizontal;
}
#main_section{
position:absolute;
top:150px;
left:350px;
}
#dbox{
	background-color:#9999FF ;
	width:250px;
	color:white;
	font: 20px Century Gothic;
	padding:10px;
	-webkit-border-radius:15px;
	-moz-border-radius:15px;
	
}
#txtbox{
	background-color:white;
	padding: 10px;
	border:1px solid gray;
    -webkit-border-radius:15px;
	-webkit-box-shadow:rgba(110,110,110,.5) 10px 10px 10px ;
	-moz-border-radius:25px;
	-moz-box-shadow:rgba(110,110,110,.5) 10px 10px 10px ;
	font-size:14pt;
}
</style>
</head>

<body>
<div id="big_wapper">
<header id="top_header">
<a href="Quest_login.php"><img height="50px" src="logo.jpg"/></a>
</header></div>
<div id="main_section">
<form name="RegForm" method="post" action="validation_check_r.php"> 
<table width="150" border="0"  cellpadding="20" cellspacing="20" style="border:2px solid #E0E0E0;padding-right:10px; padding-top:10px;padding-bottom:10px;-moz-border-radius:25px;
	-moz-box-shadow:rgba(110,110,110,.5) 10px 10px 10px ;-webkit-border-radius:25px;
	-webkit-box-shadow:rgba(110,110,110,.5) 10px 10px 10px ;" align="center">
<tr>
 <td colspan="2" align="center"><div id="dbox"><b>ACCOUNT&nbsp;&nbsp;&nbsp;RECOVERY<b></div><br><br></td></tr>
	<tr> 
 <td><img width="100px" height="70px" src="email.jpg"/></td> 
 <td><input name="username" type="text" size="55" placeholder="Enter username for your account : Login Credential" id="txtbox"/></td>
 </tr>
<tr>
 <td colspan="2" align="center">
<br><br>
 <input type="submit" name="submit" value="RECOVER   PASSWORD" style="-moz-user-select: none;background: #2A49A5;
    border: 1px solid #082783;
    box-shadow: 0 1px #4C6BC7 inset;
    color: white;
	padding: 5px 45px;
    text-decoration: none;
    text-shadow: 0 -1px 0 #082783;
    cursor:pointer;
	border:1px solid black;
    -webkit-border-radius:5px;
	-webkit-box-shadow:rgba(110,110,110,.5) 10px 10px 10px ;
	-moz-border-radius:5px;
	-moz-box-shadow:rgba(110,110,110,.5) 10px 10px 10px ;
	font:20px Century Gothic;"/></td> 
 </tr> 
  </table>
</div>
</body>