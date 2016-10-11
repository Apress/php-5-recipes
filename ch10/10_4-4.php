<?php
// Example 10-4-4.php
$arr = array("apple", "orange", "pear");
define('MYARRAY', serialize($arr));

function MyTest() {
  print_r(unserialize(MYARRAY));
}

MyTest();
?>
