<?php 

 if ($_POST['submit'] == 'CREATE ACCOUNT'){ 

 //Collect POST values 

 $name = mysql_escape_string($_POST['name']);  
 $email = mysql_escape_string($_POST['email']);  
$username='\''.$_POST['username'].'\'';

 
if(isset($_POST['name']) && !empty($_POST['name']) AND isset($_POST['username']) && !empty($_POST['username']) AND isset($_POST['email']) && !empty($_POST['email']) AND 
isset($_POST['country']) && !empty($_POST['country']) AND isset($_POST['day']) && !empty($_POST['day']) AND isset($_POST['month']) && !empty($_POST['month']) AND isset($_POST['edu']) && !empty($_POST['edu'])){  
         //Check email
		 if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){  
    
		include('register.php'); 

		echo '<h2 style="position:absolute; top:475px; left:1040px; color:red">Invalid E-mail !!!<center>'; 

		exit(); 
	
	// Return Error - Invalid Email  
		}
		 

		 
	else {
	mysql_connect("localhost", "root", "") or die(mysql_error()); // Connect to database server(localhost) with username and password.
		mysql_select_db("questnet") or die(mysql_error()); // Select registrations database.
		
		$query='SELECT * FROM user WHERE User_id='.$username;
	//Execute query
	$result = mysql_query($query);
	$count=mysql_num_rows($result);
		if($count>0)
		{
		include('register.php'); 

   echo '<h2 style="font-size:16pt;position:absolute; top:400px; left:985px; color:red">Username Already exists !!!<center>'; 

     exit(); 
	
	}
	else {
	mysql_connect("localhost", "root", "") or die(mysql_error()); // Connect to database server(localhost) with username and password.
	mysql_select_db("questnet") or die(mysql_error()); // Select registrations database.
	
			$hash_s = md5( rand(0,1000) );
			$hash = '\''.$hash_s.'\'';
            $name = '\''.$_POST['name'].'\'';
			$username = '\''.$_POST['username'].'\'';
            $email = '\''.$_POST['email'].'\'';
            $sex = '\''.$_POST['sex'].'\'';
            
			$sex='\''.$_POST['sex'].'\'';
			
			$country='\''.$_POST['country'].'\'';
			
            $dob = '\''.$_POST['year'] . '-' . $_POST['month'] . '-' .$_POST['day'].'\'';
			$edu='\''.$_POST['edu'].'\'';
			
			if(!$_POST['address'])
            $address = 'NULL';
			else
			$address = '\''.$_POST['address'].'\'';
			if(!$_POST['contact'])
            $pno = 'NULL';
			else
			$pno='\''.$_POST['contact'].'\'';
			if(!$_POST['city'])
            $city = 'NULL';
			else
			$city='\''.$_POST['city'].'\'';
			if(!$_POST['employ'])
            $employ = 'NULL';
			else $employ = '\''.$_POST['employ'].'\'';
			$country='\''.$_POST['country'].'\'';
			if(!$_POST['about'])
            $about = 'NULL';
			$about='\''.$_POST['about'].'\'';
			$password_t=rand(10000,1000000);
			$password='\''.md5($password_t).'\'';
	$query='INSERT INTO user VALUES ('.$name.','.$username.','.$email.','.$pno.','.$password.','.$address.','.$sex.','.$edu.','.$employ.','.$dob.','.$city.','.$country.','.$about.',0,'.$hash.')';
	//Execute query
	$results = mysql_query($query);
            
	//Check if query executes successfully
	if($results == TRUE)
	{
		session_start();  
	$_SESSION['email']=$_POST['email'];
	$_SESSION['name']=$_POST['name'];
	$_SESSION['hash']=$hash_s;
	$_SESSION['password']=$password_t;
	$_SESSION['username']=$username;
	header('location:mail.php'); 
	}
                else echo mysql_error() . '<br>';
	}
	
	}
	
//Retrieve and Insert values into database

}
else{
	include('register.php'); 

   echo '<h2 style="position:absolute; top:230px; left:460px; color:red">Please fill the mandatory(*) fields  !!!<center>'; 

     exit(); 
 
}
}

?> 

 

 


