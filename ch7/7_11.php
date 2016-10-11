<?php

	//sample7_11.php

	function numfilesindir ($thedir){
		//First, we ensure that the directory exists.
		if (is_dir ($thedir)){
			//Now, we scan the files in this directory using scandir.
			$scanarray = scandir ($thedir);
			//Then we begin parsing the array.
			//Since scandir() counts the "." and ".." file navigation listings
			//as files, we should not list them.
			for ($i = 0; $i < count ($scanarray); $i++){
				if ($scanarray[$i] != "." && $scanarray[$i] != ".."){
					//Now, we check to make sure this is a file, and not a directory.
					if (is_file ($thedir . "/" . $scanarray[$i])){
						echo $scanarray[$i] . "<br />";
					}
				}
			}
		} else {
			echo "Sorry, this directory does not exist.";
		}
	}
	//We then call the function pointed to the directory we want to look through.
	echo numfilesindir ("sample1");

?>