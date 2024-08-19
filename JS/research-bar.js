// #region Variables
const research_bar = document.getElementById("research_bar");
const espace_contenu = document.getElementById("espace_contenu");
const tabPictures = espace_contenu.getElementsByClassName("card_media");




// #region Recherche
research_bar.addEventListener("input", (e) => {
    let recherche = research_bar.value.toUpperCase();   // en upperCase pour faciliter la recherche

    for(let picture of tabPictures) {
        
        let name = (picture.querySelectorAll('.nom_image')[0].innerText).toUpperCase();
        let description = (picture.querySelectorAll('.description_image')[0].innerText).toUpperCase();
        let date = (picture.querySelectorAll('.date_image')[0].innerText).toUpperCase();
        
        if (
            name.includes(recherche) == true ||
            description.includes(recherche) == true ||
            date.includes(recherche) == true
        ) {
            picture.style.display = "flex";
        }
        else {
            picture.style.display = "none";
        }
    }
})
