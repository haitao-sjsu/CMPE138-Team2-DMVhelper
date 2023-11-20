  function alerted(qnum, ans) {
    var optionSelected = document.getElementsByName("ans");
    for(var i = 0; i < optionSelected.length; i++) {
      if(optionSelected[i].checked) {
        if(optionSelected[i].value.endsWith("C")) {
          alert("correct");
        }
        else {
          alert("incorrect");
        }
      }
    }
    return true;
  }
