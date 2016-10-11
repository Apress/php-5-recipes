<?php
// Example 10-5-4.php
define('CONST1', 1);

function MyTest() {
  define('CONST2', 2);
}

MyTest();
echo "CONST1 = " . CONST1 . " and CONST2 = " . CONST2 . "\n";
?>
