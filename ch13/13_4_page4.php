<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>Sample 13.4 Page 4</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
	<div style="width: 500px; text-align: left;">
		<?php
			//Display the results.
			echo "Your Name: " . $_POST['yourname'] . "<br />";
			echo "Your Selection: " . $_POST['yourselection'] . "<br />";
			echo "Your Email: " . $_POST['youremail'] . "<br />";
		?>
		<a href="sample13_4_page1.php">Try Again</a>
	</div>
</body>
</html>