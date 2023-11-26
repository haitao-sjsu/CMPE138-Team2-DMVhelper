  function check(qnum, ans) {
    var optionSelected = document.getElementsByName("ans");
    for(var i = 0; i < optionSelected.length; i++) {
      if(optionSelected[i].checked) {
        if(optionSelected[i].value == ans) {
          alert("correct");
        }
        else {
          alert("incorrect");
        }
      }
    }
  }