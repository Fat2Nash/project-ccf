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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19" rel="stylesheet">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css"/>

    <script src="https://cdn.tailwindcss.com"></script>

    <title>Thiriot-Location | {{Auth::user()->name}}</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

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

    <section class="relative flex justify-center items-center">

        @php
            use App\Models\Engin; // Importer le modèle Engin
            $engins = Engin::all(); // Récupérer tous les clients de la base de données

            use App\Models\Location; // Importer le modèle Location Engin
            $loc_engin = Location::all(); // Récupérer tous les clients de la base de données

            use App\Models\Position; // Importer le modèle Location Engin
            $position_engin = Position::all();
        @endphp

        <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5 overflow-y-auto max-h-98 w-[1200px]">
            <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Marque de l'engin</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Modèle de l'engin</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Catégorie de l'engin</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Status de l'engin</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                    @foreach($engins as $engin)
                        @php
                            // Récupérer la location associée à l'engin
                            $location = $engin->locationEngin;
                            // Récupérer la position associée à la location
                            $position = $location->position;
                        @endphp
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $engin->marque }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $engin->modele }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $engin->categorie }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $engin->statut }}</td>
                            <td>
                                <button class="position-btn" data-lat="{{ $position->Latitude }}" data-lng="{{ $position->Longitude }}">
                                    <img class="m-2 h-9 w-9" src="https://cdn-icons-png.flaticon.com/512/902/902613.png" alt="Position">
                                </button>
                                <button class="trajet-btn" data-adresse="{{ $location->adresse }}">
                                    <img class="m-2 h-9 w-9" src="https://cdn-icons-png.flaticon.com/512/512/512798.png" alt="Trajet">
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
    </section>

    <section class="relative flex justify-center items-center mb-20">
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

    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
            var map = L.map('map').setView([48.1814101770421, 6.208779881654873], 13); // Centre la carte sur Ville-sur-Illon

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
            }).addTo(map);

            var markers = []; // Tableau pour stocker les marqueurs

            // Récupérez toutes les positions des engins et ajoutez un marqueur pour chaque position
            @foreach($engins as $engin)
                @php
                    // Récupérer la location associée à l'engin
                    $location = $engin->locationEngin;
                    // Récupérer la position associée à la location
                    $position = $location->position;
                @endphp

                // Créez un marqueur pour chaque position et ajoutez-le au tableau des marqueurs
                var marker = L.marker([{{ $position->Longitude }}, {{ $position->Latitude }}]);

                // Ajoutez les informations d'engin au marqueur en tant que propriété personnalisée
                marker.enginInfo = {
                    marque: '{{ $engin->marque }}',
                    modele: '{{ $engin->modele }}',
                    categorie: '{{ $engin->categorie }}'
                };

                // Ajoutez un gestionnaire d'événements pour afficher les informations d'engin lorsque survolé
                marker.on('mouseover', function(e) {
                    var info = e.target.enginInfo;
                    e.target.bindPopup(`<b>Marque:</b> ${info.marque}<br><b>Modèle:</b> ${info.modele}<br><b>Catégorie:</b> ${info.categorie}`).openPopup();
                });

                // Ajoutez un gestionnaire d'événements pour fermer la popup lorsque la souris quitte le marqueur
                marker.on('mouseout', function(e) {
                    e.target.closePopup();
                });

                markers.push(marker);

                // Ajoutez le marqueur à la carte
                marker.addTo(map);
            @endforeach

            // Regroupez tous les marqueurs dans un groupe de couches pour les afficher sur la carte
            var markersLayer = L.layerGroup(markers);
            map.addLayer(markersLayer);

            // Ajoutez un gestionnaire d'événements aux boutons de position
            var positionBtns = document.querySelectorAll('.position-btn');
            positionBtns.forEach(function(btn) {
                btn.addEventListener('click', function(event) {
                    event.preventDefault();
                    var lat = parseFloat(btn.dataset.lat);
                    var lng = parseFloat(btn.dataset.lng);

                    // Centrez la carte sur les coordonnées du marqueur et zoom
                    map.setView([lng, lat], 13);
                });
            });
        });
    </script>

<script>
        new Vue({
            el: '#app',
            data: {
                map: null,
                route: null
            },
            mounted() {
                this.initMap();
            },
            methods: {
                initMap() {
                    this.map = L.map('map').setView([48.1814101770421, 6.208779881654873], 13); // Centre la carte sur Ville-sur-Illon
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(this.map);
                },
                showRoute(destination) {
                    // Afficher le trajet sur la carte
                    var directions = L.Routing.control({
                        waypoints: [
                            L.latLng(48.1814101770421, 6.208779881654873), // Départ à Ville-sur-Illon
                            L.latLng(destination[0], destination[1]) // Destination
                        ],
                        routeWhileDragging: true,
                        show: false
                    }).addTo(this.map);

                    if (this.route) {
                        this.map.removeLayer(this.route);
                    }

                    this.route = directions.getPlan().setWaypoints(destination).route;
                }
            }
        });
</script>
</body>
</html>
