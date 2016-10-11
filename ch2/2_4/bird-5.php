<?php
  # Recipe 2-4 (first example)
  
  class Bird
  {
    function __construct($name='No-name', $breed='unknown', $price = 15)
    {
      $this->name = $name;
      $this->breed = $breed;
      $this->price = $price;
    }    
    
    function setName($name)
    {
      $this->name = $name;
    }    
    
    function setBreed($breed)
    {
      $this->breed = $breed;
    }    
    
    function setPrice($price)
    {
      $this->price = $price < 0 ? 0 : $price;
    }
    
    function getName()
    {
      return $this->name;
    }    
    
    function getBreed()
    {
      return $this->breed;
    }    
    
    function getPrice()
    {
      return $this->price;
    }

    function display()
    {
      printf("<p>%s is a %s, and costs \$%.2f.</p>\n", 
              $this->name, $this->breed, $this->price);
    }
  }
  
  $magpie = new Bird('Malaysia', 'magpie', 7.5);

  $magpie->display();
  
  $magpie->setPrice(-14.95);

  $magpie->display();
  
  $magpie->price = -14.95;
  
  $magpie->display();
?>