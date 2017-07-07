<div id="response" class="responseSection" style="display:block;">
<p>Your final answer is not correct.</p>

<p>To find <?php echo $question ?> you look for the cell which is in the column headed by 
a <?php echo $operand1 ?> and is also in the row beginning with a <?php echo $operand2 ?>:</p>

<p>This is shown in the truth table below.<p>

<table class="truthtable">
<tr>
  <th></th>
  <th <?php if ($operand1 == 0) {echo 'class="selected"';} ?> >0</th>
  <th <?php if ($operand1 == 1) {echo 'class="selected"';} ?> >1</th>
</tr>
<tr>
  <th <?php if ($operand2 == 0) {echo 'class="selected"';} ?> >0</th>
  <td <?php if ($operand1 == 0 & $operand2 == 0) {echo 'class="selected"';} ?> >0</td>
  <td <?php if ($operand1 == 1 & $operand2 == 0) {echo 'class="selected"';} ?> >0</td>
</tr>
<tr>
  <th <?php if ($operand2 == 1) {echo 'class="selected"';} ?> >1</th>
  <td <?php if ($operand1 == 0 & $operand2 == 1) {echo 'class="selected"';} ?> >0</td>
  <td <?php if ($operand1 == 1 & $operand2 == 1) {echo 'class="selected"';} ?> >1</td>
</tr>
</table>

<p>So <?php echo $question ?> = <?php echo $correctAnswer ?></p>
<button onClick="window.location.href='and.php';">New Question</button>

</div>
