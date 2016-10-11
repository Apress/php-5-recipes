<?php
// Example 16-2-2.php
require "Mail.php";
require "Mail/mime.php";

$to = array("sam@somedomain.com");
$headers = array(
  'From' => "joe@anotherdomain.com",
  'Cc' => "joe@anotherdomain.com",
  'Subject' => "Sending emaills from PEAR::Mail"
);

$mime = new Mail_mime();

$txtBody = <<< BODY
Hi Sam,

This email is generated from a PHP script with the PEAR::Mail class.

- Joe
BODY;

$mime->setTXTBody($txtBody);

$htmlBody = <<< BODY
<html><body>
<h1>Hi Sam,</h1><br>
This email is generated from a PHP script with the PEAR::Mail class.<br>
- Joe<br>
</body></html>
BODY;

$mime->setHTMLBody($htmlBody);

$body = $mime->get();
$headers = $mime->headers($headers);

$mail = Mail::factory('mail');
$mail->send($to, $headers, $body);
?>
