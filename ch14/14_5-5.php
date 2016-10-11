<?php
// Example 14-5-5.php
$stories = simpleXML_load_file("http://slashdot.org/slashdot.xml");
foreach($stories as $story) {
  echo $story->title . " - ";
  echo $story->url . "\n";
}
?>
