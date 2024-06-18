<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thiriot-Location | Notifications</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <!-- Inclusion de Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Inclusion de Alpine.js pour la gestion des interactions -->
    <script src="//unpkg.com/alpinejs"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        function removeNotification(element) {
            element.closest('tr').remove();
        }
    </script>
</head>

<body class="text-gray-800 font-inter">

    @php
        use App\Models\Alerte;
        use App\Models\typealerte;

        // Filtrer les alertes avec le statut "Maintenance à effectuer"
        $alertes = Alerte::where('status', 'Maintenance à effectuer')->get();
    @endphp

    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
        <x-side-navbar />
        <div class="m-5">
            <section class="container px-4 mx-auto">

                <div class="flex flex-col mt-6">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden border border-gray-200 md:rounded-lg">

                                <div class="flex items-center justify-between mb-6">
                                    <h2 class="font-semibold text-4xl"> Notifications</h2>
                                </div>

                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-bold text-left text-gray-500">
                                                N° Notif
                                            </th>
                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-bold text-left text-gray-500">
                                                Engin
                                            </th>
                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-bold text-left text-gray-500">
                                                Date
                                            </th>
                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-bold text-left text-gray-500">
                                                Alerte
                                            </th>
                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-bold text-left text-gray-500">
                                                Faire la maintenance
                                            </th>
                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-bold text-left text-gray-500">
                                                Supprimer Notification
                                            </th>
                                        </tr>
                                    </thead>


                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($alertes as $alerte)
                                            <tr>
                                                {{-- --------------------colonne ID de l'alerte --------------------------------------------------------------------------- --}}
                                                <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                    <p class="font-medium text-gray-800">
                                                        {{ $alerte->id_alerte }}
                                                    </p>
                                                </td>

                                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                    @php
                                                        $engin = $alerte->engin;
                                                    @endphp
                                                    <p class="text-gray-800 font-medium">
                                                        N° {{ $alerte->id_engin }}
                                                    </p>
                                                    <p class="text-gray-800">
                                                        {{ $engin ? $engin->categorie . ' / ' . $engin->marque : 'N/A' }}
                                                    </p>
                                                </td>
                                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                    <p class="text-gray-800">
                                                        {{ $alerte->date_alerte }}
                                                    </p>
                                                </td>
                                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                    @php
                                                        $typeAlerte = $alerte->typeAlerte;
                                                    @endphp
                                                    <p class="text-gray-800">
                                                        {{ $typeAlerte ? $typeAlerte->nom_alerte : 'N/A' }}
                                                    </p>
                                                    <p class="text-gray-800">
                                                        {{ $typeAlerte ? $typeAlerte->description : 'N/A' }}
                                                    </p>
                                                </td>
                                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                    <a href="/nouvelle-maintenance/{{ $alerte->id_engin }}">
                                                        <button
                                                            class="flex justify-center w-1/2 px-5 py-2 text-sm text-white transition-colors duration-200 bg-orange-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-orange-600">
                                                            <span>Faire la Maintenance</span>
                                                        </button>
                                                    </a>
                                                </td>
                                                <td class="px-4 py-4 text-sm whitespace-nowrap">

                                                    <form action="{{ route('update_status_alerte') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="alerte_id"
                                                            value="{{ $alerte->id_alerte }}">
                                                        <button type="submit"
                                                            class="px-4 py-2 text-sm text-white bg-red-500 rounded hover:bg-red-600"
                                                            onclick="return confirm('Êtes-vous sûr de vouloir marquer cette maintenance comme effectuée ?')">
                                                            Supprimer
                                                        </button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

</body>

</html>
