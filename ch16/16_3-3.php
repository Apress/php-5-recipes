<?php
// Example 16-3-3.php
require "getmail1.inc";

$mail = new GetMail("news.php.net", "", "", "nntp", "php.gtk.dev");
$msg = $mail->num_msg();

echo <<< HTML
<html><body><table width=100% border=1>
HTML;
if ($msg > 0) {
  $headers = $mail->headers($msg);
  foreach ($headers as $uid=>$header) {
    echo "<tr><td>UID</td><td>$uid</td></tr>" .
          "<tr><td>Date</td><td>" . $header->date . "</td></td>" .
          "<tr><td>Subject</td><td>" . $header->subject . "</td></td>" .
          "<tr><td>Body</td><td>";
    foreach ($mail->body($uid, FT_UID) as $i=>$part) {
      if ($part['MIMETYPE'] == "TEXT/PLAIN") {
        echo "<pre>" . $part['DATA'] . "</pre>";
      }
    }
    echo "</td></td></tr>";
  }
}
echo <<< HTML
</table></body></html>
HTML;
?>
