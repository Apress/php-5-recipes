<?php

	//sample15_5.php

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
	
	//Create a query to remove our recently modified Linkin Park record.
	$updatequery = "DELETE FROM cd WHERE cdid='2'";
	
	//Then attempt to perform the query.
	try {
		if (mysql_query ($updatequery, $db)){
			echo "Your record has been removed.";
			//Now, let's output the record to see the changes.
			if ($aquery = mysql_query ("SELECT * FROM cd WHERE cdid='2'")){
				//You will notice that our record has been quite removed.
				echo "<br />" . mysql_num_rows ($aquery); //Should output a 0.
			} else {
				echo mysql_error();
			}
		} else {
			throw new exception (mysql_error());
		}
	} catch (exception $e) {
		echo $e->getmessage();
	}
	
	//Then close the database.
	closedatabase ($db);
	
?>