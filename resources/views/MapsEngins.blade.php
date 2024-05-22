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
            <select id="enginSelect"
                class="w-[300px] relative bg-white border-black border-2 rounded-md text-center font-semibold">
                <option value="">Choisir l'engin</option>
                @foreach ($engins as $engin)
                    <option value="{{ $engin->id_engins }}" date-numMachine="{{ $engin->Num_Machine }}"
                        data-marque="{{ $engin->marque }}" data-modele="{{ $engin->modele }}"
                        data-categorie="{{ $engin->categorie }}">
                        {{ 'N°' . $engin->Num_Machine }} - {{ $engin->marque }} - {{ $engin->modele }} -
                        {{ $engin->categorie }}
                    </option>
                @endforeach
            </select>
            <div class="flex items-center mt-5 mb-5">
                <button id="trajet_Aujoudhui-btn"
                    class="font-semibold border border-green-600 rounded-md px-4 py-2 bg-white text-green-600 w-[300px]">Voir
                    le trajet effectué aujourd'hui</button>
            </div>
            <span>Veuillez choisir la date entre : &nbsp;</span>
            <input type="date" id="startDatePicker" class="w-[200px] border-black border-2 rounded-md px-2 py-1">
            &nbsp; et &nbsp;
            <input type="date" id="endDatePicker" class="w-[200px] border-black border-2 rounded-md px-2 py-1">
            <div class="flex items-center mt-5">
                <button id="trajet-btn"
                    class="font-semibold border border-orange-500 rounded-md px-4 py-2 bg-white text-orange-500 w-[300px]">Voir
                    l'éventuel trajet emprunté</button>
            </div>
        </h2>
    </div>


    <section class="relative flex justify-center items-center mb-5 mt-5">
        <div
            class="overflow-hidden rounded-lg border border-gray-200 shadow-md overflow-y-auto h-[522px] w-[1280px] mt-5">
            <div id="map" class="h-[520px]"></div>
        </div>
    </section>

    <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

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
