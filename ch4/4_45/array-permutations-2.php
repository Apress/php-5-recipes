<?php
  # Recipe 4-45 / Example 2

  function permutations($total, $num)
  {
    $limit = func_num_args() == 2 ? $total - $num : func_get_arg(2);

    return $total > $limit ? $total * permutations($total - 1, $num, $limit) : 1;
  }

  # How many different 5-card hands can be drawn from a deck of 52 cards?

  echo permutations(52, 5);

?>