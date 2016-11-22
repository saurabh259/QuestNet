<?php 
$con=mysql_connect( "localhost","root","");
mysql_select_db ("questnet",$con);
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
$query="insert into topic set photo='$name1'";
mysql_query ($query) or die ('could not updated:'.mysql_error());
echo "Your image upload successfully !!";
}
}
}
?>
<html >
<head>
<title>Image Upload</title>
</head>
<body bgcolor="pink">
<form name="form" action="" method="post" enctype="multipart/form-data">
Photo <input type="file" name="file" />
<input type="submit" name="submit" value="submit" /> 
</form>
</body>
</html>