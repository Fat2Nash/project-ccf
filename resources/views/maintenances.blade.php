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

        $maintenances = Maintenance::orderBy('date_maintenance', 'desc')->get(); // Récupérer toutes les maintenances triées par date décroissante
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
                                    <h2 class="text-4xl font-semibold">Suivie Maintenance</h2>
                                    <a href="/nouvelle-maintenance">
                                        <button
                                            class="flex justify-center w-1/2 px-5 py-2 text-sm text-white transition-colors duration-200 bg-orange-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-orange-600">
                                            <span>Nouvelle Maintenance</span>
                                        </button>
                                    </a>
                                    {{-- ---bouton nouvelle maintenance --------------------------------------------------------------- --}}

                                    {{-- ---RECHERCHE  --------------------------------------------------------------- --}}
                                    <input
                                        class="h-10 px-5 pr-16 text-sm bg-white border-2 border-orange-500 rounded-lg focus:outline-none"
                                        type="text" id="searchInput" placeholder="Rechercher...">
                                    <button type="submit" class="absolute top-0 right-0 mt-5 mr-4">
                                        <svg class="w-4 h-4 text-orange-500 fill-current"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1"
                                            x="0px" y="0px" viewBox="0 0 56.966 56.966"
                                            style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                                            width="512px" height="512px">
                                            <path
                                                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23
                                                 s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92
                                                  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                                        </svg>
                                    </button>

                                    {{-- ---RECHERCHE  --------------------------------------------------------------- --}}
                                </div>

                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-bold text-left rtl:text-right text-gray-500">
                                                N° Maintenance
                                            </th>
                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-bold text-left rtl:text-right text-gray-500">
                                                Engin
                                            </th>
                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-bold text-left rtl:text-right text-gray-500">
                                                Date
                                            </th>
                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-bold text-left rtl:text-right text-gray-500">
                                                Mécanicien
                                            </th>
                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-bold text-left rtl:text-right text-gray-500">
                                                Détails
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($maintenances as $maintenance)
                                            <tr>
                                                <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                    <p class="font-medium text-gray-800">
                                                        {{ $maintenance->id_maintenance }}
                                                    </p>
                                                </td>
                                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                    @php
                                                        $engin = $maintenance->engin;
                                                    @endphp
                                                    <p class="font-medium text-gray-800">
                                                        N° {{ $maintenance->id_engin }}
                                                    </p>
                                                    <p class="text-gray-800">{{ $engin->categorie }} /
                                                        {{ $engin->marque }}</p>
                                                </td>
                                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                    <p class="text-gray-800">
                                                        {{ $maintenance->date_maintenance }}
                                                    </p>
                                                </td>
                                                @php
                                                    $user = $maintenance->user;
                                                @endphp
                                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                    <p class="text-gray-800">
                                                        {{ $user->nom }} {{ $user->prenom }}
                                                    </p>
                                                </td>
                                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                    <a href="/maintenances/{{ $maintenance->id_maintenance }}">
                                                        <button
                                                            class="px-4 py-2 text-sm text-white bg-orange-500 rounded-lg hover:bg-orange-600">
                                                            Détails
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <script document.getElementById("selectHistorique").addEventListener("change", function() { var
                                            selectedOption=this.options[this.selectedIndex]; if (selectedOption.value !=="" ) {
                                            window.location.href=selectedOption.value; } }); // Écoute des événements de saisie dans le champ de recherche
                                            document.getElementById("searchInput").addEventListener("input", function() { filterAndPaginateTable(); }); function
                                            filterAndPaginateTable() { var searchValue=document.getElementById("searchInput").value.toLowerCase();
                                            filteredRows=rows.filter(row=>
                                            {
                                                const cells = Array.from(row.getElementsByTagName("td"));
                                                return cells.some(cell => cell.textContent.toLowerCase().includes(searchValue));
                                            });

                                            // Mise à jour de la pagination
                                            currentPage = 1; // Réinitialiser la pagination à la page 1
                                            renderTable();
                                            }

                                            // Appel à la fonction renderTable() une fois que la page est chargée
                                            document.addEventListener("DOMContentLoaded", function() {
                                                renderTable();
                                            });



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

            </section>
        </div>
    </main>

</body>

</html>
