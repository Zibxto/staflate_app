function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  navigator.clipboard.writeText(copyText.value);
  
  var tooltip = document.getElementById("myTooltip");
  tooltip.innerHTML = "Copied: " + copyText.value;
}

function outFunc() {
  var tooltip = document.getElementById("myTooltip");
  tooltip.innerHTML = "Copy to clipboard";
}

function myFunctioneth() {
  var copyText = document.getElementById("myInputeth");
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  navigator.clipboard.writeText(copyText.value);
  
  var tooltip = document.getElementById("myTooltipeth");
  tooltip.innerHTML = "Copied: " + copyText.value;
}

function outFunceth() {
  var tooltip = document.getElementById("myTooltipeth");
  tooltip.innerHTML = "Copy to clipboard";
}