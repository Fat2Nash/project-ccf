<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maps Engins</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19"></script>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />

    <script src="https://cdn.tailwindcss.com"></script>

    <title>Thiriot-Location | {{ Auth::user()->name }}</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />

    <style>
        .rotate-90 {
            transform: rotate(90deg);
            transition: transform 0.3s;
        }

        .rotate-0 {
            transform: rotate(0deg);
            transition: transform 0.3s;
        }
    </style>

</head>

<body class="text-gray-800 font-inter">
    <x-side-navbar />


    @php
        use App\Models\Engin; // Importer le modèle Engin
        $engins = Engin::all(); // Récupérer tous les clients de la base de données

        use App\Models\Location; // Importer le modèle Location
        $loc_engin = Location::all(); // Récupérer toutes les locations de la base de données

        use App\Models\Position; // Importer le modèle Position
        $position_engin = Position::all(); // Récupérer toutes les positions de la base de données
    @endphp

    <div class="relative flex ml-[350px] mt-10">
        <h2 class="font-bold">Veuillez choisir l'engin : &nbsp;
                <button id="toggleButton" class="text-black border-black font-bold border-2 px-4 pl-[20px] rounded-md relative w-auto flex items-center">
                    <span id="buttonText">Choisir l'engin</span>
                    <div class="ml-2"> <!-- Ajoute une marge de 2px à gauche -->
                        <img id="arrowImage" src="https://cdn-icons-png.flaticon.com/512/6327/6327824.png" alt="Flèche droite" class="w-4 h-4">
                    </div>
                </button>
                <div id="customDiv" class="absolute hidden justify-center items-center text-black border-black bg-white border-2 rounded-md flex flex-col" style="width: 360px; z-index: 999;">
                    <div class="pt-2 pb-2 relative text-black mr-4" style="width: 350px;">
                        <input
                            class="border-2 border-orange-500 bg-white h-10 ml-2 rounded-lg text-sm focus:outline-none w-full"
                            type="text" id="searchInput" placeholder="Rechercher...">
                        <button type="submit" class="absolute top-0 mt-5 right-2">
                            <svg class="text-orange-500 h-4 w-4 fill-current"
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1"
                                x="0px" y="0px" viewBox="0 0 56.966 56.966"
                                style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                                width="512px" height="512px">
                                <path
                                    d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                            </svg>
                        </button>
                    </div>
                    <div class="w-[350px] max-h-[300px] h-auto overflow-y-auto">
                        <!-- Contenu pour afficher les boutons de chaque engin -->
                        @foreach ($engins as $engin)
                            <button id="enginSelect" class="block w-full py-2 border border-gray-300 text-center h-10" value="{{ $engin->id_engins }}" >{{ 'N°' . $engin->Num_Machine }} - {{ $engin->marque }} - {{ $engin->modele }} - {{ $engin->categorie }}</button>
                        @endforeach
                    </div>
                </div>
            <div class="flex items-center mt-5 mb-5">
                <button id="trajet_Aujoudhui-btn" class="relative font-semibold border border-green-600 px-4 py-2 w-[320px] bg-white text-green-600 rounded-lg overflow-hidden transition-all duration-300 group hover:text-white">
                    <span class="absolute inset-0 bg-green-600 w-0 transition-all duration-300 ease-in-out group-hover:w-full"></span>
                    <span class="relative z-10">Voir le trajet effectué aujourd'hui</span>
                </button>
            </div>
            <span>Veuillez choisir la date entre : &nbsp;</span>
            <input type="date" id="startDatePicker" class="w-[200px] border-black border-2 rounded-md px-2 py-1">
            &nbsp; et &nbsp;
            <input type="date" id="endDatePicker" class="w-[200px] border-black border-2 rounded-md px-2 py-1">
            <div class="flex items-center mt-5">
                <button id="trajet-btn" class="relative font-semibold border border-orange-500 px-4 py-2 w-[320px] bg-white text-orange-500 rounded-lg overflow-hidden transition-all duration-300 group hover:text-white">
                    <span class="absolute inset-0 bg-orange-500 w-0 transition-all duration-300 ease-in-out group-hover:w-full"></span>
                    <span class="relative z-10">Voir l'éventuel trajet emprunté</span>
                </button>
            </div>
        </h2>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toggleButton = document.getElementById("toggleButton");
            const customDiv = document.getElementById("customDiv");
            let arrowImage = null;

            toggleButton.addEventListener("click", function(event) {
                customDiv.classList.toggle("hidden");
                arrowImage = document.querySelector("#toggleButton img");
                if (arrowImage) {
                    arrowImage.classList.toggle("rotate-90");
                }
                event.stopPropagation(); // Prevents the click from propagating to the document
            });

            document.addEventListener("click", function(event) {
                if (!customDiv.contains(event.target) && !toggleButton.contains(event.target)) {
                    customDiv.classList.add("hidden");
                    if (arrowImage) {
                        arrowImage.style.transition = "transform 0.3s ease"; // Ajoute une transition de 0,3 seconde à la rotation
                        arrowImage.classList.remove("rotate-90");
                        setTimeout(() => {
                            arrowImage.style.transition = ""; // Réinitialise la transition après 0,3 seconde
                        }, 300);
                    }
                }
            });

            const buttons = document.querySelectorAll("#customDiv button");
                buttons.forEach(button => {
                    button.addEventListener("click", function() {
                        const buttonText = button.textContent.trim();
                        toggleButton.innerHTML = buttonText +
                            `<div class="ml-2"> <!-- Ajoute une marge de 2px à gauche -->
                                <img id="arrowImage" src="https://cdn-icons-png.flaticon.com/512/6327/6327824.png" alt="Flèche droite" class="w-4 h-4 rotate-90">
                            </div>`; // Met à jour le contenu HTML du bouton toggleButton
                        customDiv.classList.add("hidden");
                        arrowImage = document.querySelector("#toggleButton img");
                        arrowImage.classList.add("rotate-90");
                        console.log("Texte du bouton cliqué :", buttonText);

                        // Simuler un clic à côté de la fenêtre
                        const fakeClickEvent = new MouseEvent("click", {
                            bubbles: true,
                            cancelable: true,
                            view: window,
                        });
                        document.dispatchEvent(fakeClickEvent);
                    });
                });

            const searchInput = document.getElementById("searchInput");
            searchInput.addEventListener("input", function() {
                filterButtons();
            });

            function filterButtons() {
                const searchValue = searchInput.value.trim().toLowerCase();
                buttons.forEach(button => {
                    const buttonText = button.textContent.trim().toLowerCase();
                    if (buttonText.includes(searchValue)) {
                        button.style.display = "block";
                    } else {
                        button.style.display = "none";
                    }
                });
            }
        });
    </script>


    <section class="relative flex justify-center items-center mb-5 mt-5">
        <div
            class="overflow-hidden rounded-lg border border-gray-200 shadow-md overflow-y-auto h-[522px] w-[1280px] mt-5">
            <div id="map" class="h-[520px]"></div>
        </div>
    </section>

    <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
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
                map.eachLayer(function (layer) {
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

                L.Routing.control({
                    waypoints: latlngs,
                    routeWhileDragging: true,
                    line: {
                        show: false // Ne pas afficher la boîte de dialogue automatiquement
                    }
                }).addTo(map);


                // Ajouter des marqueurs pour chaque position sur la carte
                filteredPositions.forEach(function(position) {
                    var marker = L.marker([position.Longitude, position.Latitude]);

                    // Convertir la date et l'heure en objet Date
                    var dateHeure = new Date(position.DateHeure);

                    // Ajuster le fuseau horaire (par exemple, en utilisant UTC)
                    var dateHeureUTC = new Date(dateHeure.getTime() + dateHeure.getTimezoneOffset() * 60000);

                    // Formater la date et l'heure
                    var formattedDateHeure = dateHeureUTC.toLocaleString(); // Vous pouvez ajuster le format selon vos préférences

                    // Ajoutez les informations d'engin au marqueur en tant que propriété personnalisée
                    marker.enginInfo = {
                        marque: enginSelect.options[enginSelect.selectedIndex].getAttribute('data-marque'),
                        modele: enginSelect.options[enginSelect.selectedIndex].getAttribute('data-modele'),
                        categorie: enginSelect.options[enginSelect.selectedIndex].getAttribute('data-categorie'),
                        dateHeure: formattedDateHeure // Utilisez la date/heure formatée
                    };

                    // Ajoutez un gestionnaire d'événements pour afficher les informations d'engin lorsque survolé
                    marker.on('mouseover', function(e) {
                        var info = e.target.enginInfo;
                        e.target.bindPopup(`<b>Marque:</b> ${info.marque}<br><b>Modèle:</b>
                        ${info.modele}<br><b>Catégorie:</b> ${info.categorie}<br><b>Date/Heure:</b>
                        ${info.dateHeure}`).openPopup();
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

            function filterPositionsByDate(positions) {
                var startDatePicker = document.getElementById('startDatePicker');
                var endDatePicker = document.getElementById('endDatePicker');

                var startDate = startDatePicker.value;
                var endDate = endDatePicker.value;

                // Convertissez les dates en objets Date pour une comparaison plus facile
                var startDateTime = new Date(startDate + 'T00:00:00');
                var endDateTime = new Date(endDate + 'T23:59:59');

                // Filtrer les positions en fonction de la date
                var filteredPositions = positions.filter(function(position) {
                    var positionDateTime = new Date(position.DateHeure);
                    return positionDateTime >= startDateTime && positionDateTime <= endDateTime;
                });

                return filteredPositions;
            }

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
                    waypoints: latlngs
                }).addTo(map);

                // Pour cacher les instructions
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
                        e.target.bindPopup(`<b>Marque:</b> ${info.marque}<br><b>Modèle:</b>
                        ${info.modele}<br><b>Catégorie:</b> ${info.categorie}<br><b>Date/Heure:</b>
                        ${info.dateHeure}`).openPopup();
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

</body>

</html>
