@php

    $idMaintenance = Request::route('idMaintenance');
    if ($idMaintenance) {
        $maintenanceSelectionner = App\Models\Maintenance::find($idMaintenance);

        $enginMaintenanceSelectionner = $maintenanceSelectionner->id_engin;
        $historiqueMaintenance = App\Models\Maintenance::where('id_engin', $enginMaintenanceSelectionner)
            ->orderBy('date_maintenance', 'desc')
            ->get();
    }

@endphp
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thiriot-Location | Détails Maintenance</title>
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

                <!--------------------------------------- 1ere case Infos Engin  ---------------------------------------------------------------------->
                <div class="p-6 bg-white border border-gray-100 rounded-md shadow-md shadow-black/5">
                    <div class="flex items-start justify-between mb-4">
                        <div class="font-medium">Infos de l'engin</div>
                    </div>

                    <table class="w-full min-w-[540px]">
                        <tbody>

                            @php
                                $engin = $maintenanceSelectionner->engin ?? null;
                            @endphp


                            <!-- Debut ID Engin ---------------------------------------->
                            <tr>
                                <td class="px-4 py-2 border-b border-b-gray-50">
                                    <div class="flex items-center">
                                        <span href="#"
                                            class="ml-2 text-m font-medium text-gray-600 truncate">Numéro de l'engin</span>
                                    </div>
                                </td>
                                <td class="px-4 py-2 border-b border-b-gray-50">
                                    <span class="text-[13px] font-medium text-gray-500">{{ $engin->Num_Machine }}</span>
                                </td>
                            </tr>
                            <!-- fin ID engin ---------------------------------------->

                            <!-- Debut Categorie engin --------------------------->
                            <tr>
                                <td class="px-4 py-2 border-b border-b-gray-50">
                                    <div class="flex items-center">
                                        <span class="ml-2 text-m font-medium text-gray-600 truncate">Categorie</span>
                                    </div>
                                </td>
                                <td class="px-4 py-2 border-b border-b-gray-50">
                                    <span class="text-[13px]  font-medium text-gray-500">{{ $engin->categorie }}</span>
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
                                    <span class="text-[13px] font-medium text-gray-500">{{ $engin->description }}</span>
                                </td>
                            </tr>
                            <!-- fin Description engin ---------------------------------------->

                        </tbody>
                    </table>
                </div>
                <!------ Fin 1er Case Infos ENGIN ------------------------------------------------------------------------------------>

                <!------ Debut 2eme Case historique maintenance ------------------------------------------------------------------------------------>
                <div class="p-6 bg-white border border-gray-100 rounded-md shadow-md shadow-black/5">
                    <div class="flex items-start justify-between mb-4">
                        <div class="font-medium">Historique de maintenance</div>
                    </div>
                    <div class="overflow-auto max-h-[200px]">
                        <!--  overflow-auto pour  le défilement -->
                        <table class="w-full min-w-[540px]">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 text-left   ">Numéro de l'engin </th>
                                    <th class="px-4 py-2 text-left  ">Mécanicien</th>
                                    <th class="px-4 py-2 text-left  ">Date Maintenance</th>
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
                                                    {{ $historique->id_maintenance == $idMaintenance ? 'disabled' : '' }}
                                                    class="px-4 py-2 text-sm text-white transition-colors duration-200 rounded-lg
                                                    {{ $historique->id_maintenance == $idMaintenance
                                                        ? 'bg-gray-500 hover:bg-gray-600'
                                                        : 'bg-orange-500 hover:bg-orange-600' }} ">
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
                <!------ Fin 2eme Case HISTORIQUE ENGIN ------------------------------------------------------------------------------------>

            </div>
        </div>



        <div class="p-6 shadow-black/5">
            <!--- Debut Case Date ---->
            <div class="p-6 border bg-white rounded-md shadow-md mb-6">
                <div class="flex items-start justify-between mb-4">
                    <h2 class="font-medium">Infos Maintenance</h2>
                </div>

                <div class="px-4 py-2">
                    <span class="font-medium"> Date: </span> {{ $maintenanceSelectionner->date_maintenance ?? '' }}
                </div>
                <div class="px-4 py-2">
                    <span class="font-medium"> Mécanicien: </span>
                    {{ $maintenanceSelectionner->user->nom ?? '' }}
                    {{ $maintenanceSelectionner->user->prenom ?? '' }}
                </div>
            </div>
        </div>
        <!--- Fin Case Date ---->
        <div class="p-6 grid grid-cols-1 gap-6 mb-6 lg:grid-cols-2">
            <!--------------------------------------- Debut  Case Remarque   ---------------------------------------------------------------------->
            <div class="p-6 bg-white border border-gray-100 rounded-md shadow-md shadow-black/5">
                <div class="flex items-start justify-between mb-4">
                    <div class="font-medium">Remarque</div>
                </div>
                <div class="px-4 py-2">
                    <textarea id="remarque" class="w-full h-24 border border-gray-200 rounded-md" disabled>{{ $maintenanceSelectionner->remarque ?? '' }}</textarea>
                </div>
            </div>
            <!--------------------------------------- Fin  Case Remarque   ---------------------------------------------------------------------->
            <!--------------------------------------- Debut  Case Défauts   ---------------------------------------------------------------------->
            <div class="p-6 bg-white border border-gray-100 rounded-md shadow-md shadow-black/5">
                <div class="flex items-start justify-between mb-4">
                    <div class="font-medium">Défaut</div>
                </div>
                <div class="px-4 py-2">
                    <textarea id="defauts" class="w-full h-24 border border-gray-200 rounded-md" disabled>{{ $maintenanceSelectionner->defauts ?? '' }}</textarea>
                </div>
            </div>
            <!--------------------------------------- Fin  Case Défauts   ---------------------------------------------------------------------->

        </div>
        </div>

        <div class="p-6  mb-6">



            <!------ Fin  Case Remarque Defaut ------------------------------------------------------------------------------------>










        </div>
        <x-footer />

    </main>

</body>

</html>
