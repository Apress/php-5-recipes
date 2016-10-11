<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>Sample 13.10</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
	<div style="width: 500px; text-align: left;">
		<?php
			//If we have received a submission.
			if ($_POST['submitted'] == "yes"){
				//Check if any have been selected.
				if (count ($_POST['fruit']) != 0){
					echo "Your Selections:<br />";
				} else {
					echo "You have not made any selections.<br /><br />";
				}
				//We can actually treat the submittal as an array.
				for ($i = 0; $i < count ($_POST['fruit']); $i++){
					echo $_POST['fruit'][$i] . "<br />";
				}
				?><a href="sample13_10.php">Try Again</a><?php
			}
			//Only show the form if there is no submission.
			if ($_POST['submitted'] != "yes"){
				?>
				<form action="sample13_10.php" method="post">
					<p>Example:</p>
					<input type="hidden" name="submitted" value="yes" />
					Your Choice (s): <br />
					<select name="fruit[]" multiple="multiple" style="width: 400px; height: 100px;">
						<option value="Bananas">Bananas</option>
						<option value="Apples">Apples</option>
						<option value="Oranges">Oranges</option>
						<option value="Pears">Pears</option>
						<option value="Grapes">Grapes</option>
						<option value="Kiwi">Kiwi</option>
					</select><br />
					<input type="submit" value="Submit" style="margin-top: 10px;" />
				</form>
				<?php
			}
		?>
	</div>
</body>
</html>