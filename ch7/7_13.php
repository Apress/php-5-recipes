<?php

	//sample7_13.php

	function sortfilesbydate ($thedir){
		//First, we ensure that the directory exists.
		if (is_dir ($thedir)){
			//Now, we scan the files in this directory using scandir.
			$scanarray = scandir ($thedir);
			$finalarray = array();
			//Then we begin parsing the array.
			//Since scandir() counts the "." and ".." file navigation listings
			//as files, we should not list them.
			for ($i = 0; $i < count ($scanarray); $i++){
				if ($scanarray[$i] != "." && $scanarray[$i] != ".."){
					//Now, we check to make sure this is a file, and not a directory.
					if (is_file ($thedir . "/" . $scanarray[$i])){
						//Now what we need to do is cycle the data into an associative array.
						$finalarray[$thedir . "/" . $scanarray[$i]] = filemtime ($thedir . "/" . $scanarray[$i]);
					}
				}
			}
			//Finally, when we have gone through the entire array, we simply asort() it.
			asort ($finalarray);
			return ($finalarray);
		} else {
			echo "Sorry, this directory does not exist.";
		}
	}
	//We then call the function pointed to the directory we want to look through.
	$sortedarray = sortfilesbydate ("sample3");
	//We could then output the as such:
	while ($element = each ($sortedarray)){
		echo "File: " . $element['key'] . " was last modified: " . date ("F j, Y h:i:s", $element['value']) . "<br />";
	}
?>