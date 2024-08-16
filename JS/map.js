// Creation map

let map = L.map('map').setView([43.3, -0.38], 13);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);


// Creation marker

let latitude = 43.3;
let longitude = - 0.38;

let marker = L.marker([latitude, longitude]).addTo(map);
marker.bindPopup("<b>Padel Club</b>");