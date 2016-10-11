<?php

	//sample12_8.php

	//First, create a session states.
	session_start();
	
	$GLOBALS['user'] = "test";
	$GLOBALS['pass'] = "test";
	
	//Now, here is a function that will log you in.
	function login ($username, $password){
		if (strcmp ($username, $GLOBALS['user']) == 0 && strcmp ($password, $GLOBALS['pass']) == 0){
			$_SESSION['user'] = $username;
			$_SESSION['pass'] = md5 ($password);
			return true;
		} else {
			return false;
		}
	}
	
	//Function to logout.
	function logout (){
		unset ($_SESSION['user']);
		unset ($_SESSION['pass']);
		session_destroy();
	}
	
	//Now, we can login.
	if (login("test","test")){
		//And output our sessions with the greatest of ease.
		echo "Successfully logged in with user: " . $_SESSION['user'] . " and pass: " . $_SESSION['pass'];
	} else {
		echo "Could not login.";
	}
	
	//Now, we logout.
	logout();
	
	//And hence cannot use our sessions anymore.
	if (isset ($_SESSION['user'])){
		echo $_SESSION['user']; //Outputs nothing.
	}
?>