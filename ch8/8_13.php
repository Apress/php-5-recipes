<?php

	//sample8_13.php

	//This function takes in the current width and height of an image
	//and also the max width and height desired.
	//It then returns an array with the desired dimensions.
	function setWidthHeight($width, $height, $maxwidth, $maxheight){
		if ($width > $height){
			if ($width > $maxwidth){
				//Then we have to resize it.
				
				//Then we have to resize the height to correspond to the change in width.
				$difinwidth = $width / $maxwidth;

				$height = intval($height / $difinwidth);

				//Then default the width to the maxwidth;
				$width = $maxwidth;

				//Now, we check if the height is still too big in case it was to begin with.
				if ($height > $maxheight){
					//Rescale it.
					$difinheight = $height / $maxheight;

					$width = intval($width / $difinheight);

					//Then default the height to the maxheight;
					$height = $maxheight;

				}
			} else {
				if ($height > $maxheight){
					//Rescale it.
					$difinheight = $height / $maxheight;

					$width = intval($width / $difinheight);

					//Then default the height to the maxheight;
					$height = $maxheight;

				}
			}
		} else {
			if ($height > $maxheight){
				//Then we have to resize it.
		
				//We have to resize the width to correspond to the change in width.
				$difinheight = $height / $maxheight;

				$width = intval($width / $difinheight);

				//Then default the height to the maxheight;
				$height = $maxheight;

				//Now, we check if the width is still too big in case it was to begin with.
				if ($width > $maxwidth){
					//Rescale it.
					$difinwidth = $width / $maxwidth;

					$height = intval($height / $difinwidth);

					//Then default the width to the maxwidth;
					$width = $maxwidth;

				}
			} else {
				if ($width > $maxwidth){
					//Rescale it.
					$difinwidth = $width / $maxwidth;

					$height = intval($height / $difinwidth);

					//Then default the width to the maxwidth;
					$width = $maxwidth;
				}
			}
		}
		$widthheightarr = array ("$width","$height");
		return $widthheightarr;
	}
	
	//This function creates a thumbnail and then saves it.
	function createthumb ($img, $constrainw, $constrainh){
		
		//Find out the old measurements.
		$oldsize = getimagesize ($img);
		//Find an appropriate size.
		$newsize = setWidthHeight ($oldsize[0], $oldsize[1], $constrainw, $constrainh);
		
		//Create a duped thumbnail.
		$exp = explode (".", $img);
		
		//Check if we need a gif or jpeg.
		if ($exp[1] == "gif"){
			$src = imagecreatefromgif ($img);
		} else {
			$src = imagecreatefromjpeg ($img);
		}
	    //Make a true type dupe.
        $dst = imagecreatetruecolor ($newsize[0],$newsize[1]);
        //Resample it.
        imagecopyresampled ($dst,$src,0,0,0,0,$newsize[0],$newsize[1],$oldsize[0],$oldsize[1]);
        //Create a thumbnail.
        $thumbname = $exp[0] . "_th." . $exp[1];
        
        if ($exp[1] == "gif"){
	        imagejpeg ($dst,$thumbname);
        } else {
        	imagejpeg ($dst,$thumbname);
        }
                      
        //And then clean up.
        imagedestroy ($dst);
        imagedestroy ($src);
        
        return $thumbname;
        
    }
    
    $theimg = "images/tiger.jpg";
	$thumb = createthumb ($theimg, 300, 300);
	?><img src="<?php echo $thumb; ?>" style="border: none;" alt="" title="" /><?php
?>