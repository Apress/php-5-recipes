<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>Sample 13.4 Page 3</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
	<div style="width: 500px; text-align: left;">
		<form action="sample13_4_page4.php" method="post">
			<p>Page 3 Data Collection:</p>
			Your Email: <input type="text" name="youremail" maxlength="150" /><br />
			<input type="hidden" name="yourname" value="<?php echo $_POST['yourname']; ?>" />
			<input type="hidden" name="yourselection" value="<?php echo $_POST['yourselection']; ?>" />
			<input type="submit" value="Submit" style="margin-top: 10px;" />
		</form>
	</div>
</body>
</html>