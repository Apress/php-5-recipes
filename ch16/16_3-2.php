<?php
// Example 16-3-2.php
require "getmail.inc";

$mail = new GetMail("news.php.net", "", "", "nntp", "php.gtk.dev");
$msg = $mail->num_msg();

echo <<< HTML
<html><body><table width=100% border=1>
  <tr>
    <td>UID</td>
    <td>Date</td>
    <td>Subject</td>
  </tr>
HTML;

if ($msg > 0) {
  $headers = $mail->headers($msg - 5, 5);
  foreach ($headers as $uid=>$header) {
    echo "<tr><td>$uid</td>" .
          "<td>" . $header->date . "</td>" .
          "<td>" . $header->subject . "</td>" .
          "</tr>";
  }
}
echo <<< HTML
</table></body></html>
HTML;

?>
