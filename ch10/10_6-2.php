<?php
// Example 10-6-2.php
define('COLUMN_NAME', 0);
define('COLUMN_TYPE', 1);

define('COLUMN_STRING', 1);
define('COLUMN_INTEGER', 2);

function GetData(&$data, &$meta) {
  $meta = array(
    array(
      COLUMN_NAME => "First Name", 
      COLUMN_TYPE => COLUMN_STRING
    ),
    array(
      COLUMN_NAME => "Last Name", 
      COLUMN_TYPE => COLUMN_STRING
    ),
    array(
      COLUMN_NAME => "Age", 
      COLUMN_TYPE => COLUMN_INTEGER
    )
  );
  $data = array(
    array("John", "Smith", 55),
    array("Mike", "Johnson", 33),
    array("Susan", "Donovan", 29),
    array("King", "Tut", 3346)
  );
  return sizeof($data);
}

function ListData($data, $meta) {
  echo "<table border=1>";
  foreach($data as $row) {
    echo "<tr>";
    foreach($row as $col=>$cell) {
      switch ($meta[$col][COLUMN_TYPE]) {
        case COLUMN_STRING :
          echo "<td align=left>$cell</td>";
        break;
      case COLUMN_INTEGER :
          echo "<td align=right>" . number_format($cell) . "</td>";
        break;
      }
    }
    echo "</tr>";
  }
  echo "</table>";
}

$d = array();
$m = array();
if (GetData($d, $m)) {
  ListData($d, $m);
}
?>