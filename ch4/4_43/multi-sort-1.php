<?php
  # Recipe 4-43

  $data
    = array(
        array('country'=>'Spain', 'language'=>'Spanish', 'visitors'=>1289),
        array('country'=>'France', 'language'=>'French', 'visitors'=>984),
        array('country'=>'Argentina', 'language'=>'Spanish', 'visitors'=>812),
        array('country'=>'UK', 'language'=>'English', 'visitors'=>3111),
        array('country'=>'Germany', 'language'=>'German', 'visitors'=>2786),
        array('country'=>'Canada', 'language'=>'English', 'visitors'=>2331),
        array('country'=>'Austria', 'language'=>'German', 'visitors'=>1102),
        array('country'=>'Mexico', 'language'=>'Spanish', 'visitors'=>1071)
     );

  # Uncomment this to obtain a view of the original array...
  # printf("<pre>%s</pre>\n", var_export($data, TRUE));

  $cols = array();

  foreach($data as $row)
  {
    foreach($row as $key => $value)
    {
      if( !isset($cols[$key]) )
        $cols[$key] = array();
      $cols[$key][] = $value;
    }
  }

  $data = $cols;

  # printf("<pre>%s</pre>\n", var_export($cols, TRUE));

  array_multisort($data['language'], $data['country'], $data['visitors']);

  # var_export($data);
  printf("<pre>%s</pre>\n", var_export($data, TRUE));

  array_multisort($data['language'], $data['visitors'], SORT_DESC, $data['country']);
  printf("<pre>%s</pre>\n", var_export($data, TRUE));
?>
<?php
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


