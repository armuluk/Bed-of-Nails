<?php 
// tests 1-2a transition
// question answered correctly on first attempt

session_start();		// init/load the session

$_SESSION['studentCorrect'] = "n/a";

// set relevant persistent variable proxies
$_SESSION['PERSISTtopic'] = "5";			// arbitrary
$_SESSION['PERSISTlevel'] = "3";			// Level 3, so can't level up
$_SESSION['PERSISTattemptsLeft'] = 3;			// as this is first attempt

//generate question
  $bit1 = "1";
  $bit2 = "0";
  $_SESSION['PERSISTquestion'] = $bit1 . " AND " . $bit2;
  $_SESSION['PERSISTcorrectAnswer'] = (string) ($bit1 & $bit2);
  $_SESSION['PERSISTbit1'] = $bit1;
  $_SESSION['PERSISTbit2'] = $bit2;


?>
<HTML>
<body>
<form action="../and.php" method="post">
<p>The answer is 
  <?php if (isset($_SESSION['PERSISTcorrectAnswer'])) {
          echo $_SESSION['PERSISTcorrectAnswer'];
	} else { 
	  echo "<i>not set</i>";
	}
?></p>

<p>Enter answer here:
  <input type="text" 
	name="studentAnswer" 
	id="studentAnswer" 
	size="2" 
	value = "<?php echo $_SESSION['PERSISTcorrectAnswer']; ?>"
	/>


<button id="submitAnswer" >POST</button>
</form>

<a href="../and.php">Link with no POST</a>
</body>
</HTML>

