<?php
  # Recipe 2-6 (second example)
  
  class Employee
  {
    const CATEGORY_WORKER = 0;
    const CATEGORY_SUPERVISOR = 1;
    const CATEGORY_ASST_MANAGER = 2;
    const CATEGORY_MANAGER = 3;
    
    public static $jobTitles = array('regular worker', 'supervisor', 'assistant manager', 'manager');
    
    public static $payRates = array(5, 8.25, 12.45, 17.5);
    
    public static function getCategoryInfo($cat)
    {
      printf("<p>A %s makes \$%.2f per hour.</p>\n",
              self::$jobTitles[$cat],
              self::$payRates[$cat]);
    }
    
    public static function calcGrossPay($hours, $cat)
    {
      return $hours * self::$payRates[$cat];
    }
    
    private $firstName;
    private $lastName;
    private $id;
    private $category;
    
    public function __construct($fname, $lname, $id, $cat = self::CATEGORY_WORKER)
    {
      $this->firstName = $fname;
      $this->lastName = $lname;
      $this->id = $id;
      $this->category = $cat;
    }
    
    public function getFirstName()
    {
      return $this->firstName;
    }
    
    public function getLastName()
    {
      return $this->lastName;
    }
    
    public function getId()
    {
      return $this->id;
    }
    
    public function getCategory()
    {
      return $this->category;
    }
    
    public function setFirstName($fname)
    {
      $this->firstName = $fname;
    }
    
    public function setLastName($lname)
    {
      $this->lastName = $lname;
    }
    
    public function setId($id)
    {
      $this->id = $id;
    }
    
    public function setCategory($cat)
    {
      $this->category = $cat;
    }
    public function promote()
    {
      if($this->category < self::CATEGORY_MANAGER)
        $this->category++;
    }

    public function demote()
    {
      if($this->category > self::CATEGORY_WORKER)
        $this->category--;
    }
    
    public function display()
    {      
      printf(
        "<p>%s %s is Employee #%d, and is a %s making \$%.2f per hour.</p>\n", 
        $this->getFirstName(), 
        $this->getLastName(), 
        $this->getId(),
        self::$jobTitles[ $this->getCategory() ],
        self::$payRates[ $this->getCategory() ]
            );
    }
    
    public function test()
    {
      printf("<p>%d</p>\n", self::CATEGORY_SUPERVISOR);
      printf("<p>%d</p>\n", self::CATEGORY_MANAGER);
    }
  }
  
  $bob = new Employee('Bob', 'Smith', 102, Employee::CATEGORY_SUPERVISOR);  
  $bob->display();
  
  $bob->promote();
  $bob->display();
  
  $bob->promote();
  $bob->display();
  
  $bob->demote();  
  $bob->display();

  Employee::getCategoryInfo(Employee::CATEGORY_SUPERVISOR);

  $hours_worked = 35.5;
  printf("<p>If %s %s works %.2f hours, he will gross \$%.2f.</p>\n",
          $bob->getFirstName(),
          $bob->getLastName(),
          $hours_worked,
          Employee::calcGrossPay($hours_worked, $bob->getCategory())
        );
  
  Employee::$jobTitles[0] = 'Janitor';
  
  printf("<pre>%s</pre>\n", print_r(Employee::$jobTitles, TRUE));
?>