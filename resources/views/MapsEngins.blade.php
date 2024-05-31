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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
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
            <h2 class="font-bold">Veuillez choisir l'engin :</h2>
            <button id="toggleButton"
                class="text-black border-2 border-black font-bold px-4 pl-[20px] relative flex items-center">
                <span id="buttonText">Choisir l'engin</span>
                <div class="ml-2">
                    <img id="arrowImage" src="https://cdn-icons-png.flaticon.com/512/6327/6327824.png"
                        alt="Flèche droite" class="w-4 h-4">
                </div>
            </button>
        </div>
        <div id="customDiv"
            class="absolute justify-center items-center text-black border-black bg-white border-2 flex flex-col ml-[185px] hidden"
            style="width: 360px; z-index: 999;">
            <div class="relative pt-2 pb-2 mr-4 text-black" style="width: 350px;">
                <input
                    class="w-full h-10 ml-2 text-sm bg-white border-2 border-orange-500 rounded-lg focus:outline-none"
                    type="text" id="searchInput" placeholder="Rechercher...">
                <button type="submit" class="absolute top-0 mt-5 right-2">
                    <svg class="w-4 h-4 text-orange-500 fill-current" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                        viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                        xml:space="preserve" width="512px" height="512px">
                        <path
                            d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17s-17-7.626-17-17S14.61,6,23.984,6z" />
                    </svg>
                </button>
            </div>
            <div class="w-[350px] max-h-[300px] h-auto overflow-y-auto px-2">
                @foreach ($engins as $engin)
                    <button id="enginSelect" class="block w-full h-10 py-2 text-center button-hover"
                        value="{{ $engin->id_engins }}">
                        {{ 'N°' . $engin->Num_Machine }} - {{ $engin->marque }} - {{ $engin->modele }} -
                        {{ $engin->categorie }}
                    </button>
                @endforeach
            </div>
        </div>
        <div class="flex items-center mt-5 mb-5">
            <button id="trajet_Aujoudhui-btn"
                class="relative font-semibold border border-green-600 px-4 py-2 w-[320px] bg-white text-green-600 rounded-lg overflow-hidden transition-all duration-300 group hover:text-white">
                <span
                    class="absolute inset-0 w-0 transition-all duration-300 ease-in-out bg-green-600 group-hover:w-full"></span>
                <span class="relative z-10">Voir le trajet effectué aujourd'hui</span>
            </button>
        </div>
        <div class="flex items-center mb-5">
            <h2 class="font-bold">Veuillez choisir la date entre : &nbsp;</h2>
            <input type="date" id="startDatePicker" class="w-[200px] border-black border-2 rounded-md px-2 py-1">
            <h2 class="font-bold">&nbsp; et &nbsp;</h2>
            <input type="date" id="endDatePicker" class="w-[200px] border-black border-2 rounded-md px-2 py-1">
        </div>
        <div class="flex items-center justify-between">
            <button id="trajet-btn"
                class="relative font-semibold border border-orange-500 px-4 py-2 w-[320px] bg-white text-orange-500 rounded-lg overflow-hidden transition-all duration-300 group hover:text-white">
                <span
                    class="absolute inset-0 w-0 transition-all duration-300 ease-in-out bg-orange-500 group-hover:w-full"></span>
                <span class="relative z-10">Voir l'éventuel trajet emprunté</span>
            </button>
            <button id="reset-btn"
                class="relative mr-[320px] font-semibold border border-gray-600 px-4 py-2 w-[320px] bg-white text-gray-600 rounded-lg overflow-hidden transition-all duration-300 group hover:text-white ml-auto">
                <span
                    class="absolute inset-0 w-0 transition-all duration-300 ease-in-out bg-gray-600 group-hover:w-full"></span>
                <span class="relative z-10">Réinitialiser</span>
            </button>
        </div>
    </div>

    <section class="relative flex items-center justify-center mt-2 mb-5">
        <div
            class="overflow-hidden rounded-lg border border-gray-200 shadow-md overflow-y-auto h-[502px] w-[1280px] mt-5">
            <div id="map" class="h-[500px]"></div>
        </div>
    </section>

    <x-footer />
    <!-- Inclusion du composant de pied de page -->

    <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
    <!-- Script pour la bibliothèque Leaflet -->
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <!-- Script pour la bibliothèque de routage Leaflet -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialisation des éléments du DOM
            const toggleButton = document.getElementById("toggleButton"); // Bouton pour afficher/masquer le menu
            const customDiv = document.getElementById("customDiv"); // Menu déroulant à afficher/masquer
            const searchInput = document.getElementById(
                "searchInput"); // Champ de recherche pour filtrer les éléments du menu
            const resetButton = document.getElementById("reset-btn"); // Bouton pour réinitialiser la page
            const enginSelectButtons = customDiv.querySelectorAll(
                "#enginSelect"); // Boutons pour sélectionner un engin dans le menu
            const arrowImage = document.querySelector(
                "#toggleButton img"); // Image de flèche pour indiquer l'état du menu

            // Fonction pour afficher/masquer le menu déroulant et faire tourner l'image de flèche
            toggleButton.addEventListener("click", function(event) {
                customDiv.classList.toggle("hidden"); // Affiche/masque le menu
                if (arrowImage) {
                    arrowImage.classList.toggle("rotate-90"); // Fait tourner l'image de flèche de 90 degrés
                }
                event.stopPropagation(); // Empêche la propagation de l'événement de clic au document
            });

            // Fonction pour masquer le menu déroulant si un clic est détecté en dehors de celui-ci
            document.addEventListener("click", function(event) {
                if (!customDiv.contains(event.target) && !toggleButton.contains(event.target)) {
                    customDiv.classList.add("hidden"); // Masque le menu
                    if (arrowImage) {
                        arrowImage.classList.remove(
                            "rotate-90"); // Remet l'image de flèche à l'état initial
                    }
                }
            });

            // Fonction pour filtrer les boutons dans le menu déroulant en fonction de l'entrée de recherche
            searchInput.addEventListener("input", function() {
                const filter = searchInput.value
                    .toLowerCase(); // Convertit le texte de recherche en minuscules
                const buttons = customDiv.querySelectorAll(
                    "button"); // Récupère tous les boutons dans le menu
                buttons.forEach(function(button) {
                    // Affiche le bouton s'il correspond au filtre, sinon le masque
                    button.style.display = button.textContent.toLowerCase().includes(filter) ? "" :
                        "none";
                });
            });

            // Fonction pour mettre à jour le texte du bouton principal avec l'engin sélectionné et masquer le menu
            enginSelectButtons.forEach(function(button) {
                button.addEventListener("click", function() {
                    const selectedEngin = button.textContent; // Récupère le texte du bouton cliqué
                    document.getElementById("buttonText").textContent =
                        selectedEngin; // Met à jour le texte du bouton principal
                    customDiv.classList.add("hidden"); // Masque le menu
                    if (arrowImage) {
                        arrowImage.classList.remove(
                            "rotate-90"); // Remet l'image de flèche à l'état initial
                    }
                });
            });

            // Fonction pour réinitialiser la page lorsque le bouton de réinitialisation est cliqué
            resetButton.addEventListener("click", function() {
                location.reload(); // Recharge la page, réinitialisant ainsi tous les états
            });
        });
    </script>

    <script>
        // Obtenez l'élément du sélecteur de date
        var datePicker = document.getElementById('startDatePicker');

        // Obtenez la date actuelle au format YYYY-MM-DD
        var today = new Date().toISOString().split('T')[0];

        // Définissez la valeur maximale du sélecteur de date sur la date actuelle
        datePicker.setAttribute('max', today);
    </script>

    <script>
        // Obtenez l'élément du sélecteur de date
        var datePicker = document.getElementById('endDatePicker');

        // Obtenez la date actuelle au format YYYY-MM-DD
        var today = new Date().toISOString().split('T')[0];

        // Définissez la valeur maximale du sélecteur de date sur la date actuelle
        datePicker.setAttribute('max', today);
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var map = L.map('map', {
                attributionControl: false // Désactiver l'affichage des informations d'attribution
            }).setView([48.1814101770421, 6.208779881654873], 13);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
            }).addTo(map);

            var markersLayer = L.layerGroup().addTo(map); // LayerGroup pour stocker les marqueurs

            // Récupérer les positions associées à l'engin sélectionné
            var positions = {!! json_encode($position_engin) !!};
            console.log(positions)

            var trajetBtn = document.getElementById('trajet-btn');
            var trajetAujourdhuiBtn = document.getElementById('trajet_Aujoudhui-btn');

            trajetBtn.addEventListener('click', function() {
                var enginSelect = document.getElementById('enginSelect');
                var startDatePicker = document.getElementById('startDatePicker');
                var endDatePicker = document.getElementById('endDatePicker');

                var enginId = enginSelect.value;
                var startDate = startDatePicker.value;
                var endDate = endDatePicker.value;

                // Vérifiez si un engin est sélectionné
                if (!enginId) {
                    alert("Veuillez sélectionner un engin.");
                    return;
                }


                // Supprimer les marqueurs précédents et l'itinéraire de la carte
                markersLayer.clearLayers();
                map.eachLayer(function(layer) {
                    if (layer instanceof L.Polyline) {
                        map.removeLayer(layer);
                    }
                });

                // Filtrer les positions en fonction de l'engin sélectionné et de la plage de dates
                var filteredPositions = positions.filter(function(position) {
                    return position.id_loc_engin == enginId &&
                        new Date(position.DateHeure) >= new Date(startDate) &&
                        new Date(position.DateHeure) <= new Date(endDate);
                });

                // Créer un tableau de points pour l'itinéraire
                var latlngs = [];
                filteredPositions.forEach(function(position) {
                    latlngs.push([position.Longitude, position.Latitude]);
                });

                // Créer un objet de style pour l'itinéraire
                var myStyle = {
                    color: '#3388ff', // Couleur bleue
                    weight: 5, // Épaisseur du trait
                    opacity: 0.7 // Opacité du trait
                };

                var control = L.Routing.control({
                    waypoints: latlngs,
                }).addTo(map);

                control.hide();

                // Ajouter des marqueurs pour chaque position sur la carte
                filteredPositions.forEach(function(position) {
                    var marker = L.marker([position.Longitude, position.Latitude]);

                    // Convertir la date et l'heure en objet Date
                    var dateHeure = new Date(position.DateHeure);

                    // Ajuster le fuseau horaire (par exemple, en utilisant UTC)
                    var dateHeureUTC = new Date(dateHeure.getTime() + dateHeure
                        .getTimezoneOffset() * 60000);

                    // Formater la date et l'heure
                    var formattedDateHeure = dateHeureUTC
                        .toLocaleString(); // Vous pouvez ajuster le format selon vos préférences

                    // Ajoutez les informations d'engin au marqueur en tant que propriété personnalisée
                    marker.enginInfo = {
                        marque: enginSelect.options[enginSelect.selectedIndex].getAttribute(
                            'data-marque'),
                        modele: enginSelect.options[enginSelect.selectedIndex].getAttribute(
                            'data-modele'),
                        categorie: enginSelect.options[enginSelect.selectedIndex].getAttribute(
                            'data-categorie'),
                        dateHeure: formattedDateHeure // Utilisez la date/heure formatée
                    };

                    // Ajoutez un gestionnaire d'événements pour afficher les informations d'engin lorsque survolé
                    marker.on('mouseover', function(e) {
                        var info = e.target.enginInfo;
                        e.target.bindPopup(
                            `<b>Marque:</b> ${info.marque}<br><b>Modèle:</b> ${info.modele}<br><b>Catégorie:</b> ${info.categorie}<br><b>Date/Heure:</b> ${info.dateHeure}`
                        ).openPopup();
                    });

                    // Ajoutez un gestionnaire d'événements pour fermer la popup lorsque la souris quitte le marqueur
                    marker.on('mouseout', function(e) {
                        e.target.closePopup();
                    });

                    markersLayer.addLayer(marker);
                });

                // Centrer la carte sur les marqueurs et ajuster le zoom
                map.fitBounds(markersLayer.getBounds());
            });

            // Ajoutez un écouteur d'événements pour le clic sur le bouton "Aujourd'hui"
            trajetAujourdhuiBtn.addEventListener('click', function() {
                var enginSelect = document.getElementById('enginSelect');
                var enginId = enginSelect.value;

                // Vérifiez si un engin est sélectionné
                if (!enginId) {
                    alert("Veuillez sélectionner un engin.");
                    return;
                }

                // Supprimer les marqueurs précédents et l'itinéraire de la carte
                markersLayer.clearLayers();
                map.eachLayer(function(layer) {
                    if (layer instanceof L.Polyline) {
                        map.removeLayer(layer);
                    }
                });

                // Filtrer les positions en fonction de l'engin sélectionné
                var filteredPositions = positions.filter(function(position) {
                    return position.id_loc_engin == enginId;
                });

                // Filtrer les positions pour la journée actuelle
                filteredPositions = filterPositionsForToday(filteredPositions);

                // Créer un tableau de points pour l'itinéraire
                var latlngs = [];
                filteredPositions.forEach(function(position) {
                    latlngs.push([position.Longitude, position.Latitude]);
                });

                // Créer un objet de style pour l'itinéraire
                var myStyle = {
                    color: '#3388ff', // Couleur bleue
                    weight: 5, // Épaisseur du trait
                    opacity: 0.7 // Opacité du trait
                };

                var control = L.Routing.control({
                    waypoints: latlngs,
                }).addTo(map);

                control.hide();

                // Ajouter des marqueurs pour chaque position sur la carte
                filteredPositions.forEach(function(position) {
                    var marker = L.marker([position.Longitude, position.Latitude]);

                    // Convertir la date et l'heure en objet Date
                    var dateHeure = new Date(position.DateHeure);

                    // Ajuster le fuseau horaire (par exemple, en utilisant UTC)
                    var dateHeureUTC = new Date(dateHeure.getTime() + dateHeure
                        .getTimezoneOffset() * 60000);

                    // Formater la date et l'heure
                    var formattedDateHeure = dateHeureUTC
                        .toLocaleString(); // Vous pouvez ajuster le format selon vos préférences

                    // Ajoutez les informations d'engin au marqueur en tant que propriété personnalisée
                    marker.enginInfo = {
                        marque: enginSelect.options[enginSelect.selectedIndex].getAttribute(
                            'data-marque'),
                        modele: enginSelect.options[enginSelect.selectedIndex].getAttribute(
                            'data-modele'),
                        categorie: enginSelect.options[enginSelect.selectedIndex].getAttribute(
                            'data-categorie'),
                        dateHeure: formattedDateHeure // Utilisez la date/heure formatée
                    };

                    // Ajoutez un gestionnaire d'événements pour afficher les informations d'engin lorsque survolé
                    marker.on('mouseover', function(e) {
                        var info = e.target.enginInfo;
                        e.target.bindPopup(
                            `<b>Marque:</b> ${info.marque}<br><b>Modèle:</b> ${info.modele}<br><b>Catégorie:</b> ${info.categorie}<br><b>Date/Heure:</b> ${info.dateHeure}`
                        ).openPopup();
                    });

                    // Ajoutez un gestionnaire d'événements pour fermer la popup lorsque la souris quitte le marqueur
                    marker.on('mouseout', function(e) {
                        e.target.closePopup();
                    });

                    markersLayer.addLayer(marker);
                });

                // Centrer la carte sur les marqueurs et ajuster le zoom
                map.fitBounds(markersLayer.getBounds());
            });

            function filterPositionsForToday(positions) {
                var today = new Date();
                today.setHours(0, 0, 0, 0); // Définir l'heure à 00:00:00 pour le début de la journée
                var endOfDay = new Date();
                endOfDay.setHours(23, 59, 59, 999); // Définir l'heure à 23:59:59.999 pour la fin de la journée

                // Filtrer les positions en fonction de la journée actuelle
                var filteredPositions = positions.filter(function(position) {
                    var positionDateTime = new Date(position.DateHeure);
                    return positionDateTime >= today && positionDateTime <= endOfDay;
                });

                return filteredPositions;
            }
        });
    </script>
</body>

</html>
