<?php
// Example 10-3-7.php
$arr = array(
  "abc" => "abc",
  "def" => 123.5,
  "ghi" => array(1,2,3),
  0 => "def"
);
$key = "abc";
$obj = (object) $arr;

echo "First value = $obj->abc\n";
echo "Second value = $obj->def\n";
echo "Third value = $obj->ghi\n";
?>