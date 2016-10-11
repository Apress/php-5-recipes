<?php
  # Recipe 2-3 (second example)

  class Bird
  {
    function __construct($name='No-name', $breed='unknown', $price = 15)
    {
      $this->name = $name;
      $this->breed = $breed;
      $this->price = $price;
    }
    
    function setPrice($price)
    {
      $this->price = $price;
    }
  }
  
  $polly = new Bird('Polynesia', 'parrot');
  
  printf("<p>%s is a %s, and costs \$%.2f.</p>\n", 
          $polly->name, $polly->breed, $polly->price);
  
  $polly->setPice(54.95);
  
  printf("<p>%s is a %s, and costs \$%.2f.</p>\n", 
          $polly->name, $polly->breed, $polly->price);

  printf("<pre>%s</pre>\n", print_r(get_object_vars($polly), TRUE));
?>