<?php
// Example 14-7-3.php
require "./rss_db.inc";
if (empty($Mode)) $Mode = "List";

$RSS = new RSSdb('localhost', 'rss', 'secret', 'rssdb');

echo "<html><body><center><table border=1 width=75% cellspacing=0 cellpadding=0>";

switch (strtoupper($Mode)) {
  case "LIST" :
    $feeds = $RSS->GetFeeds(false);
    foreach($feeds as $feed) {
      echo <<<FEED
<tr>
  <td><a href='$PHP_SELF?Mode=Feed&FeedId=$feed[xid]'>$feed[title]</a><td>
  <td>$feed[description]<td>
  <td>$feed[link]<td>
</tr>
FEED;
    }
    break;
  case "FEED" :
    $items = $RSS->GetItems($FeedId);
    foreach($items as $item) {
      echo <<<ITEM
<tr>
  <td><a href='$item[link]'><b>$item[title]</b></a><br>
  $item[description]<td>
</tr>
ITEM;
    }
    break;
}
echo "</table></center></body></html>";

?>
