<?php

	//sample15_6.php

	//A function to open a connection to mysql.
	function opendatabase ($host,$user,$pass) {
		//Attempt to open a connection to mysql.
		try {
			//And then supply them to the mysql_connect() function.
			if ($db = mysql_connect ($host,$user,$pass)){
				//Return the identifier.
				return $db;
			} else {
				throw new exception ("Sorry, could not connect to mysql.");
			}
		} catch (exception $e) {
			echo $e->getmessage ();
		}
	}
	
	function selectdb ($whichdb, $db){
		//The next thing we must do is select a database.
		try {
			if (!mysql_select_db ($whichdb,$db)){
				throw new exception ("Sorry, database could not be opened.");
			}
		} catch (exception $e) {
			echo $e->getmessage();
		}
	}
	
	//A function to close the connection to mysql.
	function closedatabase ($db){
		//When we finish up, we have to close the connection.
		mysql_close ($db);
	}
	
	//First, open a connection to the database.
	$db = opendatabase ("localhost","apress","testing");
	
	//Then select a database.
	selectdb ("cds",$db);
	
	//Now, assume we received these values from a posted form.
	$_POST['user'] = "apress";
	$_POST['pass'] = "testing";
	
	function validatelogin ($user,$pass){
		//First, remove any potentially dangerous characters.
		mysql_real_escape_string ($user);
		mysql_real_escape_string ($pass);
		//Next, check the user and pass against the database.
		$thequery = "SELECT * FROM userlogin WHERE username='$user' AND password='$pass'";
		//Now, run the query.
		if ($aquery = mysql_query ($thequery)){
			//Now, we can check for a valid match using the mysql_num_rows() function.
			if (mysql_num_rows ($aquery) > 0){
				return true;
			} else {
				return false;
			}
		} else {
			echo mysql_error();
		}
	}
	
	//Now, let's attempt to validate our login.
	if (validatelogin ($_POST['user'],$_POST['pass'])){
		echo "You have successfully logged in.";
	} else {
		echo "Sorry, you have an incorrect username and/or password.";
	}
	
	//Then close the database.
	closedatabase ($db);
	
?>