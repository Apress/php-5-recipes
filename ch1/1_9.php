<?php
	//sample1_9.php

	//Yes, that is it…
	phpinfo();
	//And credits if you so wish to see:
	phpcredits();
	
	echo phpversion() . "<br />"; //Outputs 5.0.3 on my current setup.
	
	//Check to see the maximum post value size.
	echo ini_get ("post_max_size") . "<br />"; //Ouputs 8M on my current server.
	//Output all of the values.
	$myarray = ini_get_all();
	print_r($myarray);
	
	echo "<br />";
	
	echo date ("F d Y H:i:s.", getlastmod()) . "<br />"; //June 01 2005 20:07:48.
	
	//We get the IP address of the current user.
	$curip = $_SERVER['REMOTE_ADDR'];
	//Then we do a database query to see if this ip exists.
	//Let's assume we have already put all of the ip addys in our db
	//into an array called $myarr.
	//We check if the new ip address exists in the array via the in_array() function.
	$myarray = array ();
	if (!in_array ($curip, $myarray)){
		//Then we insert the new ip address into the database.
		echo "We insert the IP addy: " . $curip . " into the database";
	} else {
		echo "The IP addy:" . $curip . " is already in the database.";
	}

?>