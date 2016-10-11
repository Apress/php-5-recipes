<?php
// Example 14-3-x.php
$root = new DomDocument('1.0', 'iso-8859-1');
$html = $root->createElement("html");

$body = $root->createElement("body", "test");
$table = $root->createElement("table");
$row = $root->createElement("tr");

$cell = $root->createElement("td", "value1\ntest");
$row->appendChild($cell);
$cell = $root->createElement("td", "value2");
$row->appendChild($cell);

$table->appendChild($row);
$body->appendChild($table);
$html->appendChild($body);

$txt = $root->createTextNode(utf8_encode("This is a very long Text זרו"));
$body->appendChild($txt);

$root->appendChild($html);

echo $root->saveHTML();
?>