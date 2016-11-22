<?php $imgData = file_get_contents($filename);
$size = getimagesize($filename);
mysql_connect("localhost", "root", "");
mysql_select_db ("$dbname");
$sql = "INSERT INTO testblob
    ( image_id , image_type ,image, image_size, image_name)
    VALUES
    ('', '{$size['mime']}', '{$imgData}', '{$size[3]}', 
     '{$_FILES['userfile']['name']}')";
mysql_query($sql);?>