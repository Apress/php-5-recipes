<?php
  # Recipe 2-9 (second example)
  # Test the interfaces and classes defined in bird-interface.php
  
  require_once('./bird-interface.php');

  $polly = new Parrot('Polynesia');
  $polly->display();
  $polly->call();
  $polly->curse();
    
  $tweety = new Canary('Tweety');
  $tweety->display();
  $tweety->call();
  
  $tweety->setName('Carla');
  $tweety->display();
  $tweety->call();
  $tweety->call(TRUE);
?>