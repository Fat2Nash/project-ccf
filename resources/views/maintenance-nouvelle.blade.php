@php
    $parametreIdEngin = Request::route('idEngin');
    $engins = App\Models\Engin::all(); // Récupérer toutes les données des engins
    $users = App\Models\User::all(); // Récupérer toutes les données des utilisateurs

    if ($parametreIdEngin) {
        $engin = App\Models\Engin::find($parametreIdEngin);
        $historiqueMaintenance = App\Models\Maintenance::where('id_engin', $parametreIdEngin)
            ->orderBy('date_maintenance', 'desc')
            ->get();
    }
@endphp
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thiriot-Location | Nouvelle Maintenance</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="text-gray-800 font-inter">
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
        <x-side-navbar />

        <!-- Content -->

        @if ($parametreIdEngin)
            <div class="p-6">
                <div class="grid grid-cols-1 gap-6 mb-6 lg:grid-cols-2">

                    <!--------------------------------------- 1ere case Infos Engin  ---------------------------------------------------------------------->
                    <div class="p-6 bg-white border border-gray-100 rounded-md shadow-md shadow-black/5">
                        <div class="flex items-start justify-between mb-4">
                            <div class="font-medium">Infos de l'engin</div>
                        </div>

                        <table class="w-full min-w-[540px]">
                            <tbody>
                                <!-- Debut ID Engin ---------------------------------------->
                                <tr>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <span href="#"
                                                class="ml-2 text-m font-medium text-gray-600 truncate">ID</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <span
                                            class="text-[13px] font-medium text-gray-500">{{ $engin->id_engins }}</span>
                                    </td>
                                </tr>
                                <!-- fin ID engin ---------------------------------------->

                                <!-- Debut Categorie engin --------------------------->
                                <tr>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <span
                                                class="ml-2 text-m font-medium text-gray-600 truncate">Categorie</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <span
                                            class="text-[13px]  font-medium text-gray-500">{{ $engin->categorie }}</span>
                                    </td>
                                </tr>

                                <!-- fin Categorie engin ----------------------------------->


                                <!-- Debut Marque engin ------------------------------>
                                <tr>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <span class="ml-2 text-m font-medium text-gray-600 truncate">Marque</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <span class="text-[13px] font-medium text-gray-500">{{ $engin->marque }}</span>
                                    </td>
                                </tr>
                                <!-- Fin Marque engin ------------------------->

                                <!-- Debut Modele engin ----------------------------->
                                <tr>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <span class="ml-2 text-m font-medium text-gray-600 truncate">Modele</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <span class="text-[13px] font-medium text-gray-500">{{ $engin->modele }}</span>
                                    </td>
                                </tr>
                                <!-- fin Modele engin --------------------------->

                                <!-- Debut compteur heure ----------------------------------->
                                <tr>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <span class="ml-2 text-m font-medium text-gray-600 truncate">compteur
                                                heure</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <span
                                            class="text-[13px] font-medium text-gray-500">{{ $engin->compteur_heures }}</span>
                                    </td>
                                </tr>
                                <!-- fin compteur heure ---------------------------------->


                                <!-- Debut description Engin ---------------------------------------->
                                <tr>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <span href="#"
                                                class="ml-2 text-m font-medium text-gray-600 truncate">Description</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <span
                                            class="text-[13px] font-medium text-gray-500">{{ $engin->description }}</span>
                                    </td>
                                </tr>
                                <!-- fin Description engin ---------------------------------------->

                            </tbody>
                        </table>
                    </div>

                    <div class="p-6 bg-white border border-gray-100 rounded-md shadow-md shadow-black/5">
                        <div class="flex items-start justify-between mb-4">
                            <div class="font-medium">Historique de maintenance</div>
                        </div>
                        <div class="overflow-auto max-h-[200px]">
                            <!--  overflow-auto pour  le défilement -->
                            <table class="w-full min-w-[540px]">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2 text-left">ID </th>
                                        <th class="px-4 py-2 text-left">Mécanicien</th>
                                        <th class="px-4 py-2 text-left">Date Maintenance</th>
                                        <th class="px-4 py-2">Détails</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Debut Historique  -->
                                    @foreach ($historiqueMaintenance as $historique)
                                        <tr>
                                            <td class="px-4 py-2 ">
                                                <div class="flex justify-start">
                                                    {{ $historique->id_maintenance }}
                                                </div>
                                            </td>
                                            <td class="px-4 py-2 ">
                                                <div class="flex justify-start">{{ $historique->user->nom }}
                                                    {{ $historique->user->prenom }}
                                                </div>
                                            </td>
                                            <td class="px-4 py-2">
                                                <div class="flex justify-start text-gray-500">
                                                    {{ $historique->date_maintenance }}
                                                </div>
                                            </td>
                                            <td class="flex justify-center px-4 py-2">
                                                <a href="/maintenances/{{ $historique->id_maintenance }}">
                                                    <button
                                                        class="px-4 py-2 text-sm text-white transition-colors duration-200 rounded-lg bg-orange-500 hover:bg-orange-600 ">
                                                        Détails
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <!-- Fin Historique Maintenance-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-6 shadow-black/5 mb-6">
                <form action="{{ route('creer_maintenance') }}" method="POST">
                    @csrf
                    <input id="id_engin" name="id_engin" type="hidden" value="{{ $parametreIdEngin }}" />

                    <!--- Debut Case Remarque ---->
                    <div class="p-6 border bg-white rounded-md shadow-md mb-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="font-medium">Remarque</div>
                        </div>
                        <div class="px-4 py-2">
                            <textarea id="remarque" name="remarque" class="w-full h-24 border border-gray-200 rounded-md" required></textarea>
                        </div>
                    </div>
                    <!--- Fin Case Remarque ---->

                    <!--- Debut Case Defaut ---->
                    <div class="p-6 border bg-white rounded-md shadow-md mb-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="font-medium">Défaut</div>
                        </div>
                        <div class="px-4 py-2">
                            <textarea id="defaut" name="defaut" class="w-full h-24 border border-gray-200 rounded-md" required></textarea>
                        </div>
                    </div>
                    <!--- Fin Case Defaut ---->
                    <!------ Fin  Case Remarque Defaut ------------------------------------------------------------------------------------>

                    <!------ Debut case date/valider ------------------------------------------------------------------------------------>
                    <div class="p-6 border bg-white rounded-md shadow-md mb-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="font-medium">Choisir une date et une heure :</div>
                        </div>
                        <div class="px-4 py-2">
                            <input id="date_heure_maintenance" name="date_heure_maintenance" type="datetime-local"
                                class="mt-2 border border-gray-300 rounded-md focus:outline-none" required>
                        </div>
                    </div>
                    <!------ Fin case date/valider ------------------------------------------------------------------------------------>

                    <!------ Debut case mecanicien ------------------------------------------------------------------------------------>
                    <div class="p-6 border bg-white rounded-md shadow-md mb-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="font-medium">Choisir mécanicien :</div>
                        </div>
                        <div class="px-4 py-2">
                            <select id="mecanicien" name="mecanicien" class="mt-1 p-2 w-full border rounded-md"
                                required>
                                @foreach ($users as $user)
                                    <option value={{ $user->id }}>{{ $user->nom }} {{ $user->prenom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!------ Fin case mecanicien ------------------------------------------------------------------------------------>

                    <!------ Debut case valider ------------------------------------------------------------------------------------>
                    <div class="p-6 border bg-white rounded-md shadow-md mb-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="font-medium">Validation :</div>
                        </div>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Valider</button>
                    </div>
                    <!------ Fin case valider ------------------------------------------------------------------------------------>

                </form>
            </div>
        @else
            <div class="p-6 shadow-black/5 mb-6">
                <div class="p-6 border bg-white rounded-md shadow-md mb-6">
                    <div class="flex items-start justify-between mb-4">
                        <h2 class="font-medium">Choisir l'engin:</h2>
                    </div>

                    <div class="mb-4">
                        <select name="liste_engin" id="liste_engin" class="mt-1 p-2 w-full border rounded-md">
                            <option>Choisir un engin</option>
                            @foreach ($engins as $engin)
                                <option value={{ $engin->id_engins }}>{{ $engin->id_engins }}</option>
                            @endforeach
                        </select>
                    </div>

                    <script>
                        // Sélection de l'élément select
                        const selectElement = document.getElementById('liste_engin');

                        // Écouteur d'événement pour le changement de sélection
                        selectElement.addEventListener('change', function() {
                            // Récupérer la valeur sélectionnée
                            const selectedValue = this.value;

                            // Rediriger l'utilisateur vers /nouvelle-maintenance/$id
                            window.location.href = `/nouvelle-maintenance/${selectedValue}`;
                        });
                    </script>

                </div>
            </div>
        @endif

        <x-footer />
    </main>

    <script>
        // Sélection de l'élément input pour la date et l'heure
        const dateTimePicker = document.getElementById('datetime');

        // Sélection du bouton Valider
        const validerBtn = document.getElementById('valider-btn');

        // Ajout d'un écouteur d'événement au clic sur le bouton Valider
        validerBtn.addEventListener('click', function() {
            // Récupérer la valeur de la date et de l'heure sélectionnées
            const selectedDateTime = dateTimePicker.value;
            // Afficher la date et l'heure sélectionnées dans la console (vous pouvez la traiter comme vous le souhaitez ici)
            console.log(selectedDateTime);
        });
    </script>
</body>

</html>
