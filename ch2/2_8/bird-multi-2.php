<?php
  # Recipe 2-8 (first example)
  
  abstract class Bird
  {    
    private $name;
    private $breed;
    private $price;
    
    public function __construct($name, $breed, $price=15)
    {
      $this->setName($name);
      $this->setBreed($breed);
      $this->setPrice($price);
    }
    
    abstract public function birdCall();
    
    public function setName($name)
    {
      $this->name = $name;
    }
    
    private function setBreed($breed)
    {
      $this->breed = $breed;
    }
    
    public function setPrice($price)
    {
      $this->price = $price;
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
      printf("<p>%s is a %s, and costs \$%.2f.</p>",
              $this->getName(),
              $this->getBreed(),
              $this->getPrice());
    }
  }
  
  class Parrot extends Bird
  {
    public function birdCall()
    {
      printf("<p>%s says: *squawk*</p>\n", $this->getName());
    }
    
    public function __construct($name)
    {
      parent::__construct($name, 'parrot', 25);
    }
    
    public function curse()
    {
      printf("<p>%s curses like a sailor.</p>\n", $this->getName());
    }
    
    public function setBreed($breed)
    {
      parent::$breed = $breed;
    }
  }
  
  class Canary extends Bird
  {
    public function birdCall($singing=FALSE)
    {
      $sound = $singing ? "twitter" : "chirp";
      
      printf("<p>%s says: *%s*</p>\n", $this->getName(), $sound);
    }
    
    public function __construct($name)
    {
      parent::__construct($name, 'canary');
    }
  }
?>