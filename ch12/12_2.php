<?php

	//sample12_2.php

	//Let's say that our correct login is based on these global user and pass values.
	//In the real world, this would be taken from the database most likely.
	$GLOBALS['username'] = "test";
	$GLOBALS['password'] = "test";
	
	//Let's assume we already have a valid set of cookies in place.
	setcookie ("cookie_user", "test", time()+60*60*24*30);
	setcookie ("cookie_pass", md5 ("test"), time()+60*60*24*30);
	
	//Here is an example to set a cookie based on a correct login.
	function validatelogin (){
		//Check for a valid match.
		if (strcmp ($_COOKIE['cookie_user'], $GLOBALS['username']) == 0 && strcmp ($_COOKIE['cookie_pass'], md5 ($GLOBALS['password'])) == 0){
			return true;
		} else {
			return false;
		}
	}
	
	//We call our validatelogin() script.
	if (validatelogin ()){
		echo "Successfully logged in.";
	} else {
		echo "Sorry, invalid login.";
	}
?>