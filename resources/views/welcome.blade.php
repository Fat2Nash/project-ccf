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

<body class="text-gray-800 font-inter">
    <!--sidenav -->
    <div class="fixed left-0 top-0 w-64 h-full bg-white p-4 z-50 sidebar-menu transition-transform">
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
                <a href="/HistoriqueLocations" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-orange-600 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class='bx bx-spreadsheet mr-3 text-lg'></i>
                    <span class="text-sm">Historique locations</span>
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
                                        <th class="px-4 py-3 text-xs font-semibold text-left text-gray-500 uppercase align-middle bg-gray-100 border border-l-0 border-r-0 border-gray-200 border-solid whitespace-nowrap">
                                            Etat</th>
                                        <th class="px-4 py-3 text-xs font-semibold text-left text-gray-500 uppercase align-middle bg-gray-100 border border-l-0 border-r-0 border-gray-200 border-solid whitespace-nowrap">
                                            Quantité</th>
                                        <th class="px-4 py-3 text-xs font-semibold text-left text-gray-500 uppercase align-middle bg-gray-100 border border-l-0 border-r-0 border-gray-200 border-solid whitespace-nowrap min-w-140-px">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-gray-700 ">
                                        <th class="p-4 px-4 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                            Loué</th>
                                        <td class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                        {{count($loue)}}</td>
                                        <td class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <span class="mr-2">{{round(count($loue) / count($total) *100)}}%</span>
                                                <div class="relative w-full">
                                                    <div class="flex h-2 overflow-hidden text-xs bg-blue-200 rounded">
                                                        <div style="width: <?php echo(count($loue)/count($total)*100) ?>%" class="flex flex-col justify-center text-center text-white bg-blue-600 shadow-none whitespace-nowrap">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="text-gray-700 ">
                                        <th class="p-4 px-4 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                            Disponible</th>
                                        <td class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                        {{count($dispo)}}</td>
                                        <td class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <span class="mr-2">{{round(count($dispo) / count($total) *100)}}%</span>
                                                <div class="relative w-full">
                                                    <div class="flex h-2 overflow-hidden text-xs bg-green-200 rounded">
                                                        <div style="width: <?php echo(count($dispo)/count($total)*100) ?>%" class="flex flex-col justify-center text-center text-white bg-green-500 shadow-none whitespace-nowrap">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="text-gray-700 ">
                                        <th class="p-4 px-4 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                            Autre</th>
                                        <td class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                            {{count($autre)}}</td>
                                        <td class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <span class="mr-2">{{round(count($autre) / count($total) *100)}}%</span>
                                                <div class="relative w-full">
                                                    <div class="flex h-2 overflow-hidden text-xs bg-orange-200 rounded">
                                                        <div style="width: <?php echo(count($autre)/count($total)*100) ?>%" class="flex flex-col justify-center text-center text-white bg-orange-500 shadow-none whitespace-nowrap">
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
                    <div class="overflow-hidden">
                        <table class="w-full min-w-[540px]">
                            <tbody>
                                <tr>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <a href="#" class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">Engin
                                                1</a>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <span class="text-[13px] font-medium text-gray-400">02-02-2024</span>
                                    </td>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <span class="text-[13px] font-medium text-gray-400">17 h 45</span>
                                    </td>

                                </tr>
                                <tr>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <a href="#" class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">Engin
                                                7</a>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <span class="text-[13px] font-medium text-gray-400">02-02-2024</span>
                                    </td>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <span class="text-[13px] font-medium text-gray-400">11 h 37</span>
                                    </td>

                                </tr>
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
                                // Créer une carte
                                let map = L.map('map').setView([48.19559121773711, 6.214228801562298], 13); // Vue initiale centrée sur Paris

                                // Ajouter le layer OpenStreetMap à la carte
                                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                    maxZoom: 19,
                                }).addTo(map);

                                // Ajouter un point de localisation
                                let marker = L.marker([48.1814101770421, 6.208779881654873]).addTo(map);
                                marker.bindPopup("<b>Dépôt</b>");
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
                                    <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">
                                        Type</th>
                                    <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">
                                        Location</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <a href="#" class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">Boitier
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
                                            <a href="#" class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">Boitier
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

        <x-footer />

    </main>

</body>

</html>

