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

    @php
        use App\Models\Engin; // Importer le modèle Engin
        $engins = Engin::all(); // Récupérer tous les clients de la base de données

        use App\Models\Location; // Importer le modèle Location
        $loc_engin = Location::all(); // Récupérer toutes les locations de la base de données

        use App\Models\Position; // Importer le modèle Position
        $position_engin = Position::all(); // Récupérer toutes les positions de la base de données

        $selectedEnginId = null; // Initialize selectedEnginId variable
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
                    <button id="enginSelect" data-id={{ $engin->id_engins }}
                        class="block w-full h-10 py-2 text-center button-hover">
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

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <!-- Script pour la bibliothèque Leaflet -->

    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <!-- Script pour la bibliothèque de routage Leaflet -->

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

            var positions = {!! json_encode($position_engin) !!};
            var engins = {!! json_encode($engins) !!};
            var location = {!! json_encode($loc_engin) !!};

            var trajetBtn = document.getElementById('trajet-btn');
            var trajetAujourdhuiBtn = document.getElementById('trajet_Aujoudhui-btn');

            var markers = [];
            var waypoints = []; // Déclaration des waypoints en dehors de la fonction createMarkers()
            var routingControl; // Déclaration de la variable pour stocker le contrôle de routage

            trajetBtn.addEventListener('click', function() {
                if (routingControl) {
                    map.removeControl(routingControl);
                    routingControl = null;
                }

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

                    routingControl.on('waypointschanged', function(e) {
                        routingControl.setWaypoints(waypoints);
                    });
                } else {
                    alert("Aucune position trouvée pour le trajet.");
                }
            });

            trajetAujourdhuiBtn.addEventListener('click', function() {
                if (routingControl) {
                    map.removeControl(routingControl);
                    routingControl = null;
                }

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

                    routingControl.on('waypointschanged', function(e) {
                        routingControl.setWaypoints(waypoints);
                    });
                } else {
                    alert("Aucune position trouvée pour le trajet aujourd'hui.");
                }
            });

            function getEnginById(enginId) {
                return engins.find(engin => engin.id_engins == enginId);
            }

            function createMarkers(selectedEnginId) {
                markersLayer.clearLayers();

                markers.forEach(function(marker) {
                    marker.remove();
                });
                markers = [];

                var startDatePicker = document.getElementById('startDatePicker');
                var endDatePicker = document.getElementById('endDatePicker');

                var startDate = startDatePicker.value;
                var endDate = endDatePicker.value;

                var filteredPositions = [];

                var locEnginId = location.find(loc => loc.id_engins == selectedEnginId)?.id_loc_engin;
                filteredPositions = positions.filter(function(position) {
                    return locEnginId == position.id_loc_engin &&
                        new Date(position.DateHeure) >= new Date(startDate) &&
                        new Date(position.DateHeure) <= new Date(endDate);
                });

                console.log("Nombre de positions récupérées pour l'engin " + selectedEnginId + ":",
                    filteredPositions.length);

                var waypoints = [];

                var selectedEngin = getEnginById(selectedEnginId);

                // Fonction pour formater la date/heure
                function formatDate(dateString) {
                    // Convertir la chaîne de date en objet Date
                    const date = new Date(dateString);
                    var options = { year: 'numeric', month: 'long', day: '2-digit', hour: '2-digit', minute: '2-digit', second: '2-digit' };
                    return date.toLocaleDateString('fr-FR', options);
                }

                // Utilisation de la fonction formatDate dans votre code
                filteredPositions.forEach(function(position) {
                    var marker = L.marker([position.Longitude, position.Latitude]).addTo(markersLayer);

                    var popupContent =
                        'Numéro de machine: ' + selectedEngin.Num_Machine +
                        '<br>Marque: ' + selectedEngin.marque +
                        '<br>Modèle: ' + selectedEngin.modele +
                        '<br>Catégorie: ' + selectedEngin.categorie +
                        '<br>Date/Heure de la position: ' + formatDate(position.DateHeure);

                    marker.bindPopup(popupContent);

                    marker.on('mouseover', function(e) {
                        this.openPopup();
                    });

                    marker.on('mouseout', function(e) {
                        this.closePopup();
                    });

                    marker.dragging.disable();

                    markers.push(marker);
                    waypoints.push(L.latLng(position.Longitude, position.Latitude));
                });

                return waypoints;
            }

            function createMarkersForToday(selectedEnginId) {
                markersLayer.clearLayers();

                markers.forEach(function(marker) {
                    marker.remove();
                });
                markers = [];

                var locEnginId = location.find(loc => loc.id_engins == selectedEnginId)?.id_loc_engin;
                var filteredPositions = positions.filter(function(position) {
                    var today = new Date();
                    var positionDate = new Date(position.DateHeure);
                    return locEnginId == position.id_loc_engin &&
                        positionDate.getDate() == today.getDate() &&
                        positionDate.getMonth() == today.getMonth() &&
                        positionDate.getFullYear() == today.getFullYear();
                });

                console.log("Nombre de positions récupérées pour l'engin " + selectedEnginId + " aujourd'hui:",
                    filteredPositions.length);

                var waypoints = [];

                var selectedEngin = getEnginById(selectedEnginId);

                function formatDate(dateString) {
                    var date = new Date(dateString);
                    var year = date.getFullYear();
                    var month = String(date.getMonth() + 1).padStart(2, '0');
                    var day = String(date.getDate()).padStart(2, '0');
                    var hours = String(date.getHours()).padStart(2, '0');
                    var minutes = String(date.getMinutes()).padStart(2, '0');
                    var seconds = String(date.getSeconds()).padStart(2, '0');
                    return `${day}/${month}/${year} ${hours}:${minutes}:${seconds}`;
                }

                filteredPositions.forEach(function(position) {
                    var marker = L.marker([position.Longitude, position.Latitude]).addTo(markersLayer);

                    var popupContent =
                        'Numéro de machine: ' + selectedEngin.Num_Machine +
                        '<br>Marque: ' + selectedEngin.marque +
                        '<br>Modèle: ' + selectedEngin.modele +
                        '<br>Catégorie: ' + selectedEngin.categorie +
                        '<br>Date/Heure de la position: ' + formatDate(position.DateHeure);

                    marker.bindPopup(popupContent);

                    marker.on('mouseover', function(e) {
                        this.openPopup();
                    });

                    marker.on('mouseout', function(e) {
                        this.closePopup();
                    });

                    marker.dragging.disable();

                    markers.push(marker);
                    waypoints.push(L.latLng(position.Longitude, position.Latitude));
                });

                return waypoints;
            }
        });

        // Ajoutez un écouteur d'événements sur le changement de l'engin sélectionné
        var enginButtons = document.querySelectorAll("#enginSelect");
        enginButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                const enginId = this.getAttribute("data-id");
                selectedEnginId = enginId; // Mettre à jour l'ID de l'engin sélectionné

                // Supprimer le trajet actuel
                if (routingControl) {
                    map.removeControl(routingControl);
                    routingControl = null;
                }

                // Vérifier si l'engin a une localisation
                var locEnginId = location.find(loc => loc.id_engins == enginId)?.id_loc_engin;
                if (!locEnginId) {
                    alert("Cet engin n'a pas de localisation.");
                    return; // Arrêter l'exécution
                }

                // Obtenir les nouvelles positions pour le nouvel engin sélectionné
                getPositionsByEnginId(selectedEnginId);

                // Mettez à jour l'interface utilisateur pour refléter la sélection
                console.log("ID de l'engin sélectionné :", selectedEnginId);
            });
        });

        // Fonction pour obtenir les positions en fonction de l'ID de l'engin
        function getPositionsByEnginId(enginId) {
            fetch(`/engins/${enginId}/positions`)
                .then(response => response.json())
                .then(data => {
                    // Traitez les données reçues
                    positions = data;

                    // Créer les marqueurs pour le trajet d'aujourd'hui
                    createMarkersForToday(selectedEnginId);

                    // Créer les marqueurs pour le trajet complet
                    createMarkers(selectedEnginId);
                })
                .catch(error => console.error('Erreur lors de la récupération des positions:', error));
        }
    </script>

    <script>
        // Set max date for start date picker
        var startDatePicker = document.getElementById('startDatePicker');
        var today = new Date().toISOString().split('T')[0];
        startDatePicker.setAttribute('max', today);
    </script>

    <script>
        // Set max date for end date picker
        var endDatePicker = document.getElementById('endDatePicker');
        var today = new Date().toISOString().split('T')[0];
        endDatePicker.setAttribute('max', today);
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.getElementById("toggleButton");
            const customDiv = document.getElementById("customDiv");
            const searchInput = document.getElementById("searchInput");
            const resetButton = document.getElementById("reset-btn");
            const enginSelectButtons = customDiv.querySelectorAll("#enginSelect");
            const arrowImage = document.querySelector("#toggleButton img");

            toggleButton.addEventListener("click", function(event) {
                customDiv.classList.toggle("hidden");
                if (arrowImage) {
                    arrowImage.classList.toggle("rotate-90");
                }
                event.stopPropagation();
            });

            document.addEventListener("click", function(event) {
                if (!customDiv.contains(event.target) && !toggleButton.contains(event.target)) {
                    customDiv.classList.add("hidden");
                    if (arrowImage) {
                        arrowImage.classList.remove("rotate-90");
                    }
                }
            });

            searchInput.addEventListener("input", function() {
                const filter = searchInput.value.toLowerCase();
                const buttons = customDiv.querySelectorAll("button");
                buttons.forEach(function(button) {
                    button.style.display = button.textContent.toLowerCase().includes(filter) ? "" :
                        "none";
                });
            });

            enginSelectButtons.forEach(function(button) {
                button.addEventListener("click", function() {
                    const selectedEnginId = button.dataset
                        .id; // Utilisez dataset.id pour récupérer l'ID de l'engin sélectionné
                    const selectedEnginText = button
                        .textContent; // Récupérer le texte du bouton sélectionné
                    document.getElementById("buttonText").textContent =
                        selectedEnginText; // Mettre à jour le texte du bouton principal
                    customDiv.classList.add("hidden");
                    if (arrowImage) {
                        arrowImage.classList.remove("rotate-90");
                    }
                });
            });

            resetButton.addEventListener("click", function() {
                selectedEnginId = null; // Réinitialiser la variable selectedEnginId à null
                location.reload();
            });
        });
    </script>
</body>

</html>
