@php
    use App\Models\Maintenance; // Importer le modèle Maintenance
    // Récupérer les 5 dernières maintenances
    $maintenances = Maintenance::latest('date_maintenance')->take(5)->get();
@endphp
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thiriot-Location | Accueil</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<!-- Code PHP pour récupérer les données -->
@php
    use App\Models\Engin; // Importer le modèle Engin
    $engins = Engin::all(); // Récupérer tous les clients de la base de données

    use App\Models\Location; // Importer le modèle Location
    $loc_engin = Location::all(); // Récupérer toutes les locations de la base de données

    use App\Models\Position; // Importer le modèle Position
    $position_engin = Position::all(); // Récupérer toutes les positions de la base de données
@endphp


<main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
    <x-side-navbar />


    <!-- Content -->
    <div class="p-6">
        <div class="grid grid-cols-1 gap-6 mb-6 lg:grid-cols-2">
            <div class="relative flex flex-col w-full min-w-0 p-6 mb-4 break-words bg-white rounded shadow-lg lg:mb-0">
                <div class="px-0 mb-0 border-0 rounded-t">
                    <div class="flex flex-wrap items-center px-4 py-2">
                        <div class="relative flex-1 flex-grow w-full max-w-full">
                            <h3 class="text-base font-semibold text-gray-900 ">Etat des engins</h3>
                        </div>
                    </div>
                    <div class="block w-full overflow-x-auto">
                        <table class="items-center w-full bg-transparent border-collapse">
                            <thead>
                                <tr>
                                    <th
                                        class="px-4 py-3 text-xs font-semibold text-left text-gray-500 uppercase align-middle bg-gray-100 border border-l-0 border-r-0 border-gray-200 border-solid whitespace-nowrap">
                                        Etat</th>
                                    <th
                                        class="px-4 py-3 text-xs font-semibold text-left text-gray-500 uppercase align-middle bg-gray-100 border border-l-0 border-r-0 border-gray-200 border-solid whitespace-nowrap">
                                        Quantité</th>
                                    <th
                                        class="px-4 py-3 text-xs font-semibold text-left text-gray-500 uppercase align-middle bg-gray-100 border border-l-0 border-r-0 border-gray-200 border-solid whitespace-nowrap min-w-140-px">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-gray-700 ">
                                    <th
                                        class="p-4 px-4 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                        Loué</th>
                                    <td
                                        class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                        {{ count($loue) }}</td>
                                    <td
                                        class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <span
                                                class="mr-2">{{ round((count($loue) / count($total)) * 100) }}%</span>
                                            <div class="relative w-full">
                                                <div class="flex h-2 overflow-hidden text-xs bg-blue-200 rounded">
                                                    <div style="width: <?php echo (count($loue) / count($total)) * 100; ?>%"
                                                        class="flex flex-col justify-center text-center text-white bg-blue-600 shadow-none whitespace-nowrap">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="text-gray-700 ">
                                    <th
                                        class="p-4 px-4 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                        Disponible</th>
                                    <td
                                        class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                        {{ count($dispo) }}</td>
                                    <td
                                        class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <span
                                                class="mr-2">{{ round((count($dispo) / count($total)) * 100) }}%</span>
                                            <div class="relative w-full">
                                                <div class="flex h-2 overflow-hidden text-xs bg-green-200 rounded">
                                                    <div style="width: <?php echo (count($dispo) / count($total)) * 100; ?>%"
                                                        class="flex flex-col justify-center text-center text-white bg-green-500 shadow-none whitespace-nowrap">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="text-gray-700 ">
                                    <th
                                        class="p-4 px-4 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                        Autre</th>
                                    <td
                                        class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                        {{ count($autre) }}</td>
                                    <td
                                        class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <span
                                                class="mr-2">{{ round((count($autre) / count($total)) * 100) }}%</span>
                                            <div class="relative w-full">
                                                <div class="flex h-2 overflow-hidden text-xs bg-orange-200 rounded">
                                                    <div style="width: <?php echo (count($autre) / count($total)) * 100; ?>%"
                                                        class="flex flex-col justify-center text-center text-white bg-orange-500 shadow-none whitespace-nowrap">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="p-6 bg-white border border-gray-100 rounded-md shadow-md shadow-black/5">
                <div class="flex items-start justify-between mb-4">
                    <div class="font-medium">Dernières maintenances</div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[540px]">
                        <thead>
                            <tr>
                                <th
                                    class="px-4 py-3 text-xs font-semibold text-left text-gray-500 uppercase align-middle bg-gray-100 border border-l-0 border-r-0 border-gray-200 border-solid whitespace-nowrap">
                                    Maintenance
                                </th>
                                <th
                                    class="px-4 py-3 text-xs font-semibold text-left text-gray-500 uppercase align-middle bg-gray-100 border border-l-0 border-r-0 border-gray-200 border-solid whitespace-nowrap">
                                    Engin
                                </th>
                                <th
                                    class="px-4 py-3 text-xs font-semibold text-left text-gray-500 uppercase align-middle bg-gray-100 border border-l-0 border-r-0 border-gray-200 border-solid whitespace-nowrap min-w-140-px">
                                    Date
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Ajouts de la section des derniere maintenance d'engin --}}
                            @foreach ($maintenances as $maintenance)
                                <tr>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <a href="#"
                                                class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">
                                                N°{{ $maintenance->id_maintenance }}
                                            </a>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <span class="text-[13px] font-medium text-gray-400">
                                            {{ $maintenance->engin->description }}
                                            N°{{ $maintenance->engin->Num_Machine }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <span class="text-[13px] font-medium text-gray-400">
                                            {{ \Carbon\Carbon::parse($maintenance->date_maintenance)->format('d-m-Y H:i') }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 mb-6 lg:grid-cols-2">
            <div class="p-6 bg-white border border-gray-100 rounded-md shadow-md shadow-black/5 lg:col-span-1">
                <div class="items-start justify-between mb-4">

                    <div>
                        <div id="map" class="w-full h-full"></div>
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

                                // Création d'une couche de marqueurs pour Leaflet
                                var markersLayer = L.layerGroup().addTo(map);

                                // Données JSON encodées depuis PHP
                                var positions = {!! json_encode($position_engin) !!};
                                var engins = {!! json_encode($engins) !!};
                                var locations = {!! json_encode($loc_engin) !!};

                                // Fonction pour formater la date/heure à partir d'une chaîne de date en UTC
                                function formatDate(dateString) {
                                    const date = new Date(dateString);

                                    // Ajout du décalage horaire pour convertir en heure française
                                    const offset = date.getTimezoneOffset(); // Décalage UTC en minutes
                                    date.setMinutes(date.getMinutes() + offset); // Convertir en UTC
                                    date.setHours(date.getHours()); // Soustraire 1 heure pour CET (heure standard)

                                    // Vérifier si l'heure d'été est en vigueur et ajuster si nécessaire
                                    const january = new Date(date.getFullYear(), 0, 1).getTimezoneOffset();
                                    const july = new Date(date.getFullYear(), 6, 1).getTimezoneOffset();
                                    const isDST = Math.max(january, july) !== offset;

                                    if (isDST) {
                                        date.setHours(date.getHours()); // Ajouter 1 heure pour CEST (heure d'été)
                                    }

                                    var options = {
                                        year: 'numeric',
                                        month: 'long',
                                        day: '2-digit',
                                        hour: '2-digit',
                                        minute: '2-digit',
                                    };
                                    return date.toLocaleDateString('fr-FR', options); // Formatage de la date en format français
                                }

                                // Fonction pour filtrer les dernières positions de chaque engin
                                function filterLastPositions() {
                                    var lastPositions = [];

                                    // Parcourir chaque emplacement
                                    locations.forEach(location => {
                                        // Trouver l'engin correspondant à cet emplacement
                                        var engin = engins.find(e => e.id_engins === location.id_engins);

                                        if (engin) {
                                            // Filtrer les positions de l'engin actuel
                                            var enginPositions = positions.filter(pos => pos.id_loc_engin === location
                                                .id_loc_engin);

                                            // Vérifier si des positions ont été trouvées
                                            if (enginPositions.length > 0) {
                                                // Trouver la dernière position (ici par exemple, la plus récente en fonction d'un critère temporel)
                                                var lastPosition = enginPositions.reduce((acc, curr) => {
                                                    return acc.date > curr.date ? acc : curr;
                                                });

                                                // Ajouter la dernière position de cet engin à notre tableau
                                                lastPositions.push(lastPosition);
                                            } else {
                                                console.warn('Aucune position trouvée pour l\'engin avec ID:', engin.id_engins);
                                            }
                                        }
                                    });

                                    return lastPositions;
                                }

                                // Appel de la fonction pour obtenir les dernières positions de chaque engin
                                var lastPositions = filterLastPositions();

                                // Parcourir les dernières positions et créer des marqueurs
                                lastPositions.forEach(function(position) {
                                    // Affichage de la position actuelle pour débogage
                                    console.log("Position actuelle:", position);

                                    // Vérifier si les coordonnées sont valides
                                    var lat = parseFloat(position.Latitude);
                                    var lng = parseFloat(position.Longitude);

                                    if (!isNaN(lat) && !isNaN(lng)) {
                                        // Créer un marqueur à l'emplacement spécifié
                                        var marker = L.marker([lng, lat]);

                                        // Trouver l'engin correspondant à cette position
                                        var engin = engins.find(e => e.id_engins);

                                        // Affichage de l'engin trouvé pour débogage
                                        console.log("Engin trouvé:", engin);

                                        // Vérifier si l'engin est défini avant d'accéder à ses propriétés
                                        if (engin) {
                                            // Contenu du popup pour chaque marqueur avec les détails de l'engin et la date/heure de la position
                                            var popupContent = '<b>Numéro de machine:</b> ' + engin.Num_Machine +
                                                '<br><b>Marque:</b> ' + engin.marque +
                                                '<br><b>Modèle:</b> ' + engin.modele +
                                                '<br><b>Catégorie:</b> ' + engin.categorie +
                                                '<br><b>Date/Heure de la position:</b> ' + formatDate(position.DateHeure);

                                            // Liaison du contenu du popup au marqueur
                                            marker.bindPopup(popupContent);

                                            // Gestion de l'affichage du popup au survol du marqueur
                                            marker.on('mouseover', function(e) {
                                                this.openPopup();
                                            });

                                            // Gestion de la fermeture du popup lorsque le curseur quitte le marqueur
                                            marker.on('mouseout', function(e) {
                                                this.closePopup();
                                            });
                                        } else {
                                            console.warn('Aucun engin trouvé pour la position:', position);
                                        }

                                        // Ajouter le marqueur à la couche de marqueurs
                                        marker.addTo(markersLayer);
                                    } else {
                                        console.warn('Coordonnées invalides pour la position:', position);
                                    }
                                });

                                // Ajouter la couche de marqueurs à la carte
                                map.addLayer(markersLayer);
                            });
                        </script>

                    </div>
                </div>
            </div>

            <div class="p-6 bg-white border border-gray-100 rounded-md shadow-md h-80 shadow-black/5 ">
                <div class="flex items-start justify-between mb-4">
                    <div class="font-medium">Alertes</div>

                </div>
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[460px]">
                        <thead>
                            <tr>
                                <th
                                    class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">
                                    Type</th>
                                <th
                                    class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">
                                    Location</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-4 py-2 border-b border-b-gray-50">
                                    <div class="flex items-center">
                                        <a href="#"
                                            class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">Boitier
                                            ouvert</a>
                                    </div>
                                </td>
                                <td class="px-4 py-2 border-b border-b-gray-50">
                                    <span class="text-[13px] font-medium text-red-500">21</span>
                                </td>

                            </tr>
                            <tr>
                                <td class="px-4 py-2 border-b border-b-gray-50">
                                    <div class="flex items-center">
                                        <a href="#"
                                            class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">Boitier
                                            débranché</a>
                                    </div>
                                </td>
                                <td class="px-4 py-2 border-b border-b-gray-50">
                                    <span class="text-[13px] font-medium text-rose-500">12</span>
                                </td>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

    <x-footer class="z-40" />

</main>

<script>
    // Attend que le DOM soit entièrement chargé pour exécuter le code
    document.addEventListener('DOMContentLoaded', function() {

        // Initialisation de la carte Leaflet avec un centre géographique et un niveau de zoom
        var map = L.map('map', {
            attributionControl: false // Désactiver l'affichage des informations d'attribution
        }).setView([48.1814101770421, 6.208779881654873], 13.5);

        // Ajout d'une couche de tuiles OpenStreetMap à la carte
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Création d'une couche de marqueurs pour Leaflet
        var markersLayer = L.layerGroup().addTo(map);

        // Données JSON encodées depuis PHP
        var positions = {!! json_encode($position_engin) !!};
        var engins = {!! json_encode($engins) !!};
        var locations = {!! json_encode($loc_engin) !!};

        // Fonction pour formater la date/heure à partir d'une chaîne de date en UTC
        function formatDate(dateString) {
            const date = new Date(dateString);

            // Ajout du décalage horaire pour convertir en heure française
            const offset = date.getTimezoneOffset(); // Décalage UTC en minutes
            date.setMinutes(date.getMinutes() + offset); // Convertir en UTC
            date.setHours(date.getHours()); // Soustraire 1 heure pour CET (heure standard)

            // Vérifier si l'heure d'été est en vigueur et ajuster si nécessaire
            const january = new Date(date.getFullYear(), 0, 1).getTimezoneOffset();
            const july = new Date(date.getFullYear(), 6, 1).getTimezoneOffset();
            const isDST = Math.max(january, july) !== offset;

            if (isDST) {
                date.setHours(date.getHours()); // Ajouter 1 heure pour CEST (heure d'été)
            }

            // Formatage de la date en format français
            var options = {
                year: 'numeric',
                month: 'long',
                day: '2-digit',
                hour: '2-digit',
                minute: '2-digit'
            };

            return date.toLocaleString('fr-FR', options);
        }

        // Fonction pour filtrer les dernières positions de chaque engin
        function filterLastPositions() {
            var lastPositions = [];

            // Parcourir chaque emplacement
            locations.forEach(location => {
                // Trouver l'engin correspondant à cet emplacement
                var engin = engins.find(e => e.id_engins === location.id_engins);

                // Vérifier si l'engin est "Loué"
                if (engin && engin.statut === "Loué") {
                    // Filtrer les positions de l'engin actuel
                    var enginPositions = positions.filter(pos => pos.id_loc_engin === location
                        .id_loc_engin);

                    // Vérifier si des positions ont été trouvées
                    if (enginPositions.length > 0) {
                        // Trouver la dernière position (ici par exemple, la plus récente en fonction d'un critère temporel)
                        var lastPosition = enginPositions.reduce((acc, curr) => {
                            return new Date(acc.DateHeure) > new Date(curr.DateHeure) ? acc :
                                curr;
                        });

                        // Ajouter la dernière position de cet engin à notre tableau
                        lastPositions.push(lastPosition);
                    } else {
                        console.warn('Aucune position trouvée pour l\'engin avec ID:', engin.id_engins);
                    }
                }
            });

            return lastPositions;
        }

        // Appel de la fonction pour obtenir les dernières positions de chaque engin
        var lastPositions = filterLastPositions();

        // Parcourir les dernières positions et créer des marqueurs
        lastPositions.forEach(function(position) {
            // Affichage de la position actuelle pour débogage
            console.log("Position actuelle:", position);

            // Vérifier si les coordonnées sont valides
            var lat = parseFloat(position.Latitude);
            var lng = parseFloat(position.Longitude);

            if (!isNaN(lat) && !isNaN(lng)) {
                // Créer un marqueur à l'emplacement spécifié
                var marker = L.marker([lng, lat]);

                // Trouver l'engin correspondant à cette position
                var engin = engins.find(e => {
                    // Trouver la location correspondant à la position
                    var location = locations.find(l => l.id_loc_engin === position
                        .id_loc_engin);
                    return location && e.id_engins === location.id_engins;
                });

                // Affichage de l'engin trouvé pour débogage
                console.log("Engin trouvé:", engin);

                // Vérifier si l'engin est défini avant d'accéder à ses propriétés
                if (engin) {
                    // Contenu du popup pour chaque marqueur avec les détails de l'engin et la date/heure de la position
                    var popupContent = '<b>Numéro de machine:</b> ' + engin.Num_Machine +
                        '<br><b>Marque:</b> ' + engin.marque +
                        '<br><b>Modèle:</b> ' + engin.modele +
                        '<br><b>Catégorie:</b> ' + engin.categorie +
                        '<br><b>Date/Heure de la position:</b> ' + formatDate(position.DateHeure);

                    // Liaison du contenu du popup au marqueur
                    marker.bindPopup(popupContent);

                    // Gestion de l'affichage du popup au survol du marqueur
                    marker.on('mouseover', function(e) {
                        this.openPopup();
                    });

                    // Gestion de la fermeture du popup lorsque le curseur quitte le marqueur
                    marker.on('mouseout', function(e) {
                        this.closePopup();
                    });

                    // Ajouter le marqueur à la couche de marqueurs
                    marker.addTo(markersLayer);
                } else {
                    console.warn('Aucun engin trouvé pour la position:', position);
                }
            } else {
                console.warn('Coordonnées invalides pour la position:', position);
            }
        });

        // Ajouter la couche de marqueurs à la carte
        map.addLayer(markersLayer);
    });
</script>


</body>

</html>
