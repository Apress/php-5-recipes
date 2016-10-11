<?php
// Example 14-5-1.php
$doc = DOMDocument::loadHTMLFile("http://php.net");
echo $doc->saveHTML();
?>
