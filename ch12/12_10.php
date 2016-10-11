<?php

	//sample12_10.php

	//First, create a session states.
	session_start();
	
	//A class that does not do too much.
	class myclass {
		protected $myvalue;
		
		public function setmyvalue ($newvalue){
			$this->myvalue = $newvalue;
		}
		
		public function getmyvalue (){
			return $this->myvalue;
		}
	}
	
	$_SESSION['myclass_value'] = new myclass ();
	
	//This function exists for the sole purpose of showing how sessions can be called
	//from anywhere within the scope of the session state.
	function outputsessions (){
		$_SESSION['myclass_value']->setmyvalue ("Hello World");
		echo $_SESSION['myclass_value']->getmyvalue ();
	}
	
	//Then we can call the function from here:
	outputsessions();
?>