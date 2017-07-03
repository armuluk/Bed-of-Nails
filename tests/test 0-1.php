<?php 
// tests 0-1 transition
// topic/level never visited, no question 

session_start();		// init/load the session

// set relevant persistent variable proxies
$_SESSION['PERSISTtopic'] = "5";			// arbitrary
$_SESSION['PERSISTlevel'] = "1";
$_SESSION['PERSISTquestion'] = "";			// no question set
$_SESSION['studentCorrect'] = "false"			// modelling a left over from previous topic

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
	size="2" />


<button id="submitAnswer" >POST</button>
</form>

<a href="../and.php">Link with no POST</a>
</body>
</HTML>

