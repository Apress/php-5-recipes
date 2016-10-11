<?php

	//sample15_3.php

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
	
	//Now, let's create a script to output the information found within our table.
	if ($aquery = mysql_query ("SELECT * FROM cd ORDER BY cdid ASC")){
		//We can loop through the rows in the table, outputting as we go.
		while ($adata = mysql_fetch_array ($aquery)){
			echo "ID: " . $adata['cdid'] . "<br />";
			echo "Title: " . stripslashes ($adata['title']) . "<br />";
			echo "Artist: " . stripslashes ($adata['artist']) . "<br />";
			echo "-------------------------------<br />";
		}
	} else {
		echo mysql_error();
	}
	
	//Then close the database.
	closedatabase ($db);
	
?>