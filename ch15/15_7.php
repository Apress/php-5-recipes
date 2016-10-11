<?php

	//sample15_7.php

	//The first thing we need to do, like any other time is connect to the mysql server.
	//We can do so by creating a new mysqli instance.
	$mysqli = new mysqli ("localhost","apress","testing","cds");
	try {
		if (mysqli_connect_errno()){
			throw new exception ("Error: " . mysqli_connect_errno() . " - " . mysqli_connect_error());
		} else {
			//Now, we can perform a myriad of functions.
			//For instance, let's output the contents of the cd table.
			if ($cdquery = $mysqli->query ("SELECT * FROM cd ORDER BY cdid ASC")){
				while ($cddata = $cdquery->fetch_array ()){
					echo "ID: " . $cddata['cdid'] . "<br />";
					echo "Title: " . stripslashes ($cddata['title']) . "<br />";
					echo "Artist: " . stripslashes ($cddata['artist']) . "<br />";
					echo "------------------------------<br />";
				}
				//Clean up.
				$cdquery->close();
			} else {
				echo $mysqli->errno . " - " . $mysqli->error;
			}
			
			//A new feature: using prepared statements.
			//First we prepare a statement using "?" where we want to use literal data.
			$prep = $mysqli->prepare ("INSERT INTO cd (cdid,title,artist) VALUES ('0',?,?)");
			//Now, we can bind some parameters.
			$prep->bind_param ('ss',$title,$artist);
			
			//Our new album to be inserted.
			$title = "Californication";
			$artist = "Red Hot Chili Peppers";
					
			//Then we can execute the query:
			$prep->execute();
			
			//And see how we did:
			echo $prep->affected_rows . " row(s) affected.<br />";
			
			//Clean up.
			$prep->close();
			
			//Now, we can also bind results:
			if ($result = $mysqli->prepare ("SELECT title, artist FROM cd WHERE cdid > '2'")){
				$result->execute ();
				
				//Bind the results.
				$result->bind_result ($title,$artist);
				
				//Then go through and echo the bound results.
				while ($result->fetch ()){
					echo "Title: " . stripslashes ($title) . "<br />";
					echo "Artist: " . stripslashes ($artist) . "<br />";
					echo "------------------------------<br />";
				}
				
				//Clean up.
				$result->close ();
			} else {
				echo $mysqli->errno . " - " . $mysqli->error;
			}
					
			//Closing the connection is simple.
			$mysqli->close();
		}
	} catch (exception $e) {
		echo $e->getmessage();
	}

?>