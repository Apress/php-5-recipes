<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>Sample 13.1</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
	<div style="width: 500px; text-align: left;">
		<?php
			//Handle incoming data.
			//This will trigger is we submit using GET
			if ($_GET['submitted'] == "yes"){
				if (trim ($_GET['yourname']) != ""){
					echo "Your Name (with GET): " . $_GET['yourname'];
				} else {
					echo "You must submit a value.";
				}
				?><br /><a href="sample13_1.php">Try Again</a><?php
			}
			if ($_POST['submitted'] == "yes"){
				if (trim ($_POST['yourname']) != ""){
					echo "Your Name (with POST): " . $_POST['yourname'];
				} else {
					echo "You must submit a value.";
				}
				?><br /><a href="sample13_1.php">Try Again</a><?php
			}
		?>
		<?php
			//Only show the forms if we don't already have a submittal.
			if ($_GET['submitted'] != "yes" && $_POST['submitted'] != "yes"){
				?>
				<form action="sample13_1.php" method="get">
					<p>GET Example:</p>
					<input type="hidden" name="submitted" value="yes" />
					Your Name: <input type="text" name="yourname" maxlength="150" /><br />
					<input type="submit" value="Submit with GET" style="margin-top: 10px;" />
				</form>
				<form action="sample13_1.php" method="post">
					<p>POST Example:</p>
					<input type="hidden" name="submitted" value="yes" />
					Your Name: <input type="text" name="yourname" maxlength="150" /><br />
					<input type="submit" value="Submit with POST" style="margin-top: 10px;" />
				</form>
				<?php
			}
		?>
	</div>
</body>
</html>