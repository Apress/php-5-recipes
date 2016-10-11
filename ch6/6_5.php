<?php
	//By supplying no start or length arguments,
	//the string will be added to the beginning.
	$mystring = substr_replace("Hello World", "H3110 W0r1d!", 0, 0);
	echo $mystring . "<br />"; //Echos H3110 W0r1d!Hello World
	
	//Where if we did this:
	$mystring = substr_replace("Hello World", "0 w0", 4, 4);
	echo $mystring; //Echos Hell0 w0rld.
	
?>
