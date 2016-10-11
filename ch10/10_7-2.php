<?php
// Example 10-7-2.php
$a0 = 'This';
$a1 = 'is';
$a2 = 'a';
$a3 = 'test';

for ($i = 0; $i < 4; $i++) {
  $var = "a$i";
  echo "${$var} ";
}
?>
