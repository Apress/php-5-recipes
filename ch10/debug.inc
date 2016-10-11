<?php
// Example debug.inc
define('DEBUG', true); // set to false for disabling

function debug_print($var) {
  if (DEBUG) {
    switch (strtolower(substr(php_sapi_name(), 0, 3))) {
      case 'cli' :
        var_dump($var);
        break;
      default :
        print("<pre>");
        var_dump($var);
        print("</pre>");
        break;
    }
  }
}
?>
