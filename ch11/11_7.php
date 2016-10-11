<?php

	//sample11_7.php

	//A function to return a true/false value based on e-mail format.
	function validemail ($email = ""){
		return preg_match("/^([a-zA-Z0-9])+([.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-]+)+[a-zA-Z0-9_-]$/",$email); 
	}
	$anemail = "lee@babinplanet.ca";
	//Use the function to confirm a valid e-mail.
	if (validemail ($anemail)){
		echo $anemail . " is in valid e-mail format.<br />";
	} else {
		echo $anemail . " is not valid.<br />";
	}
	
	//And of course, an invalid email.
	$bademail = "abademail";
	if (validemail ($bademail)){
		echo $bademail . " is in valid e-mail format.<br />";
	} else {
		echo $bademail . " is not valid.<br />";
	}
?>