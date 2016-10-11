<?php

	//sample7_10.php

  //  Copyright 2005, Lee Babin (lee@thecodeshoppe.com)
  //  This code may be used and redistributed without charge
  //  under the terms of the GNU General Public
  //  License version 2.0 or later -- www.gnu.org
  //  Subject to the retention of this copyright
  //  and GPL Notice in all copies or derived works
  
  class cfile {
	  
    //The path to the file we wish to work with.
	protected $thepath;
	
	//Error messages in the form of constants for ease of use.
	const FOUNDERROR = "Sorry, the file in question does not exist.";
	const PERMERROR = "Sorry, you do not have the proper permissions on this file";
	const OPENERROR = "Sorry, the file in question could not be opened.";
	const CLOSEERROR = "Sorry, the file could not be closed.";
	  
	//The constructor function.
	public function __construct (){
		  
	  $num_args = func_num_args();
		  
	  if($num_args > 0){
	    $args = func_get_args();
		$this->thepath = $args[0];
	  }
	}
	
	//A function to open the file.
	private function openfile ($readorwrite){
		//First, ensure the file exists.
		try {
			if (file_exists ($this->thepath)){
				//Now, we need to see if we are reading or writing or both.
				$proceed = false;
				if ($readorwrite == "r"){
					if (is_readable($this->thepath)){
						$proceed = true;
					}
				} elseif ($readorwrite == "w"){
					if (is_writable($this->thepath)){
						$proceed = true;
					}
				} else {
					if (is_readable($this->thepath) && is_writable($this->thepath)){
						$proceed = true;
					}
				}
				try {
					if ($proceed){
						//We can now attempt to open the file.
						try {
							if ($filepointer = fopen ($this->thepath, $readorwrite)){
								return $filepointer;
							} else {
								throw new exception (self::OPENERROR);
								return false;
							}
						} catch (exception $e) {
							echo $e->getmessage();
						}
					} else {
						throw new exception (self::PERMERROR);
					}
				} catch (exception $e) {
					echo $e->getmessage();
				}
			} else {
				throw new exception (self::FOUNDERROR);
			}
		} catch (exception $e) {
			echo $e->getmessage();
		}
	}
	
	//A function to close a file.
	function closefile () {
		try {
			if (!fclose ($this->thepath)){
				throw new exception (self::CLOSEERROR);
			}
		} catch (exception $e) {
			echo $e->getmessage();
		}
	}
	
	//A function to read a file, then return the results of the read in a string.
	public function read () {
		//First, attempt to open the file.
		$filepointer = $this->openfile ("r");
		
		//Now, return a string with the read data.
		if ($filepointer != false){
			//Then we can read the file.
			return fread ($filepointer,filesize ($this->thepath));
		}
		
		//Lastly, close the file.
		$this->closefile ();
	}
	
	//A function to write to a file.
	public function write ($towrite) {
		//First, attempt to open the file.
		$filepointer = $this->openfile ("w");
		
		//Now, return a string with the read data.
		if ($filepointer != false){
			//Then we can read the file.
			return fwrite ($filepointer, $towrite);
		}
		
		//Lastly, close the file.
		$this->closefile ();
	}
	
	//A function to append to a file.
	public function append ($toappend) {
		//First, attempt to open the file.
		$filepointer = $this->openfile ("a");
		
		//Now, return a string with the read data.
		if ($filepointer != false){
			//Then we can read the file.
			return fwrite ($filepointer, $toappend);
		}
		
		//Lastly, close the file.
		$this->closefile ();
	}
	
	//A function to set the path to a new file.
	public function setpath ($newpath) {
		$this->thepath = $newpath;
	}
	
  }
  
  	//Then create a new instance of the class.
	$myfile = new cfile ("samplefile7.txt");
	
	//Now, let's try reading it.
	echo $myfile->read();
	
	//Then let's try writing to the file.
	$myfile->write ("Hello World!");
	
	//Then, let's try appending.
	$myfile->append ("Hello Again!");
  
?>