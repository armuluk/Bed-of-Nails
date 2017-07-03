<?php 
// tests any-1 transition
// topic/level hass been visited, question generated, no attempts made

session_start();		// init/load the session

// unset relevant session variables
unset($_SESSION['attemptsLeft']);
unset($_SESSION['questionInProgress']);
unset($_SESSION["studentAnswer"]);
unset($_SESSION['question']);
unset($_SESSION['correctAnswer']);
unset($_SESSION['bit1']);
unset($_SESSION['bit2']);

// set relevant persistent variable proxies
$_SESSION['PROXYtopic'] = "5";			// arbitrary
$_SESSION['PROXYlevel'] = "1";
$_SESSION['PROXYattemptsLeft'] = 3;
//generate question
  $bit1 = "1";
  $bit2 = "0";
  $_SESSION['PROXYquestion'] = $bit1 . " AND " . $bit2;
  $_SESSION['PROXYcorrectAnswer'] = (string) ($bit1 & $bit2);
  $_SESSION['PROXYbit1'] = $bit1;
  $_SESSION['PROXYbit2'] = $bit2;



/*
// set relevant session variables
$_SESSION['questionInProgress'] = false;
  $_SESSION["studentAnswer"] = "7";

*/
?>
<HTML>
<body>
<form action="and.php" method="post">
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
	size="2" />


<button id="submitAnswer" >POST</button>
</form>

<a href="and.php">Link with no POST</a>
</body>
</HTML>

