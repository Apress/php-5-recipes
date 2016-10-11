<?php
  # More complete supplementary example showing 
  # how to obtain members of the mysqli class

  foreach(array('mysqli', 'mysqli_stmt', 'mysqli_result') as $class)
  {
    $rc = new ReflectionClass($class);

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
<hr />
<?php
  }
?>