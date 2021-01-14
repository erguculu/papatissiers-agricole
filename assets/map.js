import './styles/map.css';

let ville = "";
let villes = {
   "Paris": { "lat": 48.852969, "lon": 2.349903 },
   "Brest": { "lat": 48.383, "lon": -4.500 },
   "Quimper": { "lat": 48.000, "lon": -4.100 },
   "Bayonne": { "lat": 43.500, "lon": -1.467 }
};

let macarte = L.map('map').setView([48.852969, 2.349903], 13);

L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {

   attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
   minZoom: 7,
   maxZoom: 20
}).addTo(macarte);

for (ville in villes) {
    let marker = L.marker([villes[ville].lat, villes[ville].lon]).addTo(macarte);
    marker.bindPopup("<p>"+ville+"</p>");
}
