<?php
// Example 14-3-1.php
$root = new DomDocument('1.0', 'iso-8859-1');
$html = $root->createElement("html");

$body = $root->createElement("body");
$table = $root->createElement("table");
$row = $root->createElement("tr");

$cell = $root->createElement("td", "value1");
$row->appendChild($cell);
$cell = $root->createElement("td", "value2");
$row->appendChild($cell);

$table->appendChild($row);
$body->appendChild($table);
$html->appendChild($body);

$root->appendChild($html);

echo $root->saveHTML();
?>