<?php
// Example 10-3-2.php
$a = array(
  "Name" => "John Smith",
  "Address" => "22 Main Street",
  "City" => "Irvine",
  "State" => "CA",
  "Zip" => "92618"
);
echo "Name = " . $a["Name"] . "\n";

$o = (object)$a;
echo "Address = $o->Address\n";
?>
