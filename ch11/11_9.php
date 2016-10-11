<?php

	//sample11_9.php

	$GLOBALS['user'] = "myusername";
	$GLOBALS['pass'] = "mypassword";
	
	//A function to check the validity of a login.
	function validatelogin ($username, $password){
		//Now, you do a quick comparison to see if the user has entered the correct login.
		if (strcmp ($username, $GLOBALS['user']) == 0 && strcmp ($password, $GLOBALS['pass']) == 0){
			return true;
		} else {
			return false;
		}
	}
	
	//You then call the function and pass in the values you want checked.
	if (validatelogin ("myusername","mypassword")){
		echo "You are logged in correctly";
	} else {
		echo "You have an incorrect username and/or password";
	}
?>