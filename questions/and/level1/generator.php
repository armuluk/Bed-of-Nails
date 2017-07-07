<?php
// Note the question must include at least one 1 as the example uses 0 AND 0
  $operand1 = rand(0, 1);
  if ($operand1 == 1) {
    $operand2 = rand(0, 1);
  } else {
    $operand2 = 1;
  }
  $question = $operand1 . " AND " . $operand2;
  $correctAnswer = (string) ($operand1 & $operand2);
?>