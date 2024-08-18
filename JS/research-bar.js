/* // #region Classe

class picture {
    constructor (name, link, client, ground, date) {
        this.name = name;
        this.link = link;
        this.client = client;
        this.ground = ground;
        this.date = date;
    }
}


// #region Variables

let picture_1 = new picture (
    "picture" + 1,
    "./Images/galerie-images/image-1.jpg",
    "Charles",
    "Terrain 1",
    {
        day: "01/06/2024",
        dayOfWeek: "samedi",
        hour: "14h"
    }
)

let picture_2 = new picture (
    "picture" + 2,
    "./Images/galerie-images/image-2.jpg",
    "Christophe",
    "Terrain 2",
    {
        day: "02/06/2024",
        dayOfWeek: "dimanche",
        hour: "16h"
    }
)

let picture_3 = new picture (
    "picture" + 3,
    "./Images/galerie-images/image-1.jpg",
    "Elodie",
    "Terrain 3",
    {
        day: "03/06/2024",
        dayOfWeek: "lundi",
        hour: "10h"
    }
)

let picture_4 = new picture (
    "picture" + 4,
    "./Images/galerie-images/image-2.jpg",
    "Florian",
    "Terrain 4",
    {
        day: "04/06/2024",
        dayOfWeek: "mardi",
        hour: "18h"
    }
)

let picture_5 = new picture (
    "picture" + 5,
    "./Images/galerie-images/image-1.jpg",
    "Anna",
    "Terrain 2",
    {
        day: "05/06/2024",
        dayOfWeek: "mercredi",
        hour: "19h"
    }
)


let tabPictures = [
    picture_1,
    picture_2,
    picture_3,
    picture_4,
    picture_5
];


const research_bar = document.getElementById("research_bar");
const espace_contenu = document.getElementById("espace_contenu");







// #region Recherche

function initialisation() {
    for(let picture of tabPictures) {

        const cardPicture = document.createElement("div");
        cardPicture.className = "picture";
        cardPicture.id = picture.name;

        const divInfo = document.createElement("div");
        divInfo.className = "infoPicture";

        const newImage = document.createElement("img");
        const newInfoClient = document.createElement("p");
        const newInfoDayOfWeek = document.createElement("p");
        const newInfoDay = document.createElement("p");
        const newInfoHour = document.createElement("p");
        const newInfoGround = document.createElement("p");

        newImage.src = picture.link;
        newImage.alt = picture.name;
        newInfoClient.innerText = picture.client;
        newInfoDayOfWeek.innerText = picture.date.dayOfWeek;
        newInfoDay.innerText = picture.date.day;
        newInfoHour.innerText = picture.date.hour;
        newInfoGround.innerText = picture.ground;

        divInfo.append(newInfoClient,newInfoDayOfWeek,newInfoDay,newInfoHour,newInfoGround);
        cardPicture.append(newImage,divInfo);
        espace_contenu.append(cardPicture);
    }
}

initialisation();

research_bar.addEventListener("input", (e) => {
    let recherche = research_bar.value.toUpperCase();   // en upperCase pour faciliter la recherche

    for(let picture of tabPictures) {

        let
            client = picture.client.toUpperCase(),
            dayOfWeek = picture.date.dayOfWeek.toUpperCase(),
            day = picture.date.day.toUpperCase(),
            hour = picture.date.hour.toUpperCase(),
            ground = picture.ground.toUpperCase();
        
        let correspondingPicture = document.getElementById(picture.name);

        if (
            client.includes(recherche) == true ||
            dayOfWeek.includes(recherche) == true ||
            day.includes(recherche) == true ||
            hour.includes(recherche) == true ||
            ground.includes(recherche) == true
        ) {
            correspondingPicture.style.display = "flex";
        }
        else {
            correspondingPicture.style.display = "none";
        }
    }
})
 */