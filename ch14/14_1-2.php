<?php
// Example 14-1-2.php
header("Content-Type: text/xml");

echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>\n";
echo "<inventory>\n";
$con = fbsql_connect("localhost", "user", "password");
if ($con) {
  fbsql_select_db("database", $con);
  $rs = fbsql_query("select * from products;", $con);
  if ($rs) {
    while($row = fbsql_fetch_assoc($rs)) {
      echo "<product id=\"$row[id]\">\n" .
          "<name>$row[name]</name>\n" .
          "</product>\n";
    }
    fbsql_free_result($rs);
  }
  fbsql_close($con);
}
echo "</inventory>";
?>