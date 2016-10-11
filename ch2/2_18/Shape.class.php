<?php

  /**
  * An example class for class/object functions
  * and Reflection examples - contains a mix of
  * public/private/protected/static members,
  * constants, etc. First shown in Recipe 2-12.
  */

  class Shape
  {

    const NUM_SIDES_TRIANGLE = 3;
    const NUM_SIDES_SQUARE = 4;
    const NUM_SIDES_PENTAGON = 5;
    const NUM_SIDES_HEXAGON = 6;

    static $shapeNames
      = array('triangle', 'quadrilateral', 'pentagon', 'hexagon');

    public $numberOfSides;
    public $perimeter;

    private $name;

    /**
    * Class constructor
    * input params:
    * int $numberOfSides, int $sideLength
    */

    function __construct($numberOfSides = 3, $sideLength = 10)
    {
      if($numberOfSides < 3)
        $this->numberOfSides = 3;
      elseif($numberOfSides > 6)
        $this->numberOfSides = 6;
      else
        $this->numberOfSides = $numberOfSides;

      $this->setName( Shape::$shapeNames[$this->numberOfSides - 3] );
      $this->perimeter =
        ($sideLength < 1 ? 1 : $sideLength) * $this->numberOfSides;
    }

    /**
    * Sets the name value
    * Input param:
    * string $name
    */

    protected function setName($name)
    {
      $this->name = $name;
    }

    /**
    * Retrieves the name value
    * returns string
    */

    public function getName()
    {
      return $this->name;
    }
  }
?>