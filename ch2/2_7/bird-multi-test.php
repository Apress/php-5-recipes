<?php
  # Recipe 2-7 (second example)
  # Test the classes created in bird-multi.php
  
  require_once('./bird-multi.php');

  $polly = new Parrot('Polynesia');
  $polly->display();
  $polly->birdCall();
  $polly->curse();
    
  $tweety = new Canary('Tweety');
  $tweety->display();
  $tweety->birdCall();
  
  $tweety->setName('Carla');
  $tweety->display();
  $tweety->birdCall();
  $tweety->birdCall(TRUE);
  
  $aBird = new Bird('Lenny', 'lorakeet', 9.5);
  $aBird->display();
  $aBird->birdCall();
?>