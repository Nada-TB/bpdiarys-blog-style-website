import { formUpdateProfile } from "./domElements";

function login() {
  var mail = document.getElementById("mail").value;
  var password = document.getElementById("password").value;
  document.getElementById("errorEmail").innerHTML = "";
  document.getElementById("errorPassword").innerHTML="";
  var patternMail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

  if (mail === "") {
    document.getElementById("errorEmail").innerHTML = "Where is your email?";
    error = "mail invalid";
    return false;
  } else if (patternMail.test(mail) == false) {
    document.getElementById("errorEmail").innerHTML = "where is your email?";
    error = "mail invalid";
    return false;
  }

  if (password === "") {
    document.getElementById("errorPassword").innerHTML =
      "where is your password dude?";
    error = "empty password";
    return false;
  }
  return true;
}

function register() {

  let name = document.getElementById("name").value;
  let email = document.getElementById("email").value;
  var password = document.getElementById("password").value;
  var confirmPassword = document.getElementById("passConfirm").value;
  document.getElementById("errorName").innerHTML = "";
  document.getElementById("errorMail").innerHTML = "";
  document.getElementById("errorPassword").innerHTML = "";
  document.getElementById("errorPasswordConfirm").innerHTML = "";
  let patternName = /^([a-zA-Z ]{3,10})*$/;
  let patternMail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  let patternPassword =
    /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,15}$/;

  if (name === "") {
    document.getElementById("errorName").innerHTML = "firstName is required";
    document.getElementById("name").style.borderColor = "#9c4032";
    return false;
  } else if (patternName.test(name) == false) {
    document.getElementById("errorName").innerHTML =
      "Only letters and white space allowed, name should have at least three letter";
    document.getElementById("name").style.borderColor = "#9c4032";
    return false;
  }

  if (email === "") {
    document.getElementById("errorMail").innerHTML = "mail is required";
    document.getElementById("email").style.borderColor = "#9c4032";
    return false;
  } else if (patternMail.test(email) == false) {
    document.getElementById("errorMail").innerHTML = "mail is invalid";
    document.getElementById("email").style.borderColor = "#9c4032";
    return false;
  }

  if (password === "") {
    document.getElementById("errorPassword").innerHTML = "password is required";
    document.getElementById("password").style.borderColor = "#9c4032";
    return false;
  } else if (patternPassword.test(password) == false) {
    document.getElementById("errorPassword").innerHTML =
      "password between 8 to 15 characters which contain at least one numeric digit and a special character";
    document.getElementById("password").style.borderColor = "#9c4032";
    return false;
  }

  if (confirmPassword == "") {
    document.getElementById("errorPasswordConfirm").innerHTML =
      "password is required";
    document.getElementById("passConfirm").style.borderColor = "#9c4032";
    return false;
  } else if (confirmPassword !== password) {
    document.getElementById("errorPasswordConfirm").innerHTML =
      "this password doesn't match the first one";
    document.getElementById("passConfirm").style.borderColor = "#9c4032";
    return false;
  }

  return true;
}

function updateFormValidation() {
  let name = formUpdateProfile.elements["name"].value;
  let email = formUpdateProfile.elements["email"].value;
  let oldPassword= formUpdateProfile.elements["passOld"].value;
  let newPassword = formUpdateProfile.elements["newPassword"].value;
  let confirmPassword = formUpdateProfile.elements["passwordConfirm"].value;
  const errorIds = [
    "errorFirstName",
    "errorEmail",
    "errorOldPassword",
    "errorNewPassword",
  ];

  errorIds.forEach((id) => {
    document.getElementById(id).innerHTML = "";
    // Optionally clear border color if it was set for errors
    // let errorId=id.replace('error','');
    // errorId=errorId.replace(errorId[0], errorId[0].toLowerCase());
    // document.getElementById(errorId).style.borderColor = "";
  });

  const patterns = {
    name: /^([a-zA-Z ]{3,10})*$/,
    email: /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/,
    password: /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,15}$/
  };

  if (name === "") {
    document.getElementById("errorFirstName").innerHTML =
      "firstName is required";
    document.getElementById("firstName").style.borderColor = "#9c4032";
    return false;
  } else if (patterns["name"].test(name) == false) {
    document.getElementById("errorFirstName").innerHTML =
      "Only letters and white space allowed, name should have at least three letter";
    document.getElementById("firstName").style.borderColor = "#9c4032";
    return false;
  }

  if (email === "") {
    document.getElementById("errorEmail").innerHTML = "email is required";
    document.getElementById("emailProfile").style.borderColor = "#9c4032";
    return false;
  } else if (patterns["email"].test(email) == false) {
    document.getElementById("errorEmail").innerHTML = "email is invalid";
    document.getElementById("emailProfile").style.borderColor = "#9c4032";
    return false;
  }

  if (oldPassword === "") {
    document.getElementById("errorOldPassword").innerHTML =
      "old Password is required";
    document.getElementById("passOld").style.borderColor = "#9c4032";
    return false;
  }

  if (newPassword === "") {
    document.getElementById("errorNewPassword").innerHTML =
      "Password is required";
    document.getElementById("password").style.borderColor = "#9c4032";
    return false;
  } else if (patterns["password"].test(newPassword) == false) {
    document.getElementById("errorNewPassword").innerHTML =
      "password between 8 to 15 characters which contain at least one numeric digit and a special character";
    document.getElementById("password").style.borderColor = "#9c4032";
    return false;
  }

  if (confirmPassword == "") {
    document.getElementById("errorNewPasswordC").innerHTML =
      "Password is required";
    document.getElementById("passConfirm").style.borderColor = "#9c4032";
    return false;
  } else if(confirmPassword !== newPassword) {
    document.getElementById("errorNewPasswordC").innerHTML =
      "Passwords do not match. Please re-enter your password.";
    document.getElementById("passConfirm").style.borderColor = "#9c4032";
    return false;
  }

  return true;
}

function validationFormEdition() {
  var title = document.forms[0][0].value;
  var description = document.forms[0][1].value;
  var image = document.forms[0][2].value;
  var content = document.forms[0][3].value;
  document.getElementById("errorTitle").innerHTML = "";
  document.getElementById("errorImage").innerHTML = "";
  document.getElementById("errorContent").innerHTML = "";
  document.getElementById("errorDescription").innerHTML = "";

  if (title == "") {
    document.getElementById("errorTitle").innerHTML =
      "oh dude wait don't forget title";
    document.getElementById("title").style.borderColor = "#9c4032";
    return false;
  }
  if (description == "") {
    document.getElementById("errorDescription").innerHTML =
      "where is the description?";
    document.getElementById("description").style.borderColor = "#9c4032";
    return false;
  }

  if (image !== "") {
    var extension = image.split(".").pop().toLowerCase();
    var extensions = ["gif", "png", "jpg", "jpeg"];
    var checkExtension = extensions.includes(extension);
    if (checkExtension == false) {
      document.getElementById("errorImage").innerHTML =
        "this file isn't an image";
      document.getElementById("image").value = "";
      document.getElementById("image").style.borderColor = "#9c4032";
      return false;
    }
  }

  if (content == "") {
    document.getElementById("errorContent").innerHTML =
      "where are you going dude where is the article?!";
    document.getElementById("content").style.borderColor = "#9c4032";
    return false;
  } else {
    return true;
  }
}

function validateEmailInput(inputId, errorTextId ) {
  var mail = document.getElementById(inputId).value;
  document.getElementById(errorTextId).innerHTML = "";
  const patternMail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

  if (mail === "") {
    document.getElementById(errorTextId).innerHTML = "where is your mail?";

    return false;
  } else if (!patternMail.test(mail)) {
    document.getElementById(errorTextId).innerHTML = "invalid Email";

    return false;
  }
  return true;
}

function validateFormResetPassword() {
  var mail = document.forms[0][0].value;
  var password = document.forms[0][1].value;
  var confirmPassword = document.forms[0][2].value;
  document.getElementById("errorMail").innerHTML = "";
  document.getElementById("errorPassword").innerHTML = "";
  document.getElementById("errorPasswordC").innerHTML = "";
  var patternMail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  var patternPassword =
    /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,15}$/;

  if (mail == "") {
    document.getElementById("errorMail").innerHTML = "mail is required";
    document.getElementById("emailAccount").style.borderColor = "#9c4032";
    return false;
  } else if (patternMail.test(mail) == false) {
    document.getElementById("errorMail").innerHTML = "mail is invalid";
    document.getElementById("emailAccount").style.borderColor = "#9c4032";
    return false;
  }

  if (password == "") {
    document.getElementById("errorPassword").innerHTML = "password is required";
    document.getElementById("password").style.borderColor = "#9c4032";
    return false;
  } else if (patternPassword.test(password) == false) {
    document.getElementById("errorPassword").innerHTML =
      " password between 8 to 15 characters which contain at least one numeric digit and a special character";
    document.getElementById("password").style.borderColor = "#9c4032";
    return false;
  }

  if (confirmPassword == "") {
    document.getElementById("errorPasswordC").innerHTML =
      "password is required";
    document.getElementById("passConfirm").style.borderColor = "#9c4032";
    return false;
  } else if (confirmPassword !== password) {
    document.getElementById("errorPasswordC").innerHTML =
      "this password doesn't match the first one";
    document.getElementById("passConfirm").style.borderColor = "#9c4032";
    return false;
  } else {
    return true;
  }
}


function validateCommentInput(inputId, errorTextId ) {
  var text = document.getElementById(inputId).value;
  document.getElementById(errorTextId).innerHTML = "";
  const regex = /^[A-Za-z0-9.,!?;:'"()\-\s\r\n]*$/;

  if (text === "") {
    document.getElementById(errorTextId).innerHTML = "where is your comment dude?";

    return false;
  } else if (!regex.test(text)) {
    document.getElementById(errorTextId).innerHTML = "❌ Error: Only letters, numbers, basic punctuation, and spaces are allowed.";

    return false;
  }
  return true;
}

export {
  login,
  register,
  updateFormValidation,
  validateFormResetPassword,
  validateEmailInput,
  validationFormEdition,
  validateCommentInput
};
