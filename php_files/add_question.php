<?php session_start();
include('header.html');
include('searchbox.html');
$_SESSION['uid']=$_SESSION['user'];


?>
<!doctype html>
<html> 
<head> 
<title>Add Question</title> 
<link rel="stylesheet" href="main.css">
<style type="text/css">
table{
    position:absolute;
	left:200px;
	top:200px;
	
}
#txtbox{
	background-color:white;
	padding: 10px;
	 border: 1px solid #F0F0F0;
    -webkit-border-radius:15px;
	-webkit-box-shadow:rgba(110,110,110,.5) 10px 10px 10px ;
	-moz-border-radius:15px;
	-moz-box-shadow:rgba(110,110,110,.5) 10px 10px 10px ;
	font-size:14pt;
	
}
#dbox{
	background-color:#9999FF ;
	width:200px;
	color:white;
	font: 20px Century Gothic;
	padding:10px;
	-webkit-border-radius:15px;
	-moz-border-radius:15px;
}


</style>


</head> 
<body> 
 

 <form name="question" method="post" action="insque.php" enctype="multipart/form-data"> 

 <table width="550" border="0"  cellpadding="20" cellspacing="35" style="border:2px solid #E0E0E0;padding-right:250px; padding-top:120px; -moz-border-radius:25px;
	-moz-box-shadow:rgba(110,110,110,.5) 10px 10px 10px ;-webkit-border-radius:25px;
	-webkit-box-shadow:rgba(110,110,110,.5) 10px 10px 10px ;"> 
	
 <tr> 
 <td><div id="dbox"><b> Question  <strong style="color:#0000CC">*</strong></b></div></td> 
 <td><input name="que" type="text" size="55 " placeholder="Type question here" id="txtbox"/></td> 
 </tr> 
  
 <tr> 
 <td><div id="dbox"><b> Details  </b></div></td> 
 <td><input name="details" type="text" size="55" placeholder="Optional:Provide more details about your question" id="txtbox"/></td> 
 </tr> 

 <tr>
 

<td>	

Photo <input type="file" name="file" />
<input type="submit" name="submit" value="submit" /> 

</td>


</tr>
 </form>
 
 <td colspan="2" align="center">
<br><br><br><br> 
 <input type="submit" name="submit" value="ADD QUESTION" style="-moz-user-select: none;background: #2A49A5;
    border: 1px solid #082783;
    box-shadow: 0 1px #4C6BC7 inset;
    color: white;
	padding: 5px 105px;
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
 
 <tr><td style="font-size:12pt;position:absolute;top:450px;left:670px ;color:blue">FIELDS MARKED WITH * ARE MANDATORY</td></tr>
 </table> 
 
 </form>
</body> 

</html> 