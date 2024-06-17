<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thiriot-Location | Notifications</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css">
    <style>
        /* Ajoutez ici vos styles CSS personnalisés si nécessaire */
    </style>
</head>

<body class="text-gray-800 font-inter bg-gray-100">

    @php
        use App\Models\Alerte;
        use App\Models\TypeAlerte;

        // Filtrer les alertes avec le statut "Maintenance à effectuer"
        $alertes = Alerte::where('status', 'Maintenance à effectuer')->get();
    @endphp

    <main class="min-h-screen flex flex-col lg:flex-row">

        <!-- Barre de navigation latérale -->
        <x-side-navbar />

        <!-- Contenu principal -->
        <div class="flex-1 p-5">

            <section class="container mx-auto">

                <div class="flex flex-col mt-6">

                    <!-- Titre de la page -->
                    <div class="mb-6">
                        <h2 class="text-2xl font-semibold">Notifications</h2>
                    </div>


                    <!-- Tableau des notifications -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 bg-white shadow-md rounded-lg">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-4 py-3 text-sm font-bold text-left text-gray-500">
                                        N° Notif
                                    </th>
                                    <th scope="col" class="px-4 py-3 text-sm font-bold text-left text-gray-500">
                                        Engin
                                    </th>
                                    <th scope="col" class="px-4 py-3 text-sm font-bold text-left text-gray-500">
                                        Date
                                    </th>
                                    <th scope="col" class="px-4 py-3 text-sm font-bold text-left text-gray-500">
                                        Alerte
                                    </th>
                                    <th scope="col" class="px-4 py-3 text-sm font-bold text-left text-gray-500">
                                        Statut de l'engin
                                    </th>
                                    <th scope="col" class="px-4 py-3 text-sm font-bold text-left text-gray-500">
                                        Faire la maintenance
                                    </th>
                                    <th scope="col" class="px-4 py-3 text-sm font-bold text-left text-gray-500">
                                        Supprimer Notification
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200">
                                @foreach ($alertes as $alerte)
                                    <tr>
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
                                            <p class="text-gray-800">
                                                {{ $engin ? $engin->statut : 'N/A' }}
                                            </p>
                                        </td>

                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                            <a href="/nouvelle-maintenance/{{ $alerte->id_engin }}">
                                                <button
                                                    class="px-4 py-2 text-sm text-white bg-orange-500 rounded-lg hover:bg-orange-600">
                                                    Faire la Maintenance
                                                </button>
                                            </a>
                                        </td>

                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                            <form action="{{ route('update_status_alerte') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="alerte_id" value="{{ $alerte->id_alerte }}">
                                                <button type="submit"
                                                    class="px-4 py-2 text-sm text-white bg-red-500 rounded-lg hover:bg-red-600"
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
            </section>
        </div>
    </main>

</body>

</html>
