<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maps Engins</title>

    <!-- Fonts -->
    <!-- Préconnexion au domaine pour optimiser le chargement des polices -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <!-- Inclusion de la police Figtree avec les poids 400 et 600 -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <!-- Inclusion de Tailwind CSS via un CDN -->
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19"></script>

    <!-- Leaflet CSS -->
    <!-- Inclusion de la feuille de style de Leaflet pour les cartes -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />

    <!-- Inclusion de Tailwind CSS via CDN (duplication inutile, mais conserve l'ordre de ton code) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Thiriot-Location | {{ Auth::user()->name }}</title>
    <!-- Inclusion des icônes Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Inclusion de la feuille de style de Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Inclusion de la bibliothèque Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <!-- Inclusion de fichiers CSS et JS via Vite (outil de build) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Inclusion de Leaflet via un CDN (duplication) -->
    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>

    <!-- Inclusion de la feuille de style de Leaflet (version 1.2.0) -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <!-- Inclusion de la feuille de style de Leaflet Routing Machine -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />

    <style>
        /* Style pour faire tourner les éléments de 90 degrés avec une transition */
        .rotate-90 {
            transform: rotate(90deg);
            transition: transform 0.3s;
        }

        /* Style pour remettre les éléments à la rotation initiale avec une transition */
        .rotate-0 {
            transform: rotate(0deg);
            transition: transform 0.3s;
        }

        /* Style pour les boutons au survol */
        .button-hover:hover {
            background-color: #d3d3d3;
            /* gris clair */
            border-radius: 6px;
        }

        /* Styles personnalisés pour la scrollbar dans customDiv */
        #customDiv .overflow-y-auto::-webkit-scrollbar {
            width: 5px;
        }

        #customDiv .overflow-y-auto::-webkit-scrollbar-track {
            background: transparent;
        }

        #customDiv .overflow-y-auto::-webkit-scrollbar-thumb {
            background: #000;
            border-radius: 3px;
        }

        #customDiv .overflow-y-auto::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
</head>

<body class="text-gray-800 font-inter">
    <x-side-navbar />
    <!-- Inclusion du composant de la navbar -->


    <!-- Code PHP pour récupérer les données -->
    @php
        use App\Models\Engin; // Importer le modèle Engin
        $engins = Engin::all(); // Récupérer tous les clients de la base de données

        use App\Models\Location; // Importer le modèle Location
        $loc_engin = Location::all(); // Récupérer toutes les locations de la base de données

        use App\Models\Position; // Importer le modèle Position
        $position_engin = Position::all(); // Récupérer toutes les positions de la base de données
    @endphp

    <div class="ml-[350px] mt-10">
        <!-- Conteneur principal avec marges -->
        <div class="relative flex items-center space-x-2">
            <!-- Conteneur relatif avec disposition flex, alignement des items et espacement horizontal -->
            <h2 class="font-bold">Veuillez choisir l'engin :</h2>
            <!-- Titre en gras -->
            <button id="toggleButton"
                class="text-black border-2 border-black font-bold px-4 pl-[20px] relative flex items-center">
                <!-- Bouton avec texte noir, bordure noire, police en gras, padding et disposition flex -->
                <span id="buttonText">Choisir l'engin</span>
                <!-- Texte du bouton -->
                <div class="ml-2">
                    <!-- Conteneur pour l'image avec marge à gauche -->
                    <img id="arrowImage" src="https://cdn-icons-png.flaticon.com/512/6327/6327824.png"
                        alt="Flèche droite" class="w-4 h-4">
                    <!-- Image de la flèche -->
                </div>
            </button>
        </div>
        <div id="customDiv"
            class="absolute justify-center items-center text-black border-black bg-white border-2 flex flex-col ml-[177px] hidden"
            style="width: 360px; z-index: 999;">
            <!-- Conteneur pour les options de sélection d'engin, caché par défaut -->
            <div class="relative pt-2 pb-2 mr-4 text-black" style="width: 350px;">
                <!-- Conteneur pour la barre de recherche avec padding et marge -->
                <input
                    class="w-full h-10 ml-2 text-sm bg-white border-2 border-orange-500 rounded-lg focus:outline-none"
                    type="text" id="searchInput" placeholder="Rechercher...">
                <!-- Champ de recherche avec styles et placeholder -->
                <button type="submit" class="absolute top-0 mt-5 right-2">
                    <!-- Bouton de soumission avec position absolue -->
                    <svg class="w-4 h-4 text-orange-500 fill-current" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                        viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                        xml:space="preserve" width="512px" height="512px">
                        <!-- Icône SVG de recherche -->
                        <path
                            d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786
                            c0-12.682-10.318-23-23-23s-23,10.318-23,23s10.318,23,23,23c4.761,0,9.298-1.436
                            ,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92c0.779,0,1.518-0.297,
                            2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,
                            17s-7.626,17-17,17s-17-7.626-17-17S14.61,6,23.984,6z" />
                        <!-- Chemin de l'icône de recherche -->
                    </svg>
                </button>
            </div>
            <div class="w-[350px] max-h-[300px] h-auto overflow-y-auto px-2">
                <!-- Conteneur pour les résultats de recherche avec défilement vertical -->
                @foreach ($engins as $engin)
                    <button id="enginSelect" data-id={{ $engin->id_engins }}
                        class="block w-full h-10 py-2 text-center button-hover">
                        <!-- Bouton pour chaque engin avec styles -->
                        {{ 'N°' . $engin->Num_Machine }} - {{ $engin->marque }} - {{ $engin->modele }} -
                        {{ $engin->categorie }}
                    </button>
                @endforeach
            </div>
        </div>
        <div class="flex items-center mt-5 mb-5">
            <!-- Conteneur pour le bouton de trajet d'aujourd'hui -->
            <button id="trajet_Aujoudhui-btn"
                class="relative font-semibold border border-green-600 px-4 py-2 w-[320px] bg-white text-green-600 rounded-lg overflow-hidden transition-all duration-300 group hover:text-white">
                <!-- Bouton avec styles et transition -->
                <span
                    class="absolute inset-0 w-0 transition-all duration-300 ease-in-out bg-green-600 group-hover:w-full"></span>
                <span class="relative z-10">Voir le trajet effectué aujourd'hui</span>
                <!-- Texte du bouton -->
            </button>
        </div>
        <div class="flex items-center mb-5">
            <!-- Conteneur pour la sélection des dates -->
            <h2 class="font-bold">Veuillez choisir la date entre : &nbsp;</h2>
            <!-- Titre en gras -->
            <input type="date" id="startDatePicker" class="w-[200px] border-black border-2 rounded-md px-2 py-1">
            <!-- Sélecteur de date de début -->
            <h2 class="font-bold">&nbsp; et &nbsp;</h2>
            <!-- Texte en gras -->
            <input type="date" id="endDatePicker" class="w-[200px] border-black border-2 rounded-md px-2 py-1">
            <!-- Sélecteur de date de fin -->
        </div>
        <div class="flex items-center justify-between">
            <!-- Conteneur pour les boutons de trajet éventuel et réinitialisation -->
            <button id="trajet-btn"
                class="relative font-semibold border border-orange-500 px-4 py-2 w-[320px] bg-white text-orange-500 rounded-lg overflow-hidden transition-all duration-300 group hover:text-white">
                <!-- Bouton avec styles et transition -->
                <span
                    class="absolute inset-0 w-0 transition-all duration-300 ease-in-out bg-orange-500 group-hover:w-full"></span>
                <span class="relative z-10">Voir l'éventuel trajet emprunté</span>
                <!-- Texte du bouton -->
            </button>
            <button id="reset-btn"
                class="relative mr-[320px] font-semibold border border-gray-600 px-4 py-2 w-[320px] bg-white text-gray-600 rounded-lg overflow-hidden transition-all duration-300 group hover:text-white ml-auto">
                <!-- Bouton de réinitialisation avec styles et transition -->
                <span
                    class="absolute inset-0 w-0 transition-all duration-300 ease-in-out bg-gray-600 group-hover:w-full"></span>
                <span class="relative z-10">Réinitialiser</span>
                <!-- Texte du bouton -->
            </button>
        </div>
    </div>

    <section class="relative flex items-center justify-center mt-2 mb-5">
        <!-- Section pour afficher la carte -->
        <div
            class="overflow-hidden rounded-lg border border-gray-200 shadow-md overflow-y-auto h-[502px] w-[1280px] mt-5">
            <!-- Conteneur pour la carte avec défilement vertical -->
            <div id="map" class="h-[500px]"></div>
            <!-- Div pour la carte -->
        </div>
    </section>

    <x-footer />
    <!-- Inclusion du composant de pied de page -->

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <!-- Script pour la bibliothèque Leaflet -->

    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <!-- Script pour la bibliothèque de routage Leaflet -->

    <script>
        // Attend que le DOM soit entièrement chargé pour exécuter le code
        document.addEventListener('DOMContentLoaded', function() {

            // Initialisation de la carte Leaflet avec un centre géographique et un niveau de zoom
            var map = L.map('map', {
                attributionControl: false // Désactiver l'affichage des informations d'attribution
            }).setView([48.1814101770421, 6.208779881654873], 13);

            // Ajout d'une couche de tuiles OpenStreetMap à la carte
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Création d'un LayerGroup pour stocker les marqueurs des positions
            var markersLayer = L.layerGroup().addTo(map);

            // Initialisation des variables de position, engins et localisation à partir des données JSON encodées côté serveur
            var positions = {!! json_encode($position_engin) !!};
            var engins = {!! json_encode($engins) !!};
            var location = {!! json_encode($loc_engin) !!};

            // Déclaration des variables pour les boutons de trajet
            var trajetBtn = document.getElementById('trajet-btn');
            var trajetAujourdhuiBtn = document.getElementById('trajet_Aujoudhui-btn');

            // Initialisation des tableaux pour les marqueurs et les waypoints, et la variable pour le contrôle de routage
            var markers = [];
            var waypoints = [];
            var routingControl;

            // Écouteur d'événement pour le bouton de trajet général
            trajetBtn.addEventListener('click', function() {
                // Suppression du contrôle de routage actuel s'il existe
                if (routingControl) {
                    map.removeControl(routingControl);
                    routingControl = null;
                }

                // Création des marqueurs pour le trajet complet en utilisant la fonction createMarkers()
                var waypoints = createMarkers(selectedEnginId);
                if (waypoints.length > 0) {
                    routingControl = L.Routing.control({
                        waypoints: waypoints,
                        createMarker: function() {
                            return null;
                        },
                        routeWhileDragging: false,
                        show: false
                    }).addTo(map);

                    // Événement pour mettre à jour les waypoints en cas de changement
                    routingControl.on('waypointschanged', function(e) {
                        routingControl.setWaypoints(waypoints);
                    });
                } else {
                    alert("Aucune position trouvée pour le trajet.");
                }
            });

            // Écouteur d'événement pour le bouton de trajet d'aujourd'hui
            trajetAujourdhuiBtn.addEventListener('click', function() {
                // Suppression du contrôle de routage actuel s'il existe
                if (routingControl) {
                    map.removeControl(routingControl);
                    routingControl = null;
                }

                // Création des marqueurs pour le trajet d'aujourd'hui en utilisant la fonction createMarkersForToday()
                var waypoints = createMarkersForToday(selectedEnginId);
                if (waypoints.length > 0) {
                    routingControl = L.Routing.control({
                        waypoints: waypoints,
                        createMarker: function() {
                            return null;
                        },
                        routeWhileDragging: false,
                        show: false
                    }).addTo(map);

                    // Événement pour mettre à jour les waypoints en cas de changement
                    routingControl.on('waypointschanged', function(e) {
                        routingControl.setWaypoints(waypoints);
                    });
                } else {
                    alert("Aucune position trouvée pour le trajet aujourd'hui.");
                }
            });

            // Fonction pour récupérer un engin par son ID à partir du tableau engins
            function getEnginById(enginId) {
                return engins.find(engin => engin.id_engins == enginId);
            }

            // Fonction pour créer les marqueurs en fonction de l'ID de l'engin sélectionné
            function createMarkers(selectedEnginId) {
                markersLayer.clearLayers(); // Efface tous les marqueurs existants sur la carte

                markers.forEach(function(marker) {
                    marker.remove(); // Supprime chaque marqueur du tableau markers
                });
                markers = []; // Réinitialise le tableau des marqueurs

                // Récupération des éléments de date de début et fin à partir des éléments du DOM
                var startDatePicker = document.getElementById('startDatePicker');
                var endDatePicker = document.getElementById('endDatePicker');

                var startDate = startDatePicker.value; // Valeur de la date de début
                var endDate = endDatePicker.value; // Valeur de la date de fin

                var filteredPositions = []; // Initialisation d'un tableau pour les positions filtrées

                // Recherche de l'ID de localisation de l'engin sélectionné dans le tableau location
                var locEnginId = location.find(loc => loc.id_engins == selectedEnginId)?.id_loc_engin;

                // Filtrage des positions en fonction de l'ID de localisation et des dates sélectionnées
                filteredPositions = positions.filter(function(position) {
                    return locEnginId == position.id_loc_engin &&
                        new Date(position.DateHeure) >= new Date(startDate) &&
                        new Date(position.DateHeure) <= new Date(endDate);
                });

                console.log("Nombre de positions récupérées pour l'engin " + selectedEnginId + ":",
                    filteredPositions.length); // Affichage du nombre de positions filtrées dans la console

                var waypoints = []; // Initialisation d'un tableau pour les waypoints

                var selectedEngin = getEnginById(selectedEnginId); // Récupération de l'engin sélectionné par son ID

                // Fonction pour formater la date/heure à partir d'une chaîne de date
                function formatDate(dateString) {
                    const date = new Date(dateString);
                    var options = {
                        year: 'numeric',
                        month: 'long',
                        day: '2-digit',
                        hour: '2-digit',
                        minute: '2-digit',
                        second: '2-digit'
                    };
                    return date.toLocaleDateString('fr-FR', options); // Formatage de la date en format français
                }

                // Création des marqueurs pour chaque position filtrée
                filteredPositions.forEach(function(position) {
                    var marker = L.marker([position.Longitude, position.Latitude]).addTo(markersLayer);

                    // Contenu du popup pour chaque marqueur avec les détails de l'engin et la date/heure de la position
                    var popupContent =
                        'Numéro de machine: ' + selectedEngin.Num_Machine +
                        '<br>Marque: ' + selectedEngin.marque +
                        '<br>Modèle: ' + selectedEngin.modele +
                        '<br>Catégorie: ' + selectedEngin.categorie +
                        '<br>Date/Heure de la position: ' + formatDate(position.DateHeure);

                    marker.bindPopup(popupContent); // Liaison du contenu du popup au marqueur

                    // Gestion de l'affichage du popup au survol du marqueur
                    marker.on('mouseover', function(e) {
                        this.openPopup();
                    });

                    // Gestion de la fermeture du popup lorsque le curseur quitte le marqueur
                    marker.on('mouseout', function(e) {
                        this.closePopup();
                    });

                    marker.dragging.disable(); // Désactivation du déplacement des marqueurs

                    markers.push(marker); // Ajout du marqueur au tableau markers
                    waypoints.push(L.latLng(position.Longitude, position
                        .Latitude)); // Ajout du waypoint pour le trajet
                });

                return waypoints; // Retourne les waypoints pour le trajet
            }

            // Fonction pour créer les marqueurs pour le trajet d'aujourd'hui en fonction de l'ID de l'engin sélectionné
            function createMarkersForToday(selectedEnginId) {
                markersLayer.clearLayers(); // Efface tous les marqueurs existants sur la carte

                markers.forEach(function(marker) {
                    marker.remove(); // Supprime chaque marqueur du tableau markers
                });
                markers = []; // Réinitialise le tableau des marqueurs

                // Recherche de l'ID de localisation de l'engin sélectionné dans le tableau location
                var locEnginId = location.find(loc => loc.id_engins == selectedEnginId)?.id_loc_engin;

                // Filtrage des positions pour obtenir uniquement celles d'aujourd'hui
                var filteredPositions = positions.filter(function(position) {
                    var today = new Date(); // Date d'aujourd'hui
                    var positionDate = new Date(position.DateHeure);
                    return locEnginId == position.id_loc_engin &&
                        positionDate.getDate() == today.getDate() &&
                        positionDate.getMonth() == today.getMonth() &&
                        positionDate.getFullYear() == today.getFullYear();
                });

                console.log("Nombre de positions récupérées pour l'engin " + selectedEnginId + " aujourd'hui:",
                    filteredPositions.length); // Affichage du nombre de positions filtrées

                var waypoints = []; // Initialise un tableau vide pour stocker les waypoints (points de passage).

                var selectedEngin = getEnginById(
                    selectedEnginId); // Récupère l'objet engin sélectionné à partir de son ID.

                // Fonction pour formater la date/heure à partir d'une chaîne de date.
                function formatDate(dateString) {
                    var date = new Date(dateString);
                    var year = date.getFullYear();
                    var month = String(date.getMonth() + 1).padStart(2,
                        '0'); // Ajoute un zéro en début de mois si nécessaire.
                    var day = String(date.getDate()).padStart(2,
                        '0'); // Ajoute un zéro en début de jour si nécessaire.
                    var hours = String(date.getHours()).padStart(2,
                        '0'); // Ajoute un zéro en début d'heure si nécessaire.
                    var minutes = String(date.getMinutes()).padStart(2,
                        '0'); // Ajoute un zéro en début de minute si nécessaire.
                    var seconds = String(date.getSeconds()).padStart(2,
                        '0'); // Ajoute un zéro en début de seconde si nécessaire.
                    return `${day}/${month}/${year} ${hours}:${minutes}:${seconds}`; // Retourne la date formatée.
                }

                filteredPositions.forEach(function(position) {
                    var marker = L.marker([position.Longitude, position.Latitude]).addTo(
                        markersLayer
                        ); // Crée un marqueur à partir des coordonnées et l'ajoute à la couche de marqueurs.

                    // Contenu du popup pour chaque marqueur avec les détails de l'engin et la date/heure de la position.
                    var popupContent =
                        'Numéro de machine: ' + selectedEngin.Num_Machine +
                        '<br>Marque: ' + selectedEngin.marque +
                        '<br>Modèle: ' + selectedEngin.modele +
                        '<br>Catégorie: ' + selectedEngin.categorie +
                        '<br>Date/Heure de la position: ' + formatDate(position.DateHeure);

                    marker.bindPopup(popupContent); // Lie le contenu du popup au marqueur.

                    marker.on('mouseover', function(e) {
                        this.openPopup(); // Ouvre le popup lorsque le curseur survole le marqueur.
                    });

                    marker.on('mouseout', function(e) {
                        this.closePopup(); // Ferme le popup lorsque le curseur quitte le marqueur.
                    });

                    marker.dragging.disable(); // Désactive la possibilité de déplacer le marqueur.

                    markers.push(marker); // Ajoute le marqueur à la liste des marqueurs.
                    waypoints.push(L.latLng(position.Longitude, position
                        .Latitude)); // Ajoute le waypoint correspondant aux coordonnées du marqueur.
                });

                return waypoints; // Retourne tous les waypoints créés pour le trajet.
            }
        });

        // Ajoute un écouteur d'événements sur le changement de l'engin sélectionné.
        var enginButtons = document.querySelectorAll("#enginSelect");
        enginButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                const enginId = this.getAttribute(
                    "data-id"); // Récupère l'ID de l'engin à partir des attributs de données du bouton.
                selectedEnginId = enginId; // Met à jour l'ID de l'engin sélectionné.

                // Supprime le trajet actuellement affiché s'il existe.
                if (routingControl) {
                    map.removeControl(routingControl); // Retire le contrôle de routage de la carte.
                    routingControl = null; // Réinitialise la variable de contrôle de routage.
                }

                // Vérifie si l'engin sélectionné a une localisation associée.
                var locEnginId = location.find(loc => loc.id_engins == enginId)?.id_loc_engin;
                if (!locEnginId) {
                    alert(
                        "Cet engin n'a pas de localisation."
                        ); // Affiche une alerte si l'engin n'a pas de localisation.
                    return; // Arrête l'exécution de la fonction.
                }

                // Récupère et met à jour les nouvelles positions pour l'engin sélectionné.
                getPositionsByEnginId(selectedEnginId);

                // Met à jour l'interface utilisateur pour refléter la sélection de l'engin.
                console.log("ID de l'engin sélectionné :",
                    selectedEnginId); // Affiche l'ID de l'engin sélectionné dans la console.
            });
        });

        // Fonction pour obtenir les positions en fonction de l'ID de l'engin.
        function getPositionsByEnginId(enginId) {
            fetch(`/engins/${enginId}/positions`) // Effectue une requête pour obtenir les positions de l'engin spécifié.
                .then(response => response.json()) // Convertit la réponse en format JSON.
                .then(data => {
                    positions = data; // Stocke les données de position reçues dans la variable globale positions.

                    // Crée les marqueurs pour le trajet d'aujourd'hui en utilisant l'ID de l'engin sélectionné.
                    createMarkersForToday(selectedEnginId);

                    // Crée les marqueurs pour le trajet complet en utilisant l'ID de l'engin sélectionné.
                    createMarkers(selectedEnginId);
                })
                .catch(error => console.error('Erreur lors de la récupération des positions:',
                    error)); // Gère les erreurs potentielles lors de la récupération des positions.
        }
    </script>

    <script>
        // Définit la date maximale pour le sélecteur de date de début
        var startDatePicker = document.getElementById('startDatePicker');
        var today = new Date().toISOString().split('T')[
        0]; // Obtient la date actuelle au format ISO et extrait la partie date (YYYY-MM-DD)
        startDatePicker.setAttribute('max',
        today); // Définit l'attribut 'max' du sélecteur de date de début à la date actuelle
    </script>

    <script>
        // Définit la date maximale pour le sélecteur de date de fin
        var endDatePicker = document.getElementById('endDatePicker');
        var today = new Date().toISOString().split('T')[
        0]; // Obtient à nouveau la date actuelle au format ISO et extrait la partie date (YYYY-MM-DD)
        endDatePicker.setAttribute('max', today); // Définit l'attribut 'max' du sélecteur de date de fin à la date actuelle
    </script>

    <script>
        // Attente que le contenu HTML soit complètement chargé
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.getElementById("toggleButton"); // Récupère le bouton de bascule
            const customDiv = document.getElementById("customDiv"); // Récupère la division personnalisée
            const searchInput = document.getElementById("searchInput"); // Récupère l'entrée de recherche
            const resetButton = document.getElementById("reset-btn"); // Récupère le bouton de réinitialisation
            const enginSelectButtons = customDiv.querySelectorAll(
            "#enginSelect"); // Récupère tous les boutons de sélection d'engin dans la division personnalisée
            const arrowImage = document.querySelector(
            "#toggleButton img"); // Récupère l'image de la flèche dans le bouton de bascule

            // Ajoute un écouteur d'événements au clic sur le bouton de bascule
            toggleButton.addEventListener("click", function(event) {
                customDiv.classList.toggle(
                "hidden"); // Bascule l'état de la classe 'hidden' de la division personnalisée
                if (arrowImage) {
                    arrowImage.classList.toggle(
                    "rotate-90"); // Fait pivoter l'image de la flèche si elle existe
                }
                event
            .stopPropagation(); // Arrête la propagation de l'événement pour éviter que l'écouteur de clic global ne se déclenche
            });

            // Ajoute un écouteur d'événements de clic global
            document.addEventListener("click", function(event) {
                // Cache la division personnalisée si le clic n'est pas à l'intérieur de celle-ci ni sur le bouton de bascule
                if (!customDiv.contains(event.target) && !toggleButton.contains(event.target)) {
                    customDiv.classList.add(
                    "hidden"); // Ajoute la classe 'hidden' à la division personnalisée pour la masquer
                    if (arrowImage) {
                        arrowImage.classList.remove(
                        "rotate-90"); // Réinitialise la rotation de l'image de la flèche si elle existe
                    }
                }
            });

            // Ajoute un écouteur d'événements à l'entrée de recherche pour filtrer les boutons d'engin
            searchInput.addEventListener("input", function() {
                const filter = searchInput.value
            .toLowerCase(); // Récupère la valeur de l'entrée de recherche en minuscules
                const buttons = customDiv.querySelectorAll(
                "button"); // Sélectionne tous les boutons dans la division personnalisée
                buttons.forEach(function(button) {
                    // Affiche ou cache les boutons selon qu'ils correspondent ou non au filtre de recherche
                    button.style.display = button.textContent.toLowerCase().includes(filter) ? "" :
                        "none";
                });
            });

            // Ajoute un écouteur d'événements à chaque bouton de sélection d'engin
            enginSelectButtons.forEach(function(button) {
                button.addEventListener("click", function() {
                    const selectedEnginId = button.dataset
                    .id; // Récupère l'ID de l'engin sélectionné à partir des données de l'attribut 'data-id'
                    const selectedEnginText = button
                    .textContent; // Récupère le texte du bouton sélectionné
                    document.getElementById("buttonText").textContent =
                    selectedEnginText; // Met à jour le texte du bouton principal avec le texte du bouton sélectionné
                    customDiv.classList.add(
                    "hidden"); // Cache la division personnalisée après la sélection
                    if (arrowImage) {
                        arrowImage.classList.remove(
                        "rotate-90"); // Réinitialise la rotation de l'image de la flèche si elle existe
                    }
                });
            });

            // Ajoute un écouteur d'événements au bouton de réinitialisation
            resetButton.addEventListener("click", function() {
                selectedEnginId = null; // Réinitialise la variable selectedEnginId à null
                location.reload(); // Recharge la page pour réinitialiser l'état
            });
        });
    </script>
</body>

</html>
