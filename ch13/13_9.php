<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>Sample 13.9</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
	<div style="width: 500px; text-align: left;">
		<?php
			//If we have received a submission.
			if ($_POST['submitted'] == "yes"){
				$yourname = $_POST['yourname'];
				//You can trim off blank spaces with trim.
				$yourname = trim ($yourname);
				//You can cut off code insertion with strip_tags.
				$yourname = strip_tags ($yourname);
				//You can turn any special characters into safe respresentations with htmlspecialchars.
				$yourname = htmlspecialchars ($yourname);
				//And you can prepare data for db insertion with addslashes.
				$yourname = addslashes ($yourname);
				
				//And echo the result.
				echo $yourname . "<br />";
				?><a href="sample13_9.php">Try Again</a><?php
			}
			//Only show the form if there is no submission.
			if ($_POST['submitted'] != "yes"){
				?>
				<form action="sample13_9.php" method="post">
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