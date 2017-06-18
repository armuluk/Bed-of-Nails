function submitClicked() {
document.getElementById("submitAnswer").disabled=true;
if (document.getElementById("studentAnswer").value == answer) {
  document.getElementById("markSymbol").src = "images/tick.png";
  document.getElementById("correct").style.display="block";
  if (errorCount == 0) {
    document.getElementById("nextLevel").style.display="block";
    }
  else {
    document.getElementById("sameLevel").style.display="block";
    }
  }
else {
  errorCount++;
  document.getElementById("markSymbol").src="images/cross.png";
  document.getElementById("wrong" + errorCount).style.display="block";
  }
}


function retryClicked() {
  document.getElementById("studentAnswer").value = "";
  document.getElementById("markSymbol").src = "images/blank.png";
  document.getElementById("submitAnswer").disabled = false;
  document.getElementById("wrong" + errorCount).style.display = "none";
  document.getElementById("attemptNo").innerHTML = errorCount + 1;
}


function newClicked() {
  retryClicked();
  errorCount = 0;
  document.getElementById("attemptNo").innerHTML = errorCount + 1;
  document.getElementById("correct").style.display = "none";
  document.getElementById("sameLevel").style.display = "none";
}


