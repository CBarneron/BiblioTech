function rate() {;
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
    document.cookie = "note=" + note;
  });
}

//Fonction qui affiche la note qu'on a donnée.
function giveNote(note) {
    document.cookie = "note=";
    for(i = 1; i <= 10 ; i++){
      if (i <= note)
      {
        $("#etoile" + i).addClass("selected");
      }
      else {
        $("#etoile" + i).removeClass("selected");
      }
    }
}
