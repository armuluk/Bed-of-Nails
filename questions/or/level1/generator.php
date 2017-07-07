<?php
// Note the question must include at least one 0 as the example uses 1 OR 1
  $operand1 = rand(0, 1);
  if ($operand1 == 0) {
    $operand2 = rand(0, 1);
  } else {
    $operand2 = 0;
  }
  $question = $operand1 . " OR " . $operand2;
  $correctAnswer = (string) ($operand1 | $operand2);
?>