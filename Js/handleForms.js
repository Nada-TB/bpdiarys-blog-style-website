import { formUpdateProfile } from "./domElements";

function login() {
  var mail = document.getElementById("mail").value;
  var password = document.getElementById("pass").value;
  document.getElementById("errorForm").innerHTML = "";
  var patternMail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

  if (mail == "") {
    document.getElementById("errorForm").innerHTML = "Where is your email?";
    error = "mail invalid";
    return false;
  } else if (patternMail.test(mail) == false) {
    document.getElementById("errorForm").innerHTML = "where is your email?";
    error = "mail invalid";
    return false;
  }

  if (password == "") {
    document.getElementById("errorForm").innerHTML =
      "where is your password dude?";
    error = "empty password";
    return false;
  }
}

function register(e) {
  e.preventDefault();
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

  if (name == "") {
    document.getElementById("errorName").innerHTML = "firstName is required";
    document.getElementById("name").style.borderColor = "#ff531a";
    return false;
  } else if (patternName.test(name) == false) {
    document.getElementById("errorName").innerHTML =
      "Only letters and white space allowed, name should have at least three letter";
    document.getElementById("name").style.borderColor = "#ff531a";
    return false;
  }

  if (email == "") {
    document.getElementById("errorMail").innerHTML = "mail is required";
    document.getElementById("email").style.borderColor = "#ff531a";
    return false;
  } else if (patternMail.test(email) == false) {
    document.getElementById("errorMail").innerHTML = "mail is invalid";
    document.getElementById("email").style.borderColor = "#ff531a";
    return false;
  }

  if (password === "") {
    document.getElementById("errorPassword").innerHTML = "password is required";
    document.getElementById("password").style.borderColor = "#ff531a";
    return false;
  } else if (patternPassword.test(password) == false) {
    document.getElementById("errorPassword").innerHTML =
      "password between 8 to 15 characters which contain at least one numeric digit and a special character";
    document.getElementById("password").style.borderColor = "#ff531a";
    return false;
  }

  if (confirmPassword == "") {
    document.getElementById("errorPasswordConfirm").innerHTML =
      "password is required";
    document.getElementById("passConfirm").style.borderColor = "#ff531a";
    return false;
  } else if (confirmPassword !== password) {
    document.getElementById("errorPasswordConfirm").innerHTML =
      "this password doesn't match the first one";
    document.getElementById("passConfirm").style.borderColor = "#ff531a";
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
    document.getElementById("firstName").style.borderColor = "#ff531a";
    return false;
  } else if (patterns["name"].test(name) == false) {
    document.getElementById("errorFirstName").innerHTML =
      "Only letters and white space allowed, name should have at least three letter";
    document.getElementById("firstName").style.borderColor = "#ff531a";
    return false;
  }

  if (email === "") {
    document.getElementById("errorEmail").innerHTML = "email is required";
    document.getElementById("email").style.borderColor = "#ff531a";
    return false;
  } else if (patterns["email"].test(email) == false) {
    document.getElementById("errorEmail").innerHTML = "email is invalid";
    document.getElementById("email").style.borderColor = "#ff531a";
    return false;
  }

  if (oldPassword === "") {
    document.getElementById("errorOldPassword").innerHTML =
      "old Password is required";
    document.getElementById("passOld").style.borderColor = "#ff531a";
    return false;
  }

  if (newPassword === "") {
    document.getElementById("errorNewPassword").innerHTML =
      "Password is required";
    document.getElementById("password").style.borderColor = "#ff531a";
    return false;
  } else if (patterns["password"].test(newPassword) == false) {
    document.getElementById("errorNewPassword").innerHTML =
      "password between 8 to 15 characters which contain at least one numeric digit and a special character";
    document.getElementById("password").style.borderColor = "#ff531a";
    return false;
  }

  if (confirmPassword == "") {
    document.getElementById("errorNewPasswordC").innerHTML =
      "Password is required";
    document.getElementById("passConfirm").style.borderColor = "#ff531a";
    return false;
  } else if(confirmPassword !== newPassword) {
    document.getElementById("errorNewPasswordC").innerHTML =
      "Passwords do not match. Please re-enter your password.";
    document.getElementById("passConfirm").style.borderColor = "#ff531a";
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
    document.getElementById("title").style.borderColor = "#ff531a";
    return false;
  }
  if (description == "") {
    document.getElementById("errorDescription").innerHTML =
      "where is the description?";
    document.getElementById("description").style.borderColor = "#ff531a";
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
      document.getElementById("image").style.borderColor = "#ff531a";
      return false;
    }
  }

  if (content == "") {
    document.getElementById("errorContent").innerHTML =
      "where are you going dude where is the article?!";
    document.getElementById("content").style.borderColor = "#ff531a";
    return false;
  } else {
    return true;
  }
}

function validateMail() {
  var mail = document.getElementById("mail").value;
  document.getElementById("errorMail").innerHTML = "";
  var patternMail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

  if (mail == "") {
    document.getElementById("errorMail").innerHTML = "where is your mail?";

    return false;
  } else if (patternMail.test(mail) == false) {
    document.getElementById("errorMail").innerHTML = "invalid mail";

    return false;
  }
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
    document.getElementById("mail").style.borderColor = "#ff531a";
    return false;
  } else if (patternMail.test(mail) == false) {
    document.getElementById("errorMail").innerHTML = "mail is invalid";
    document.getElementById("mail").style.borderColor = "#ff531a";
    return false;
  }

  if (password == "") {
    document.getElementById("errorPassword").innerHTML = "password is required";
    document.getElementById("password").style.borderColor = "#ff531a";
    return false;
  } else if (patternPassword.test(password) == false) {
    document.getElementById("errorPassword").innerHTML =
      " password between 8 to 15 characters which contain at least one numeric digit and a special character";
    document.getElementById("password").style.borderColor = "#ff531a";
    return false;
  }

  if (confirmPassword == "") {
    document.getElementById("errorPasswordC").innerHTML =
      "password is required";
    document.getElementById("passConfirm").style.borderColor = "#ff531a";
    return false;
  } else if (confirmPassword !== password) {
    document.getElementById("errorPasswordC").innerHTML =
      "this password doesn't match the first one";
    document.getElementById("passConfirm").style.borderColor = "#ff531a";
    return false;
  } else {
    return true;
  }
}

export {
  login,
  register,
  updateFormValidation,
  validateFormResetPassword,
  validateMail,
  validationFormEdition,
};
