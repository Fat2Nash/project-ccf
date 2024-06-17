<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thiriot-Location | Liste Livraison</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="text-gray-800 font-inter">

    {{-- recuperer parametre web aller chercher bdd avec l'ID en parametre et stocker dans var --}}
    @php
        use App\Models\Engin; // Importer le modèle Engin
        use App\Models\Location; // Importer le modèle Location
        $engins = Engin::all(); // Récupérer tout les engins
        $Locations = Location::all(); // Récupérer toutes les données de locations

        $parametreIdLocation = Request::route('id');
        if ($parametreIdLocation) {
            $locationSelectionner = App\Models\Location::find($parametreIdLocation);
            $enginSelectionner = App\Models\Engin::find($locationSelectionner->id_engins);
        }
    @endphp

    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
        <x-side-navbar />

        <!-- Content -->


        <div class="p-6">
            <div class="grid grid-cols-1 gap-6 mb-6 lg:grid-cols-2">

                <!--------------------------------------- 1ere onglet Liste Engin a Livrer ---------------------------------------------------------------------->
                <div class="p-6 bg-white border border-gray-100 rounded-md shadow-md shadow-black/5">
                    <div class="flex items-start justify-center mb-4">
                        <div class="font-medium text-lg">Liste des engins à Livrer</div>
                    </div>

                    <div class="overflow-auto max-h-[400px]">
                        <table class="table table-bordered table-striped table-hover w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 text-center">N°Location</th>
                                    <th class="px-4 py-2 text-center">Date de livraison</th>
                                    <th class="px-4 py-2 text-center">Ville</th>
                                    <th class="px-4 py-2 text-center">Type d'engin</th>
                                    <th class="px-4 py-2 text-center">Détails</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Locations->where('Status', 'Livrer')->sortBy('Louer_le') as $Location)
                                    @php
                                        $engin = App\Models\Engin::find($Location->id_engins);
                                    @endphp
                                    <tr class="engin-row" data-id-engin="{{ $Location->id_engins }}">
                                        <td class="px-4 py-2 text-center">
                                            <div class="flex items-center">
                                                <a href="/livraisons/{{ $Location->id_loc_engin }}"
                                                    class="text-base font-bold truncate hover:text-orange-600">
                                                    {{ $Location->id_loc_engin }}
                                                </a>
                                            </div>
                                        </td>
                                        <td class="px-4 py-2 text-center text-gray-600">
                                            <span class="text-sm font-medium">{{ $Location->Louer_le }}</span>
                                        </td>
                                        <td class="px-4 py-2 text-center text-gray-600">
                                            <span class="text-sm font-medium">{{ $Location->ville }}</span>
                                        </td>
                                        <td class="px-4 py-2 text-center text-gray-600">
                                            <span class="text-sm font-medium">{{ $engin->categorie }}</span>
                                        </td>
                                        <td class="px-4 py-2 text-center text-gray-600">
                                            <a href="/livraisons/{{ $Location->id_loc_engin }}">
                                                <button
                                                    class="px-5 py-2 text-sm text-white transition-colors duration-200 bg-orange-500 rounded-lg hover:bg-orange-600">
                                                    Détails
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>



                <!------------------------------------- Debut deuxieme Case Liste Egin a recuperer --------------------------------------------------------------------------->
                <div class="p-6 bg-white border border-gray-100 rounded-md shadow-md shadow-black/5">
                    <div class="flex items-start justify-center mb-4">
                        <div class="font-medium text-lg">Liste des engins à Récupérer</div>
                    </div>
                    <div class="overflow-auto max-h-"> <!-- overflow-auto pour le défilement -->
                        <table class="w-full min-w-">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 border-b border-b-gray-50 text-center">N°Location</th>
                                    <th class="px-4 py-2 border-b border-b-gray-50 text-center">Date de
                                        Récupération</th>
                                    <th class="px-4 py-2 border-b border-b-gray-50 text-center">Ville</th>
                                    <th class="px-4 py-2 border-b border-b-gray-50 text-center">Type
                                        d'engin</th>
                                    <th class="px-4 py-2 border-b border-b-gray-50 text-center">Détails</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- ENGIN Recuperer -->
                                @foreach ($Locations->where('Status', 'Recuperer')->sortBy('Louer_le') as $Location)
                                    @php
                                        $engin = App\Models\Engin::find($Location->id_engins);
                                    @endphp
                                    <tr class="engin-row" data-id-engin="{{ $Location->id_engins }}">
                                        <td class="px-4 py-2 border-b border-b-gray-50 text-center text-gray-600">
                                            <div class="flex items-center">
                                                <a id="PB_Recup_{{ $Location->id_engins }}"
                                                    href="/livraisons/{{ $Location->id_loc_engin }}" name="PB_Recup"
                                                    class="ml-2 text-base font-bold truncate hover:text-orange-600">
                                                    {{ $Location->id_loc_engin }}
                                                </a>
                                            </div>
                                        </td>
                                        <td class="px-4 py-2 border-b border-b-gray-50 text-center text-gray-600">
                                            <span class="text-[13px] font-medium">{{ $Location->Rendu_le }}</span>
                                        </td>
                                        <td class="px-4 py-2 border-b border-b-gray-50 text-center text-gray-600">
                                            <span class="text-[13px] font-medium">{{ $Location->ville }}</span>
                                        </td>
                                        <td class="px-4 py-2 border-b border-b-gray-50 text-center text-gray-600">
                                            <span class="text-[13px] font-medium">{{ $engin->categorie }}</span>
                                        </td>
                                        <td class="px-4 py-2 border-b border-b-gray-50 text-center text-gray-600">
                                            <a name="PB_Livrer" href="/livraisons/{{ $Location->id_loc_engin }}">
                                                <button
                                                    class="px-4 py-2 text-sm text-white bg-orange-500 rounded-lg hover:bg-orange-600">
                                                    Détails
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


                <!-- Fin engin Recuperer-->
                </tbody>
                </table>
            </div>
        </div>
        </div>
        <!------- Fin 2eme Case Liste engin a recuperer ------------------------------------------------------------------------------------>


        <div class="p-6 grid grid-cols-1 gap-6 mb-6 lg:grid-cols-2">
            <!------ Debut 3eme infos engin ------------------------------------------------------------------------------------>

            <div class="p-6 bg-white border border-gray-100 rounded-md shadow-md">
                <div class="font-medium mb-4">Information supplémentaire</div>
                <table class="w-full">
                    <tbody>
                        @if (isset($locationSelectionner))
                            @php
                                $enginSelectionner = App\Models\Engin::find($locationSelectionner->id_engins);
                            @endphp

                            <!-- Lignes Catégorie -->
                            <tr>
                                <td class="px-4 py-2 border-b border-gray-200 font-medium text-gray-600">
                                    Catégorie
                                </td>
                                <td class="px-4 py-2 border-b border-gray-200 text-gray-500">
                                    {{ $enginSelectionner->categorie }}
                                </td>
                            </tr>

                            <!-- Lignes Marque -->
                            <tr>
                                <td class="px-4 py-2 border-b border-gray-200 font-medium text-gray-600">
                                    Marque
                                </td>
                                <td class="px-4 py-2 border-b border-gray-200 text-gray-500">
                                    {{ $enginSelectionner->marque }}
                                </td>
                            </tr>

                            <!-- Lignes Modèle -->
                            <tr>
                                <td class="px-4 py-2 border-b border-gray-200 font-medium text-gray-600">
                                    Modèle
                                </td>
                                <td class="px-4 py-2 border-b border-gray-200 text-gray-500">
                                    {{ $enginSelectionner->modele }}
                                </td>
                            </tr>

                            <!-- Lignes Description -->
                            <tr>
                                <td class="px-4 py-2 border-b border-gray-200 font-medium text-gray-600">
                                    Description
                                </td>
                                <td class="px-4 py-2 border-b border-gray-200 text-gray-500">
                                    {{ $enginSelectionner->description }}
                                </td>
                            </tr>

                            <!-- Lignes Adresse -->
                            <tr>
                                <td class="px-4 py-2 border-b border-gray-200 font-medium text-gray-600">
                                    Adresse
                                </td>
                                <td class="px-4 py-2 border-b border-gray-200 text-gray-500">
                                    {{ $locationSelectionner->adresse }},
                                    {{ $locationSelectionner->ville }},
                                    {{ $locationSelectionner->code_postal }}
                                </td>
                            </tr>

                            <!-- Lignes Date Livraison -->
                            <tr>
                                <td class="px-4 py-2 border-b border-gray-200 font-medium text-gray-600">
                                    Date Livraison
                                </td>
                                <td class="px-4 py-2 border-b border-gray-200 text-gray-500">
                                    {{ $locationSelectionner->Louer_le }}
                                </td>
                            </tr>

                            <!-- Lignes Date Récupération -->
                            <tr>
                                <td class="px-4 py-2 border-b border-gray-200 font-medium text-gray-600">
                                    Date Récupération
                                </td>
                                <td class="px-4 py-2 border-b border-gray-200 text-gray-500">
                                    {{ $locationSelectionner->Rendu_le }}
                                </td>
                            </tr>
                        @else
                            <!-- Si aucune location n'est sélectionnée -->
                            <tr>
                                <td colspan='2' class="px-4 py-2 border-b border-gray-200">
                                    Aucune Location Sélectionnée
                                </td>
                            </tr>
                        @endif

                    </tbody>
                </table>
            </div>


            <!------ Fin 3eme Infos Engin ------------------------------------------------------------------------------------>

            <!-- Debut 4eme onglet Modifier status   -->
            <div class="p-6 bg-white border border-gray-100 rounded-md shadow-md shadow-black/5">
                <div class="flex items-start justify-between mb-4">
                    <div class="font-medium">Modifier le status d'une Location</div>
                </div>
                <form action="{{ route('update_Status') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="location_id" class="block text-sm font-medium text-gray-700">N° de la location
                            :</label>

                        <input type="text" name="location_id" id="location_id"
                            class="mt-1 p-2 w-full border rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="new_status" class="block text-sm font-medium text-gray-700"> statut
                            :</label>
                        <select name="new_status" id="new_status" class="mt-1 p-2 w-full border rounded-md">
                            <option value="Recuperer">a été Livrer</option>
                            <option value="Fini">a été Recuperer</option>
                            <option value="Livrer">a Livrer</option>

                        </select>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Valider</button>
                    </div>
                </form>
            </div>
            <!-- Fin eme onglet Modifier status   -->


        </div>
        </div>
        <x-footer />
    </main>
</body>

</html>
