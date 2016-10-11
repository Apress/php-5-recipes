<?php
	// This example shows how to escape a > character in HTML.
	$html = "<p> replace > and >> and >>> </p>";
	print "<b>Original text was: '" . $html . "'\n";
	// This is the part that gets a little difficult.  Not even PCRE
	// supports variable-length look-behinds, which would be 
	// necesary to make sure that the > isn't part of an HTML tag.
	// So the technique here is to reverse the string, then make
	// the subsitution because variable-width look-aheads are 
	// okay.
	$html = strrev( $html );
	// Replace the >, but only if it's not inside or part of an 
	// HTML tag.  With (?![^><]+?\/?<), we're looking for a tag
	// that has been started but not closed.
	$newhtml = preg_replace( "/>(?![^><]+?\/?<)/", ";tl&", $html );
	$newhtml = strrev( $newhtml );
	print "<b>New text is: '" . $newhtml . "'\n";
?>
