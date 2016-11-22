<?php

if(mail('2011259@iiitdmj.ac.in', '$subject', '$message', '$headers'))
echo 'mail sent';
else echo 'error';
?>