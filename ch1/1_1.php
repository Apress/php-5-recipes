<?php
	//sample1_1.php

	//A properly set up PHP variable.
	$myvar = 0;
	//An improper PHP variable.
	//$1myvar = 0;
	
	$yourvar = "This is my value<br />";

	//An example of assigning variables by value.
	$myvar = $yourvar;
	//If we were to change it.
	$myvar = "This is now my value.<br />";
	echo $yourvar; //Echoes This is my value
	
	//An example of assigning a variable by reference.
	$myvar = &$yourvar;
	$myvar = "This is now my value.<br />";
	echo $yourvar; //Echoes This is now my value.<br />
  
	//Rather than accepting a value from a form like this:
	$formvar = $formvar;
	//Or like this:
	$formvar = $HTTP_POST_VARS['formvar'];

	//The new way to receive a form var is as such:
	$formvar = $_POST['formvar'];
  
	if ($_SESSION['loggedin']){
		echo "Proper login";
	} else {
		echo "You are not logged in.";
	}
?>