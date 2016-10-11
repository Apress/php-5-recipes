<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>Sample 13.2</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
	<div style="width: 500px; text-align: left;">
		<?php
			//Handle the incoming data.
			//Here is how we could handle it with register globals turned on.
			if ($submitted == "yes"){
				if (trim ($yourname) != ""){
					echo "Your Name: $yourname.";
				} else {
					echo "You must submit a value.";
				}
				?><br /><a href="sample13_2.php">Try Again</a><br /><?php
			}
			//Now, here is how it SHOULD be handled with register_globals turned off.
			if ($_POST['submitted'] == "yes"){
				if (trim ($_POST['yourname']) != ""){
					echo "Your Name: " . $_POST['yourname'] . ".";
				} else {
					echo "You must submit a value.";
				}
				?><br /><a href="sample13_2.php">Try Again</a><br /><?php
			}
		?>
		<?php
			//Only show the forms if we don't already have a submittal.
			if ($_POST['submitted'] != "yes"){
				?>
				<form action="sample13_2.php" method="post">
					<p>Example:</p>
					<input type="hidden" name="submitted" value="yes" />
					Your Name: <input type="text" name="yourname" maxlength="150" /><br />
					<input type="submit" value="Submit" style="margin-top: 10px;" />
				</form>
				<?php
			}
		?>
	</div>
</body>
</html>