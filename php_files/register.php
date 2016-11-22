<!doctype html>
<html> 
<head> 
<title>Registration Page</title> 
<style type="text/css">
body{
	
   

	 }
#top_header{
position:absolute;
	left:-900px;
	top:0px;
	background-color:#E0E0E0;
     background-size:100% 1000%;
	 background-repeat:no-repeat;

padding:1px 1000px;


}
#o{
	
	position:absolute;
	left:100px;
	top:20px;
   }
#o1{
	position:absolute;
	left:100px;
	top:100px;
   }

#text{
	color:white;
	font: 20px Century Gothic;
    text-shadow:rgb(110,110,110) 5px 5px 10px;
}   
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
</style>

</head> 
<body> 
 
 <header id="top_header">
<a href="Quest_login.php"><img height="50px" src="logo.jpg"/></img></a>
</header>
 <form name="RegForm" method="post" action="validation_check.php"> 

 <table width="550" border="0"  cellpadding="10" cellspacing="5" style="border:2px solid #E0E0E0;padding-right:250px; padding-top:120px; -moz-border-radius:25px;
	-moz-box-shadow:rgba(110,110,110,.5) 10px 10px 10px ;-webkit-border-radius:25px;
	-webkit-box-shadow:rgba(110,110,110,.5) 10px 10px 10px ;"> 
	
 <tr> 
 <td><div id="dbox"><b> Name  <strong style="color:#0000CC">*</strong></b></div></td> 
 <td><input name="name" type="text" size="55 " placeholder="Enter your full name" id="txtbox"/></td> 
 </tr> 
  
 <tr> 
 <td><div id="dbox"><b> Username  <strong style="color:#0000CC">*</strong></b></div></td> 
 <td><input name="username" type="text" size="55" placeholder="Enter username for your account : Login Credential" id="txtbox"/></td> 
 </tr> 

  <tr> 
 <td><div id="dbox"><b> E-mail <strong style="color:#0000CC">*</strong></b></div></td> 
 <td><input name="email" type="text" size="55" placeholder="A notification about this account creation will be sent here" id="txtbox"/></td> 
 </tr>
 
 <tr> 
 <td><div id="dbox"><b> Address </strong></b></div></td> 
 <td><input name="address" type="text" size="55" placeholder="Enter your Residential Address" id="txtbox"/></td> 
 </tr>  
 
 <tr> 
 <td><div id="dbox"><b> Date of Birth <strong style="color:#0000CC">*</strong></b></div></td> 
 <td style="font-size:19pt";>Day<select name = "day">
                            <option></option>
<?php
for($i = 1; $i <= 31; $i++){
                                echo '<option value='.$i.'>'.$i.'</option>';
                            }
?>
                        </select>
<?php
                            $months = array('01'=>'January', '02'=>'February',
                            '03'=>'March', '04'=>'April', '05'=>'May',
                            '06'=>'June', '07'=>'July', '08'=>'August',
                            '09'=>'September','10'=>'October',
                            '11'=>'November','12'=>'December');
                        ?>
                    Month<select name = "month">
                            <option></option>
<?php                            foreach($months as $num => $nm){
                                echo "<option value='$num'>$nm</option>";
                            }
?>
                        </select>
                    Year<select name = "year">
                            <option></option>
<?php
for($i = date('Y')-70; $i <= date('Y')-5; $i++){
                                echo "<option value='$i'>$i</option>";
                            }
?>
                        </select>
                    </td>
                </tr>


 
 
 <tr> 
 <td><div id="dbox"><b>Sex <strong style="color:#0000CC">*</strong></b></div></td> 
 <td style="font-size:19pt;"><input name="sex" type="radio" value="Male" />Male
 <input name="sex" type="radio" value="Female" />Female
 </td> 
 </tr> 
 <tr> 

 <td><div id="dbox"><b>Phone Number </b></div></td> 

 <td><input name="contact" type="text" size="55" placeholder="Enter Your Mobile\Landline Number" id="txtbox"/></td> 

 </tr> 
 <tr> 

 <td><div id="dbox"><b>Country <strong style="color:#0000CC">*</strong></b></div></td> 

 <td><input name="country" type="text" size="55" placeholder="Enter the name of your Residential Country" id="txtbox"/></td> 

 </tr> 
 <tr> 

 <td><div id="dbox"><b>City </b></div></td> 

 <td><input name="city" type="text" size="55" placeholder="Enter the name of your Residential City" id="txtbox"/></td> 

 </tr> 
 <tr> 

 <td><div id="dbox"><b>Education<strong style="color:#0000CC">*</strong> </b></div></td> 

 <td><input name="edu" type="text" size="55" placeholder="Enter name of Institute you are studying/studied in" id="txtbox"/></td> 

 </tr> 
 <tr> 

 <td><div id="dbox"><b>Profession</b></div></td> 

 <td><input name="employ" type="text" size="55" placeholder="Enter name of Organization you are working in" id="txtbox"/></td> 

 </tr>
 <tr> 

 <td><div id="dbox"><b>Write About Yourself</b></div></td> 

 <td><textarea style="width:400px;height:100px" name="about" type="text"  id="txtbox" placeholder="Write about yourself"></textarea></td> 

 </tr>
 <tr>
 <td colspan="2" align="center">
<br><br><br><br> 
 <input type="submit" name="submit" value="CREATE ACCOUNT" style="-moz-user-select: none;background: #2A49A5;
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
 <tr><td style="font-size:12pt;position:absolute;top:1190px;left:670px ;color:blue">FIELDS MARKED WITH * ARE MANDATORY</td></tr>
 </table> 
 
 </form>
</body> 

</html> 