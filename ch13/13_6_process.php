<?php
	//Start the session state.
	session_start ();
	
	//Set a session started value for this user.
	if (!isset ($_SESSION['processing'])){
		$_SESSION['processing'] = false;
	}
	
	//Now we ensure we haven't already started processing our request.
	if ($_SESSION['processing'] == false){
		//Now, we let our script know that we are processing.
		$_SESSION['processing'] = true;
		
		//Create a loop that shows the effect of some heavy processing.
		for ($i = 0; $i < 2000000; $i++){
			//Thinking...
		}
		
		//Every time we do this, let's write to a text file so we can test that
		//out script isn't getting hit with multiple submissions.
		if ($file = fopen ("test.txt","w+")){
			fwrite ($file, "Processing");
		} else {
			echo "Error opening file.";
		}
		
		//Then we start doing our calculations.
		echo $_POST['yourname'];
		
		//Then, once we have finished calculating, we can kill the session.
		unset ($_SESSION['processing']);
	}
?>