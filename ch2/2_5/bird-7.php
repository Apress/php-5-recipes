<?php
  # Recipe 2-5
  
  class Bird
  {
    public static $type = "bird";
    
    public static function fly($direction='around')
    {
      printf("<p>The bird is flying %s.</p>\n", $direction);
    }
    
    private $name;
    private $breed;
    private $price;
    
    public function __construct($name='No-name', $breed='unknown', $price = 15)
    {
      $this->name = $name;
      $this->breed = $breed;
      $this->price = $price;
    }    
    
    public function setName($name)
    {
      $this->name = $name;
    }    
    
    public function setBreed($breed)
    {
      $this->breed = $breed;
    }    
    
    public function setPrice($price)
    {
      $this->price = $price < 0 ? 0 : $price;
    }
    
    public function getName()
    {
      return $this->name;
    }    
    
    public function getBreed()
    {
      return $this->breed;
    }    
    
    public function getPrice()
    {
      return $this->price;
    }

    public function display()
    {
      printf("<p>The %s named '%s' is a %s, and costs \$%.2f.</p>\n", 
              self::$type, $this->name, $this->breed, $this->price);
    }
  }
  
  printf("<p>We use the Bird class to represent a %s.</p>\n", Bird::$type);
  
  Bird::fly();
  Bird::fly('south');
  
  $sam = new Bird('Toucan Sam', 'toucan');
  $sam->display();  
?>