<?php

	//sample15_8.php

	class mydb {
		
		private $user;
		private $pass;
		private $host;
		private $db;
		
		//Constructor function.
		public function __construct (){
			$num_args = func_num_args();
		  
			if($num_args > 0){
				$args = func_get_args();
				$this->host = $args[0];
				$this->user = $args[1];
				$this->pass = $args[2];
				
				$this->connect();
			}
		}
		
		//Function to connect to the database.
		private function connect (){
			try {
				if (!$this->db = mysql_connect ($this->host,$this->user,$this->pass)){
					$exceptionstring = "Error connection to database: <br />";
					$exceptionstring .= mysql_errno() . ": " . mysql_error();
					throw new exception ($exceptionstring);
				}
			} catch (exception $e) {
				echo $e->getmessage();
			}
		}
		
		//Function to select a database.
		public function selectdb ($thedb){
			try {
				if (!mysql_select_db ($thedb, $this->db)){
					$exceptionstring = "Error opening database: $thedb: <br />";
					$exceptionstring .= mysql_errno() . ": " . mysql_error();
					throw new exception ($exceptionstring);
				}
			} catch (exception $e) {
				echo $e->getmessage();
			}
		}
		
		//Function to perform a query.
		public function execute ($thequery){
			try {
				if (!mysql_query ($thequery, $this->db)){
					$exceptionstring = "Error performing query: $thequery: <br />";
					$exceptionstring .= mysql_errno() . ": " . mysql_error();
					throw new exception ($exceptionstring);
				} else {
					echo "Query performed correctly: " . mysql_affected_rows () . " row(s) affected.<br />";
				}
			} catch (exception $e) {
				echo $e->getmessage();
			}
		}
		
		//Function to return a row set.
		public function getrows ($thequery){
			try {
				if (!$aquery = mysql_query ($thequery)){
					$exceptionstring = "Error performing query: $thequery: <br />";
					$exceptionstring .= mysql_errno() . ": " . mysql_error();
					throw new exception ($exceptionstring);
				} else {
					$returnarr = array ();
					while ($adata = mysql_fetch_array ($aquery)){
						$returnarr = array_merge ($returnarr,$adata);
					}
					return $returnarr;
				}
			} catch (exception $e) {
				echo $e->getmessage();
			}
		}
				
		//Function to close the database link.
		public function __destruct() {
			try {
				if (!mysql_close ($this->db)){
					$exceptionstring = "Error closing connection: <br />";
					$exceptionstring .= mysql_errno() . ": " . mysql_error();
					throw new exception ($exceptionstring);
				}
			} catch (exception $e) {
				echo $e->getmessage();
			}
		}
		
	}
	
	//Now, let us create an instance of mydb.
	$mydb = new mydb ("localhost","apress","testing");
	
	//Now, we specify a database to use.
	$mydb->selectdb ("cds");
	
	//Now, let's perform an action.
	$adata = $mydb->execute ("UPDATE cd SET title='Hybrid Theory' WHERE cdid='2'");
	
	//Then, let's try to return a row set.
	$adata = $mydb->getrows ("SELECT * FROM cd ORDER BY cdid ASC");
	for ($i = 0; $i < count ($adata); $i++){
		echo $adata[$i] . "<br />";
	}
?>