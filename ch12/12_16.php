<?php

	//sample12_16.php

	//Class to create and maintain http authorization.
	class httpauth {
		
		protected $filepath;
		protected $passpath;
		
		//A function to construct the class.
		public function __construct (){
			$num_args = func_num_args();
		  
			if($num_args > 0){
				$args = func_get_args();
				$this->filepath = $args[0];
				//Check the validity of the file path.
				try {
					if (is_file ($this->filepath)){
						//Validate that the file is named .htaccess.
						try {
							$expfilename = explode ("/", $this->filepath);
							if ($expfilename[count($expfilename) - 1] != ".htaccess"){
								throw new exception ("Sorry, file must be named .htaccess.");
							} else {
								try {
									//Make sure the file is writable.
									if (!is_writable ($this->filepath)){
										throw new exception ("File must be writable.");
									}
								} catch (exception $e){
									echo $e->getmessage();
								}
							}
						} catch (exception $e){
							echo $e->getmessage();
						}
					} else {
						throw new exception ("Sorry, file does not exist.");
					}
				} catch (exception $e){
					echo $e->getmessage();
				}
				//Now, check the validity of the password file.
				$this->passpath = $args[1];
				try {
					if (is_file ($this->passpath)){
						//Make sure the file is writable.
						try {
							if (!is_writable ($this->passpath)){
								throw new exception ("Password file must be writable.");
							}
						} catch (exception $e){
							echo $e->getmessage();
						}
					} else {
						throw new exception ("Sorry, password file does not exist.");
					}
				} catch (exception $e){
					echo $e->getmessage();
				}
			}
		}
		//Function to add a user to the password file.
		public function adduser ($user, $pass) {
			//Make sure a given user does not alreay exist.
			try {
				if ($file = fopen ($this->passpath,"r")){
					$proceed = true;
					//Run through the file.
					while ($input = fgets ($file, 200)){
						$exp = explode (":", $input);
						//If this user already exists, then we stop right here.
						if ($user == $exp[0]){
							$proceed = false;
						}
					}
					fclose ($file);
				} else {
					throw new exception ("Sorry, could not open the password file for reading.");
				}
			} catch (exception $e) {
				echo $e->getmessage();
			}
			try {
				//If we are good to go, then write to the file.
				if ($proceed){
					try {
						//Open the password file for appending.
						if ($file = fopen ($this->passpath,"a")){
							
							//And then append a new username and password.
							fputs($file,$user . ":" . crypt ($pass) . "\n");
					    	fclose($file);
					    } else {
							throw new exception ("Error opening the password file for appending");
						}
					} catch (exception $e) {
						echo $e->getmessage();
					}
				} else {
					throw new exception ("Sorry, this username already exists.");
				}
			} catch (exception $e){
				echo $e->getmessage();
			}
		}
		//Function to add http authorization.
		public function addauth ($areaname = "Protected Zone") {
			//Now, protect the directory.
			try {
				if ($file = fopen ($this->filepath, "w+")){
					fputs($file, "Order allow,deny\n");
			       	fputs($file, "Allow from all\n");
			       	fputs($file, "AuthType        Basic\n");
			       	fputs($file, "AuthUserFile    " . $this->passpath . "\n\n");
			       	fputs($file, "AuthName        \"" . $areaname . "\"\n");
			       	fputs($file, "require valid-user\n");
			       	fclose($file);
				} else {
					throw new exception ("Sorry, could not open htaccess file for writing.");
				}
			} catch (exception $e) {
				echo $e->getmessage();
			}
		}
		//Function to remove a user from the password listing.
		public function removeuser ($user) {
			//Run through the current file and get all of the usernames and passwords.
			$userarray = array ();
			$passarray = array ();
			$arrcounter = 0;
			try {
				if ($file = fopen ($this->passpath,"r")){
					//Run through the file.
					while ($input = fgets ($file, 200)){
						$exp = explode (":", $input);
						//If this user already exists, then we stop right here.
						if ($user != $exp[0]){
							//Then add to the list.
							$userarray[$arrcounter] = $exp[0];
							$passarray[$arrcounter] = $exp[1];
							$arrcounter++;
						}
					}
					fclose ($file);
				} else {
					throw new exception ("Sorry, could not open the password file for reading.");
				}
			} catch (exception $e) {
				echo $e->getmessage();
			}
			//Then go through the file again and write back all the logins in the array.
			try {
				if ($file = fopen ($this->passpath,"w")){
					//Run through the file.
					for ($i = 0; $i < count ($userarray); $i++){
						if ($userarray[$i] != "" && $passarray[$i] != ""){
							fputs ($file, $userarray[$i] . ":" . $passarray[$i] . "\n");
						}
					}
					fclose ($file);
				} else {
					throw new exception ("Sorry, could not open the password file for writing.");
				}
			} catch (exception $e) {
				echo $e->getmessage();
			}
		}
		//Function to change the password of a user.
		public function changepass ($user,$newpass){
			try {
				if ($newpass == ""){
					throw new exception ("Sorry, you must supply a new password");
				} else {
					$userarray = array ();
					$passarray = array ();
					$arrcounter = 0;
					try {
						if ($file = fopen ($this->passpath,"r")){
							//Run through the file.
							while ($input = fgets ($file, 200)){
								$exp = explode (":", $input);
								//If we don't have a match we to the array.
								if ($user != $exp[0]){
									//Then add to the list.
									$userarray[$arrcounter] = $exp[0];
									$passarray[$arrcounter] = $exp[1];
									$arrcounter++;
								} else {
									//Else we change the pass.
									$userarray[$arrcounter] = $exp[0];
									$passarray[$arrcounter] = crypt ($newpass);
									$arrcounter++;
								}
							}
							fclose ($file);
						} else {
							throw new exception ("Sorry, could not open the password file for reading.");
						}
					} catch (exception $e) {
						echo $e->getmessage();
					}
					//Then go through the file again and write back all the logins in the array.
					try {
						if ($file = fopen ($this->passpath,"w")){
							//Run through the file.
							for ($i = 0; $i < count ($userarray); $i++){
								if ($userarray[$i] != "" && $passarray[$i] != ""){
									fputs ($file, $userarray[$i] . ":" . $passarray[$i] . "\n");
								}
							}
							fclose ($file);
						} else {
							throw new exception ("Sorry, could not open the password file for writing.");
						}
					} catch (exception $e) {
						echo $e->getmessage();
					}
				}
			} catch (exception $e){
				echo $e->getmessage();
			}
		}
		
		//Function to kill the authorization.
		public function removeauth () {
			unlink ($this->filepath);
		}
	}
	//Set this path to your password file.
	$passpath = "/home/ensbabin/public_html/php5recipes/chapter12/code/htpasswd";
	//Set this path to the folder you want to protect.
	$toprotect = "/home/ensbabin/public_html/php5recipes/chapter12/code/foldertoprotect/.htaccess";
	//Create a new instance of an httpauth.
	$myhttp = new httpauth ($toprotect, $passpath);
	//Add user.
	$myhttp->adduser ("test","test");
	//Protect a directory.
	$myhttp->addauth ("My Protected Zone");
	//Add another user.
	$myhttp->adduser ("phpauth","sample");
	//Change a user's password.
	$myhttp->changepass ("phpauth","testing");
	//Remove a user.
	$myhttp->removeuser ("phpauth");
	//Remove the protection entirely.
	$myhttp->removeauth ();
?>