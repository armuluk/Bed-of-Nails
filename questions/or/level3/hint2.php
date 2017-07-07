<div id="response" class="responseSection" style="display:block;">
<p>Your answer is still not correct.</p>

<p>You must do a <span class="emphasis">bitwise</span> OR.</p>

<p>Start with the first bit of each of the two numbers, and OR them. This gives the 
first bit of the answer. Then OR the second bits together. This gives the second bit
of the answer. Repeat this for each of the eight bits.</p>

<h3>Using the truth table</h3>

<p>For example, say the left-most bit of the first number is 0 and the left-most bit of the second number is 0.</p>

<p>In that case then the first bit of the result will be equal to 0 OR 0.</p>

<p>To use the truth table to find 0 OR 0 look for the cell which is in the column 
headed by 0 and is also in the row beginning with 0.</p>

<p>This is shown in the truth table below.<p>

<table class="truthtable">
<tr>
  <th></th>
  <th class="selected">0</th>
  <th>1</th>
</tr>
<tr>
  <th class="selected">0</th>
  <td class="selected">1</td>
  <td>0</td>
</tr>
<tr>
  <th>1</th>
  <td>1</td>
  <td>1</td>
</tr>
</table>

<p>So 0 OR 0 = 0</p>
<button onClick="retryClicked();">Try again</button>

</div>
