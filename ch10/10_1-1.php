<?php
// Example 10-1-1.php
$text = array("0", "1", "\"\"", "\"0\"", "\"1\"", "true", "false", "array()", "array(\"1\")");
$values = array(0, 1, "", "0", "1", true, false, array(), array("1"));
foreach($values as $i=>$val) {
	echo "empty(" . $text[$i] . ") is " . (empty($val) ? "True" : "False") . "\n";
}
?>