// Fonction pour ajouter un élément avec le texte sélectionné
function addSelect() {
    // Récupère l'élément select et sa valeur sélectionnée
    var select = document.getElementById("monSelect");
    var idActeur = select.options[select.selectedIndex].dataset.idActeur;
    var valeur = select.options[select.selectedIndex].value;
    var texte = select.options[select.selectedIndex].text;
  
    // Crée un nouvel élément div avec le texte sélectionné
    var nouvelElement = document.createElement("div");
    var nouveauTexte = document.createTextNode(texte);
    nouvelElement.appendChild(nouveauTexte);
  
    // Ajoute l'id-acteur au champ caché
    var inputIdActeur = document.createElement("input");
    inputIdActeur.name = "idActeur[]";
    inputIdActeur.value = idActeur;
    inputIdActeur.classList.add('text-2xl');
    nouvelElement.appendChild(inputIdActeur);

    // Ajoute le nouvel élément à la page
    var conteneur = document.getElementById("conteneur");

    conteneur.appendChild(nouvelElement);
    nouvelElement.classList.add("text-whitePrimary", "w-[40px]", "uppercase", "text-center", "mb-4", "leading-10");
    nouvelElement.classList.add("testId");



    var boutonSupprimer = document.createElement("button");
    boutonSupprimer.innerHTML = " Supprimer";
    boutonSupprimer.onclick = function() {
        nouvelElement.remove();
};
    nouvelElement.appendChild(boutonSupprimer);
    boutonSupprimer.classList.add("bg-sand");
    boutonSupprimer.classList.add("text-whitePrimary");
    boutonSupprimer.classList.add("rounded-2xl");
    boutonSupprimer.classList.add("h-12");
    boutonSupprimer.classList.add("px-2");


    // Ajoute le nouvel élément à la page
    var conteneur = document.getElementById("conteneur");
    conteneur.appendChild(nouvelElement);
}

  