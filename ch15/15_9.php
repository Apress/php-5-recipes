<?php

	//sample15_9.php

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
	
	//First, add the review table.
	$addquery = "CREATE TABLE IF NOT EXISTS review (";
	$addquery .= "reviewid INT NOT NULL AUTO_INCREMENT, PRIMARY KEY (reviewid), ";
	$addquery .= "userloginid INT, cdid INT, rtitle TINYTEXT, review TEXT) TYPE=MyISAM";
	try {
		if (!mysql_query ($addquery, $db)){
			throw new exception (mysql_error());
		}
	} catch (exception $e) {
		echo $e->getmessage ();
	}
	//Check the fields in the table.
	$curfields = mysql_list_fields("cds", "userlogin");
	//Run through the current fields and see if we already have the name and email field.
	$columns = mysql_num_fields($curfields);
	$nameexists = false;
	$emailexists = false;
	for ($i = 0; $i < $columns; $i++){
		if (mysql_field_name ($curfields, $i) == "name"){
			$nameexists = true;
		}
		if (mysql_field_name ($curfields, $i) == "email"){
			$emailexists = true;
		}
	}
	//If the name field does not exist, create it.
	if (!$nameexists){
		$twonewquery = "ALTER TABLE userlogin ADD (name TINYTEXT)";
		try {
			if (!mysql_query ($twonewquery, $db)){
				throw new exception (mysql_error());
			}
		} catch (exception $e) {
			echo $e->getmessage ();
		}
	}
	//If the email field does not exist, create it.
	if (!$emailexists){
		$twonewquery = "ALTER TABLE userlogin ADD (email TINYTEXT)";
		try {
			if (!mysql_query ($twonewquery, $db)){
				throw new exception (mysql_error());
			}
		} catch (exception $e) {
			echo $e->getmessage ();
		}
	}
	//Then, we insert a name and email into our existing userlogin account, apress.
	$upquery = "UPDATE userlogin SET name='Lee Babin',email='lee@babinplanet.ca' WHERE userloginid='1'";
	try {
		if (!mysql_query ($upquery, $db)){
			throw new exception (mysql_error());
		}
	} catch (exception $e) {
		echo $e->getmessage ();
	}
	//Now, we can insert a review for, let's say, Linkin Park.
	$title = "My Review";
	$body = "Wow, what a great album!";
	$insquery = "INSERT INTO review (reviewid,userloginid,cdid,rtitle,review) VALUES ('0','1','2','$title','$body')";
	try {
		if (!mysql_query ($insquery, $db)){
			throw new exception (mysql_error());
		}
	} catch (exception $e) {
		echo $e->getmessage ();
	}
	//Go through all albums first.
	if ($alquery = mysql_query ("SELECT * FROM cd ORDER BY cdid ASC")){
		while ($aldata = mysql_fetch_array ($alquery)){
			echo stripslashes ($aldata['title']) . " by: " . stripslashes ($aldata['artist']) . "<br />";
			//Now, search for a review for this title.
			$jquery = "SELECT DISTINCT a.rtitle,a.review,b.name,b.email FROM ";
			$jquery .= "review a, userlogin b WHERE a.userloginid=b.userloginid AND a.cdid='" . $aldata['cdid'] . "' ";
			$jquery .= "ORDER BY a.reviewid ASC";
			if ($revquery = mysql_query ($jquery)){
				//Check if there are any reviews.
				if (mysql_num_rows ($revquery) > 0){
					//Then output all reviews.
					?><p>Reviews</p><?php
					//Count the review number.
					$revcounter = 0;
					while ($revdata = mysql_fetch_array ($revquery)){
						//Increment the counter.
						$revcounter++;
						?><p style="font-weight: bold;"><?php echo stripslashes ($revdata['rtitle']); ?></p><?php
						?><p><?php echo stripslashes (nl2br ($revdata['review'])); ?></p><?php
						?><p>By: <a href="mailto:<?php echo stripslashes ($revdata['email']); ?>"><?php echo stripslashes ($revdata['name']); ?></a></p><?php
						//Now, only show the break if we have more reviews.
						if (mysql_num_rows ($revquery) != $revcounter){
							echo "------------------------------------<br />";
						}
					}
				} else {
					?><p>No reviews for this album.</p><?php
				}
			} else {
				echo mysql_error();
			}
			echo "------------------------------------<br />";
		}
	} else {
		echo mysql_error();
	}
?>