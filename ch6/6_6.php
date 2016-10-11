<?php
	//Break the string into an array.
	$expdate = explode ("-","1979-06-23");
	echo $expdate[0] . "<br />"; //echos 1979.
	//Then pull it back together into a string.
	$fulldate = implode ("-", $expdate);
	echo $fulldate . "<br />"; //Echos 1979-06-23.
	
	//Tokens
	$anemail = "lee@babinplanet.ca";
	$thetoken = strtok ($anemail, "@");
	while ($thetoken){
		echo $thetoken . "<br />";
		$thetoken = strtok ("@");
	}
	
	$newarray = str_split ("lee@babinplanet.ca",3);
	
	print_r ($newarray);
	
?>
