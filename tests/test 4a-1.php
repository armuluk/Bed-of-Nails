<?php 
// tests 4a-1 transition
// question answered incorrectly on first two attempts
// question answered correctly on 3rd attempt
// user asking for new question
// old question is still present in the persistent storage

session_start();		// init/load the session

$_SESSION['studentCorrect'] = "true";

// set relevant persistent variable proxies
$_SESSION['PERSISTtopic'] = "5";			// arbitrary
$_SESSION['PERSISTlevel'] = "2";			// arbitrary
$_SESSION['PERSISTattemptsLeft'] = 0;			// as it was the 2nd attempt

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
	value = ""
	/>


<button id="submitAnswer" >POST</button>
</form>

<a href="../and.php">Link with no POST</a>
</body>
</HTML>

