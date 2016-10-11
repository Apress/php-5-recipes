<?php

	//sample11_1.php

	//A function to validate a username and password.
	function validatelogin ($username, $password){
		//Typically the username and password would be validated against information
		//in the database. For the sake of simplicity in this example, the username
		//and password are hard-coded into variables.
		$actualuser = "myusername";
		$actualpass = "mypassword";
		
		//Now, you do a quick comparison to see if the user has entered the correct login.
		if (strcmp ($username, $actualuser) == 0 && strcmp ($password, $actualpass) == 0){
			return true;
		} else {
			return false;
		}
	}
	
	///You then call the function and pass in the values you want checked.
	if (validatelogin ("myusername","mypassword")){
		echo "You are logged in correctly";
	} else {
		echo "You have an incorrect username and/or password";
	}
?>