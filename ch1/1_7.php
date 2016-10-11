<?php
	//sample1_7.php

	//Here if a variable.  It is pretty easy to see it is a string.
	$unknownvar = "Hello World";
	echo gettype ($unknownvar) . "<br />"; //Will output string.
	//The gettype is quite slow, the better way to do this is:
	if (is_string ($unknownvar)){
		//Then do something with the variable.
		echo "Is a string<br />";
	}
	//Let's say we start with a double value.
	$mynumber = "1.03";
	//And let's say we want an integer.
	//We could do this:
	$mynumber = settype ($mynumber ,"integer");
	echo $mynumber . "<br />"; //Would output 1.
	//But it is better and looks far cleaner like this:
	echo (int) $mynumber;

?>