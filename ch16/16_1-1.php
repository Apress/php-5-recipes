<?php
// Example 16-1-1.php
$to = "sam@somedomain.com";
$from = "joe@anotherdomain.com";
$cc = $from;
$subject = "Sending emails from PHP";
$body = <<< BODY
Hi Sam,

This email is generated from a PHP script.

- Joe
BODY;

mail($to, $subject, $body, "From: $from\r\nCc: $cc");
?>
