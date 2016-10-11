<?php
// Example 14-7-2.php
require "XML/RSS.php";
require "./rss_db.inc";

$RSS = new RSSdb('localhost', 'rss', 'secret', 'rssdb');
$feeds = $RSS->GetFeeds();
foreach($feeds as $feed) {
  $rss_feed = new XML_RSS($feed['url']);
  $rss_feed->parse();
  $channel = $rss_feed->getchannelInfo();
  $RSS->UpdateChannel($feed['xid'], $channel['title'], $channel['link'], $channel['description']);
  foreach($rss_feed->getItems() as $item) {
    $RSS->AddItem($feed['xid'], $item['title'], $item['link'], $item['description'], $item['dc:date']);
  }
}
?>
