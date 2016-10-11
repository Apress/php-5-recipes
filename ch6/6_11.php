<?php
	//Define a maximum length for the data field.
	define ("MAXLENGTH", 10);
	if (strlen ("Hello World!") > MAXLENGTH){
		echo "The field you have entered can only be " . MAXLENGTH . " characters in length.";
	} else {
		//Insert the field into the database.
	}
?>
