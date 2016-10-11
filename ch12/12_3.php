<?php

	//sample12_3.php

	//Let's assume we already have a valid set of cookies in place.
	setcookie ("cookie_user", "test", time()+60*60*24*30);
	setcookie ("cookie_pass", md5 ("test"), time()+60*60*24*30);
	
	//Here is a function that will kill our cookies, hence "logging out".
	function logout (){
		//To remove a cookie, you simply set the value of the cookie to blank.
		setcookie ("cookie_user", "", time()+60*60*24*30);
		setcookie ("cookie_pass", "", time()+60*60*24*30);
	}
	
	//We call our logout script.
	logout();
	
	//We can no longer access our cookies.
	echo $_COOKIE['cookie_user'] . "<br />";
	
	echo "You have successfully logged out.";
?>