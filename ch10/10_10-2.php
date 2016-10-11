<?php
// Example 10-10-2.php
include 'debug1.inc';

$a = array('orange', 'apple');
debug_print($a);
debug_print($a, __FILE__, __LINE__);
?>
