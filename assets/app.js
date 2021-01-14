/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';
import './styles/map.css';

// start the Stimulus application
//import './bootstrap';

// Nous initialisons une liste de marqueurs
var ville = "";
var villes = {
    "Paris": { "lat": 48.852969, "lon": 2.349903 },
    "Brest": { "lat": 48.383, "lon": -4.500 },
    "Quimper": { "lat": 48.000, "lon": -4.100 },
    "Bayonne": { "lat": 43.500, "lon": -1.467 }
};
// On initialise la carte
var macarte = L.map('map').setView([48.852969, 2.349903], 13);
// Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
    // Il est toujours bien de laisser le lien vers la source des données
    attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
    minZoom: 1,
    maxZoom: 20
}).addTo(macarte);

// Nous parcourons la liste des villes
for (ville in villes) {
    var marker = L.marker([villes[ville].lat, villes[ville].lon]).addTo(macarte);
    marker.bindPopup("<p>" + ville + "</p>");
}