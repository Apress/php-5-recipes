<?php
// Example 10-5-9.php
class myclass {
  const MYCONST = 123;
  private static $value = 567;
}

echo 'myclass::MYCONST = ' . myclass::MYCONST . "\n";
echo 'myclass::$value = ' . myclass::$value . "\n";
?>
