<?php

	//sample11_10.php
	
	if ($_GET['go'] == "yes"){
	
		//Now, if you are logged in, you want the function to log you out.
		if ($_GET['loggedin'] == "true"){
			
			//Create a logout function.
			function dosomething (){
				$_GET['loggedin'] = false;
				echo "You have been successfully logged out.<br />";
			}
			
		}
		
		//Now, if you were not logged in, you would want to be able to log in.
		if ($_GET['loggedin'] == "false"){
			
			//Create a login function.
			function dosomething (){
				$_GET['loggedin'] = true;
				echo "You have been successfully logged in.<br />";
			}
		}
		
		dosomething();
		
	}
	
	if ($_GET['loggedin']){
		?><a href="sample11_10.php?go=yes&amp;loggedin=true">click here to log out</a><?php
	} elseif (!$_GET['loggedin']){
		?><a href="sample11_10.php?go=yes&amp;loggedin=false">click here to log in</a><?php
	}
?>