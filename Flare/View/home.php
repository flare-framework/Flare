<!DOCTYPE html>
<html>
<head></head>
<body>

<h1>The XMLHttpRequest Object</h1>
<h3>Start typing a name in the input field below:</h3>
<form action="">
First name: <input type="text" id="txt1" onkeyup="showHint(this.value);showinputVall()" >
</form>

<p>Suggestions: <span id="txtHint"></span></p>
<p>input text (no ajax just javascript!): <span id="showInput"> </span></p>
<hr>
use onkeyup="showinputVall()" or onchange="showinputVall()" for live input text

<script>
function showHint(str) {
  var xhttp;
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "http://localhost/tp/sazman-flare/1.0.1/public/ajax?q="+str, true);
  xhttp.send();
}

function showinputVall() {
    var x = document.getElementById("txt1").value;
    document.getElementById("showInput").innerHTML =  x;
}


</script>

</body>
</html>
