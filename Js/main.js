"use strict;";

import {
  showSocialMediaList,
  hideSocialMediaList,
  scrollFunction,
  topFunction,
  downFunction,
  stickyNavBar,
  showSousMenu,
  hideSousMenu,
  closePopup,
  showformSignIn,
  showLogin,
  autorisationSaveArticle,
  footerVisibility,
  autorisationToComment
} from "./animations.js";

import {
  login,
  register,
  updateFormValidation,
  validateFormResetPassword,
  validateEmailInput,
  validationFormEdition,
  validateCommentInput
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
  formLogin, 
  formSignIn,
  formUpdateProfile,
  popup,
  saveArticleBtn,
  showCommentSection, 
  forgottenPasswordForm,
  newsletterForm,
  resetPasswordForm, 
  unsubscribeForm,
  commentSection
} from "./domElements.js";

import {getComment} from "./ajaxModule.js";

//*************************************Events**************************************************
document.addEventListener("DOMContentLoaded", () => {
    styleArticle(),
    styleHomePageArticle();
});

window.onscroll = function () {
  scrollFunction();
};

window.addEventListener('scroll',footerVisibility);
window.addEventListener('DOMContentLoaded', function () {
  if (window.twttr && window.twttr.widgets) {
    twttr.widgets.load();
  }
});
subscribeButton.addEventListener("click", showSocialMediaList);
subscribeButton.addEventListener("pointerdown", showSocialMediaList);
closebtn.addEventListener("click", hideSocialMediaList);
closebtn.addEventListener("pointerdown", hideSocialMediaList);
topBtn.addEventListener("click", topFunction);
topBtn.addEventListener("pointerdown", topFunction);
downBtn.addEventListener("click", downFunction);
downBtn.addEventListener("pointerdown", downFunction);
menu.addEventListener("click", showSousMenu);
menu.addEventListener("pointerdown", showSousMenu);
closeBtn.addEventListener("click", hideSousMenu);
closeBtn.addEventListener("pointerdown", hideSousMenu);
popupbtn.addEventListener("click", closePopup);
popupbtn.addEventListener("pointerdown", closePopup);
Array.from(saveArticleBtn).forEach(elt=>{
  elt.addEventListener('click', autorisationSaveArticle);
  elt.addEventListener('pointerdown', autorisationSaveArticle);
});

Array.from(showCommentSection).forEach(elt=>{
  elt.addEventListener('click', getComment);
  elt.addEventListener('pointerdown', getComment)
});

if(formLogin){
  formLogin.addEventListener('submit',(e)=>{
    e.preventDefault();
    let status= login();
      if (status === true) {
        formLogin.submit();
      }
   
  });

}
if(formSignIn){
  formSignIn.addEventListener('submit', (e)=>{
    e.preventDefault();
    let status=register();
    if(status=== true){
      formSignIn.submit();
    }
  
  })

}

if(forgottenPasswordForm){
  forgottenPasswordForm.addEventListener('submit',(e)=>{
    e.preventDefault();
    let status= validateEmailInput(email);
    if(status===true){
      forgottenPasswordForm.submit();
    }
  })
}

if(newsletterForm){
  let id=0;
  Array.from(newsletterForm).forEach((elt, id)=>{
    elt.addEventListener('submit', (e)=>{
    e.preventDefault();
    let status= validateEmailInput("newsletterEmail"+id, "errorMail"+id);
    console.log("newsletterEmail"+id);
    if(status===true){
      elt.submit();
    }
  })

  })
  
}

if(formUpdateProfile){
  formUpdateProfile.addEventListener('submit',(e)=>{
    e.preventDefault();
    let status= updateFormValidation();
    if(status===true){
      formUpdateProfile.submit();
    }
  })

}

if(resetPasswordForm){
  resetPasswordForm.addEventListener('submit',(e)=>{
    e.preventDefault();
    let status= validateFormResetPassword();
    if(status===true){
      resetPasswordForm.submit();
    }
  })

}

if(unsubscribeForm){
  unsubscribeForm.addEventListener('submit',(e)=>{
    e.preventDefault();
    let status=validateEmailInput("email", "errorMailSubscriber");
    if(status===true){
      unsubscribeForm.submit();
    }
  })
}

if(commentSection){
  commentSection.addEventListener('submit', (e)=>{
    e.preventDefault();
    let status=validateCommentInput('comment', 'errorComment');
    if(status===true){
      commentSection.submit();
    }
  })
}


