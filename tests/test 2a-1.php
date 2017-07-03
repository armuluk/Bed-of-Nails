<?php 
// tests 2a-1 transition
// new level has not been visited
// question generated at previous level and answered correctly on first attempt
// feedback given, level increased
// no question yet at this level - but previous one is still present in the persistent storage

session_start();		// init/load the session

$_SESSION['studentCorrect'] = "true";

// set relevant persistent variable proxies
$_SESSION['PERSISTtopic'] = "5";			// arbitrary
$_SESSION['PERSISTlevel'] = "2";			// can't be L1 as have levelled up
$_SESSION['PERSISTattemptsLeft'] = 2;			// as has just used one to answer question

//generate (previous) question - make distinguishable from actual question
  $bit1 = "110";
  $bit2 = "011";
  $_SESSION['PERSISTquestion'] = $bit1 . " AND " . $bit2;
  $_SESSION['PERSISTcorrectAnswer'] = (string) ($bit1 & $bit2);
  $_SESSION['PERSISTbit1'] = $bit1;
  $_SESSION['PERSISTbit2'] = $bit2;

// now unset the question
//  $_SESSION['PERSISTquestion'] = "";


// set relevant session variables
$_SESSION['correctAnswer'] = "010";

?>
<HTML>
<body>
<form action="../and.php" method="post">
<p>The answer is 
  <?php if (isset($_SESSION['correctAnswer'])) {
          echo $_SESSION['correctAnswer'];
	} else { 
	  echo "<i>not set</i>";
	}
?></p>

<p>Enter answer here:
  <input type="text" 
	name="studentAnswer" 
	id="studentAnswer" 
	size="2" 
	value = "<?php echo $_SESSION['correctAnswer']; ?>"
	/>


<button id="submitAnswer" >POST</button>
</form>

<a href="../and.php">Link with no POST</a>
</body>
</HTML>

