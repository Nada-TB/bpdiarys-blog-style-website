"use strict;";

import {
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
} from "./animations.js";

import {
  login,
  register,
  updateFormValidation,
  validateFormResetPassword,
  validateMail,
  validationFormEdition,
} from "./handleForms.js";

import { styleArticle, styleHomePageArticle } from "./articleFormatter.js";
import {
  subscribeButton,
  closebtn,
  topBtn,
  downBtn,
  menu,
  closeBtn,
  popupbtn,
  formSignIn, 
  formUpdateProfile,
  popup,
  saveArticleBtn
} from "./domElements.js";

import {getComment} from "./ajaxModule.js";

//*************************************Events**************************************************
document.addEventListener("DOMContentLoaded", () => {
  animateHeroMessageOnload(),
    animateImage(),
    styleArticle(),
    styleHomePageArticle();
});

window.onscroll = function () {
  scrollFunction();
};

subscribeButton.addEventListener("click", showSocialMediaList);
closebtn.addEventListener("click", hideSocialMediaList);
topBtn.addEventListener("click", topFunction);
downBtn.addEventListener("click", downFunction);
menu.addEventListener("click", showSousMenu);
closeBtn.addEventListener("click", hideSousMenu);
popupbtn.addEventListener("click", closePopup);
Array.from(saveArticleBtn).forEach(elt=>{
  elt.addEventListener('click', autorisationSaveArticle);
})

// if (document.title == "login page") {
//   document.getElementById("register").addEventListener("click", showformSignIn);

//   document.getElementById("log").addEventListener("click", showLogin);
// }

// if (formSignIn) {
//   formSignIn.addEventListener('submit', (e) => {
//     e.preventDefault();
//     if(register(e)){
//       formSignIn.submit();
//     }
//     console.log('Form submitted');
//   });
// } else {
//   console.error('Form not found.');
// }

if(formUpdateProfile){
  formUpdateProfile.addEventListener('submit',(e)=>{
    e.preventDefault();
    if(updateFormValidation()){
      formUpdateProfile.submit();
      console.log('form submitted');
    }
   
  })
}else{
  console.log('Form not found.');
}