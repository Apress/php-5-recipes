<?php

	//sample15_2.php

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
	
	//A function to close the connection to mysql.
	function closedatabase ($db){
		//When we finish up, we have to close the connection.
		mysql_close ($db);
	}
	
	//First, open a connection to the database.
	$db = opendatabase ("localhost","apress","testing");
	
	//The next thing we must do is select a database.
	try {
		if (!mysql_select_db ("cds",$db)){
			throw new exception ("Sorry, database could not be opened.");
		}
	} catch (exception $e) {
		echo $e->getmessage();
	}

	//Create a query that will, in this case, insert a new row.
	$myquery = "INSERT INTO cd (cdid,title,artist) VALUES ('0','Greyest of Blue Skies','Finger Eleven')";
	
	//Then process the query.
	try {
		if (mysql_query ($myquery, $db)){
			echo "We were successful.";
		} else {
			throw new exception (mysql_error());
		}
	} catch (exception $e) {
		echo $e->getmessage();
	}
	
	//Then close the database.
	closedatabase ($db);
	
?>