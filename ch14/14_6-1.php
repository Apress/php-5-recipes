<?php
// Example 14-6-1.php
if (!extension_loaded("xsl")) {
  dl("php_xsl.dll");
}

$xslt = new xsltProcessor;
$xslt->importStyleSheet(DomDocument::load('slashdot.xsl'));
$slashdot = new DomDocument("1.0", "iso-8889-1");
$slashdot->preserveWhiteSpace = false;
$slashdot->load('http://slashdot.org/slashdot.xml');
$local_file = "slashdot.xml";
$ttl = 30 * 60;  // Cache in 30 min.
if (file_exists($local_file) && filemtime($local_file) > time() - $ttl) {
  $slashdot->load($local_file);
}
else {
  $slashdot->load('http://slashdot.org/slashdot.xml');
  $fp = fopen($local_file, "wt");
  if ($fp) {
    fwrite($fp, $slashdot->saveXML());
    fclose($fp);
  }
}
echo $xslt->transformToXML($slashdot);
?> 
