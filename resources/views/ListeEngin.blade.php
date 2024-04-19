<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thiriot-Location | {{ Auth::user()->nom }}</title>
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
                    <!--  overflow-auto pour  le défilement -->
                    <div class="overflow-auto max-h-[200px]">
                        <table class="w-full min-w-[540px]">
                            <tbody>
                                @php
                                    use App\Models\Engin; // Importer le modèle Engin
                                    use App\Models\Location; // Importer le modèle locztion
                                    $engins = Engin::all(); // Récupérer toute les donnée des engin
                                    $Locations = Location::all(); // Récupérer toutes les donnée de locations
                                @endphp

                                <!--trier par date de livraison-->
                                @foreach ($Locations->where('Status', 'Livrer')->sortBy('Louer_le') as $Location)
                                    @php
                                        $engin = App\Models\Engin::find($Location->id_engins);
                                    @endphp
                                    @if ($engin)
                                        <tr class="engin-row" data-id-engin="{{ $Location->id_engins }}">
                                            <td class="px-4 py-2 border-b border-b-gray-50">
                                                <div class="flex items-center">
                                                    <button name="PB_Livrer"
                                                        class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">
                                                        {{ $Location->id_loc_engin }}
                                                    </button>
                                                </div>
                                            </td>
                                            <td class="px-4 py-2 border-b border-b-gray-50">
                                                <span
                                                    class="text-[13px] font-medium text-gray-400">{{ $Location->Louer_le }}</span>
                                            </td>
                                            <td class="px-4 py-2 border-b border-b-gray-50">
                                                <span
                                                    class="text-[13px] font-medium text-gray-400">{{ $Location->ville }}</span>
                                            </td>
                                            <td class="px-4 py-2 border-b border-b-gray-50">
                                                <span
                                                    class="text-[13px] font-medium text-gray-400">{{ $engin->categorie }}</span>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach


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

                                <!-- ENGIN Recuperer -->
                                @foreach ($Locations->where('Status', 'Recuperer')->sortBy('Louer_le') as $Location)
                                    @php
                                        $engin = App\Models\Engin::find($Location->id_engins);
                                    @endphp
                                    @if ($engin)
                                        <tr class="engin-row" data-id-engin="{{ $Location->id_engins }}">
                                            <td class="px-4 py-2 border-b border-b-gray-50">
                                                <div class="flex items-center">
                                                    <button id="PB_Recup_{{ $Location->id_loc_engin }}" name="PB_Recup"
                                                        class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600"
                                                        onclick="toggleAfficherMasquer('{{ $Location->id_loc_engin }}')">
                                                        {{ $Location->id_loc_engin }}
                                                    </button>
                                                </div>

                    </div>
                    </td>
                    <td class="px-4 py-2 border-b border-b-gray-50">
                        <span class="text-[13px] font-medium text-gray-400">{{ $Location->Rendu_le }}</span>
                    </td>
                    <td class="px-4 py-2 border-b border-b-gray-50">
                        <span class="text-[13px] font-medium text-gray-400">{{ $Location->ville }}</span>
                    </td>
                    <td class="px-4 py-2 border-b border-b-gray-50">
                        <span class="text-[13px] font-medium text-gray-400">{{ $engin->categorie }}</span>
                    </td>
                    </tr>
                    @endif
                    @endforeach
                    <!-- Fin engin Recuperer-->


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

            <!-- Debut 4eme Case Infos Engin -->
            <div class="p-6 bg-white border border-gray-100 rounded-md shadow-md shadow-black/5">
                <div class="flex items-start justify-between mb-4">
                    <div class="font-medium">Infos Engin</div>
                </div>
                <div class="overflow-auto max-h-[200px]"> <!--  overflow-auto pour  le défilement -->
                    <table class="w-full min-w-[540px]">
                        <tbody>


                            <tr>
                                <th
                                    class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">
                                    Type</th>
                                <th
                                    class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">
                                    Infos</th>
                            </tr>

                        <tbody>
                            <!-- Recuperer les infos de l'engin 1 -->
                            @foreach ($engins->where('id_engins', 1) as $engin)
                                @php
                                    $engin = App\Models\Engin::find($Location->id_engins);
                                @endphp
                                <!-- Lignes Categorie -->
                                <tr>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <span
                                                class="ml-2 text-sm font-medium text-gray-600 truncate">Categorie</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <span class="text-[13px] medium text-gray-600">{{ $engin->categorie }}</span>
                                    </td>
                                </tr>
                                <!-- Lignes Marque -->
                                <tr>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <span class="ml-2 text-sm font-medium text-gray-600 truncate">Marque</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <span class="text-[13px] medium text-gray-600">{{ $engin->marque }}</span>
                                    </td>
                                </tr>
                                <!-- Lignes Modele -->
                                <tr>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <span class="ml-2 text-sm font-medium text-gray-600 truncate">Modele</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <span class="text-[13px] medium text-gray-600">{{ $engin->modele }}</span>
                                    </td>
                                </tr>
                                <!-- Lignes Description -->
                                <tr>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <span
                                                class="ml-2 text-sm font-medium text-gray-600 truncate">Description</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <span class="text-[13px] medium text-gray-600">{{ $engin->description }}</span>
                                    </td>
                                </tr>
                                <!-- DEBUT Lignes ADRESSE -->
                                <tr>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <span class="ml-2 text-sm font-medium text-gray-600 truncate">Adresse</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <span class="text-[13px] medium text-gray-600">{{ $Location->adresse }}</span>
                                    </td>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <span
                                            class="text-[13px] font-medium text-gray-400">{{ $Location->ville }}</span>
                                    </td>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <span
                                            class="text-[13px] font-medium text-gray-400">{{ $Location->code_postal }}</span>
                                    </td>
                                </tr>
                                <!-- FIN Lignes ADRESSE -->
                                <!-- DEBUT  Lignes DATE LIVRAISON -->
                                <tr>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <span class="ml-2 text-sm font-medium text-gray-600 truncate">Date
                                                livraison</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <span class="text-[13px] medium text-gray-600">{{ $Location->Louer_le }}</span>
                                    </td>
                                </tr>
                                <!-- FIN  Lignes DATE LIVRAISON -->
                                <!-- DEBUT  Lignes DATE RECUPERATION -->
                                <tr>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <span class="ml-2 text-sm font-medium text-gray-600 truncate">Date
                                                Recuperation</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <span class="text-[13px] medium text-gray-600">{{ $Location->Rendu_le }}</span>
                                    </td>
                                </tr>
                                <!-- FIN  Lignes DATE RECUPERATION -->
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Fin 4eme Case Infos Engin -->
            <div class="p-6 bg-white border border-gray-100 rounded-md shadow-md shadow-black/5">
                <div class="font-medium mb-4">Modifier le statut d'une location</div>

                <form action="{{ route('update_Status') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="location_id" class="block text-sm font-medium text-gray-700">ID de la location
                            :</label>
                        <input type="text" name="location_id" id="location_id"
                            class="mt-1 p-2 w-full border rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="new_status" class="block text-sm font-medium text-gray-700">Nouveau statut
                            :</label>
                        <select name="new_status" id="new_status" class="mt-1 p-2 w-full border rounded-md">
                            <option value="Livrer">Livrer</option>
                            <option value="Recuperer">Recuperer</option>
                            <option value="Fini">Fini</option>
                            <!-- Ajoutez d'autres options si nécessaire -->
                        </select>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Valider</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
        <x-footer />





    </main>
</body>

</html>


</main>

</body>

</html>
