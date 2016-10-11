<?php
	//sample1_8.php

	//Let's say you had a script that for a long time
	//called a function called isemail().
	//Like this for instance:
	/*
	if (isemail($email)){ //This will generate an error.
		//Insert email address into the database.
	} else {
		//Perform validation.
		echo "Not a valid e-mail address.";
	}
	*/
	//Now, if someone went ahead and changed the name of isemail(), your script
	//would crash.
	//Now, try something like this instead:
	if (function_exists($isemail)){
		if (isemail($email)){
			//Insert email address into the database.
		} else {
			//Perform validation.
			echo "Not a valid e-mail address.";
		}
	} else {
		//Handle the error by sending you an email telling you the issues.
		echo "Function does not exist.<br />";
	}
  
	//First off, before we extend any class, we should confirm it exists.
	if (class_exists (myparent)){
		class anyclass extends myparent {
			public $somemember;
			public function dosomething (){
				//Here we ensure that the parent method exists.
				if (method_exists (parent,"parentmethod")){
					//Then we can proceed.
				} else {
					//Mail us a warning.
				}
			}
		}
	} else {
		//Mail us a warning.
		echo "Class does not exist.<br />";
	}
	//We are looking to receive a value from a "post" form before we search.
	if (isset ($_POST['searchterm'])){
		//Then we would perform our search algorithm here.
	} else {
		//Or else, we generate an error.
		echo "You must submit a search term.  Please press the Back button.";
	}

?>