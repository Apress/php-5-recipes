<?php
// Example 10-3-6.php
$arr = array(
  1 => "abc",
  "abc" => 123.5,
  array(1,2,3)
);
$key = "abc";

echo "First value = $arr[1]\n";
echo "Second value = $arr[abc]\n";
echo "Third value = $arr[2]\n";
echo "Third value = $arr[2][2]\n";

echo "Second value = ${arr['abc']}\n";
echo "Second value = ${arr["abc"]}\n";
echo "Second value = ${arr[$key]}\n";
?>