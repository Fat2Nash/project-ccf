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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css"/>

    <script src="https://cdn.tailwindcss.com"></script>

    <title>Thiriot-Location | {{Auth::user()->name}}</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>

</head>
<body class="text-gray-800 font-inter">
    <div class="fixed left-0 top-0 w-64 h-full bg-white p-4 z-50 sidebar-menu transition-transform shadow-md">
        <a href="#" class="flex items-center pb-4 border-b border-b-gray-800">

            <img src="https://thiriot-locations.com/charte/logo.png" alt="logo" />
        </a>
        <ul class="mt-4">
            <span class="text-gray-400 font-bold uppercase">Commun</span>
            <li class="mb-1 group">
                <a href="" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-orange-600 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="bx bx-home mr-3 text-lg"></i>
                    <span class="text-sm">Accueil</span>
                </a>
            </li>

            <li class="mb-1 group">
                <a href="" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-orange-600 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class='bx bx-list-ul mr-3 text-lg'></i>
                    <span class="text-sm">Liste engins</span>
                </a>
            </li>
            <span class="text-gray-400 font-bold uppercase">Mécanicien / Chauffeur</span>
            <li class="mb-1 group">
                <a href="/MapsEngins" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-orange-600 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-">
                    <i class='bx bx-map-alt mr-3 text-lg'></i>
                    <span class="text-sm">Carte</span>
                    <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
                </a>
                <ul class="pl-7 mt-2 hidden group-[.selected]:block">
                    <li class="mb-4">
                        <a href="" class="text-gray-900 text-sm flex items-center hover:text-orange-600 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">All</a>
                    </li>
                    <li class="mb-4">
                        <a href="" class="text-gray-900 text-sm flex items-center hover:text-orange-600 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Categories</a>
                    </li>
                </ul>
            </li>
            <li class="mb-1 group">
                <a href="" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-orange-600 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class='bx bx-wrench mr-3 text-lg'></i>
                    <span class="text-sm">Maintenance</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-orange-600 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class='bx bx-map-pin mr-3 text-lg'></i>
                    <span class="text-sm">Livraisons</span>
                </a>
            </li>
            <span class="text-gray-400 font-bold uppercase">Responsable</span>
            <li class="mb-1 group">
                <a href="" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-orange-600 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class='bx bx-face mr-3 text-lg'></i>
                    <span class="text-sm">Fiches clients</span>

                </a>
            </li>
            <li class="mb-1 group">
                <a href="" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-orange-600 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class='bx bx-hard-hat mr-3 text-lg'></i>
                    <span class="text-sm">Fiches engins</span>

                </a>
            </li>

            <li class="mb-1 group">
                <a href="" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-orange-600 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class='bx bx-spreadsheet mr-3 text-lg'></i>
                    <span class="text-sm">Fiches locations</span>

                </a>
            </li>

            <li class="mb-1 group">
                <a href="./HistoriqueLocations" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-orange-600 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class='bx bx-spreadsheet mr-3 text-lg'></i>
                    <span class="text-sm">Historique Locations</span>

                </a>
            </li>

            <li class="mb-1 group">
                <a href="" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-orange-600 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class='bx bx-bell mr-3 text-lg'></i>
                    <span class="text-sm">Notifications</span>

                </a>
            </li>
            <span class="text-gray-400 font-bold uppercase">Paramètres</span>

            <li class="mb-1 group">
                <a href="" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-orange-600 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class='bx bx-cog mr-3 text-lg'></i>
                    <span class="text-sm">Paramètres</span>

                </a>
            </li>
            <li class="mb-1 group">

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-red-600 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 cursor-pointer" :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        <i class='bx bx-exit mr-3 text-lg'></i>
                        <span class="text-sm">Se déconnecter</span>
                    </a>
                </form>

            </li>
        </ul>
    </div>
    <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
    <!-- end sidenav -->

    <!-- navbar -->
    <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
        <button type="button" class="text-lg text-gray-900 font-semibold sidebar">
            <i class="ri-menu-line"></i>
        </button>

        <ul class="ml-auto flex items-center">


            <li class=" ml-3">
                <p class=" flex items-center">
                <div class="p-2 md:block text-left">
                    <h2 class="text-sm font-semibold text-gray-800">{{Auth::user()->nom}}</h2>
                    <p class="text-xs text-gray-500">{{Auth::user()->email}}</p>
                </div>
                </p>
            </li>
        </ul>
    </div>

    </div>
    <!-- end navbar -->


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
            <select id="enginSelect" class="relative w-[220px] bg-white border-black border-2 rounded-md text-center font-semibold">
                <option>Choisir l'engin</option>
                @foreach($engins as $engin)
                    <option> {{ $engin->marque }} - {{ $engin->modele }} - {{ $engin->categorie }}</option>
                @endforeach
            </select>
            &nbsp; Veuillez choisir la date entre : &nbsp;
            <input type="date" id="startDatePicker" class="w-[200px] border-black border-2 rounded-md px-2 py-1">
            &nbsp; et &nbsp;
            <input type="date" id="endDatePicker" class="w-[200px] border-black border-2 rounded-md px-2 py-1">
        </h2>
    </div>


    <section class="relative flex justify-center items-center mb-20 mt-20">
        <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md overflow-y-auto max-h-46 w-[1280px] mt-5">
            <div id="map" class="h-[600px]"></div>
        </div>
    </section>

    <footer class="absolute w-full p-4 bg-white inset-x-0 bottom-0">
        <div class="text-center font-semibold text-black">
            <p>© 2024 <span class=" text-orange-600">Thiriot-Locations</span> - Tous droits réservés.
            </p>
        </div>
    </footer>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
        var map = L.map('map').setView([48.1814101770421, 6.208779881654873], 13); // Centre la carte sur Ville-sur-Illon

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
        }).addTo(map);

        var markers = []; // Tableau pour stocker les marqueurs

        function updateMarkers(enginId) {
            // Supprimer les anciens marqueurs de la carte
            markers.forEach(function(marker) {
                map.removeLayer(marker);
            });
            markers = []; // Réinitialiser le tableau des marqueurs

            // Récupérer les informations sur l'engin sélectionné
            var engin = {!! $engins->toJson() !!}.find(function(engin) {
                return engin.id == enginId;
            });

            if (engin) {
                var location = engin.locationEngin;
                var position = location.position;

                // Créer un nouveau marqueur pour la position de l'engin sélectionné
                var marker = L.marker([position.Latitude, position.Longitude]).addTo(map);

                // Ajouter les informations de l'engin au marqueur en tant que propriété personnalisée
                marker.bindPopup(`<b>Marque:</b> ${engin.marque}<br><b>Modèle:</b> ${engin.modele}<br><b>Catégorie:</b> ${engin.categorie}`).openPopup();

                // Ajouter le nouveau marqueur au tableau des marqueurs
                markers.push(marker);

                // Recentrer la carte sur la nouvelle position
                map.setView([position.Latitude, position.Longitude], 13);
            }
        }

        // Écouter le changement de sélection d'engin
        document.getElementById('enginSelect').addEventListener('change', function(event) {
            var enginId = event.target.value;
            updateMarkers(enginId);
        });

        // Appel initial pour mettre à jour les marqueurs avec l'engin sélectionné par défaut
        var defaultEnginId = document.getElementById('enginSelect').value;
        updateMarkers(defaultEnginId);
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
