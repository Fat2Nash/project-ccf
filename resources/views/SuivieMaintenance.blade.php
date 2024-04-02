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
                        <div class="font-medium">Infos de l'engin</div>
                    </div>
                   <!-- <div class="overflow-auto max-h-[540px]">  Utilisation de overflow-auto pour activer le défilement -->
                        <table class="w-full min-w-[540px]">
                            <tbody>

                                <!-- Debut Categorie engin --------------------------->
                        <tr>
                            <td class="px-4 py-2 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <a href="#" class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">Categorie</a>
                                </div>
                            </td>
                            <td class="px-4 py-2 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">Modele de l'engin</span>
                            </td>
                        </tr>
                        <!-- fin Categorie engin ----------------------------------->

                        <!-- Debut Marque engin ------------------------------>
                        <tr>
                            <td class="px-4 py-2 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <a href="#" class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">Marque</a>
                                </div>
                            </td>
                            <td class="px-4 py-2 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">marque de l'engin</span>
                            </td>
                        </tr>
                        <!-- Fin Marque engin ------------------------->

                        <!-- Debut Modele ----------------------------->
                        <tr>
                            <td class="px-4 py-2 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <a href="#" class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">Modele</a>
                                </div>
                            </td>
                            <td class="px-4 py-2 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">Modele de l'engin</span>
                            </td>

                        </tr>
                        <!-- fin Modele engin --------------------------->

<!-- Debut compteur heure ----------------------------------->
<tr>
    <td class="px-4 py-2 border-b border-b-gray-50">
        <div class="flex items-center">
            <a href="#" class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">compteur heure</a>
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
            <a href="#" class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">Status</a>
        </div>
    </td>
    <td class="px-4 py-2 border-b border-b-gray-50">
        <span class="text-[13px] font-medium text-gray-400">Louer ou non</span>
    </td>
</tr>
<!-- fin Status engin ---------------------------------------->
<tr>
    <td class="px-4 py-2 border-b border-b-gray-50">
        <div class="flex items-center">
            <a href="#" class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">Description</a>
        </div>
    </td>
    <td class="px-4 py-2 border-b border-b-gray-50">
        <span class="text-[13px] font-medium text-gray-400">description de l'appareil</span>
    </td>
</tr>

                            </tbody>
                        </table>
                    </div>
<!------ Fin 1er Case Infos ENGIN ------------------------------------------------------------------------------------>


                    <div class="p-6 bg-white border border-gray-100 rounded-md shadow-md shadow-black/5">
                        <div class="flex items-start justify-between mb-4">
                            <div class="font-medium">Historique de maintenance</div>
                        </div>
                        <div class="overflow-auto max-h-[200px]"> <!--  overflow-auto pour  le défilement -->
                            <table class="w-full min-w-[540px]">
                                <tbody>

                                   <!-- Debut Historique 1 -->
    <tr>
        <td class="px-4 py-2 border-b border-b-gray-50">
            <div class="flex items-center">
                <a href="#" class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">
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
    <!-- Fin 1er Historique -->
<!-- Debut Historique 2 -->
<tr>
    <td class="px-4 py-2 border-b border-b-gray-50">
        <div class="flex items-center">
            <a href="#" class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">
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
<!-- Remarque et defauts
    <tr>
    <td class="px-4 py-2 border-b border-b-gray-50">
        <div class="flex items-center">
            <a href="#" class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">Remarque</a>
        </div>
    </td>
    <td class="px-4 py-2 border-b border-b-gray-50">
        <span class="text-[13px] font-medium text-gray-400">remarque sur l'appareil</span>
    </td>
</tr>

<tr>
    <td class="px-4 py-2 border-b border-b-gray-50">
        <div class="flex items-center">
            <a href="#" class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">Defauts</a>
        </div>
    </td>
    <td class="px-4 py-2 border-b border-b-gray-50">
        <span class="text-[13px] font-medium text-gray-400">Defauts de l'engin</span>
    </td>
</tr>
--->

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
                </div>



                <x-footer />

            </main>

        </body>

        </html>
