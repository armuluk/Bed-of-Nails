<?php
  $operand1 = rand(0, 255);
  $operand2 = rand(0, 255);
  $correctAnswer = str_pad(decbin($operand1 & $operand2), 8, "0", STR_PAD_LEFT);
  $operand1 = str_pad(decbin($operand1), 8, "0", STR_PAD_LEFT);
  $operand2 = str_pad(decbin($operand2), 8, "0", STR_PAD_LEFT);
  $question = $operand1 . " AND " . $operand2;

?>