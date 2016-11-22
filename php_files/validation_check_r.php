<?php 
 
 if ($_POST['submit'] == 'RECOVER   PASSWORD'){ 

 //Collect POST values 
  
$username='\''.$_POST['username'].'\'';
 
if(isset($_POST['username']) && !empty($_POST['username'])){  
     
	mysql_connect("localhost", "root", "") or die(mysql_error()); // Connect to database server(localhost) with username and password.
		mysql_select_db("questnet") or die(mysql_error()); // Select registrations database.
		
		$email='SELECT Email FROM user WHERE User_id='.$username.'';
	//Execute query
	$resulte = mysql_query($email);
	$count=mysql_num_rows($resulte);
		if($count==0)
		{
		include('recover.php'); 
   echo '<h1 style="position:absolute; top:530px; left:520px; color:red">This Username Does not exists !!!</h1>'; 
     exit(); 
	
	}
	else {
	mysql_connect("localhost", "root", "") or die(mysql_error()); // Connect to database server(localhost) with username and password.
	mysql_select_db("questnet") or die(mysql_error()); // Select recover database.
	$password_t=rand(10000,1000000);
	$password='\''.md5($password_t).'\'';
	$query='UPDATE user SET Password= '.$password.' WHERE User_id= '.$username.'';
	
	//Execute query
	$results = mysql_query($query);
            
	//Check if query executes successfully
	if($results == TRUE)
	{
		session_start();
	$_SESSION['email']=mysql_result($resulte,0);	
	$_SESSION['password']=$password_t;
	$_SESSION['username']=$username;
	header('location:mail2.php'); 
	}
                else echo mysql_error() . '<br>';
	}
	
	}
	
//Retrieve and Insert values into database
else{
	include('recover.php'); 

   echo '<h1 style="position:absolute; top:530px; left:520px; color:red"><b>Please Submit your Username  !!!<b></h1>'; 

     exit(); 
 
}
}
?> 