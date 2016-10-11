<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>Sample 13.11</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
	<div style="width: 500px; text-align: left;">
		<?php
			//If we have received a submission.
			if ($_POST['submitted'] == "yes"){
				echo $_POST['month'] . "/" . $_POST['day'] . "/" . $_POST['year'] . " - " . $_POST['hour'] . ":" . $_POST['minute'] . ":" . $_POST['second'];
				?><br /><a href="sample13_11.php">Try Again</a><?php
			}
			//Only show the form if there is no submission.
			if ($_POST['submitted'] != "yes"){
				?>
				<form action="sample13_11.php" method="post">
					<p>Example:</p>
					<input type="hidden" name="submitted" value="yes" />
					Select a Date and Time: <br />
					<select name="month">
						<?php
							for ($i = 1; $i <= 12; $i++){
								?><option value="<?php echo $i; ?>"<?php if ($i == date ("n")){?> selected="selected"<?php } ?>><?php echo $i; ?></option><?php
							}
						?>
					</select> / 
					<select name="day">
						<?php
							for ($i = 1; $i <= 31; $i++){
								?><option value="<?php echo $i; ?>"<?php if ($i == date ("j")){?> selected="selected"<?php } ?>><?php echo $i; ?></option><?php
							}
						?>
					</select> / 
					<select name="year">
						<?php
							for ($i = 1950; $i <= date ("Y"); $i++){
								?><option value="<?php echo $i; ?>"<?php if ($i == date ("Y")){?> selected="selected"<?php } ?>><?php echo $i; ?></option><?php
							}
						?>
					</select> - 
					<select name="hour">
						<?php
							for ($i = 1; $i <= 24; $i++){
								?><option value="<?php echo $i; ?>"<?php if ($i == date ("G")){?> selected="selected"<?php } ?>><?php echo $i; ?></option><?php
							}
						?>
					</select> : 
					<select name="minute">
						<?php
							for ($i = 1; $i <= 60; $i++){
								//Deal with leading zeros.
								if ($i < 10){
									$comparem = "0" . $i;
								} else {
									$comparem = $i;
								}
								?><option value="<?php echo $i; ?>"<?php if ($comparem == date ("i")){?> selected="selected"<?php } ?>><?php echo $i; ?></option><?php
							}
						?>
					</select> : 
					<select name="second">
						<?php
							for ($i = 1; $i <= 60; $i++){
								//Deal with leading zeros.
								if ($i < 10){
									$compares = "0" . $i;
								} else {
									$compares = $i;
								}
								?><option value="<?php echo $i; ?>"<?php if ($compares == date ("s")){?> selected="selected"<?php } ?>><?php echo $i; ?></option><?php
							}
						?>
					</select>
					<br /><input type="submit" value="Submit" style="margin-top: 10px;" />
				</form>
				<?php
			}
		?>
	</div>
</body>
</html>