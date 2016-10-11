<?php

	//sample15_11.php

	//Function to determine which extensions are installed.
	//First, the basic mysql extension.
	function mysqlinstalled (){
		//We can do a quick check to see if mysql is installed by determining if a mysql
		//function exists.
		if (function_exists ("mysql_connect")){
			return true;
		} else {
			return false;
		}
	}
	//And the mysqli extension next.
	function mysqliinstalled (){
		//We do this entirely the same way we did the previous function.
		if (function_exists ("mysqli_connect")){
			return true;
		} else {
			return false;
		}
	}
	
	//Now, we check if the mysql functionality is available.
	if (mysqlinstalled()){
		echo "<p>The mysql extension is installed.</p>";
	} else {
		echo "<p>The mysql extension is not installed..</p>";
	}
	//And ditto for the mysqli extension.
	if (mysqliinstalled()){
		echo "<p>The mysqli extension is installed.</p>";
	} else {
		echo "<p>The mysqli extension is not installed..</p>";
	}
?>