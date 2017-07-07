<?php 
  $op1bit7 = substr($operand1, 0, 1); 	// get the values needed
  $op2bit7 = substr($operand2, 0, 1); 
  $resultBit7 = (string) (bindec($op1bit7) & bindec($op2bit7));
  $op1bit6 = substr($operand1, 1, 1);
  $op2bit6 = substr($operand2, 1, 1); 
  $resultBit6 = (string) (bindec($op1bit6) & bindec($op2bit6));
  $op1bits6to0 = substr($operand1, 1, 7);
  $op2bits6to0 = substr($operand2, 1, 7);
  $op1bits5to0 = substr($operand1, 2, 6);
  $op2bits5to0 = substr($operand2, 2, 6);
?> 
<div id="response" class="responseSection" style="display:block;">
<p>Your final answer is not correct.</p>

<p>To work out <?php echo $question ?> it can be easier to write it like this:</p>

<table class="tableSum">
<tr>
  <td></td>
  <td><?php echo $operand1; ?></td>
</tr>
  <td>AND</td>
  <td><?php echo $operand2; ?></td>
<tr>
</tr>
<tr>
  <td></td>
  <td class="columnResult">--------</td>
</tr>
</table>

<p>Working from left to right you see that in the first column 
you have <?php echo $op1bit7; ?> AND <?php echo $op2bit7; ?>.</p>

<table class="tableSum">
<tr>
  <td></td>
  <td><span class="highlight"><?php echo $op1bit7; ?></span><?php echo $op1bits6to0; ?></td>
</tr>
<tr>
  <td>AND</td>
  <td><span class="highlight"><?php echo $op2bit7; ?></span><?php echo $op2bits6to0; ?></td>
</tr>
<tr>
  <td></td>
  <td class="columnResult"><span class="highlight">-</span>-------</td>
</tr>
</table>

<p>Referring to the truth table for AND:</p>

<table class="truthtable">
<tr>
  <th></th>
  <th <?php if ($op1bit7 == 0) {echo 'class="selected"';} ?> >0</th>
  <th <?php if ($op1bit7 == 1) {echo 'class="selected"';} ?> >1</th>
</tr>
<tr>
  <th <?php if ($op2bit7 == 0) {echo 'class="selected"';} ?> >0</th>
  <td <?php if ($op1bit7 == 0 & $op2bit7 == 0) {echo 'class="selected"';} ?> >0</td>
  <td <?php if ($op1bit7 == 1 & $op2bit7 == 0) {echo 'class="selected"';} ?> >0</td>
</tr>
<tr>
  <th <?php if ($op2bit7 == 1) {echo 'class="selected"';} ?> >1</th>
  <td <?php if ($op1bit7 == 0 & $op2bit7 == 1) {echo 'class="selected"';} ?> >0</td>
  <td <?php if ($op1bit7 == 1 & $op2bit7 == 1) {echo 'class="selected"';} ?> >1</td>
</tr>
</table>

<p>So <?php echo $op1bit7; ?> AND <?php echo $op2bit7; ?> = <?php echo $resultBit7; ?>, 
and we enter that as the first bit of the answer:</p>

<table class="tableSum">
<tr>
  <td></td>
  <td><span class="highlight"><?php echo $op1bit7; ?></span><?php echo $op1bits6to0; ?></td>
</tr>
<tr>
  <td>AND</td>
  <td><span class="highlight"><?php echo $op2bit7; ?></span><?php echo $op2bits6to0; ?></td>
</tr>
<tr>
  <td></td>
  <td class="columnResult"><span class="highlight"><?php echo $resultBit7; ?></span>-------</td>
</tr>
</table>

<p>Now we consider the bits in the second column:</p>

<table class="tableSum">
<tr>
  <td></td>
  <td><?php echo $op1bit7; ?><span class="highlight"><?php echo $op1bit6; ?></span><?php echo $op1bits5to0 ?></td>
</tr>
  <td>AND</td>
  <td><?php echo $op2bit7; ?><span class="highlight"><?php echo $op2bit6; ?></span><?php echo $op2bits5to0 ?></td>
<tr>
</tr>
<tr>
  <td></td>
  <td class="columnResult"><?php echo $resultBit7; ?><span class="highlight">-</span>------</td>
</tr>
</table>


<p>We see that the second column has <?php echo $op1bit6; ?> AND <?php echo $op2bit6; ?>. From the truth table:</p>

<table class="truthtable">
<tr>
  <th></th>
  <th <?php if ($op1bit6 == 0) {echo 'class="selected"';} ?> >0</th>
  <th <?php if ($op1bit6 == 1) {echo 'class="selected"';} ?> >1</th>
</tr>
<tr>
  <th <?php if ($op2bit6 == 0) {echo 'class="selected"';} ?> >0</th>
  <td <?php if ($op1bit6 == 0 & $op2bit6 == 0) {echo 'class="selected"';} ?> >0</td>
  <td <?php if ($op1bit6 == 1 & $op2bit6 == 0) {echo 'class="selected"';} ?> >0</td>
</tr>
<tr>
  <th <?php if ($op2bit6 == 1) {echo 'class="selected"';} ?> >1</th>
  <td <?php if ($op1bit6 == 0 & $op2bit6 == 1) {echo 'class="selected"';} ?> >0</td>
  <td <?php if ($op1bit6 == 1 & $op2bit6 == 1) {echo 'class="selected"';} ?> >1</td>
</tr>
</table>

<p>So <?php echo $op1bit6; ?> AND <?php echo $op2bit6; ?> = <?php echo $resultBit6; ?>, 
and we enter that as the second bit of the answer:</p>

<table class="tableSum">
<tr>
  <td></td>
  <td><?php echo $op1bit7; ?><span class="highlight"><?php echo $op1bit6; ?></span><?php echo $op1bits5to0 ?></td>
</tr>
  <td>AND</td>
  <td><?php echo $op2bit7; ?><span class="highlight"><?php echo $op2bit6; ?></span><?php echo $op2bits5to0 ?></td>
<tr>
<tr>
  <td></td>
  <td class="columnResult"><?php echo $resultBit7; ?><span class="highlight"><?php echo $resultBit6; ?></span>------</td>
</tr>
</table>

<p>We repeat this for each column.</p>

<p>So our final answer is <?php echo $question ?> = <?php echo $correctAnswer ?></p>

<button onClick="window.location.href='and.php';">New Question</button>

</div>
