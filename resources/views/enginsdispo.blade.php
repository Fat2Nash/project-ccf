<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thiriot-Location | Engins disponibles</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="text-gray-800 font-inter">
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
        <x-side-navbar />
        <div class="m-5">
            <!-- component -->
            <section class="container px-4 mx-auto">
                <div class="flex flex-col mt-6">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="border border-gray-200">
                                <table class="relative min-w-full overflow-y-auto divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-4 py-3.5 text-sm font-bold text-left rtl:text-right text-gray-500">
                                                Identification
                                            </th>
                                            <th scope="col" class="px-4 py-3.5 text-sm font-bold text-left rtl:text-right text-gray-500">
                                                Maintenance
                                            </th>
                                            <th scope="col" class="px-4 py-3.5 text-sm font-bold text-left rtl:text-right text-gray-500">
                                                Information
                                            </th>
                                            <th scope="col" class="px-4 py-3.5 text-sm font-bold text-left rtl:text-right text-gray-500">
                                                Description
                                            </th>
                                            <th scope="col" class="relative py-3.5 px-4">
                                                <span class="sr-only">Modifier</span>
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($enginsdispo as $engin)
                                            <tr>
                                                <td class="px-4 py-4 overflow-auto text-sm font-medium whitespace-nowrap">
                                                    <div>
                                                        <h2 class="font-medium text-gray-800">{{ $engin->modele }}</h2>
                                                        <p class="text-sm font-normal text-gray-600">{{ $engin->marque }}</p>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                    <div>
                                                        <h4 class="text-gray-700">Disponible</h4>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                    <div>
                                                        <h4 class="text-gray-700">{{ $engin->statut }}</h4>
                                                        <p class="text-gray-500">
                                                            <?php
                                                            // Convertir les secondes en heures et minutes
                                                            $secondes = $engin->compteur_heures;
                                                            $heures = floor($secondes / 3600);
                                                            $minutes = floor(($secondes % 3600) / 60);
                                                            ?>
                                                            {{ $heures }} heures {{ $minutes }} minutes
                                                        </p>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-4 text-sm whitespace-nowrap ">
                                                    <div>
                                                        <p class="text-gray-700">{{ $engin->description }}</p>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-4 text-xl whitespace-nowrap">
                                                    <button title="Modifier l'engin">
                                                        <i class='bx bx-pencil'></i>
                                                    </button>
                                                    <button title="Supprimer l'engin">
                                                        <i class='bx bx-trash text-red-500'></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-6 sm:flex sm:items-center sm:justify-between">
                    <div class="text-sm text-gray-500">
                        Page <span class="font-medium text-gray-700">1</span> sur <span class="font-medium text-gray-700">10</span>
                    </div>
                    <div class="flex items-center mt-4 gap-x-4 sm:mt-0">
                        <a href="#" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                            </svg>
                            <span>Précédent</span>
                        </a>
                        <a href="#" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2">
                            <span>Suivant</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </main>
</body>

</html>
