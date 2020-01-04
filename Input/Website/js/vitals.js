function SIRS() {
  var sirs = document.getElementById("sirs");
  var temp = document.getElementById("temperature");
  var hr = document.getElementById("heartrate");
  var wbc = document.getElementById('wbc');
  var rr = document.getElementById('respiratoryrate');
  var score = 0;
  if((temp.value>38 || temp.value<36)&&(temp.value)){
    score++;
  }
  if(hr.value>90 && hr.value ){
    score++;
  }
  if(wbc.value>10 && wbc.value){
    score++;
  }
  if(rr.value>20 && rr.value){
    score++;
  }
  sirs.value = score;
}
function qSOFA() {
  var qsofa = document.getElementById("qsofa");
  var sbp = document.getElementById("systolicbp");
  var am = document.getElementById('alteredmentation');
  var rr = document.getElementById('respiratoryrate');
  var score = 0;
  if(sbp.value<100 && sbp.value){
    score++;
  }
  if(am.value<15 && am.value){
    score++;
  }
  if(rr.value>22 && rr.value){
    score++;
  }
  qsofa.value = score;
}
function enable()
{
	document.getElementById("sirs").disabled = false;
	document.getElementById("qsofa").disabled = false;
	return true;
}
