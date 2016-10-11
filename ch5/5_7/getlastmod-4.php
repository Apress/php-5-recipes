<?php
  # Recipe 5-7  / Example 4
  
  # NOTE: The output you observe from running this
  # example will NOT match what is shown in the text.
  
  $file = 'testfile.html';
  $data = stat($file);
  
  $accessed = $data['atime'];
  $modified = $data['mtime'];
  $created = $data['ctime'];
  
  echo "The file <b>$file</b> was...<br />\n"
        . 'last accessed ' . date('l d F Y, \a\t H:i:s', $accessed) . ',<br />\n'
        . 'last modified ' . date('l d F Y, \a\t H:i:s', $modified) . ',<br />\n'
        . 'and created ' . date('l d F Y, \a\t H:i:s', $created)
        . '.';
?>