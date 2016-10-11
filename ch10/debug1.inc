<?php
// Example debug1.inc
define('DEBUG', true); // set to false for disabling

function debug_print($var, $file = __FILE__, $line = __LINE__) {
  if (DEBUG) {
	$where = "File = $file ($line)";
    switch (strtolower(substr(php_sapi_name(), 0, 3))) {
      case 'cli' :
        echo "$where\n";
        var_dump($var);
        break;
      default :
        echo "$where<br>";
        print("<pre>");
        var_dump($var);
        print("</pre>");
        break;
    }
  }
}
?>
