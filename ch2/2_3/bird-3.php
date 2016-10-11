<?php
  # Recipe 2-3 (first example)
  
  class Bird
  {
      function __construct($name='No-name', $breed='unknown', $price = 15)
    {
      $this->name = $name;
      $this->breed = $breed;
      $this->price = $price;
    }
  }
  
  $polly = new Bird('Polynesia', 'parrot');
  
  $polly->rice = 54.95;
  
  printf("<p>%s is a %s, and costs \$%.2f.</p>\n", 
          $polly->name, $polly->breed, $polly->price);

  printf("<pre>%s</pre>\n", print_r(get_object_vars($polly), TRUE));
?>