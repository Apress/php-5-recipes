<?php
// Example 16-3-1.php
require "getmail.inc";

$mail = new GetMail("mail.somedomain.com", "user", "password", "pop3");

$msg = $mail->num_msg();
echo "Messages = $msg\n";
if ($msg > 0) {
  $headers = $mail->headers();
  foreach ($headers as $header) {
    echo "Subject: " . $header->subject . "\n";
    echo "\tFrom: " . $mail->format_address($header->from[0]) . "\n";
    echo "\tto: " . $mail->format_address($header->to[0]) . "\n";
  }
}
?>