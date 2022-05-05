function isAlphaNumeric(s) {
  var alphaNum = /^[0-9a-z]+$/;
  if (!s.match(alphaNum)) {
    return false;
  }
  return true;
}

function isValidEmail(e) {
  var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if(e.value.match(mailformat)){
    return true;
  }
  else{
    return false;
  }
}

function validateForm() {
  var fname = document.getElementById("fname").value;
  var lname = document.getElementById("lname").value;
  var uname = document.getElementById("uname").value;
  var email = document.getElementById("email").value;
  var state = document.getElementById("state").value;
  var country = document.getElementById("country").value;

  //Validate first name
  if (fname.length < 2) {
    alert("Please Enter Valid First Name having atleast 2 characters");
    return false;
  }

  //Validate last name
  if (lname.length < 2) {
    alert("Please Enter Valid Last Name having atleast 2 characters");
    return false;
  }

  //Validate username
  if (uname.length < 4) {
    alert("Please Enter Valid username having atleast 4 characters");
    return false;
  } else if (!isAlphaNumeric(uname)) {
    alert("Please Enter Valid username having Alphanumeric Characters only");
    return false;
  }

  //Validate email id
  if (!isValidEmail(email)) {
    alert("Please Enter Valid Email Address");
    return false;
  }

  //Validate state
  if (state.length < 2) {
    alert("Please Enter Valid State having atleast 2 characters");
    return false;
  }

  //Validate country
  if (country.length < 2) {
    alert("Please Enter Valid Country having atleast 2 characters");
    return false;
  }
}
