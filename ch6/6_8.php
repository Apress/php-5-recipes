<?php
	//The value passed to use by a customer who is signing up.
	$submittedpass = "myPass";
	//Before we insert into the database, we simply lower case the submittal.
	$newpass = strtolower ($submittedpass);
	
	echo $newpass . "<br />"; //Echos mypass
	
	$astring = "hello world";
	echo ucfirst ($astring) . "<br />"; //Echos Hello world
	
	$astring = "hello world";
	echo ucwords ($astring); //Echos Hello World

?>
