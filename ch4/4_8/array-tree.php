<?php
  # Recipe 4-8

  $customers
    = array(
            array('first' => 'Bill', 'last' => 'Jones',
              'age' => 24, 'state' => 'CA'),
            array('first' => 'Mary', 'last' => 'Smith',
              'age' => 32, 'state' => 'OH'),
            array('first' => 'Joyce', 'last' => 'Johnson',
              'age' => 21, 'state' => 'TX'),
      );

  printf("print_r():<pre>%s</pre>", print_r($customers, TRUE));

  printf("var_export():<pre>%s</pre>", var_export($customers, TRUE));

  print 'var_dump():<pre>';
  var_dump($customers);
  print '</pre>';
?>