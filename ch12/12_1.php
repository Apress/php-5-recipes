<?php

	//sample12_1.php

	//Let's say that our correct login is based on these global user and pass values.
	//In the real world, this would be taken from the database most likely.
	$GLOBALS['username'] = "test";
	$GLOBALS['password'] = "test";
	
	//Here is an example to set a cookie based on a correct login.
	function validatelogin ($username, $password){
		//Check for a valid match.
		if (strcmp ($username, $GLOBALS['username']) == 0 && strcmp ($password, $GLOBALS['password']) == 0){
			//If we have a valid match, then we set the cookies.
			//This will set two cookies, one name cookie_user set to $cookieuser,
			//and another set to cookie_pass which contains the value of $password.
			//When storing passwords, it is a good idea to use something like md5() to
			//encrypt the stored cookie.
			setcookie ("cookie_user", $username, time()+60*60*24*30);
			setcookie ("cookie_pass", md5 ($password), time()+60*60*24*30);
			return true;
		} else {
			return false;
		}
	}
	
	//We call our validatelogin() script.
	if (validatelogin ("test","test")){
		echo "Successfully logged in.";
	} else {
		echo "Sorry, invalid login.";
	}
?>