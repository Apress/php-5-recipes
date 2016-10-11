<?php
// Example 10-8-1.php
$fruits = array('apple', 'orange', 'pear', 'apricot', 'apple', 'apricot', 'orange', 'orange');

$str = serialize($fruits);
echo "$str\n";

$new_fruits = unserialize($str);
$new_fruits[] = 'apple';
print_r($new_fruits);
?>
