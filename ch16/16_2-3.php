<?php
// Example 16-2-3.php
require "Mail.php";
require "Mail/mime.php";

$to = array("sam@somedomain.com");
$headers = array(
  'From' => "joe@anotherdomain.com",
  'Cc' => "joe@anotherdomain.com",
  'Subject' => "Sending emails from PEAR::Mail"
);

$mime = new Mail_mime();

$txtBody = "Please read the HTML part of this message"

$mime->setTXTBody($txtBody);

$htmlBody = <<< BODY
<html><body>
<h1>Hi Sam,</h1><br>
This email is generated from a PHP script with the PEAR::Mail class.<br>
<img src='image.jpg'><br>
- Joe<br>
</body></html>
BODY;

$mime->setHTMLBody($htmlBody);
$mime->addHTMLImage('image.jpg', 'image/jpeg', 'image.jpg', true);

$body = $mime->get();
$headers = $mime->headers($headers);

$mail = Mail::factory('mail');
$mail->send($to, $headers, $body);
?>
