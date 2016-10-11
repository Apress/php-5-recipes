<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sample 15.10</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
	<?php
		//Get the current info.
		$mysqli = new mysqli ("localhost","apress","testing","cds");
		//Attempt to connect.
		try {
			if (mysqli_connect_errno()){
				throw new exception ("Error: " . mysqli_connect_errno() . " - " . mysqli_connect_error());
			}
		} catch (exception $e){
			echo $e->getmessage();
		}
			
		//Let's prepare the edit statement.
		$prep = $mysqli->prepare ("UPDATE userlogin SET name=?, email=?, username=?, password=?");
		$prep->bind_param ('ssss',$_POST['name'],$_POST['email'],$_POST['user'],$_POST['pass']);
		
		//Then bind the result statement.
		if ($result = $mysqli->prepare ("SELECT name,email,username,password FROM userlogin")){
		} else {
			echo $mysqli->errno . " - " . $mysqli->error;
		}
		
		if ($_POST['submitted'] == "yes"){
			//We simply execute the prep statement.
			$prep->execute();
			//And output the result.
			echo "Update successfully completed: " . $prep->affected_rows . " row(s) affected.";
			?><p><a href="sample15_10.php">Update again?</a></p><?php
		} else {
			//Execute the result.
			$result->execute ();
			//Bind the results.
			$result->bind_result ($name,$email,$username,$password);
			//Then fetch the row.
			$result->fetch();
			?>
			<form action="sample15_10.php" method="post">
				<p>Please fill out the form to change your login information.</p>
				<div style="width: 250px;">
					<div style="width: 30%; float: left;">
						Name:
					</div>
					<div style="width: 59%; float: right;">
						<input type="text" name="name" value="<?php echo stripslashes ($name); ?>" />
					</div>
					<br style="clear: both;" />
				</div>
				<div style="width: 250px; margin-top: 10px;">
					<div style="width: 30%; float: left;">
						Email:
					</div>
					<div style="width: 59%; float: right;">
						<input type="text" name="email" value="<?php echo stripslashes ($email); ?>" />
					</div>
					<br style="clear: both;" />
				</div>
				<div style="width: 250px; margin-top: 10px;">
					<div style="width: 30%; float: left;">
						Username:
					</div>
					<div style="width: 59%; float: right;">
						<input type="text" name="user" value="<?php echo stripslashes ($username); ?>" />
					</div>
					<br style="clear: both;" />
				</div>
				<div style="width: 250px; margin-top: 10px;">
					<div style="width: 30%; float: left;">
						Password:
					</div>
					<div style="width: 59%; float: right;">
						<input type="text" name="pass" value="<?php echo stripslashes ($password); ?>" />
					</div>
					<br style="clear: both;" />
				</div>
				<br />
				<input type="hidden" name="submitted" value="yes" />
				<input type="submit" value="Edit" />
			</form>
			<?php
		}
		//Close the connection.
		$mysqli->close();
			
	?>
</body>
</html>