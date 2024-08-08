function styleArticle() {
  if (document.getElementById("article2")) {
    document.getElementById("article2").style.display = "none";
    var text = document.getElementById("article2").textContent;
    var regex = /^(\https:\/\/www).([a-zA-Z]*\.)([a-zA-Z0-9/?&=-_.;]*)$/;
    text = text.split(" ");
    text = text.map(website);
    function website(val) {
      if (regex.test(val) == true) {
        return "<a href=" + val + " target='_blank'>" + val + "</a>";
      } else {
        return val;
      }
    }
    text = text.join(" ");
    // the writer put paragraph between{}
    //the writer indicates that this phrase is a title by using (titleStart and titleEnd)
    text = text
      .replace(/{/g, "<p>")
      .replace(/}/g, "</p>")
      .replace(/titleStart/g, "<h3>")
      .replace(/titleEnd/g, "</h3>")
      .replace(/&quot;/g, '"')
      .replace(/&amp;/g, "&")
      .replace(/&lt; /g, "<")
      .replace(/&gt; /g, ">");
    document.getElementById("article").innerHTML = text;
  }
}

function styleHomePageArticle() {
  if (document.title == "Budding Programmer Diary's") {
    var x = document.getElementsByClassName("home1");
    var y = document.getElementsByClassName("home");
    //var text=document.getElementsByClassName("home1").textContent;
    for (var i = 0; i < x.length; i++) {
      x[i].style.display = "none";
      var response = x[i].textContent
        .replace(/{/g, " ")
        .replace(/}/g, " ")
        .replace(/titleStart/g, " ")
        .replace(/titleEnd/g, " ");
      y[i].innerHTML = response;
    }
  }
}

export { styleArticle, styleHomePageArticle };
