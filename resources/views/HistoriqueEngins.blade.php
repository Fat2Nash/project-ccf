<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Historique Clients</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Thiriot-Location | {{ Auth::user()->nom }}</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="text-gray-800 font-inter">
    <x-side-navbar />

    <div id="selectHistorique" class="flex items-center justify-center mt-10">
        <a href="./HistoriqueClients"><button
                class="border border-orange-500 rounded-l-md px-4 py-2 bg-white text-orange-500 font-medium mr-2 w-[300px]">Historique
                par client</button></a>
        <span class="mx-12"></span> <!-- Séparation supplémentaire -->
        <a href="./HistoriqueEngins"><button
                class=" border border-green-600 rounded-r-md px-4 py-2 bg-white text-green-600 font-medium ml-2 w-[300px]">Historique
                par engin</button></a>
    </div>

    <section class="flex py-1 bg-blueGray-50">
        <div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4 mx-auto mt-12">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-[1500px] mb-6 shadow-lg rounded">
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                            <h3 class="font-semibold text-base text-blueGray-700">Historique Clients</h3>
                        </div>
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                            <div class="flex justify-end items-center">
                                <div class="pt-2 pb-2 relative mx-auto text-gray-600 mr-4">
                                    <input
                                        class="border-2 border-orange-500 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                                        type="text" id="searchInput" placeholder="Rechercher...">
                                    <button type="submit" class="absolute right-0 top-0 mt-5 mr-4">
                                        <svg class="text-orange-500 h-4 w-4 fill-current"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1"
                                            x="0px" y="0px" viewBox="0 0 56.966 56.966"
                                            style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                                            width="512px" height="512px">
                                            <path
                                                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @php
                    use App\Models\Client; // Importer le modèle Client
                    $clients = Client::all(); // Récupérer tous les clients de la base de données

                    use App\Models\Engin; // Importer le modèle Engin
                    $engins = Engin::all(); // Récupérer tous les engins de la base de données

                    use App\Models\Location; // Importer le modèle Location Engin
                    $loc_engin = Location::all(); // Récupérer toutes les locations de la base de données

                    use App\Models\Cycle; // Importer le modèle cycle Engin
                    $cycle_engin = Cycle::all(); // Récupérer tous les cycles de la base de données
                @endphp

                <div class="block w-full overflow-x-auto overflow-y-auto max-h-96">
                    <table id="dataTable" class="items-center bg-transparent w-full border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid
                    border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Machine N°
                                    <button class="sort-button" onclick="sortTable(1)">↑</button>
                                    <button class="sort-button" onclick="sortTable(1, false)">↓</button>
                                </th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Marque
                                    <button class="sort-button" onclick="sortTable(2)">↑</button>
                                    <button class="sort-button" onclick="sortTable(2, false)">↓</button>
                                </th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Modèle
                                    <button class="sort-button" onclick="sortTable(3)">↑</button>
                                    <button class="sort-button" onclick="sortTable(3, false)">↓</button>
                                </th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Catégorie
                                    <button class="sort-button" onclick="sortTable(4)">↑</button>
                                    <button class="sort-button" onclick="sortTable(4, false)">↓</button>
                                </th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Engin louer le
                                    <button class="sort-button" onclick="sortTable(5)">↑</button>
                                    <button class="sort-button" onclick="sortTable(5, false)">↓</button>
                                </th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Engin rendu le
                                    <button class="sort-button" onclick="sortTable(6)">↑</button>
                                    <button class="sort-button" onclick="sortTable(6, false)">↓</button>
                                </th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Dernier démarrage
                                    <button class="sort-button" onclick="sortTable(7)">↑</button>
                                    <button class="sort-button" onclick="sortTable(7, false)">↓</button>
                                </th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Dernier arrêt
                                    <button class="sort-button" onclick="sortTable(8)">↑</button>
                                    <button class="sort-button" onclick="sortTable(8, false)">↓</button>
                                </th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Durée de fonctionnement
                                    <button class="sort-button" onclick="sortTable(9)">↑</button>
                                    <button class="sort-button" onclick="sortTable(9, false)">↓</button>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($clients as $client)
                                @foreach ($engins as $engin)
                                    @foreach ($cycle_engin as $cycle)
                                    @endforeach
                                    @php
                                        // Filtrer les locations correspondant au client et à l'engin actuel
$location = $loc_engin
    ->where('client_id', $client->id_client)
    ->where('id_engins', $engin->id_engins)
                                            ->first();
                                    @endphp
                                    @if ($location)
                                        <tr>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                {{ $engin->Num_Machine }}
                                            </td>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                {{ $engin->marque }}
                                            </td>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                {{ $engin->modele }}
                                            </td>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                {{ $engin->categorie }}
                                            </td>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                {{ $location->Louer_le }}
                                            </td>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                {{ $location->Rendu_le }}
                                            </td>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                {{ $cycle->HeureMoteurON }}
                                            </td>
                                            <td
                                                class="border-t-0 px$cycle-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                {{ $cycle->HeureMoteurOFF }}
                                            </td>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                {{ $location->Temps_fonct }}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="flex justify-between items-center px-4 py-3">
                    <button id="btnPrev" class="px-4 py-2 border border-orange-500 bg-white text-orange-500 rounded"
                        onclick="prevPage()">Previous</button>
                    <span id="pageIndicator" class="font-semibold text-gray-600 flex justify-center items-center">Page
                        1 of X</span>
                    <button id="btnNext" class="px-4 py-2 border border-orange-500 bg-white text-orange-500 rounded"
                        onclick="nextPage()">Next</button>
                </div>
            </div>
    </section>

    <x-footer />

    <script>
        let currentPage = 1;
        const rowsPerPage = 9; // Nombre de lignes par page
        const tableBody = document.querySelector('#dataTable tbody');
        const rows = Array.from(tableBody.querySelectorAll('tr'));
        const pageIndicator = document.getElementById('pageIndicator');
        const btnPrev = document.getElementById('btnPrev');
        const btnNext = document.getElementById('btnNext');
        let filteredRows = rows.slice(); // Copie des lignes initiales

        function renderTable() {
            const start = (currentPage - 1) * rowsPerPage;
            const end = start + rowsPerPage;
            tableBody.innerHTML = '';
            const displayedRows = filteredRows.slice(start, end);
            displayedRows.forEach(row => tableBody.appendChild(row));
            pageIndicator.textContent = `Page ${currentPage} of ${Math.ceil(filteredRows.length / rowsPerPage)}`;
            btnPrev.disabled = currentPage === 1;
            btnNext.disabled = currentPage === Math.ceil(filteredRows.length / rowsPerPage);
        }

        function prevPage() {
            if (currentPage > 1) {
                currentPage--;
                renderTable();
            }
        }

        function nextPage() {
            if (currentPage < Math.ceil(filteredRows.length / rowsPerPage)) {
                currentPage++;
                renderTable();
            }
        }

        // Fonction de tri des données
        function sortTable(columnIndex, ascending = true) {
            filteredRows.sort((a, b) => {
                const aValue = a.getElementsByTagName("td")[columnIndex].innerText.trim().toLowerCase();
                const bValue = b.getElementsByTagName("td")[columnIndex].innerText.trim().toLowerCase();
                return ascending ? aValue.localeCompare(bValue) : bValue.localeCompare(aValue);
            });

            currentPage = 1; // Réinitialiser à la première page après le tri
            renderTable();
        }

        document.getElementById("selectHistorique").addEventListener("change", function() {
            var selectedOption = this.options[this.selectedIndex];
            if (selectedOption.value !== "") {
                window.location.href = selectedOption.value;
            }
        });

        // Écoute des événements de saisie dans le champ de recherche
        document.getElementById("searchInput").addEventListener("input", function() {
            filterAndPaginateTable();
        });

        function filterAndPaginateTable() {
            var searchValue = document.getElementById("searchInput").value.toLowerCase();
            filteredRows = rows.filter(row => {
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
    </script>
</body>

</html>
