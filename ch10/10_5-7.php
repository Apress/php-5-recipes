<?php
// Example 10-5-7.php
class myclass {
  private $a;
  
  function set_value($val) {
    $this->a = $val;
  }

  function get_value() {
    return $this->a;
  }
}

$obj = new myclass;
$obj->set_value(123);
echo "Member a = " . $obj->get_value() . "\n";
?>
