<?php
  # Recipe 2-8 (second example)
  # Test the classes modified in bird-multi-2.php
  
  require_once('./bird-multi-2.php');

  $polly = new Parrot('Polynesia');
  $polly->display();
  $polly->call();
  $polly->curse();
    
  $tweety = new Canary('Tweety');
  $tweety->display();
  $tweety->birdCall();
  
  $tweety->setName('Carla');
  $tweety->display();
  $tweety->call();
  $tweety->birdCall(TRUE);
  
  $aBird = new Bird('Lenny', 'lorakeet', 9.5);
  $aBird->display();
  $aBird->birdCall();
?>