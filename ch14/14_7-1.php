<?php
// Example 14-7-1.php
require "XML/RSS.php";
$rss = new XML_RSS("http://php.net/news.rss");
$rss->parse();

foreach($rss->getItems() as $item) {
	print_r($item);
}
?>