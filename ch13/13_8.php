<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>Sample 13.8</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
	<div style="width: 500px; text-align: left;">
		<?php
			//If we have received a submission.
			if ($_POST['submitted'] == "yes"){
				$goodtogo = true;
				//Check for a blank submission.
				try {
					if ($_FILES['image']['size'] == 0){
						$goodtogo = false;
						throw new exception ("Sorry, you must upload an image.");
					}
				} catch (exception $e) {
					echo $e->getmessage();
				}
				//Check for the file size.
				try {
					if ($_FILES['image']['size'] > 500000){
						$goodtogo = false;
						//Echo an error message.
						throw new exception ("Sorry, the file is too big at approx: " . intval ($_FILES['image']['size'] / 1000) . "KB");
					}
				} catch (exception $e) {
					echo $e->getmessage();
				}
				//Ensure that we have a valid mime type.
				$allowedmimes = array ("image/jpeg","image/pjpeg");
				try {
					if (!in_array ($_FILES['image']['type'],$allowedmimes)){
						$goodtogo = false;
						throw new exception ("Sorry, the file must be of type .jpg.  Yours is: " . $_FILES['image']['type'] . "");
					}
				} catch (exception $e) {
					echo $e->getmessage ();
				}
				//If we have a valid submission, move it, then show it.
				if ($goodtogo){
					try {
						if (!move_uploaded_file ($_FILES['image']['tmp_name'],"uploads/".$_FILES['image']['name'].".jpg")){
							$goodtogo = false;
							throw new exception ("There was an error moving the file.");
						}
					} catch (exception $e) {
						echo $e->getmessage ();
					}
				}
				if ($goodtogo){
					//Display the new image.
					?><img src="uploads/<?php echo $_FILES['image']['name'] . ".jpg"; ?>" alt="" title="" /><?php
				}
				?><br /><a href="sample13_8.php">Try Again</a><?php
			}
			//Only show the form if there is no submission.
			if ($_POST['submitted'] != "yes"){
				?>
				<form action="sample13_8.php" method="post" enctype="multipart/form-data">
					<p>Example:</p>
					<input type="hidden" name="submitted" value="yes" />
					Image Upload (.jpg only, 500KB Max):<br /> <input type="file" name="image" /><br />
					<input type="submit" value="Submit" style="margin-top: 10px;" />
				</form>
				<?php
			}
		?>
	</div>
</body>
</html>