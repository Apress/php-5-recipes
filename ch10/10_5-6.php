<?php
// Example 10-5-6.php
class myclass {
  private $a;
  
  function set_value($val) {
    $this->a = $val;
  }
}

$obj = new myclass;
$obj->set_value(123);
echo "Member a = $obj->a\n";
$obj->a = 7;
echo "Member a = $obj->a\n";
?>
