  var checkForm = function(e)
  {
    var form = (e.target) ? e.target : e.srcElement;
    if(form.name.value == "") {
      alert("Please fill out this field.");
      form.name.focus();
      e.preventDefault ? e.preventDefault() : e.returnValue = false;
      return;
    }
     if(form.lastname.value == "") {
      alert("Please fill out this field.");
      form.lastname.focus();
      e.preventDefault ? e.preventDefault() : e.returnValue = false;
      return;
    }
    if(form.email.value == "") {
      alert("Please fill out this field.");
      form.email.focus();
      e.preventDefault ? e.preventDefault() : e.returnValue = false;
      return;
    }
    if(form.psw.value == "") {
      alert("Please fill out this field.");
      form.psw.focus();
      e.preventDefault ? e.preventDefault() : e.returnValue = false;
      return;
    }
    if(form.psw-repeat.value == "") {
      alert("Please fill out this field.");
      form.psw-repeat.focus();
      e.preventDefault ? e.preventDefault() : e.returnValue = false;
      return;
    }
  };


  var modal_init = function() {

    var modalWindow  = document.getElementById("modal_window");

    var closeModal = function(e)
    {
      modalWrapper.className = "";
      e.preventDefault ? e.preventDefault() : e.returnValue = false;
    };

    var clickHandler = function(e) {
      if(!e.target) e.target = e.srcElement;
      if(e.target.tagName == "DIV") {
        if(e.target.id != "modal_window") closeModal(e);
      }
    };

    var keyHandler = function(e) {
      if(e.keyCode == 27) closeModal(e);
    };

    if(document.addEventListener) {
      document.getElementById("modal_close").addEventListener("click", closeModal, false);
      document.addEventListener("click", clickHandler, false);
      document.addEventListener("keydown", keyHandler, false);
    } else {
      document.getElementById("modal_close").attachEvent("onclick", closeModal);
      document.attachEvent("onclick", clickHandler);
      document.attachEvent("onkeydown", keyHandler);
    }

  };

    if(document.addEventListener) {
        document.getElementById("modal_feedback").addEventListener("submit", checkForm, false);
        document.addEventListener("DOMContentLoaded", modal_init, false);
    } else {
        document.getElementById("modal_feedback").attachEvent("onsubmit", checkForm);
        window.attachEvent("onload", modal_init);
     };


     