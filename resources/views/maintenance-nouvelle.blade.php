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
                    <div class="p-6 bg-white border border-gray-100 rounded-md shadow-md">
                        <div class="mb-4 font-medium">Infos de l'engin</div>
                        <table class="w-full">
                            <tbody>


                                <tr>
                                    <td class="px-4 py-2 font-medium text-gray-600 border-b border-gray-200">
                                        Numéro de l'engin</td>
                                    <td class="px-4 py-2 text-gray-500 border-b border-gray-200">
                                        {{ $engin->Num_Machine }}</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 font-medium text-gray-600 border-b border-gray-200">
                                        Catégorie</td>
                                    <td class="px-4 py-2 text-gray-500 border-b border-gray-200">
                                        {{ $engin->categorie }}</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 font-medium text-gray-600 border-b border-gray-200">
                                        Marque</td>
                                    <td class="px-4 py-2 text-gray-500 border-b border-gray-200">
                                        {{ $engin->marque }}</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 font-medium text-gray-600 border-b border-gray-200">
                                        Modèle</td>
                                    <td class="px-4 py-2 text-gray-500 border-b border-gray-200">
                                        {{ $engin->modele }}</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 font-medium text-gray-600 border-b border-gray-200">
                                        Compteur heure</td>
                                    <td class="px-4 py-2 text-gray-500 border-b border-gray-200">
                                        {{ $engin->compteur_heures }}</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 font-medium text-gray-600 border-b border-gray-200">
                                        Description</td>
                                    <td class="px-4 py-2 text-gray-500 border-b border-gray-200">
                                        {{ $engin->description }}</td>
                                </tr>
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
                                        <th class="px-4 py-2 text-left">N°Maintenance </th>
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
                                                        class="px-4 py-2 text-sm text-white transition-colors duration-200 bg-orange-500 rounded-lg hover:bg-orange-600 ">
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

            <div class="p-6 mb-6 shadow-black/5">
                <form action="{{ route('creer_maintenance') }}" method="POST">
                    @csrf
                    <input id="id_engin" name="id_engin" type="hidden" value="{{ $parametreIdEngin }}" />

                    <!--- Debut Case maintenance systématique  ---->
                    <div class="p-6 mb-6 bg-white border rounded-md shadow-md">
                        <div class="flex items-start justify-between mb-4">
                            <div class="font-medium">Maintenance systématique </div>
                        </div>
                        <div class="px-4 py-2">
                            <label for="maintenance_systematique" class="flex items-center">
                                <input type="checkbox" id="maintenance_systematique" name="maintenance_systematique"
                                    class="mr-2">
                                Cocher cette case si c'est une maintenance systématique
                            </label>
                        </div>
                    </div>
                    <!--- Fin Case maintenance systématique ---->


                    <!--- Debut Case Remarque ---->
                    <div class="p-6 mb-6 bg-white border rounded-md shadow-md">
                        <div class="flex items-start justify-between mb-4">
                            <div class="font-medium">Remarque</div>
                        </div>
                        <div class="px-4 py-2">
                            <textarea id="remarque" name="remarque" class="w-full h-24 border border-gray-200 rounded-md" required></textarea>
                        </div>
                    </div>
                    <!--- Fin Case Remarque ---->


                    <!--- Debut Case Defaut ---->
                    <div class="p-6 mb-6 bg-white border rounded-md shadow-md">
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
                    <div class="p-6 mb-6 bg-white border rounded-md shadow-md">
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
                    <div class="p-6 mb-6 bg-white border rounded-md shadow-md">
                        <div class="flex items-start justify-between mb-4">
                            <div class="font-medium">Choisir mécanicien :</div>
                        </div>
                        <div class="px-4 py-2">
                            <select id="mecanicien" name="mecanicien" class="w-full p-2 mt-1 border rounded-md"
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
                    <div class="p-6 mb-6 bg-white border rounded-md shadow-md">
                        <div class="flex items-start justify-between mb-4">
                            <div class="font-medium">Validation :</div>
                        </div>
                        <button type="submit"
                            class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">Valider</button>
                    </div>
                    <!------ Fin case valider ------------------------------------------------------------------------------------>

                </form>
            </div>
        @else
            <div class="p-6 mb-6 shadow-black/5">
                <div class="p-6 mb-6 bg-white border rounded-md shadow-md">
                    <div class="flex items-start justify-between mb-4">
                        <h2 class="font-medium">Choisir l'engin:</h2>
                    </div>

                    <div class="mb-4">
                        <select name="liste_engin" id="liste_engin" class="w-full p-2 mt-1 border rounded-md">
                            <option>Choisir un engin</option>
                            @foreach ($engins as $engin)
                                <option value={{ $engin->id_engins }}>{{ $engin->Num_Machine }} -
                                    {{ $engin->marque }} - {{ $engin->modele }} - {{ $engin->categorie }}</option>
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
