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
                                    <h2 class="text-4xl font-semibold"> Suivie Maintenance</h2>
                                    {{-- ---bouton nouvelle maintenance --------------------------------------------------------------- --}}
                                    <a href="/nouvelle-maintenance">
                                        <button
                                            class="flex justify-center w-1/2 px-5 py-2 text-sm text-white transition-colors duration-200 bg-orange-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-orange-600">

                                            <span>Nouvelle Maintenance</span>
                                        </button>
                                    </a>
                                    {{-- ---bouton nouvelle maintenance --------------------------------------------------------------- --}}


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
                                                    <p class="font-medium text-gray-800">
                                                        N° {{ $engin->Num_Machine }}
                                                    </p>
                                                    <p class="text-gray-800 ">{{ $engin->categorie }} /
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
                                        @endforeach
                                        <script>
                                            document.getElementById("selectHistorique").addEventListener("change", function() {
                                                var selectedOption = this.options[this.selectedIndex];
                                                if (selectedOption.value !== "") {
                                                    window.location.href = selectedOption.value;
                                                }
                                            });
                                        </script>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- ------------------------------------------------------------------------------------------------------------ --}}
            </section>
        </div>

    </main>
