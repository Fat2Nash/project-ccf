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

                <!--------------------------------------- 1ere case Infos Engin  ---------------------------------------------------------------------->
                <div class="p-6 bg-white border border-gray-100 rounded-md shadow-md shadow-black/5">
                    <div class="flex items-start justify-between mb-4">
                        <div class="font-medium">Infos de l'engin</div>
                    </div>

                    <table class="w-full min-w-[540px]">
                        <tbody>
                            @php
                                use App\Models\Engin; // Importer le modèle Engin
                                use App\Models\Location; // Importer le modèle locztion
                                $engins = Engin::all(); // Récupérer toute les donnée des engin
                                $Locations = Location::all(); // Récupérer toutes les donnée de locations
                            @endphp
                            <!-- Debut Categorie engin --------------------------->
                            <tr>
                                <td class="px-4 py-2 border-b border-b-gray-50">
                                    <div class="flex items-center">
                                        <span class="ml-2 text-sm font-medium text-gray-600 truncate">Categorie</span>
                                    </div>
                                </td>
                                <td class="px-4 py-2 border-b border-b-gray-50">
                                    <span class="text-[13px] font-medium text-gray-400">Modele de
                                        l'engin</span>
                                </td>
                            </tr>
                            <!-- fin Categorie engin ----------------------------------->


                            <!-- Debut Marque engin ------------------------------>
                            <tr>
                                <td class="px-4 py-2 border-b border-b-gray-50">
                                    <div class="flex items-center">
                                        <span class="ml-2 text-sm font-medium text-gray-600 truncate">Marque</span>
                                    </div>
                                </td>
                                <td class="px-4 py-2 border-b border-b-gray-50">
                                    <span class="text-[13px] font-medium text-gray-400">marque de
                                        l'engin</span>
                                </td>
                            </tr>
                            <!-- Fin Marque engin ------------------------->

                            <!-- Debut Modele engin ----------------------------->
                            <tr>
                                <td class="px-4 py-2 border-b border-b-gray-50">
                                    <div class="flex items-center">
                                        <span class="ml-2 text-sm font-medium text-gray-600 truncate">Modele</span>
                                    </div>
                                </td>
                                <td class="px-4 py-2 border-b border-b-gray-50">
                                    <span class="text-[13px] font-medium text-gray-400">Modele de
                                        l'engin</span>
                                </td>
                            </tr>
                            <!-- fin Modele engin --------------------------->

                            <!-- Debut compteur heure ----------------------------------->
                            <tr>
                                <td class="px-4 py-2 border-b border-b-gray-50">
                                    <div class="flex items-center">
                                        <span class="ml-2 text-sm font-medium text-gray-600 truncate">compteur
                                            heure</span>
                                    </div>
                                </td>
                                <td class="px-4 py-2 border-b border-b-gray-50">
                                    <span class="text-[13px] font-medium text-gray-400">compteur_heure</span>
                                </td>
                            </tr>
                            <!-- fin compteur heure ---------------------------------->

                            <!-- Debut Status engin ---------------------------------------->
                            <tr>
                                <td class="px-4 py-2 border-b border-b-gray-50">
                                    <div class="flex items-center">
                                        <span class="ml-2 text-sm font-medium text-gray-600 truncate">Status</span>
                                    </div>
                                </td>
                                <td class="px-4 py-2 border-b border-b-gray-50">
                                    <span class="text-[13px] font-medium text-gray-400">Louer ou
                                        non</span>
                                </td>
                            </tr>

                            <!-- fin Status engin ---------------------------------------->
                            <!-- Debut description Engin ---------------------------------------->
                            <tr>
                                <td class="px-4 py-2 border-b border-b-gray-50">
                                    <div class="flex items-center">
                                        <span href="#"
                                            class="ml-2 text-sm font-medium text-gray-600 truncate">Description</span>
                                    </div>
                                </td>
                                <td class="px-4 py-2 border-b border-b-gray-50">
                                    <span class="text-[13px] font-medium text-gray-400">description de
                                        l'appareil</span>
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
                            <tbody>

                                <!-- Debut Historique 1 -->
                                <tr>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <a href="#"
                                                class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">
                                                id_mecanicien
                                            </a>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <span class="text-[13px] font-medium text-gray-400">date_maintenance</span>
                                    </td>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <span class="text-[13px] font-medium text-gray-400">Heure?</span>
                                    </td>
                                </tr>
                                <!-- Fin  Historique Maintenance-->
                                <!-- Debut Historique 2 -->
                                <tr>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <a href="#"
                                                class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">
                                                id_mecanicien
                                            </a>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <span class="text-[13px] font-medium text-gray-400">date_maintenance</span>
                                    </td>
                                    <td class="px-4 py-2 border-b border-b-gray-50">
                                        <span class="text-[13px] font-medium text-gray-400">Heure?</span>
                                    </td>
                                </tr>
                                <!-- Fin 2eme Historique -->
                            </tbody>
                        </table>
                    </div>
                </div>


                </tbody>
                </table>
            </div>
        </div>
        </div>
        <!------ Fin 2eme Case HISTORIQUE ENGIN ------------------------------------------------------------------------------------>

        <!------ Debut Case Remarque Defaut ------------------------------------------------------------------------------------>

        <!--- Debut Case Remarque ---->
        <div class="p-6 shadow-black/5 mb-6">
            <div class="p-6 border bg-white rounded-md shadow-md mb-6">
                <div class="flex items-start justify-between mb-4">
                    <div class="font-medium">Remarque</div>
                </div>
                <div class="px-4 py-2">
                    <textarea id="remarque" class="w-full h-24 border border-gray-200 rounded-md"></textarea>
                </div>
            </div>
            <!--- Fin Case Remarque ---->

            <!--- Debut Case Defaut ---->
            <div class="p-6 border bg-white rounded-md shadow-md mb-6">
                <div class="flex items-start justify-between mb-4">
                    <div class="font-medium">Défaut</div>
                </div>
                <div class="px-4 py-2">
                    <textarea id="defaut" class="w-full h-24 border border-gray-200 rounded-md"></textarea>
                </div>
            </div>
        </div>
        <!--- Fin Case Defaut ---->

        <!------ Fin  Case Remarque Defaut ------------------------------------------------------------------------------------>
        <!------ Debut case date/valider ------------------------------------------------------------------------------------>
        <div class="max-w-screen-lg mx-auto">
            <div class="p-4 bg-white border border-gray-300 rounded-md shadow-md mb-6">
                <div class="font-medium">Choisir une date :</div>
                <input id="date-picker" type="date"
                    class="mt-2 border border-gray-300 rounded-md focus:outline-none">
                <button id="valider-btn"
                    class="px-3 py-1 mt-4 bg-blue-500 text-white rounded-md shadow-md hover:bg-blue-600">Valider</button>
            </div>
        </div>
        <!------ Fin case date/valider ------------------------------------------------------------------------------------>

        <script>
            // Sélection de l'élément input pour la date
            const datePicker = document.getElementById('date-picker');
            // Sélection du bouton Valider
            const validerBtn = document.getElementById('valider-btn');

            // Ajout d'un écouteur d'événement au clic sur le bouton Valider
            validerBtn.addEventListener('click', function() {
                // Récupérer la valeur de la date sélectionnée
                const selectedDate = datePicker.value;
                // Afficher la date sélectionnée dans la console (vous pouvez la traiter comme vous le souhaitez ici)
                console.log(selectedDate);
            });
        </script>






        </div>
        <x-footer />

    </main>

</body>

</html>
