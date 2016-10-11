<?php
  # Recipe 4-3

  $customers
    = array(
        array('first' => 'Bill', 'last' => 'Jones',
              'age' => 24, 'state' => 'CA'),
        array('first' => 'Mary', 'last' => 'Smith',
              'age' => 32, 'state' => 'OH'),
        array('first' => 'Joyce', 'last' => 'Johnson',
              'age' => 21, 'state' => 'TX'),
      );
      
  $pet_breeds
    = array(
            'dogs' => array('Poodle', 'Terrier', 'Dachshund'),
            'birds' => array('Parrot', 'Canary'),
            'fish' => array('Guppy', 'Tetra', 'Catfish', 'Angelfish')
      );
      
  printf("<p>The name of the second customer is %s %s.</p>\n",
          $customers[1]['first'], $customers[1]['last']);
          
  printf("<p>%s and %s</p>", 
          $pet_breeds['dogs'][0], $pet_breeds['birds'][1]);
?>