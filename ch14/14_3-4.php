<?php
// Example 14-3-4.php
$root = new DomDocument('1.0', 'iso-8859-1');
$html = $root->createElement("html");
$body = $root->createElement("body");
$script = $root->createElement("script");

$txt = $root->createCDATASection(
"function SubmitForm() {
  if (document.myform.name.value == '') {
    alert('Name cannot be empty');
    document.myform.name.focus();
  }
}"
);
$script->appendChild($txt);

$body->appendChild($script);
$html->appendChild($body);
$root->appendChild($html);

header("Content-Type: text/xml");
echo $root->saveXML();
?>
