<?php 
session_start();		// init/load the session

if ($_SESSION['PERSISTtopic'] != 1) {
  $_SESSION['PERSISTtopic'] = 1;	//AND
  $_SESSION['PERSISTlevel'] = 1;	//restart
  $question = "";
}

// extract persistent values
$level = $_SESSION['PERSISTlevel'];
$question = $_SESSION['PERSISTquestion'];		
$attemptsLeft = $_SESSION['PERSISTattemptsLeft'];
$studentAnswer = $_SESSION["PERSISTstudentAnswer"];
$correctAnswer = $_SESSION['PERSISTcorrectAnswer'];
$operand1 = $_SESSION['PERSISToperand1'];
$operand2 = $_SESSION['PERSISToperand2'];

$newLevel = $level;					// for use if we level up - need to keep displayed level as previous for current page

// page specific paths and file names
$answerPath = "questions\\and\\level" . $level . "\\";
$generatorPath = "questions\\and\\level" . $level . "\\";
$errorResponsePath = "questions\\and\\level" . $level . "\\";
$errorResponseFiles = array("hint1.php", "hint2.php", "answer.php");
$correctResponsePath = "questions\\and\\";
$correctNextLevel = "nextlevel.php";
$correctSameLevel = "samelevel.php";
$correctTopLevel = "toplevel.php";
$questionDisabled = true;				// question is disabled by default


// Test for transitions to state 1
// This is forced from:
// state 0 - No question yet for this topic/level
// Xa - student correct on previous page
// 4b - student wrong third time
// There is also the 1-1 transition to consider (a refresh, or clicking twice on a link):
// 1-1 - student has no marked answer and has not submitted anything 

if ($question == "" 
    or (isset($_SESSION['studentCorrect']) 
        and ($_SESSION['studentCorrect'] == "true" 
             or ($_SESSION['studentCorrect'] == "n/a" and !isset($_POST["studentAnswer"]))
             or ($attemptsLeft == 0 and $_SESSION['studentCorrect'] == "false")))) {

// generate new question and answer
// also store the question fragments used for the hints/answer
require $generatorPath . "generator.php";

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

  if ($studentAnswer === $correctAnswer) {			// must use strict equality === else PHP auto-casts
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
  $_SESSION['PERSISTcorrectAnswer'] = $correctAnswer;
  $_SESSION['PERSISToperand1'] = $operand1;
  $_SESSION['PERSISToperand2'] = $operand2;



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

require $answerPath . "question.php";


echo "<!------------------------- Main > Responses -------------------------------->";


if ($responseFile != "") {include $responseFile;} 

?>

</div>
</body>
</HTML>

