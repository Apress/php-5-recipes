<?php

	//sample15_1.php

	//Attempt to open a connection to mysql.
	try {
		//You must provide the host.
		$mysqlhost = "localhost";
		//The username.
		$mysqluser = "apress";
		//And the password.
		$mysqlpass = "testing";
		//And then supply them to the mysql_connect() function.
		if ($db = mysql_connect ($mysqlhost,$mysqluser,$mysqlpass)){
			//Now, we have an open connection with $db as its handler.
			echo "Successfully connected to the database.";
			//When we finish up, we have to close the connection.
			mysql_close ($db);
		} else {
			throw new exception ("Sorry, could not connect to mysql.");
		}
	} catch (exception $e) {
		echo $e->getmessage ();
	}
?>