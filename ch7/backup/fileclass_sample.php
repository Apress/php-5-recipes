<?php
	//Include the class.
	require_once ("file.class.inc.php");
	//Then create a new instance of the class.
	$myfile = new cfile ("sample7_9.txt");
	
	//Now, let's try reading it.
	echo $myfile->read();
	
	//Then let's try writing to the file.
	$myfile->write ("Hello World!");
	
	//Then, let's try appending.
	$myfile->append ("Hello Again!");
	
?>