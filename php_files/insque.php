<?php
session_start();
$con=mysql_connect( "localhost","root","");
mysql_select_db ("questnet",$con);
if($_POST ['submit']=='submit')
{
$file = $_FILES ['file'];
$name1 = $file ['name'];
$type = $file ['type'];
$size = $file ['size'];
$tmppath = $file ['tmp_name']; 
if($name1!="")
{
move_uploaded_file ($tmppath, 'que_images/'.$name1);
}
}
if(isset($_POST['que']) && !empty($_POST['que'])) {
	
	mysql_connect("localhost", "root", "") or die(mysql_error()); // Connect to database server(localhost) with username and password.
	mysql_select_db("questnet") or die(mysql_error()); // Select registrations database.
	$time='\''.date("Y-m-d H:i:s",time()).'\'';
	$text=mysql_escape_string($_POST['que']);
	$text = '\''.$text.'\'';
	if(!$_POST['details'])
    $details = 'NULL';
	else{$details=mysql_escape_string($_POST['details']);
	$details='\''.$details.'\'';}
	$id='NULL';
	$user='\''.$_SESSION["user"].'\'';
	$topic=$_SESSION["tid"];
	$name1='\''.$name1.'\'';
	$qry='INSERT INTO question VALUES ('.$id.','.$user.','.$topic.','.$text.','.$time.','.$name1.')';
	//Execute query
	$results = mysql_query($qry);
	
	echo $qry;
            
	//Check if query executes successfully
	if($results == TRUE)
	{
		session_start();  
	
	$_SESSION['tid']=$topic;
	 header('location:topic1.php?tid='.$topic.''); 
	}
                else echo mysql_error() . '<br>';
	}
	
else{
	include('add_question.php'); 

   echo '<h2 style="position:absolute; font-size:15pt; top:230px; left:460px; color:red">Please fill the mandatory(*) fields  !!!<center>'; 

     exit(); 
 
}
?>