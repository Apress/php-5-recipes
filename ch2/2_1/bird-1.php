<?php
  # Recipe 2-1
  
  class Bird
  {
    function __construct($name, $breed)
    {
      $this->name = $name;
      $this->breed = $breed;
    }
  }
  
  $tweety = new Bird('Tweety', 'canary');
  
  printf("<p>%s is a %s.</p>\n", $tweety->name, $tweety->breed);
  
  $tweety->price = 24.95;
  
  printf("<p>%s is a %s, and costs \$%.2f.</p>\n", 
          $tweety->name, $tweety->breed, $tweety->price);
?>