
let change = document.getElementsByClassName("changeAdmin");
const containerFilm = document.getElementById("film");
const containerUser = document.getElementById("user");


function changeAdmin(y) {
    containerUser.classList.add("hidden");
    change[0].classList.remove("bg-dark");
    change[0].classList.remove("text-whitePrimary");
    change[0].classList.remove("bg-whitePrimary");
    change[0].classList.remove("text-dark");
    change[1].classList.remove("bg-dark");
    change[1].classList.remove("text-whitePrimary");
    change[1].classList.remove("bg-whitePrimary");
    change[1].classList.remove("text-dark");


    if (y == 1) {
        containerFilm.classList.remove("hidden");
        change[1].classList.add("bg-whitePrimary");
        change[1].classList.add("text-dark");
        change[0].classList.add("bg-dark");
        change[0].classList.add("text-whitePrimary");

    }
    if (y == 2) {
        containerFilm.classList.add("hidden");
        containerUser.classList.remove("hidden");
        change[0].classList.add("bg-whitePrimary");
        change[0].classList.add("text-dark");
        change[1].classList.add("bg-dark");
        change[1].classList.add("text-whitePrimary");
        

    }
    
}