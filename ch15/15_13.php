<?php

	//sample15_13.php

	//Class to convert MySQL into XML and back.
	class xmlconverter {
		
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
		
		//Function to convert xml to mysql.
		public function xmltomysql ($outputfile) {
			//First, attempt to open the database.
			$db = $this->connect ();
			//Now, attempt to open the xml for reading.
			try {
				if ($file = fopen ($outputfile,"r")){
					$xml = simplexml_load_file ($outputfile);
					//First, create the db.
					try {
						if (mysql_query ("CREATE DATABASE IF NOT EXISTS " . $xml->dbname . "")){
							//Now, select the database we want to export.
							$this->selectdb ($xml->dbname,$db);
							//Then, start going through the tables and creating them.
							foreach ($xml->table as $table){
								//Attempt to create the table.
								$ctable = "CREATE TABLE IF NOT EXISTS " . $table->tname . " (";
								$colcount = 0;
								$totcolcount = 0;
								//Now, we need to know how many columns are in this table.
								foreach ($table->tstructure->tcolumn as $totcol){
									$totcolcount++;
								}
								foreach ($table->tstructure->tcolumn as $col){
									$colcount++;
									$ctable .= $col->Field." ";
									//Deal with Nulls.
									$ctable .= $col->Type." ";
									if ($col->Null == "YES"){
										$ctable .= "NULL ";
									} else {
										$ctable .= "NOT NULL ";
									}
									//Deal with the default value.
									if ($col->Default != ""){
										$ctable .= "DEFAULT ".$col->Default." ";
									}
									//Deal with Auto_Increment
									if ($col->Extra != ""){
										$ctable .= "AUTO_INCREMENT ";
									}
									//And lastly deal with primary keys.
									if ($colcount != $totcolcount){
										if ($col->Key == "PRI"){
											$ctable .= ",PRIMARY KEY(".$col->Field."), ";
										} else {
											$ctable .= ", ";
										}
									} else {
										if ($col->Key == "PRI"){
											$ctable .= ",PRIMARY KEY(".$col->Field.") ";
										}
									}
								}
								$ctable .= ")";
								//Attempt to create the table.
								try {
									if (mysql_query ($ctable)){
										//Now we need to insert the data.
										foreach ($table->tdata->trow as $row){
											$insquery = "INSERT INTO ".$table->tname." (";
											//Find the number of rows.
											$totrow = 0;
											foreach ($row->children() as $totchild){
												$totrow++;
											}
											//First, set up the names of the values.
											$currow = 0;
											foreach ($row->children() as $name=>$node){
												$currow++;
												if ($currow != $totrow){
													$insquery .= $name.", ";
												} else {
													$insquery .= $name;
												}
											}
											$insquery .= ") VALUES (";
											//And then the data for insertion.
											$currow = 0;
											foreach ($row->children() as $childrendata){
												$currow++;
												if ($currow != $totrow){
													$insquery .= "'".$childrendata."', ";
												} else {
													$insquery .= "'".$childrendata."'";
												}
											}
											$insquery .= ")";
											//Now, attempt to do the insertion.
											try {
												if (!mysql_query ($insquery)){
													throw new exception (mysql_error());
												}
											} catch (exception $e) {
												echo $e->getmessage ();
											}
										}
									} else {
										throw new exception (mysql_error()."<br />");
									}
								} catch (exception $e) {
									echo $e->getmessage ();
								}
							}
						} else {
							throw new exception (mysql_error());
						}
					} catch (exception $e) {
						echo $e->getmessage ();
					}
					
				} else {
					throw new exception ("Sorry, xml file could not be opened.");
				}
			} catch (exception $e) {
				echo $e->getmessage ();
			}
			
		}
		
		//Function to convert mysql to xml.
		public function mysqltoxml ($database,$inputfile) {
			//First, attempt to connect to the database.
			$db = $this->connect ();
			//Now, select the database we want to export.
			$this->selectdb ($database,$db);
			//Now, attempt to open the xml file for writing.
			try {
				if ($file = fopen ($inputfile,"w")){
					//Output the version number.
					fwrite ($file, "<?xml version=\"1.0\"?>\n");
					//Now, first output the database as the main xml tab.
					fwrite ($file,"<db>\n");
					//Output the name of the database.
					fwrite ($file,"\t<dbname>".$database."</dbname>\n");
					//Now, go through the database and grab all table names.
					if ($tquery = mysql_query ("SHOW TABLES FROM $database")){
						if (mysql_num_rows ($tquery) > 0){
							while ($tdata = mysql_fetch_array ($tquery)){
								fwrite ($file,"\t<table>\n");
								fwrite ($file,"\t\t<tname>".$tdata[0]."</tname>\n");
								//Then, grab all fields in this table.
								if ($fquery = mysql_query ("SHOW COLUMNS FROM ".$tdata[0]."")){
									if (mysql_num_rows ($fquery) > 0){
										//First show the structure.
										fwrite ($file,"\t\t<tstructure>\n");
										//Start an array of names.
										$narr = array ();
										while ($fdata = mysql_fetch_assoc ($fquery)){
											$narr[] = $fdata['Field'];
											fwrite ($file,"\t\t\t<tcolumn>\n");
											fwrite ($file,"\t\t\t\t<Field>".$fdata['Field']."</Field>\n");
											fwrite ($file,"\t\t\t\t<Type>".$fdata['Type']."</Type>\n");
											fwrite ($file,"\t\t\t\t<Null>".$fdata['Null']."</Null>\n");
											fwrite ($file,"\t\t\t\t<Key>".$fdata['Key']."</Key>\n");
											fwrite ($file,"\t\t\t\t<Default>".$fdata['Default']."</Default>\n");
											fwrite ($file,"\t\t\t\t<Extra>".$fdata['Extra']."</Extra>\n");
											fwrite ($file,"\t\t\t</tcolumn>\n");
										}
										fwrite ($file,"\t\t</tstructure>\n");
										//Now, show the data.
										if ($dquery = mysql_query ("SELECT * FROM ".$tdata[0]."")){
											if (mysql_num_rows ($dquery) > 0 ){
												fwrite ($file,"\t\t<tdata>\n");
												//Start a counter.
												while ($ddata = mysql_fetch_assoc ($dquery)){
													fwrite ($file,"\t\t\t<trow>\n");
													$fcounter = 0;
													while ($ele = each ($ddata)){
														fwrite ($file,"\t\t\t\t\t<".$narr[$fcounter]. ">".$ele['value']."</".$narr[$fcounter].">\n");
														$fcounter++;
													}
													fwrite ($file,"\t\t\t</trow>\n");
												}
												fwrite ($file,"\t\t</tdata>\n");
											}
										} else {
											echo mysql_error();
										}
																		
									}
								} else {
									echo mysql_error();
								}
								fwrite ($file,"\t</table>\n");
							}
						}
					} else {
						echo mysql_error();
					}
					fwrite ($file,"</db>");
				} else {
					throw new exception ("Sorry, could not open the file for writing.");
				}
			} catch (exception $e) {
				echo $e->getmessage();
			}
			
		}
		
		//Function to drop a database, be careful with this one ;).
		public function dropdb ($thedb){
			try {
				if (!mysql_query ("DROP DATABASE $thedb", $this->db)){
					$exceptionstring = "Error dropping database: $thedb: <br />";
					$exceptionstring .= mysql_errno() . ": " . mysql_error();
					throw new exception ($exceptionstring);
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
	//Create a new instance of the class.
	$myconverter = new xmlconverter ("localhost","apress","testing");
	//Then convert the database into XML.
	$myconverter->mysqltoxml ("cds","test.xml");
	//Then drop the database to prove it works.
	$myconverter->dropdb ("cds");
	//Now completely recreate the db.
	$myconverter->xmltomysql ("test.xml");
?>