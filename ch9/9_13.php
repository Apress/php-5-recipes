<?php
	// Assign some sample text to a variable.  The regular expression
	// should pull out anything in between the two p tags.
	$text = "<p>This is some text here \"</p>\".</p>";
	// This expresson is so long because it is doing this match without
	// using lazy qualifiers.  Plus, there are other things to think 
	// about, such as ignoring the </p> in double quotes above.
	ereg("<p>(([^<\"]|[^<]*<[^\/][^<])*(\"[^\"]*\"([^<\"]|[^<]*<[^\/][^<])*)*)?<\/p>", $text, $matches);
	echo "Found text: " . $matches[1] . "\n";	
?>
