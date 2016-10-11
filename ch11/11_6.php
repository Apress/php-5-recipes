<?php

	//sample11_6.php

	//Create a class that stores values.
	class myclass {
		
		//A defining value.
		private $thevalue;
		//A word to prove you have found the right object.
		private $theword;
		
		public function __construct (){
			$num_args = func_num_args();
		  
			if($num_args > 0){
				$args = func_get_args();
				$this->theword = $args[0];
			}
		}
		
		public function setvalue ($newvalue){
			$this->thevalue = $newvalue;
		}
		public function getvalue () {
			return $this->thevalue;
		}
		public function getword () {
			return $this->theword;
		}
	}
	
	//Now, create four different instances of this class.
	$myclass1 = new myclass ("Abra");
	$myclass1->setvalue (1);
	
	$myclass2 = new myclass ("Kadabra");
	$myclass2->setvalue (2);
	
	$myclass3 = new myclass ("Hocus");
	$myclass3->setvalue (3);
	
	$myclass4 = new myclass ("Pocus");
	$myclass4->setvalue (4);
	
	//Create a global array of 
	$classarr = array ($myclass1,$myclass2,$myclass3,$myclass4);
	
	//Now, you can create a function that searches for a correct instance of a class.
	function &findclass ($whichclass,$classarr){
		for ($i = 0; $i < count ($classarr); $i++){
			if ($classarr[$i]->getvalue() == $whichclass){
				return $classarr[$i];
			}
		}
	}
	
	//Search for the id number 3, and return the word if it is found.
	$myobject = new myclass ("");
	$myobject =& findclass (3,$classarr);
	echo $myobject->getword();

?>