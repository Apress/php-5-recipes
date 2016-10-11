<?php
  # Recipes 4-1 and 4-2

  $my_array = array();
  $pets = array('Tweety', 'Sylvester', 'Bugs', 'Wile E.');
  $person = array('Bill', 'Jones', 24, 'CA');
  $customer = array('first' => 'Bill', 'last' => 'Jones',
                    'age' => 24, 'state' => 'CA');

  print "<p>Pet number 1 is named '$pets[0]'.</p>\n";
  print "<p>The person's age is $person[2].</p>\n";
  print "<p>The customer's age is {$customer['age']}.</p>\n";
?>