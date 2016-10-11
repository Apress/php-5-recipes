<?php

	//sample7_14.php

	function recurdir ($thedir) {
		//First attempt to open the directory.
		try {
			if ($adir = opendir ($thedir)){
				//Scan through the directory.
				while (false !== ($anitem = readdir ($adir))){
					//Do not count the . or .. in a directory.
					if ($anitem != "." && $anitem != ".."){
						//Now, if it is another directory, then we indent a bit
						//and go recursive.
						if (is_dir ($thedir . "/" . $anitem)){
							?><span style="font-weight: bold;"><?php echo $anitem; ?></span><?php
							?><div style="margin-left: 10px;"><?php
							recurdir ($thedir . "/" . $anitem );
							?></div><?php
						} elseif (is_file ($thedir . "/" . $anitem)){
							//Then echo the file.
							echo $anitem . "<br />";
						}
					}
				}
			} else {
				throw new exception ("Sorry, directory could not be openend.");
			}
		} catch (exception $e) {
			echo $e->getmessage();
		}
	}
	
	//Run the function.
	recurdir ("sample4");
?>