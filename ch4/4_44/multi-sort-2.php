<?php
  # Recipe 4-44

  $eng = array('one', 'two', 'three', 'four');
  $esp = array('uno', 'dos', 'tres', 'cuatro');
  $deu = array('eins', 'zwei', 'drei', 'vier');
  $rus = array('odin', 'dva', 'tri', 'chetire');
  $digits = range(1,4);

  array_multisort($rus, $esp, $deu, $eng, $digits);

  foreach(range(0, 3) as $j)
    printf("<p>Russian: %s (%d); Spanish: %s; German: %s; English: %s.</p>",
            $rus[$j], $digits[$j], $esp[$j], $deu[$j], $eng[$j]);
?>


