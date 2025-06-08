import { popup, commentSection } from "./domElements";


function getComment() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        // get the connection status
        let status = JSON.parse(this.responseText);
        let statusConnection = status;
  
        if (statusConnection === "connected") {
          commentSection.style.display = "block";
        } else if (statusConnection === "not connected") {
          commentSection.style.display = "none";
          popup.style.display = "block";
          document.querySelector("#popup p").innerHTML =
            "you should register to comment article";
        }
      }
    };
  
    xhttp.open("GET", "models/SessionStatus.php", true);
    xhttp.send();
  }

export {getComment};