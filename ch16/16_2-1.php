<?php
// Example 16-2-1.php
require "Mail.php";

$to = array("sam@somedomain.com");
$headers = array(
  'From' => "joe@anotherdomain.com",
  'Cc' => "joe@anotherdomain.com",
  'Subject' => "Sending emails from PEAR::Mail"
);

$body = <<< BODY
Hi Sam,

This email is generated from a PHP script with the PEAR::Mail class.

- Joe
BODY;

$mail = Mail::factory('mail');
$mail->send($to, $headers, $body);
?>
