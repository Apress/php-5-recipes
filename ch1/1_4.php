<?php
	//sample1_4.php

	//Because PHP determines the data type when a value is assigned to a variable
	//setting up a string is as easy as this:
	$mystring = "Hello World!";
	//And naturally, outputting it is as easy as this:
	echo $mystring . "<br />";

	//Similarily, with the help of built in functions like substr(), it is easy to work
	//with sub strings as well.
	echo substr ($mystring,0,5); //Would output Hello.

?>