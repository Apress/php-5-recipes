<?php

	//sample8_7_script.php

	//The first thing we do is check for GD compatibility.
	try {
		//First we create a blank canvas.
		if ($animage = imagecreate (500, 500)){
			//Now, let's allocate our background color and line color.
			$white = imagecolorallocate ($animage, 255, 255, 255);
			$black = imagecolorallocate ($animage, 0, 0, 0);
			//Now, let's draw the rectange over our background, and surround
			//it with a black line.
			imagefilledrectangle ($animage, 0, 0, 500, 500, $black);
			imagefilledrectangle ($animage, 1, 1, 498, 498, $white);
			//Now, let's create some more colors for our title.
			$blue = imagecolorallocate ($animage, 0, 0, 255);
			$green = imagecolorallocate ($animage, 0, 255, 0);
			//Now, let's center the text at the top of our image.
			$title = "A Sample Poll";
			imagestring ($animage, 4, ((500 - (strlen($title) * imagefontwidth(4))) / 2), 5, $title, $blue);
			$copy = "Copyright Lee Babin";
			imagestring ($animage, 4, ((500 - (strlen($copy) * imagefontwidth(4))) / 2), 25, $copy, $green);
			//Now retrieve an array of values from the GET super global.
			$myvalues = array ($_GET['v1'],$_GET['v2'],$_GET['v3'],$_GET['v4'],$_GET['v5'],$_GET['v6']);
			//Now, we need to do some calculations.
			//Since we have 6 values here, we need to determine the ideal width each bar
			//should be while leaving room on the sides for clarity.
			$barwidth = (int) (500 / ((count ($myvalues) * 2)+ 1));
			//We now have our width, now we need a height to represent the values.
			//We take 30 pixels off the top to account for the title.
			$barheightpernum = (int) (500 / 10);
			//Now, we run through the values.
			for ($i = 0; $i < count ($myvalues); $i++){
				//And for every value we output the bar and a line around for aesthetics.
				imagefilledrectangle ($animage, ((($barwidth * $i) * 2) + $barwidth) - 1, 500 - (($barheightpernum * (int) $myvalues[$i]) - 35) - 1,(((($barwidth * $i) * 2) + $barwidth) + $barwidth) + 1,498, $black);
				imagefilledrectangle ($animage, ((($barwidth * $i) * 2) + $barwidth), 500 - (($barheightpernum * (int) $myvalues[$i]) - 35),(((($barwidth * $i) * 2) + $barwidth) + $barwidth),498, $green);
			}
			
			//Designate the image.
			imagepng ($animage);
			//Then output it.
			header ("Content-type: image/png");
			//Lastly, clean up.
			imagedestroy ($animage);
		} else {
			throw new exception ("Sorry, the GD library may not be setup.");
		}
	} catch (exception $e) {
		echo $e->getmessage();
	}
?>