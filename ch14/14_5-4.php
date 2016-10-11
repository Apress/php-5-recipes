<?php
// Example 14-5-4.php
$slashdot = DOMDocument::load("http://slashdot.org/slashdot.xml");
$stories = $slashdot->getElementsByTagName("story");
foreach($stories as $story) {
  $titles = $story->getElementsByTagName("title");
  foreach($titles as $title) {
    echo $title->nodeValue . " - ";
  }
  $urls = $story->getElementsByTagName("url");
  foreach($urls as $url) {
    echo $url->nodeValue . "\n";
  }
}
?>
