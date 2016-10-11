<?php

	$hostRegex = "([a-z\d][-a-z\d]*[a-z\d]\.)*[a-z][-a-z\d]*[a-z]";
	$portRegex = "(:\d{1,})?";
	$pathRegex = "(\/[^\s?]+)?";
	$queryRegex = "(\?[^<>#\"\s]+)?";

	$urlRegex = "/(?:(?<=^)|(?<=\s))((ht|f)tps?:\/\/" . $hostRegex . $portRegex . $pathRegex . $queryRegex . ")/";

	$str = "This is my homepage:  http://home.example.com.";
	$str2 = "This is my homepage:  http://home.example.com:8181/index.php";

	$sample1 = preg_replace($urlRegex, "<a href=\"\\1\">\\1</a>", $str);
	$sample2 = preg_replace($urlRegex, "<a href=\"\\1\">\\1</a>", $str2);

	// Result will be:  
	// 
	// This is my homepage:  <a href="http://home.example.com">home.example.com</a>.

	echo $sample1 . "\n";

	// Result will be:  
	// 
	// This is my homepage:  <a href="http://home.example.com:8181/index.php">home.example.com:8181/index.php</a>

	echo $sample2 . "\n";

?>
