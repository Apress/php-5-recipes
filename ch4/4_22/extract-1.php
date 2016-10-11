<?php
  # Recipe 4-22 / Example 1

  $customer = array('first' => 'Bill', 'last' => 'Jones', 'age' => 24,
                               'street' => '123 Main St.', 'city' => 'Pacifica',
                               'state' => 'California');
  extract($customer);
  print "<p>$first $last is $age years old, and lives in $city, $state.</p>";

  extract($customer, EXTR_PREFIX_ALL, 'cust');
  print "<p>$cust_first $cust_last is $cust_age years old,
         and lives in $cust_city, $cust_state.</p>";
?>