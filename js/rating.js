function rate() {
  $("#stars li").on("mouseover", function () {
      var onStar = parseInt($(this).data("value"), 10); // L'étoile ou la souris est dessus

      // Mettre en évidence toutes les étoiles qui ne sont pas après l'étoile choisie
      $(this)
        .parent()
        .children("li.star")
        .each(function (e) {
          if (e < onStar) {
            $(this).addClass("hover");
          } else {
            $(this).removeClass("hover");
          }
        });
    })
    .on("mouseout", function () {
      $(this)
        .parent()
        .children("li.star")
        .each(function (e) {
          $(this).removeClass("hover");
        });
    });

  /* Action quand on clique sur une étoile */
  $("#stars li").on("click", function () {
    var onStar = parseInt($(this).data("value"), 10); // Les étoiles qui sont sélectionner
    var stars = $(this).parent().children("li.star");

    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass("selected");
    }

    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass("selected");
    }

    //js pour recup la valeur

    var ratingValue = parseInt(
      $("#stars li.selected").last().data("value"),
      10
    );
    var note = ratingValue;
    responseMessage("<span>" +note + "</span>");
    document.cookie = "note=" + note;
  });
}
function responseMessage(note) {

  $(".p.text-notation").html(note);
}

//Fonction qui affiche la note qu'on a donnée.
function giveNote(note) {
  console.log("ok");
  var etoile = document.getElementById('etoile');
  for (let i = 0; i < etoile.length; i++) {
    etoile[i].addClass("selected");
    console.log(etoile[i]);
  }
}
