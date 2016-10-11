<?php
// Example 10-5-3.php
$a = 7;
function test() {
  $GLOBALS['a'] = 20;
}
test();
echo "\$a = $a\n";
?>
