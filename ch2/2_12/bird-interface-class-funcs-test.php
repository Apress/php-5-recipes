<?php
  # Used in Recipes 2-12, 2-13, 2-14, 2-15, and 2-16

  //  include file containing petshop interface and class definitions
  require_once('./bird-interface.php');

  //  class having a private property
  class Shape
  {
    const NUM_SIDES_TRIANGLE = 3;
    const NUM_SIDES_SQUARE = 4;
    const NUM_SIDES_PENTAGON = 5;
    const NUM_SIDES_HEXAGON = 6;

    static $shapeNames = array('triangle', 'quadrilateral', 'pentagon', 'hexagon');

    public $numberOfSides;
    public $perimeter;

    private $name;

    function __construct($numberOfSides = 3, $sideLength = 10)
    {
      if($numberOfSides < 3)
        $this->numberOfSides = 3;
      elseif($numberOfSides > 6)
        $this->numberOfSides = 6;
      else
        $this->numberOfSides = $numberOfSides;

      $this->setName( Shape::$shapeNames[$this->numberOfSides - 3] );
      $this->perimeter = ($sideLength < 1 ? 1 : $sideLength) * $this->numberOfSides;
    }

    protected function setName($name)
    {
      $this->name = $name;
    }

    public function getName()
    {
      return $this->name;
    }
  }

  //  create some class instances
  $polly = new Parrot('Polynesia');
  $tweety = new Canary('Tweety');

  $square = new Shape(Shape::NUM_SIDES_SQUARE);

  //  now for some tests...

  $classes = array('Parrot', 'Canary', 'Bird', 'Monkey', 'Pet');
  $interfaces = array('Pet', 'Product', 'Customer', 'Bird');

  print "<p>";
  foreach($classes as $class)
    printf("The class '%s' is %sdefined.<br />\n",
            $class,
            class_exists($class, FALSE) ? '' : 'un');

  print "</p>\n<p>";

  foreach($interfaces as $interface)
    printf("The interface '%s' is %sdefined.<br />\n",
            $interface,
            interface_exists($interface, FALSE) ? '' : 'un');

  print "</p>\n";

  printf("<p>Parrot class methods: %s</p>\n",
          implode(', ', get_class_methods('Parrot')));
  printf("<p>\$polly instance methods: %s</p>\n",
          implode(', ', get_class_methods($polly)));
  printf("<p>Shape class methods: %s</p>\n",
          implode(', ', get_class_methods('Shape')));
  printf("<p>Pet interface methods: %s</p>\n",
          implode(', ', get_class_methods('Pet')));

  printf("<p>\$polly is an instance of %s and a child of %s<br />\n",
          get_class($polly),
          get_parent_class($polly));
  printf("\$tweety is an instance of %s and a child of %s</p>\n",
          get_class($tweety),
          get_parent_class($tweety));

  printf("<p>Parrot is a child of %s.<br />\n",
          get_parent_class('Parrot') != ''
            ? get_parent_class('Parrot')
            : 'no other class');
  printf("Bird is a child of %s.</p>\n",
          get_parent_class('Bird') != ''
            ? get_parent_class('Bird')
            : 'no other class');

  function write_parents($class)
  {
    $parent = get_parent_class($class);

    if($parent != '')
    {
      printf("<p>%s is a child of %s</p>\n", $class, $parent);
      write_parents($parent);
    }
    else
      printf("<p>%s has no parent class.</p>\n", $class);
  }

  write_parents('Canary');

  printf("<pre>Parrot class variables: %s</pre>",
          print_r(get_class_vars('Parrot'), TRUE));
  printf("<pre>\$polly object variables: %s</pre>",
          print_r(get_object_vars($polly), TRUE));

  printf("<pre>Shape class variables: %s</pre>",
          print_r(get_class_vars('Shape'), TRUE));
  printf("<pre>\$square object variables: %s</pre>",
          print_r(get_object_vars($square), TRUE));

  printf("<p>Interfaces currently available: %s</p>",
          implode(', ', get_declared_interfaces()));
  printf("<p>Classes currently available: %s</p>",
          implode(', ', get_declared_classes()));

  print "<p>";
  printf("\$polly is %sa Parrot.<br />\n",
          is_a($polly, 'Parrot') ? '' : 'not ');
  printf("\$polly is %sa Canary.<br />\n",
          is_a($polly, 'Canary') ? '' : 'not ');
  printf("\$polly is %sa Bird.<br />\n",
          is_a($polly, 'Bird') ? '' : 'not ');
  printf("\$polly is %sa Pet.<br />\n",
          is_a($polly, 'Pet') ? '' : 'not ');
  print "</p>\n";

  printf("<p>Canary class parents: %s</p>\n",
          implode(', ', class_parents($tweety)));
  printf("<p>Canary class implements: %s</p>\n",
          implode(', ', class_implements($tweety)));

  $class = 'ArrayIterator';
  eval("@\$object = new \$class();");
  printf("<p>%s class parents: %s</p>\n",
          $class,
          implode(', ', class_parents($object)));
  printf("<p>%s class implements: %s</p>\n",
          $class,
          implode(', ', class_implements($object)));
  printf("<p>%s class methods: %s</p>\n",
          $class,
          implode(', ', get_class_methods($class)));
  printf("<pre>%s class variables: %s</pre>",
          $class,
          print_r(get_class_vars($class), TRUE));


  printf("<p>Reflector interface methods: %s</p>\n",
          implode(', ', get_class_methods('Reflector')));
  printf("<p>Reflection class methods: %s</p>\n",
          implode(', ', get_class_methods('Reflection')));
?>