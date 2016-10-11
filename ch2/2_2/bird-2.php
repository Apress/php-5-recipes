<?php
  # Recipe 2-2
  
  class Bird
  {
      function __construct($name='No-name', $breed='unknown', $price = 15)
    {
      $this->name = $name;
      $this->breed = $breed;
      $this->price = $price;
    }
  }
  
  $aBird = new Bird();
  $tweety = new Bird('Tweety', 'canary');
  
  printf("<p>%s is a %s, and costs \$%.2f.</p>\n", 
          $aBird->name, $aBird->breed, $aBird->price);
  
  $tweety->price = 24.95;
  
  printf("<p>%s is a %s, and costs \$%.2f.</p>\n", 
          $tweety->name, $tweety->breed, $tweety->price);
?>