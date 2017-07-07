<?php 
  $bit1A = substr($operand1, 0, 1); 	// get the values needed
  $bit2A = substr($operand2, 0, 1); 
  $resultA = (string) (bindec($bit1A) | bindec($bit2A));
  $bit1B = substr($operand1, 1, 1);
  $bit2B = substr($operand2, 1, 1); 
  $resultB = (string) (bindec($bit1B) | bindec($bit2B));
?> 
<div id="response" class="responseSection" style="display:block;">
<p>Your final answer is not correct.</p>

<p>To work out <?php echo $question ?> it can be easier to write it like this:</p>

<table class="tableSum">
<tr>
  <td></td>
  <td><?php echo $operand1; ?></td>
</tr>
<tr>
  <td>OR</td>
  <td><?php echo $operand2; ?></td>
</tr>
<tr>
  <td></td>
  <td class="columnResult">--</td>
</tr>
</table>

<p>Working from left to right you see that in the first column 
you have <?php echo $bit1A; ?> OR <?php echo $bit2A; ?>.</p>

<p>Referring to the truth table for OR:</p>

<table class="truthtable">
<tr>
  <th></th>
  <th <?php if ($bit1A == 0) {echo 'class="selected"';} ?> >0</th>
  <th <?php if ($bit1A == 1) {echo 'class="selected"';} ?> >1</th>
</tr>
<tr>
  <th <?php if ($bit2A == 0) {echo 'class="selected"';} ?> >0</th>
  <td <?php if ($bit1A == 0 & $bit2A == 0) {echo 'class="selected"';} ?> >0</td>
  <td <?php if ($bit1A == 1 & $bit2A == 0) {echo 'class="selected"';} ?> >1</td>
</tr>
<tr>
  <th <?php if ($bit2A == 1) {echo 'class="selected"';} ?> >1</th>
  <td <?php if ($bit1A == 0 & $bit2A == 1) {echo 'class="selected"';} ?> >1</td>
  <td <?php if ($bit1A == 1 & $bit2A == 1) {echo 'class="selected"';} ?> >1</td>
</tr>
</table>

<p>So <?php echo $bit1A; ?> OR <?php echo $bit2A; ?> = <?php echo $resultA; ?>, 
and we enter that as the first bit of the answer:</p>

<table class="tableSum">
<tr>
  <td></td>
  <td><?php echo $operand1; ?></td>
</tr>
<tr>
  <td>OR</td>
  <td><?php echo $operand2; ?></td>
</tr>
<tr>
  <td></td>
  <td class="columnResult"><?php echo $resultA; ?>-</td>
</tr>
</table>

<p>The second column has <?php echo $bit1B; ?> OR <?php echo $bit2B; ?>. From the truth table:</p>

<table class="truthtable">
<tr>
  <th></th>
  <th <?php if ($bit1B == 0) {echo 'class="selected"';} ?> >0</th>
  <th <?php if ($bit1B == 1) {echo 'class="selected"';} ?> >1</th>
</tr>
<tr>
  <th <?php if ($bit2B == 0) {echo 'class="selected"';} ?> >0</th>
  <td <?php if ($bit1B == 0 & $bit2B == 0) {echo 'class="selected"';} ?> >0</td>
  <td <?php if ($bit1B == 1 & $bit2B == 0) {echo 'class="selected"';} ?> >1</td>
</tr>
<tr>
  <th <?php if ($bit2B == 1) {echo 'class="selected"';} ?> >1</th>
  <td <?php if ($bit1B == 0 & $bit2B == 1) {echo 'class="selected"';} ?> >1</td>
  <td <?php if ($bit1B == 1 & $bit2B == 1) {echo 'class="selected"';} ?> >1</td>
</tr>
</table>

<p>So <?php echo $bit1B; ?> OR <?php echo $bit2B; ?> = <?php echo $resultB; ?>, 
and we enter that as the second bit of the answer:</p>

<table class="tableSum">
<tr>
  <td></td>
  <td><?php echo $operand1; ?></td>
</tr>
<tr>
  <td>OR</td>
  <td><?php echo $operand2; ?></td>
</tr>
<tr>
  <td></td>
  <td class="columnResult"><?php echo $resultA . $resultB; ?></td>
</tr>
</table>

<p>So our final answer is <?php echo $question ?> = <?php echo $correctAnswer ?></p>
<button onClick="window.location.href='or.php';">New Question</button>

</div>
