<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>Sample 13.5</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style>
	.error {
		font-weight: bold;
		color: #FF0000;
	}
</style>
</head>
<body>
	<div style="width: 500px; text-align: left;">
		<?php
			//Function to determine a valid e-mail address.
			function validemail($email){ 
		    	return preg_match("/^([a-zA-Z0-9])+([.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-]+)+[a-zA-Z0-9_-]$/",$email); 
			}
			//Default to showing the form.
			$goodtogo = false;
			
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
					?><span class="error"><?php echo $e->getmessage(); ?></span><?php
				}
				//Validate the select box.
				try {
					if ($_POST['myselection'] == "nogo"){
						$goodtogo = false;
						throw new exception ("Please make a selection.<br />");
					}
				} catch (exception $e) {
					?><span class="error"><?php echo $e->getmessage(); ?></span><?php
				}
				//And lastly, validate for a proper e-mail addy.
				try {
					if (!validemail (trim ($_POST['youremail']))){
						$goodtogo = false;
						throw new exception ("Please enter a valid e-mail address.<br />");
					}
				} catch (exception $e) {
					?><span class="error"><?php echo $e->getmessage(); ?></span><?php
				}
				//Now, if there were no errors, we can output the results.
				if ($goodtogo){
					echo "Your Name: " . $_POST['yourname'] . "<br />";
					echo "Your Selection: " . $_POST['myselection'] . "<br />";
					echo "Your E-mail Address: " . $_POST['youremail'] . "<br />";
					?><br /><a href="sample13_5.php">Try Again</a><br /><?php
				}
				
			}
			
			//Only show the forms if we do not have all of our valid information.
			if (!$goodtogo){
				?>
				<form action="sample13_5.php" method="post">
					<p>Example:</p>
					<input type="hidden" name="submitted" value="yes" />
					Your Name: <input type="text" name="yourname" maxlength="150" value="<?php echo $_POST['yourname']; ?>" /><br /><br />
					Selection: 
					<select name="myselection">
						<option value="nogo">make a selection...</option>
						<option value="1"<?php if ($_POST['myselection'] == 1){?> selected="selected"<?php } ?>>Choice 1</option>
						<option value="2"<?php if ($_POST['myselection'] == 2){?> selected="selected"<?php } ?>>Choice 2</option>
						<option value="3"<?php if ($_POST['myselection'] == 3){?> selected="selected"<?php } ?>>Choice 3</option>
					</select><br /><br />
					Your E-mail: <input type="text" name="youremail" maxlength="150" value="<?php echo $_POST['youremail']; ?>" /><br />
					<input type="submit" value="Submit" style="margin-top: 10px;" />
				</form>
				<?php
			}
		?>
	</div>
</body>
</html>