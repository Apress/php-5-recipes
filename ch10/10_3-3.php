<?php
// Example 10-3-3.php
class myclass {
  public $name;
  public $address;
  private $age;
  function SetAge($age) {
    $this->age = $age;
  }
}

$obj = new myclass;
$obj->name = "John Smith";
$obj->address = "22 Main Street";
$obj->SetAge(47);

$arr = (array)$obj;
print_r($arr);
?>