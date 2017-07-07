<?php
  $operand1 = rand(0, 3);
  $operand2 = rand(0, 3);
  $correctAnswer = str_pad(decbin($operand1 | $operand2), 2, "0", STR_PAD_LEFT);
  $operand1 = str_pad(decbin($operand1), 2, "0", STR_PAD_LEFT);
  $operand2 = str_pad(decbin($operand2), 2, "0", STR_PAD_LEFT);
  $question = $operand1 . " OR " . $operand2;

?>