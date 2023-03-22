let connexionInput = document.getElementsByClassName("connectInput");
let tab = document.getElementsByClassName("tab");

tab[1].style.display = "none";

function connexion(n) {
  
    connexionInput[0].classList.remove("text-sand");
    connexionInput[0].classList.remove("border-sand");
    connexionInput[1].classList.remove("text-sand");
    connexionInput[1].classList.remove("border-sand");


  if ( n == 0 ) {
      tab[1].style.display = "none" ;
      tab[0].style.display = "block" ;
      connexionInput[0].classList.add ("text-sand");
      connexionInput[0].classList.add ("border-sand");
      connexionInput[1].classList.add("text-whitePrimary");
      connexionInput[0].classList.remove("text-whitePrimary");

  }

  else if ( n == 1 ) {
    tab[0].style.display = "none" ;
    tab[1].style.display = "block" ;
    connexionInput[1].classList.add ("text-sand");
    connexionInput[1].classList.add ("border-sand");
    connexionInput[1].classList.remove("text-whitePrimary");
    connexionInput[0].classList.add ("text-whitePrimary");
  }
}