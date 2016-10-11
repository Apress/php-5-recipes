<?php
// Example 14-8-1.php
$var = "Creating a WDDX document with a single value.";
echo wddx_serialize_value(utf8_encode($var), "PHP Packet");
?>