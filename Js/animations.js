import {
  popup,
  popupbtn,
  subscribeButton,
  socialMediaList,
  topBtn,
  downBtn,
  menu,
  navMobil,
  closeBtn,
  closebtn,
  overlayDiv,
  socialMedia,
  image,
} from "./domElements.js";

function animateHeroMessageOnload() {
  subscribeButton.style.right = "5%";
  document.querySelector("h1").style.left = "5%";
  document.querySelector("#presentation p").style.marginLeft = "15px";
}

function showSocialMediaList() {
  socialMediaList.style.display = "block";
  socialMedia.style.display = "block";
}

function hideSocialMediaList() {
  socialMediaList.style.display = "none";
  socialMedia.style.display = "none";
}

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("top").style.display = "block";
    document.getElementById("down").style.display = "block";
  } else {
    document.getElementById("top").style.display = "none";
    document.getElementById("down").style.display = "none";
  }
}

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

function downFunction() {
 let  element = document.querySelector(" footer small");
  if (element) {
    element.scrollIntoView({ behavior: 'smooth', block: 'start' });
  } else {
    console.error("Element not found.");
  }
}

function stickyNavBar() {
  if (
    document.body.scrollTop > 30 ||
    document.documentElement.scrollTop > 30
  ) {
    document.querySelector("nav").style.position = "fixed";
    document.querySelector("nav").style.top = "0";
    document.querySelector("nav").style.right = "0";
    document.querySelector("nav").style.left = "0";
  } else {
    document.querySelector("nav").style.position = "relative";
  }
}

function showSousMenu() {
  if (navMobil.style.display == "none") {
    overlayDiv.style.display = "block";
    navMobil.style.display = "block";
  } else {
    overlayDiv.style.display = "none";
    navMobil.style.display = "none";
  }
}

function hideSousMenu() {
  overlayDiv.style.display = "none";
  navMobil.style.display = "none";
}

function closePopup() {
  if (popup.style.display == "block") {
    popup.style.display = "none";
  }
}

function animateImage() {
  if (document.title == "who I Am") {
    var start = 0;
    var move = setInterval(function () {
      start++;
      image.style.transform = "rotate(" + start + "deg)";

      if (start == 360) {
        clearInterval(move);
      }
    }, 2);
  }
}

function showformSignIn() {
  if (document.getElementById("formSignIn").style.display == "none") {
    document.getElementById("formSignIn").style.display = "block";
    document.getElementById("formLogin").style.display = "none";
  } else {
    document.getElementById("formSignIn").style.display = "none";
    document.getElementById("formLogin").style.display = "block";
  }
}

function showLogin() {
  if (document.getElementById("formSignIn").style.display == "block") {
    document.getElementById("formSignIn").style.display = "none";
    document.getElementById("formLogin").style.display = "block";
  } else {
    document.getElementById("formSignIn").style.display = "block";
    document.getElementById("formLogin").style.display = "none";
  }
}

function autorisationSaveArticle() {
  popup.style.display = "block";
  document.querySelector("#popup p").innerHTML =
    "Don't hesitate, Register and save your favorites articles to read them later!";
}

export {
  animateHeroMessageOnload,
  showSocialMediaList,
  hideSocialMediaList,
  scrollFunction,
  topFunction,
  downFunction,
  stickyNavBar,
  showSousMenu,
  hideSousMenu,
  closePopup,
  animateImage,
  showformSignIn,
  showLogin,
  autorisationSaveArticle,
};
