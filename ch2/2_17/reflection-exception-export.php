<?php
  # Recipe 2-17

  $rc = new ReflectionClass('ReflectionException');

?><pre><?php

  Reflection::export($rc);

?></pre><?php

  $methods = $rc->getMethods();

  foreach($methods as $method)
  {
    printf("<p>Method: %s; Number of parameters: %d</p>",
            $method->getName(),
            $method->getNumberOfParameters());
    $params = $method->getParameters();

    foreach($params as $param)
    {
      print "<pre>";

      Reflection::export($param);

      print "</pre>";
    }
  }

?>
