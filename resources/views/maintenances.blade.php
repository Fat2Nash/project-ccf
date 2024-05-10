<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thiriot-Location | Suivie Maintenance</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="text-gray-800 font-inter">


    @php
        use App\Models\Maintenance; // Importer le modèle Maintenance

        $maintenances = Maintenance::all(); // Récupérer toutes les données des maintenances

    @endphp

    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
        <x-side-navbar />
        <div class="m-5"><!-- component -->
            <section class="container px-4 mx-auto">

                <div class="flex flex-col mt-6">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden border border-gray-200 md:rounded-lg">

                                <div class="flex items-center justify-between mb-6">
                                    <h2 class="font-semibold text-4xl"> Suivie Maintenance</h2>

                                    <a href="/nouvelle-maintenance">
                                        <button
                                            class="flex justify-center w-1/2 px-5 py-2 text-sm text-white transition-colors duration-200 bg-orange-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-orange-600">

                                            <span>Nouvelle Maintenance</span>
                                        </button>
                                    </a>
                                </div>

                                <table class="min-w-full divide-y divide-gray-200 ">
                                    <thead class="bg-gray-50 ">
                                        <tr>
                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-bold text-left rtl:text-right text-gray-500 ">
                                                N° Maintenance
                                            </th>

                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-bold text-left rtl:text-right text-gray-500 ">
                                                Engin
                                            </th>



                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-bold text-left rtl:text-right text-gray-500 ">
                                                Date
                                            </th>



                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-bold text-left rtl:text-right text-gray-500 ">
                                                Mécanicien
                                            </th>

                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-bold text-left rtl:text-right text-gray-500 ">
                                                Détails
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 ">
                                        <tr>
                                            @foreach ($maintenances as $maintenance)
                                                <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">

                                                    <p class="font-medium text-gray-800 ">
                                                        {{ $maintenance->id_maintenance }}
                                                    </p>


                                                </td>

                                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                    @php
                                                        $engin = $maintenance->engin;
                                                    @endphp
                                                    <p class="text-gray-800 font-medium">
                                                        {{ $maintenance->id_engin }}
                                                    </p>
                                                    <p class=" text-gray-800 ">{{ $engin->categorie }} /
                                                        {{ $engin->marque }}


                                                    </p>

                                                </td>
                                                <td class="px-4 py-4 text-sm whitespace-nowrap">

                                                    <p class="text-gray-800 ">
                                                        {{ $maintenance->date_maintenance }}
                                                    </p>

                                                </td>
                                                @php
                                                    $user = $maintenance->user;
                                                @endphp
                                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                    <p class="text-gray-800 ">
                                                        {{ $user->nom }} {{ $user->prenom }}
                                                    </p>
                                                </td>

                                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                    <a href="/maintenances/{{ $maintenance->id_maintenance }}">
                                                        <button
                                                            class="flex justify-center w-1/2 px-5 py-2 text-sm text-white transition-colors duration-200 bg-orange-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-orange-600">

                                                            <span>Détails</span>
                                                        </button>
                                                    </a>
                                                </td>
                                        </tr>

                                        <!-- Vous pouvez accéder aux autres attributs du produit de la même manière -->
                                        @endforeach



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- ------------------------------------------------------------------------------------------------------------ --}}

                {{-- <div class="mt-6 sm:flex sm:items-center sm:justify-between ">
                    <div class="text-sm text-gray-500 ">
                        Page <span class="font-medium text-gray-700 ">1 </span>sur<span
                            class="font-medium text-gray-700 "> 10</span>
                    </div> --}}



                {{-- <div class="flex items-center mt-4 gap-x-4 sm:mt-0">
                        <a href="#"
                            class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                            </svg>

                            <span>
                                Précédent
                            </span>
                        </a>

                        <a href="#"
                            class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 ">
                            <span>
                                Suivant
                            </span>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                            </svg>
                        </a>
                    </div> --}}
                {{-- </div> --}}
                {{-- ------------------------------------------------------------------------------------------------------------ --}}

            </section>
        </div>

    </main>
