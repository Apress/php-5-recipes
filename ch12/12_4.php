<?php

	//sample12_4.php

	//A class to manage a very simple cookie set.
	class cookieclass {
		
		private $cookiename;
		private $cookievalue;
		private $cookieexpiry;
		
		//A function to construct the class.
		public function __construct (){
			$num_args = func_num_args();
		  
			if($num_args > 0){
				$args = func_get_args();
				$this->cookiename = $args[0];
				$this->cookievalue = $args[1];
				$this->cookieexpiry = $args[2];
				
				$this->cookieset();
			}
		}
		
		//The function to actually set a cookie.
		public function cookieset (){
			try {
				if ($this->cookiename != "" && $this->cookievalue != "" && $this->cookieexpiry != ""){
					setcookie ($this->cookiename, $this->cookievalue, time() + $this->cookieexpiry);
				} else {
					throw new exception ("Sorry, you must assign a name and expiry date for the cookie.");
				}
			} catch (exception $e){
				echo $e->getmessage();
			}
		}
		
		//A function to change the value of the cookie.
		public function change ($newvalue){
			$_COOKIE[$this->cookiename] = $newvalue;
		}
		
		//A function to retrieve the current value of the cookie.
		public function getvalue (){
			return $_COOKIE[$this->cookiename];
		}
		
		//A function to remove the cookie.
		public function remove (){
			$this->change ("");
		}
	}
	
	//Create a cookie.
	$mycookie = new cookieclass ("cookieid","1","60");
	
	echo $mycookie->getvalue() . "<br />"; //Echos 1.
	$mycookie->change ("Hello World!");
	echo $mycookie->getvalue() . "<br />"; //Echos Hello World!
	
	//Now, we kill off the cookie.
	$mycookie->remove();
	
	echo $mycookie->getvalue(); //Outputs nothing as the cookie is dead.
?>