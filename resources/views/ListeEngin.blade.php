<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thiriot-Location | {{ Auth::user()->name }}</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="text-gray-800 font-inter">



    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
        <x-side-navbar />

        <!-- Content -->


        <div class="p-6">
            <div class="grid grid-cols-1 gap-6 mb-6 lg:grid-cols-2">

   <!--------------------------------------- 1ere case Liste Engin a Livrer ---------------------------------------------------------------------->
               <div class="p-6 bg-white border border-gray-100 rounded-md shadow-md shadow-black/5">
                    <div class="flex items-start justify-between mb-4">
                        <div class="font-medium">Liste des engins à Livrer</div>
                    </div>
                    <div class="overflow-auto max-h-[200px]"> <!-- Utilisation de overflow-auto pour activer le défilement -->
                        <table class="w-full min-w-[540px]">
                            <tbody>

                                <!-- 1er engin -->
                        <tr>
                            <td class="px-4 py-2 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <a href="#" class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">Engin 1</a>
                                </div>
                            </td>
                            <td class="px-4 py-2 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">02-02-2024</span>
                            </td>
                            <td class="px-4 py-2 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">17 h 45</span>
                            </td>
                        </tr>
                        <!-- fin 1er engin -->

                        <!-- 2eme engin -->
                        <tr>
                            <td class="px-4 py-2 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <a href="#" class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">Engin 2</a>
                                </div>
                            </td>
                            <td class="px-4 py-2 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">02-02-2024</span>
                            </td>
                            <td class="px-4 py-2 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">17 h 45</span>
                            </td>
                        </tr>
                        <!-- fin 2eme engin -->

                        <!-- 3eme engin -->
                        <tr>
                            <td class="px-4 py-2 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <a href="#" class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">Engin 3</a>
                                </div>
                            </td>
                            <td class="px-4 py-2 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">02-02-2024</span>
                            </td>
                            <td class="px-4 py-2 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">11 h 37</span>
                            </td>
                        </tr>
                        <!-- fin 3eme engin -->

                        <!-- 4er engin -->
                        <tr>
                            <td class="px-4 py-2 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <a href="#" class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">Engin 4</a>
                                </div>
                            </td>
                            <td class="px-4 py-2 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">02-02-2024</span>
                            </td>
                            <td class="px-4 py-2 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">17 h 45</span>
                            </td>
                        </tr>
                        <!-- fin 4eme engin -->

                        <!-- 5eme engin -->
                        <tr>
                            <td class="px-4 py-2 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <a href="#" class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">Engin 5</a>
                                </div>
                            </td>
                            <td class="px-4 py-2 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">02-02-2024</span>
                            </td>
                            <td class="px-4 py-2 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">17 h 45</span>
                            </td>
                        </tr>
                        <!-- fin 5eme engin -->

                        <!-- 6eme engin -->
                        <tr>
                            <td class="px-4 py-2 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <a href="#" class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">Engin 6</a>
                                </div>
                            </td>
                            <td class="px-4 py-2 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">02-02-2024</span>
                            </td>
                            <td class="px-4 py-2 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">17 h 45</span>
                            </td>
                        </tr>
                        <!-- fin 6eme engin -->

                                <!-- 7eme engin -->
                                <tr>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <a href="#"
                                                class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">Engin
                                                7</a>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <span class="text-[13px] font-medium text-gray-400">02-02-2024</span>
                                    </td>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <span class="text-[13px] font-medium text-gray-400">17 h 45</span>
                                    </td>
                                </tr>
                                <!-- fin 7eme engin-->

                            </tbody>
                        </table>
                    </div>
                </div>

 <!------------------------------------- Debut deuxieme Case Liste Egin a recuperer --------------------------------------------------------------------------->
                <div class="p-6 bg-white border border-gray-100 rounded-md shadow-md shadow-black/5">
                    <div class="flex items-start justify-between mb-4">
                        <div class="font-medium">Liste des engins à Récupérer</div>
                    </div>
                    <div class="overflow-auto max-h-[200px]"> <!--  overflow-auto pour  le défilement -->
                        <table class="w-full min-w-[540px]">
                            <tbody>

                               <!-- ENGIN 1 -->
<tr>
    <td class="px-4 py-2 border-b border-b-gray-50">
        <div class="flex items-center">
            <a href="#" class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">
                Engin 1
            </a>
        </div>
    </td>
    <td class="px-4 py-2 border-b border-b-gray-50">
        <span class="text-[13px] font-medium text-gray-400">02-02-2024</span>
    </td>
    <td class="px-4 py-2 border-b border-b-gray-50">
        <span class="text-[13px] font-medium text-gray-400">17 h 45</span>
    </td>
</tr>
<!-- Fin 1er engin -->

<!-- engin 2 -->
<tr>
    <td class="px-4 py-2 border-b border-b-gray-50">
        <div class="flex items-center">
            <a href="#" class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">
                Engin 2
            </a>
        </div>
    </td>
    <td class="px-4 py-2 border-b border-b-gray-50">
        <span class="text-[13px] font-medium text-gray-400">02-02-2024</span>
    </td>
    <td class="px-4 py-2 border-b border-b-gray-50">
        <span class="text-[13px] font-medium text-gray-400">17 h 45</span>
    </td>
</tr>
<!-- Fin 2eme engin -->

<!-- engin 3 -->
<tr>
    <td class="px-4 py-2 border-b border-b-gray-50">
        <div class="flex items-center">
            <a href="#" class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">
                Engin 3
            </a>
        </div>
    </td>
    <td class="px-4 py-2 border-b border-b-gray-50">
        <span class="text-[13px] font-medium text-gray-400">02-02-2024</span>
    </td>
    <td class="px-4 py-2 border-b border-b-gray-50">
        <span class="text-[13px] font-medium text-gray-400">17 h 45</span>
    </td>
</tr>
<!-- Fin 3eme engin -->

<!-- engin 4 -->
<tr>
    <td class="px-4 py-2 border-b border-b-gray-50">
        <div class="flex items-center">
            <a href="#" class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">
                Engin 4
            </a>
        </div>
    </td>
    <td class="px-4 py-2 border-b border-b-gray-50">
        <span class="text-[13px] font-medium text-gray-400">02-02-2024</span>
    </td>
    <td class="px-4 py-2 border-b border-b-gray-50">
        <span class="text-[13px] font-medium text-gray-400">17 h 45</span>
    </td>
</tr>
<!-- Fin 4eme engin -->

<!-- engin 5 -->
<tr>
    <td class="px-4 py-2 border-b border-b-gray-50">
        <div class="flex items-center">
            <a href="#" class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">
                Engin 5
            </a>
        </div>
    </td>
    <td class="px-4 py-2 border-b border-b-gray-50">
        <span class="text-[13px] font-medium text-gray-400">02-02-2024</span>
    </td>
    <td class="px-4 py-2 border-b border-b-gray-50">
        <span class="text-[13px] font-medium text-gray-400">17 h 45</span>
    </td>
</tr>
<!-- Fin 5eme engin -->

<!-- engin 6 -->
<tr>
    <td class="px-4 py-2 border-b border-b-gray-50">
        <div class="flex items-center">
            <a href="#" class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">
                Engin 6
            </a>
        </div>
    </td>
    <td class="px-4 py-2 border-b border-b-gray-50">
        <span class="text-[13px] font-medium text-gray-400">02-02-2024</span>
    </td>
    <td class="px-4 py-2 border-b border-b-gray-50">
        <span class="text-[13px] font-medium text-gray-400">17 h 45</span>
    </td>
</tr>
<!-- Fin 6eme engin -->

<!-- engin 7 -->
<tr>
    <td class="px-4 py-2 border-b border-b-gray-50">
        <div class="flex items-center">
            <a href="#" class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">
                Engin 7
            </a>
        </div>
    </td>
    <td class="px-4 py-2 border-b border-b-gray-50">
        <span class="text-[13px] font-medium text-gray-400">02-02-2024</span>
    </td>
    <td class="px-4 py-2 border-b border-b-gray-50">
        <span class="text-[13px] font-medium text-gray-400">17 h 45</span>
    </td>
</tr>
<!-- Fin 7eme engin -->


                            </tbody>
                        </table>
                    </div>
                </div>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!------- Fin 2eme Case Liste engin a recuperer ------------------------------------------------------------------------------------>
            <!------ Debut 3eme Case (map) ------------------------------------------------------------------------------------>
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
                <!------ Fin 3eme Case (map) ------------------------------------------------------------------------------------>

                <!------ Debut 4eme Case Infos Engin ------------------------------------------------------------------------------------>
                <div class="p-6 bg-white border border-gray-100 rounded-md shadow-md h-80 shadow-black/5 ">
                    <div class="flex items-start justify-between mb-4">
                        <div class="font-medium">Infos Engin</div>

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
                                        Infos</th>
                                </tr>
                            </thead>
                            <tbody>

                                <!-- Lignes Categorie   ------------------------------------------------->
                                <tr>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <a href="#"
                                                class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">Categorie</a>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <span class="text-[13px] medium text-gray-600">Categorie Engin</span>
                                    </td>

                                </tr>
                                <!-- Lignes Marque   ------------------------------------------------->
                                <tr>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <a href="#"
                                                class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">Marque</a>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <span class="text-[13px] medium text-gray-600">MarqueEngin</span>
                                    </td>

                                </tr>
                                <!-- Lignes Modele   ------------------------------------------------->
                                <tr>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <a href="#"
                                                class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">Modele</a>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <span class="text-[13px] medium text-gray-600">ModeleEngin</span>
                                    </td>

                                </tr>
                                <!-- Lignes Description   ------------------------------------------------->
                                <tr>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <a href="#"
                                                class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">Description</a>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <span class="text-[13px] medium text-gray-600">DescriptionEngin
                                        </span>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin 4eme Case ----------------------------------------------->


        <x-footer />

    </main>

</body>

</html>
