<?php

	//sample12_9.php

	//First, create a session states.
	session_start();
	
	(int) $_SESSION['integer_value'] = "115";
	(string) $_SESSION['string_value'] = "Hello World";
	(float) $_SESSION['float_value'] = "1.07";
	
	//This function exists for the sole purpose of showing how sessions can be called
	//from anywhere within the scope of the session state.
	function outputsessions (){
		echo $_SESSION['integer_value'] . "<br />"; //Outputs 115.
		echo $_SESSION['string_value'] . "<br />"; //Outputs Hello World.
		echo $_SESSION['float_value'] . "<br />"; //Outputs 1.07.
	}
	
	//Then we can call the function from here:
	outputsessions();
?>