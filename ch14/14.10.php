<?php
$root = new DomDocument('1.0', 'iso-8859-1');
$addresslist = $root->createElement("addresslist");

$names = array(
	"John Smith",
	"Jane Doe"
);
foreach ($names as $name) {
	$person = $root->createElement("person");
	$name_parts = explode(" ", $name);
	$first_name = $root->createElement("first_name", $name_parts[0]);
	$person->appendChild($first_name);
	$last_name = $root->createElement("last_name", $name_parts[1]);
	$person->appendChild($last_name);
	$addresslist->appendChild($person);
	
}
$root->appendChild($addresslist);

header("Content-Type: text/xml");
echo $root->saveXML();
?>