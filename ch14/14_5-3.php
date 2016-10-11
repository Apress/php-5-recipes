<?php
// Example 14-5-3.php
$local_file = "slashdot.xml";
$ttl = 30 * 60;  // Cache in 30 min.
if (file_exists($local_file) && filemtime($local_file) > time() - $ttl) {
  echo "Loading from cache\n";
  $slashdot = DOMDocument::load($local_file);
}
else {
  echo "Loading from server\n";
  $slashdot = DOMDocument::load("http://slashdot.org/slashdot.xml");
  $fp = fopen($local_file, "wt");
  if ($fp) {
    fwrite($fp, $slashdot->saveXML());
    fclose($fp);
  }
}
?>
