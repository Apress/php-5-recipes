<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>Sample 13.3</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
	<div style="width: 500px; text-align: left;">
		<?php
			//Function to determine a valid email address.
			function validemail($email){ 
		    	return preg_match("/^([a-zA-Z0-9])+([.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-]+)+[a-zA-Z0-9_-]$/",$email); 
			}
			//Handle the incoming data.
			if ($_POST['submitted'] == "yes"){
				//Let's declare a submission value that tells us if we are fine.
				$goodtogo = true;
				//Validate the name.
				try {
					if (trim ($_POST['yourname']) == ""){
						$goodtogo = false;
						throw new exception ("Sorry, you must enter your name.<br />");
					}
				} catch (exception $e) {
					echo $e->getmessage();
				}
				//Validate the select box.
				try {
					if ($_POST['myselection'] == "nogo"){
						$goodtogo = false;
						throw new exception ("Please make a selection.<br />");
					}
				} catch (exception $e) {
					echo $e->getmessage();
				}
				//And lastly, validate for a proper email addy.
				try {
					if (!validemail (trim ($_POST['youremail']))){
						$goodtogo = false;
						throw new exception ("Please enter a valid email address.<br />");
					}
				} catch (exception $e) {
					echo $e->getmessage();
				}
				//Now, if there were no errors, we can output the results.
				if ($goodtogo){
					echo "Your Name: " . $_POST['yourname'] . "<br />";
					echo "Your Selection: " . $_POST['myselection'] . "<br />";
					echo "Your Email Address: " . $_POST['youremail'] . "<br />";
				}
				?><br /><a href="sample13_3.php">Try Again</a><br /><?php
			}
		?>
		<?php
			//Only show the forms if we don't already have a submittal.
			if ($_POST['submitted'] != "yes"){
				?>
				<form action="sample13_3.php" method="post">
					<p>Example:</p>
					<input type="hidden" name="submitted" value="yes" />
					Your Name: <input type="text" name="yourname" maxlength="150" /><br /><br />
					Selection: 
					<select name="myselection">
						<option value="nogo">make a selection...</option>
						<option value="1">Choice 1</option>
						<option value="2">Choice 2</option>
						<option value="3">Choice 3</option>
					</select><br /><br />
					Your Email: <input type="text" name="youremail" maxlength="150" /><br />
					<input type="submit" value="Submit" style="margin-top: 10px;" />
				</form>
				<?php
			}
		?>
	</div>
</body>
</html>