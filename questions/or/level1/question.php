<div class="questionSection">

<h1>OR</h1>

<p>LEVEL <?php echo $level; ?><br />
<i>Attempts remaining:</i> <?php echo $attemptsLeft; ?></p>

<p>What is the result of the following operation:</p>

<p class="questionText"><?php echo $question; ?></p>

<form action="or.php" method="post">
<p>The result is 
  <input type="text" 
	name="studentAnswer" 
	id="studentAnswer" 
	size="2" 
	value="<?php echo $studentAnswer ?>" 
	<?php if ($questionDisabled) {echo "disabled";}; ?> />

<img id="markSymbol" src="<?php echo $markSymbol ?>"></p>

<button id="submitAnswer" <?php if ($questionDisabled) {echo "disabled";}; ?> >Check</button>
</form>

</div>
