document.addEventListener("DOMContentLoaded", function() {

    document.body.style.display = "flex";
    document.body.style.flexDirection = "column";
    document.body.style.alignItems = "center";
  
    var cards = document.querySelectorAll(".card");
    cards.forEach(function(c, i) {
      c.style.opacity = 0;
      setTimeout(function() {
        c.style.transition = "opacity .5s ease";
        c.style.opacity = 1;
      }, 120 * i);
    });
  });
  