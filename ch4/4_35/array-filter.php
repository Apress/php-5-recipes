<?php
  # Recipe 4-35 / Example 1

  function array_display($array, $pre=FALSE)
  {
    $tag = $pre ? 'pre' : 'p';
    printf("<%s>%s</%s>\n", $tag, var_export($array, TRUE), $tag);
  }

  function is_rom($lang)
  {
    return in_array($lang, array('French', 'Spanish', 'Portuguese', 'Italian'));
  }

  $countries = array( 'USA' => 'English', 'Spain' => 'Spanish',
                    'Brasil' => 'Portuguese', 'UK' => 'English',
                    'Mexico' => 'Spanish', 'Germany' => 'German',
                    'Colombia' => 'Spanish', 'Canada' => 'English',
                    'Russia' => 'Russian', 'Austria' => 'German',
                    'France' => 'French', 'Argentina' => 'Spanish');

  $rom_countries = array_filter($countries, 'is_rom');

  array_display(array_keys($rom_countries), TRUE);
?>
<?php
  $arr = array(2, 'two', 0, 'NULL', NULL, 'FALSE', FALSE, 'empty', '');
  $copy = array_filter($arr);
  $reindexed = array_values($copy);

  print '<p>Original:</p>';
  array_display($arr, TRUE);
  print '<p>Filtered:</p>';
  array_display($copy, TRUE);
  print '<p>Filtered and re-indexed:</p>';
  array_display($reindexed, TRUE);
?>