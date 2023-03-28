
let change = document.getElementsByClassName("changeAdmin");
const containerFilm = document.getElementById("film");
const containerUser = document.getElementById("user");
const action = document.getElementsByClassName("action");



function changeAdmin(y) {
    containerUser.classList.add("hidden");
        change[1].classList.remove("border-sand");
        change[1].classList.remove("text-sand");
        change[1].classList.remove("border-whitePrimary");
        change[1].classList.remove("text-whitePrimary");
        change[0].classList.remove("border-whitePrimary");
        change[0].classList.remove("text-whitePrimary");
        change[0].classList.remove("border-sand");
        change[0].classList.remove("text-sand");
        change[0].classList.remove("hover:scale-105");
        change[1].classList.remove("hover:scale-105");

        action[0].classList.add("hidden");
        action[1].classList.add("hidden");




    if (y == 1) {
        containerFilm.classList.remove("hidden");
        change[0].classList.add("border-sand");
        change[0].classList.add("text-sand");
        change[1].classList.add("hover:scale-105");
        change[1].classList.add("border-whitePrimary");
        change[1].classList.add("text-whitePrimary");
        action[0].classList.remove("hidden");

    }
    if (y == 2) {
        containerFilm.classList.add("hidden");
        containerUser.classList.remove("hidden");
        change[1].classList.add("border-sand");
        change[1].classList.add("text-sand");
        change[0].classList.add("border-whitePrimary");
        change[0].classList.add("text-whitePrimary");
        change[0].classList.add("hover:scale-105");

        action[1].classList.remove("hidden");
        

    }
    
}