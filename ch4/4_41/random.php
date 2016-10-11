<?php
  # Recipe 4-41

  $nums = array(15, 2.2, -4, 2.3, 0);

  shuffle($nums);
  printf("<pre>%s</pre>\n", var_export($nums, TRUE));

  shuffle($nums);
  printf("<pre>%s</pre>\n", var_export($nums, TRUE));

  shuffle($nums);
  printf("<pre>%s</pre>\n", var_export($nums, TRUE));
?>

<?php
  # Additional example cut from the text

  $countries = array( 'USA' => 'English', 'Spain' => 'Spanish',
                      'Brasil' => 'Portuguese', 'UK' => 'English',
                      'Mexico' => 'Spanish', 'Germany' => 'German',
                      'Colombia' => 'Spanish', 'Canada' => 'English',
                      'Russia' => 'Russian', 'Austria' => 'German',
                      'France' => 'French', 'Argentina' => 'Spanish');

  printf("<p>Single random value: %s</p>\n",
          var_export(array_rand($countries), TRUE));
  printf("<p>2 random values: %s</p>\n",
          var_export(array_rand($countries, 2), TRUE));
  printf("<p>3 random values: %s</p>\n",
          var_export(array_rand($countries, 3), TRUE));
?>

<?php
  # Additional example cut from the text

  function kshuffle(&$array)
  {
    $copy = $array;
    $rkeys = array_rand($copy, count($copy));
    $ritems = array();

    foreach($rkeys as $rkey)
      $ritems[$rkey] = $copy[$rkey];

    $array = $ritems;
  }

  $countries = array( 'USA' => 'English', 'Spain' => 'Spanish',
                      'Brasil' => 'Portuguese', 'UK' => 'English',
                      'Mexico' => 'Spanish', 'Germany' => 'German',
                      'Colombia' => 'Spanish', 'Canada' => 'English',
                      'Russia' => 'Russian', 'Austria' => 'German',
                      'France' => 'French', 'Argentina' => 'Spanish');

  kshuffle($countries);
  printf("<pre>%s</pre>\n", var_export($countries, TRUE));

  kshuffle($countries);
  printf("<pre>%s</pre>\n", var_export($countries, TRUE));

  kshuffle($countries);
  printf("<pre>%s</pre>\n", var_export($countries, TRUE));
?>