<?php
  # Additional example for Recipe 2-17

  require_once('./bird-interface.php');

  $class = 'Parrot';
  $method = 'call';
  $rm = new ReflectionMethod($class, $method);
  $rm->invoke( new $class('Polly') );
?>