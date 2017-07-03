<?php 
session_start();		// init/load the session

// page specific paths and file names
$errorResponsePath = "questions\\and\\";
$errorResponseFiles = array("hint1.php", "hint2.php", "answer.php");
$correctResponsePath = "questions\\and\\";
$correctNextLevel = "nextlevel.php";
$correctSameLevel = "samelevel.php";
$correctTopLevel = "toplevel.php";
$questionDisabled = true;				// question is disabled by default


// extract persistent values
$level = $_SESSION['PERSISTlevel'];
$question = $_SESSION['PERSISTquestion'];		
$attemptsLeft = $_SESSION['PERSISTattemptsLeft'];
$studentAnswer = $_SESSION["PERSISTstudentAnswer"];
$correctAnswer = $_SESSION['PERSISTcorrectAnswer'];
$bit1 = $_SESSION['PERSISTbit1'];		
$bit2 = $_SESSION['PERSISTbit2'];

$newLevel = $level;					// for use if we level up - need to keep displayed level as previous for current page

// Test for transitions to state 1
// This is forced from state 0 i.e. No question yet for this topic/level
// Also forced for Xa and 4b

if ($question == "" or $_SESSION['studentCorrect'] == "true" or ($attemptsLeft == 0 and $_SESSION['studentCorrect'] == "false")) {

// generate new question and answer
// also store the question fragments used for the hints/answer
// Note the question must include at least one 1 as the example uses 0 AND 0
  $bit1 = rand(0, 1);
  if ($bit1 == 1) {
    $bit2 = rand(0, 1);
  } else {
    $bit2 = 1;
  }
  $question = $bit1 . " AND " . $bit2;

// Now set the local values needed
  $attemptsLeft = 3;					// start again
  $markSymbol = "images/blank.png";			// no mark
  $questionDisabled = false;				// question is enabled so user can answer 
  $studentAnswer = "";					// new question so no answer given yet
  $_SESSION['studentCorrect'] = "n/a";			//   nor has one been marked
  $responseFile = "";					// no hint or answer to show

}	// now transitioned to State 1


// Was not in State 0 so test for transition to 2a/3a/4a or 2/3/4b
// Must have been in State 1 or (X-1)c and submitted an answer
// Only accept an submit/answer if we don't already have one that has been marked
// - i.e. only accept POST if it was from an appropriate state
// Note if the 1 -> 2a transition then level must go up if possible
//   and the feedback needs to be altered


elseif (isset($_POST["studentAnswer"]) and ($_SESSION['studentCorrect'] == "n/a" or $_SESSION['studentCorrect'] == "false")) {
  
  $studentAnswer = trim(htmlspecialchars($_POST["studentAnswer"]));	// extract & sanitise STUDENT ANSWER

  if ($studentAnswer == $correctAnswer) {
    $_SESSION['studentCorrect'] = "true";
    $markSymbol = "images/tick.png";
    if ($level == 3) {						// if at top level can't go any further & don't need to answer 1st time
      $responseFile = $correctResponsePath . $correctTopLevel;
    } elseif ($attemptsLeft == 3) {				// o/w go up a level only if right 1st time
      $newLevel = $level + 1;
      $responseFile = $correctResponsePath . $correctNextLevel;
    } else {
      $responseFile = $correctResponsePath . $correctSameLevel;
    }

  } else {
    $_SESSION['studentCorrect'] = "false";
    $markSymbol = "images/cross.png";
    $responseFile = $errorResponsePath . $errorResponseFiles[3 - $attemptsLeft];
    $attemptsLeft -= 1;
  }
  
}	// now transitioned to state Xa or Xb



  $_SESSION['PERSISTlevel'] = $newLevel;
  $_SESSION['PERSISTattemptsLeft'] = $attemptsLeft;
  $_SESSION["PERSISTstudentAnswer"] = $studentAnswer;		// current one
  $_SESSION['PERSISTquestion'] = $question;
  $_SESSION['PERSISTcorrectAnswer'] = (string) ($bit1 & $bit2);
  $_SESSION['PERSISTbit1'] = $bit1;
  $_SESSION['PERSISTbit2'] = $bit2;



$header = <<<'HEADER'
<HTML>

<head>
<link rel="stylesheet" type="text/css" href="css/question_page.css" />
<link rel="stylesheet" type="text/css" href="css/objects.css" />
<link rel="stylesheet" type="text/css" href="css/general.css" />

<script>
function retryClicked() {
  document.getElementById("markSymbol").src = "images/blank.png";
  document.getElementById("submitAnswer").disabled = false;
  document.getElementById("studentAnswer").disabled = false;
  document.getElementById("response").style.display = "none";
}
</script>

</head>

<body>
HEADER;

echo $header;

require "cpts/titlebar.php";
require "cpts/navbar.php";

$main = <<<'MAIN'
<!------------------------- Main section -------------------------------->

<div class="main">

   <!------------------------- Main > Question -------------------------------->

MAIN;

echo $main;

require "questions/and/question.php";


echo "<!------------------------- Main > Responses -------------------------------->";


if ($responseFile != "") {include $responseFile;} 

?>

</div>
</body>
</HTML>

