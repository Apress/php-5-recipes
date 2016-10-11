<?php
  # Recipe 4-34 / Extra example
  
  # This illustrates using array_map() and array_walk() together

  function array_display($array, $pre=FALSE)
  {
    $tag = $pre ? 'pre' : 'p';
    printf("<%s>%s</%s>\n", $tag, var_export($array, TRUE), $tag);
  }

  function get_pay($emp, $hr, $rt)
  {
    return sprintf('%s worked %.2f hours, and grossed $%.2f',
                   $emp, $hr, $rt * $hr);
  }

  function display_pd_emp(&$el)
  {
    printf("<p>%s.</p>\n", $el);
  }

  $employees = array('Nelly Jones', 'Jim Gutierrez', 'Mary Wilson',
                     'Bill Huang', 'Allan North');
                     
  $hours = array(35.2, 37.4, 41.3, 28.8, 38.5);
  $rates = array(12.5, 12.5, 13.75, 9.85, 11.6);

  $paid_emps = array_map('get_pay', $employees, $hours, $rates);
  array_walk($paid_emps, 'display_pd_emp');

  array_display($paid_emps, TRUE);
?>