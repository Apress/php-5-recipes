<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>Sample 13.4 Page 2</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
	<div style="width: 500px; text-align: left;">
		<form action="sample13_4_page3.php" method="post">
			<p>Page 2 Data Collection:</p>
			Selection: 
			<select name="yourselection">
				<option value="nogo">make a selection...</option>
				<option value="1">Choice 1</option>
				<option value="2">Choice 2</option>
				<option value="3">Choice 3</option>
			</select><br /><br />
			<input type="hidden" name="yourname" value="<?php echo $_POST['yourname']; ?>" />
			<input type="submit" value="Submit" style="margin-top: 10px;" />
		</form>
	</div>
</body>
</html>