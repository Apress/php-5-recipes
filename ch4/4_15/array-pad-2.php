<?php
  # Recipe 4-15 (second example)

  $birds = array('parrot', 'magpie', 'lorakeet', 'cuckoo');

  $more_birds = array_pad($birds, -6, 'some bird');

  printf("<p>More birds:</p><pre>%s</pre>\n", var_export($more_birds, TRUE));
?>