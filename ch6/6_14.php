<?php

	//Class to read in a page and then output various attributes from said page.
	class pagereader {
		
		protected $thepage;
		
		//The constructor function.
		public function __construct (){
		  
			$num_args = func_num_args();
		  
			if($num_args > 0){
				$args = func_get_args();
				$this->thepage = $args[0];
			}
		}
		
		//Function to determine the validity of a file then open it.
		function getfile () {
			try {
				if ($lines = file ($this->thepage)){
					return $lines;
				} else {
					throw new exception ("Sorry, the page could not be found.");
				}
			} catch (exception $e) {
				echo $e->getmessage();
			}
		}
		
		//Function to return an array of words found on a website.
		public function getwords (){
			$wordarray = array ();
			$lines = $this->getfile ();
			//An array of characters we count as an end to a word.
			$endword = array ("\"","<",">"," ",";","(",")","}","{");
			//Go through each line.
			for ($i = 0; $i < count ($lines); $i++){
				$curline = $lines[$i];
				$curline = str_split ($curline);
				for ($j = 0; $j < count ($curline); $j++){
					//Then start counting.
					$afterstop = false;
					$afterstring = "";
					$counter = 0;
					for ($k = $j; $k < count ($curline); $k++){
						$counter++;
						if (!$afterstop){
							if (!in_array ($curline[$k],$endword)){
								$afterstring = $afterstring . $curline[$k];
							} else {
								$afterstop = true;
								//Set j to the next word.
								$j = $j + ($counter - 1);
							}
						}
					}
					if (trim ($afterstring) != ""){
						$wordarray[] = $afterstring;
					}
				}
			}
			return $wordarray;
		}
		
		//Function to deliver an array of links from a website
		public function getlinks (){
			//Read the file.
			$lines = $this->getfile ();
			$impline = implode ("", $lines);
			//Remove new line characters.
			$impline = str_replace ("\n","",$impline);
			//Put a new line at the end of every link.
			$impline = str_replace("</a>","</a>\n",$impline);
			//Then split the impline into an array.
			$nlines = split("\n",$impline);
			
			//We now have an array that ends in an anchor tag at each line.					
			for($i = 0; $i < count($nlines); $i++){
				//Remove everything in front of the anchor tag.
				$nlines[$i] = eregi_replace(".*<a ","<a ",$nlines[$i]);
				//Grab the info in the href attribute.
				eregi("href=[\"']{0,1}([^\"'> ]*)",$nlines[$i],$regs);
				//And put it into the array.
				$nlines[$i] = $regs[1];
			}
			
			//Then we pass back the array.
			return $nlines;
		}
		
		//Function to deliver an array of emails from a site.
		public function getemails (){
			$emailarray = array ();
			//Read the file.
			$lines = $this->getfile ();
			//Go through each line.
			for ($i = 0; $i < count ($lines); $i++){
				//Then, on each line, look for a string that fits our description.
				if (substr_count ($lines[$i],"@") > 0){
					//Then go through the line.
					$curline = $lines[$i];
					//Turn curline into an array.
					$curline = str_split ($curline);
					for ($j = 0; $j < count ($curline); $j++){
						if ($curline[$j] == "@"){
							//Then grab all characters before and after the "@" symbol.
							$beforestring = "";
							$beforestop = false;
							$afterstring = "";
							$afterstop = false;
							//Grab all instances after the @ until a blank or tag.
							for ($k = ($j + 1); $k < count ($curline); $k++){
								if (!$afterstop){
									if ($curline[$k] != " " && $curline[$k] != "\"" && $curline[$k] != "<"){
										$afterstring = $afterstring . $curline[$k];
									} else {
										$afterstop = true;
									}
								}
							}
							//Grab all instances before the @ until a blank or tag.
							for ($k = ($j - 1); $k > 0; $k--){
								
								if (!$beforestop){
									if ($curline[$k] != " " && $curline[$k] != ">" && $curline[$k] != ":"){
										$beforestring = $beforestring . $curline[$k];
									} else {
										$beforestop = true;
									}
								}
							}
							//Reverse the string since we were reading it in backwards.
							$beforestring = strrev ($beforestring);
							$teststring = trim ($beforestring) . "@" . trim ($afterstring);
												
							if (preg_match("/^([a-zA-Z0-9])+([.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-]+)+[a-zA-Z0-9_-]$/",$teststring)){
								//Only include the email if it is not in the array.
								if (!in_array ($teststring,$emailarray)){
									$emailarray[] = $teststring;
								}
							}
						}
					}
				}
				
			}
			//Then we pass back the array.
			return $emailarray;
		}
		
	}
	
	$myreader = new pagereader ("http://www.apress.com");
	
	//None found ;).
	?><p style="font-weight: bold;">Emails:</p><?php
	print_r ($myreader->getemails ());
	//Whoa, a few links.
	?><p style="font-weight: bold;">Links:</p><?php
	print_r ($myreader->getlinks ());
	//Hold on to your hats, this will take a while...
	?><p style="font-weight: bold;">Words:</p><?php
	print_r ($myreader->getwords ());
	
?>