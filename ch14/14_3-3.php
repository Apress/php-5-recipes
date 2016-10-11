<?php
// Example 14-3-3.php
$root = new DomDocument('1.0', 'iso-8859-1');
$html = $root->createElement("html");
$body = $root->createElement("body");

$txt = $root->createTextNode(utf8_encode("This is a text with Danish characters זרו\n"));
$body->appendChild($txt);
$txt = $root->createTextNode(utf8_encode("& we could continue to add text to this document"));
$body->appendChild($txt);

$html->appendChild($body);
$root->appendChild($html);

echo $root->saveHTML();
?>