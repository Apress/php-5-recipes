<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>Sample 13.7</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script language="javascript" type="text/javascript">
	<!--
	function checkandsubmit() {
		//Disable the submit button.
		document.test.submitbut.disabled = true;
		//Then submit the form.
		document.test.submit();
	}
	//-->
</script>
</head>
<body>
	<div style="width: 500px; text-align: left;">
		<form action="sample13_7_process.php" method="post" name="test" onsubmit="return checkandsubmit ()">
			<p>Example:</p>
			<input type="hidden" name="submitted" value="yes" />
			Your Name: <input type="text" name="yourname" maxlength="150" /><br />
			<input type="submit" value="Submit" style="margin-top: 10px;" id="submitbut" name"submitbut" />
		</form>
	</div>
</body>
</html>