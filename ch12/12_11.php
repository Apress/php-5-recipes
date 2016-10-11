<?php

	//sample12_11.php

	//A class to determine a browser and platform type.
	class browser {
		//Our private variables.
		private $browseragent;
		private $browserversion;
		private $browserplatform;
		
		//A function to set the browser agent.
		private function setagent($newagent) {
			$this->browseragent = $newagent;
		}
		//A function to set the browser version.
		private function setversion($newversion) {
			$this->browserversion = $newversion;
		}
		//A function to set the browser platform.
		private function setplatform($newplatform) {
			$this->browserplatform = $newplatform;
		}
		//A function to determine what browser and version we are using.
		private function determinebrowser () { 
			if (ereg('MSIE ([0-9].[0-9]{1,2})',$_SERVER['HTTP_USER_AGENT'],$version)) {
				$this->setversion($version[1]);
				$this->setagent("IE");
		    } else if (ereg( 'Opera ([0-9].[0-9]{1,2})',$_SERVER['HTTP_USER_AGENT'],$version)) {
				$this->setversion($version[1]);
				$this->setagent("OPERA");
			} else if (ereg( 'Mozilla/([0-9].[0-9]{1,2})',$_SERVER['HTTP_USER_AGENT'],$version)) {
				$this->setversion($version[1]);
				$this->setagent("MOZILLA");
			} else {
				$this->setversion("0");
				$this->setagent("OTHER");
			}
		}
		//A function to determine the platform we are on.
		private function determineplatform () {
			if (strstr ($_SERVER['HTTP_USER_AGENT'],"Win")) {
				$this->setplatform("Win");
			} else if (strstr ($_SERVER['HTTP_USER_AGENT'],"Mac")) {
				$this->setplatform("Mac");
			} else if (strstr ($_SERVER['HTTP_USER_AGENT'],"Linux")) {
				$this->setplatform("Linux");
			} else if (strstr ($_SERVER['HTTP_USER_AGENT'],"Unix")) {
				$this->setplatform("Unix");
			} else {
				$this->setplatform("Other");
			}
		}
		//A function to return our current browser.
		public function getbrowser (){
			$this->determinebrowser ();
			return $this->browseragent . " " . $this->browserversion;
		}
		//A function to return our current platform.
		public function getplatform (){
			$this->determineplatform ();
			return $this->browserplatform;
		}
	}
	//Now, we simply create a new instance of our browser class.
	$mybrowser = new browser ();
	//And then we can determine out current browser and platform status.
	echo "Browser: " . $mybrowser->getbrowser() . "<br />";
	echo "Platform: " . $mybrowser->getplatform() . "<br />";
	//The bare bones output looks as such:
	echo $_SERVER['HTTP_USER_AGENT'];
?>