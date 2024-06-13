<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Balises meta pour l'encodage des caractères et la vue -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Titre de la page -->
    <title>Historique Clients</title>
    <!-- Lien vers la police de caractères externe -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Lien vers Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Titre pour l'onglet du navigateur -->
    <title>Thiriot-Location | {{ Auth::user()->nom }}</title>
    <!-- Lien vers Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Lien vers Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Lien vers Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <!-- Importation des fichiers CSS et JS avec Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="text-gray-800 font-inter">
    <!-- Utilisation de la classe text-gray-800 pour la couleur du texte et font-inter pour la police de caractères -->

    <x-side-navbar />
    <!-- Inclusion du composant de la barre de navigation latérale -->

    <div id="selectHistorique" class="flex items-center justify-center mt-10 ml-32">
        <!-- Div pour aligner les boutons -->
        <a href="./HistoriqueClients" class="relative inline-block mr-2 w-[300px]">
            <!-- Bouton pour accéder à l'historique par client -->
            <button
                class="relative font-semibold border border-orange-500 px-4 py-2 w-full bg-white text-orange-500 rounded-lg overflow-hidden transition-all duration-300 group hover:text-white">
                <span
                    class="absolute inset-0 bg-orange-500 w-0 transition-all duration-300 ease-in-out group-hover:w-full"></span>
                <!-- Animation de survol pour le bouton -->
                <span class="relative z-10">Historique par client</span>
            </button>
        </a>
        <span class="mx-32"></span> <!-- Séparation supplémentaire -->
        <!-- Lien vers l'historique par engin -->
        <a href="./HistoriqueEngins" class="relative inline-block ml-2 w-[300px]">
            <!-- Bouton pour accéder à l'historique par engin -->
            <button
                class="relative font-semibold border border-green-600 px-4 py-2 w-full bg-white text-green-600 rounded-lg overflow-hidden transition-all duration-300 group hover:text-white">
                <span
                    class="absolute inset-0 bg-green-600 w-0 transition-all duration-300 ease-in-out group-hover:w-full"></span>
                <!-- Animation de survol pour le bouton -->
                <span class="relative z-10">Historique par engin</span>
            </button>
        </a>
    </div>

    <section class="flex py-1 bg-blueGray-50">
        <div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4 mx-auto mt-12">
            <!-- Conteneur pour le tableau d'historique -->
            <div class="relative flex flex-col min-w-0 break-words bg-white w-[1500px] mb-6 shadow-inner rounded">
                <!-- En-tête du tableau -->
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <!-- Titre -->
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                            <h2 class="font-semibold text-base text-blueGray-700">Historique Clients</h2>
                        </div>
                        <!-- Champ de recherche et bouton -->
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                            <div class="flex justify-end items-center">
                                <div class="pt-2 pb-2 flex items-center mx-auto text-gray-600 mr-4">
                                    <div class="mr-4 flex items-center">
                                        <h2 class="inline-block mr-2">Filtrer par date :</h2>
                                        <!-- Sélecteur de date pour filtrer la table -->
                                        <input type="date" id="dateFilter"
                                            class="border-2 border-orange-500 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none w-48">
                                    </div>
                                    <div class="flex items-center">
                                        <h2 class="inline-block mr-2">Recherche :</h2>
                                        <!-- Champ de saisie pour la recherche -->
                                        <div class="relative">
                                            <input
                                                class="border-2 border-orange-500 bg-transparent h-10 px-5 rounded-lg text-sm focus:outline-none pr-10"
                                                type="text" id="searchInput" placeholder="Rechercher...">
                                            <!-- Icône de la loupe -->
                                            <svg class="text-orange-500 absolute right-3 top-3 h-4 w-4 fill-current pointer-events-none"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1"
                                                x="0px" y="0px" viewBox="0 0 56.966 56.966"
                                                style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                                                width="512px" height="512px">
                                                <path
                                                    d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                                            </svg>
                                        </div>
                                    </div>
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

                    use App\Models\Location; // Importer le modèle Location
                    $loc_engin = Location::all(); // Récupérer tous les locations de la base de données

                    // Importer la bibliothèque Carbon pour une manipulation pratique des dates et heures.
                    use Carbon\Carbon;
                @endphp

                <div class="block w-full overflow-x-auto">
                    <!-- Utilisation de block pour afficher la table avec un défilement horizontal -->
                    <table id="dataTable" class="items-center w-full bg-transparent border-collapse">
                        <!-- Utilisation d'une table pour afficher les données -->
                        <thead class="thead-light">
                            <!-- Entête de la table -->
                            <tr>
                                <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                    data-column="nom">Nom
                                    <button class="sort-button" onclick="sortTable(0)">↑</button>
                                    <button class="sort-button" onclick="sortTable(0, false)">↓</button>
                                </th>
                                <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                    data-column="prenom">Prenom
                                    <button class="sort-button" onclick="sortTable(1)">↑</button>
                                    <button class="sort-button" onclick="sortTable(1, false)">↓</button>
                                </th>
                                <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                    data-column="numero_machine">Machine N°
                                    <button class="sort-button" onclick="sortTable(2)">↑</button>
                                    <button class="sort-button" onclick="sortTable(2, false)">↓</button>
                                </th>
                                <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                    data-column="marque">Marque de l'engin
                                    <button class="sort-button" onclick="sortTable(3)">↑</button>
                                    <button class="sort-button" onclick="sortTable(3, false)">↓</button>
                                </th>
                                <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                    data-column="modele">Modele de l'engin
                                    <button class="sort-button" onclick="sortTable(4)">↑</button>
                                    <button class="sort-button" onclick="sortTable(4, false)">↓</button>
                                </th>
                                <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                    data-column="categorie">Catégorie de l'engin
                                    <button class="sort-button" onclick="sortTable(5)">↑</button>
                                    <button class="sort-button" onclick="sortTable(5, false)">↓</button>
                                </th>
                                <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                    data-column="louer">Engin louer le
                                    <button class="sort-button" onclick="sortTable(6)">↑</button>
                                    <button class="sort-button" onclick="sortTable(6, false)">↓</button>
                                </th>
                                <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                    data-column="rendu">Engin rendu le
                                    <button class="sort-button" onclick="sortTable(7)">↑</button>
                                    <button class="sort-button" onclick="sortTable(7, false)">↓</button>
                                </th>
                            </tr>
                            <!-- Fin de la ligne de l'entête -->
                        </thead>
                        <!-- Fin de l'entête de la table -->
                        <tbody>
                            <!-- Corps de la table -->
                            @foreach ($clients as $client)
                                <!-- Boucle sur la collection de clients -->
                                @foreach ($engins as $engin)
                                    <!-- Boucle sur la collection d'engins -->
                                    @php
                                        // Recherche de la location correspondante
                                        $location = $loc_engin
                                            ->where('client_id', $client->id_client)
                                            ->where('id_engins', $engin->id_engins)
                                            ->first();
                                    @endphp
                                    <!-- Utilisation de la directive PHP pour trouver la location correspondante -->
                                    @if ($location)
                                        <!-- Vérification de l'existence de la location -->
                                        <tr>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                {{ $client->nom }}</td>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                {{ $client->prenom }}</td>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                {{ $engin->Num_Machine }}</td>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                {{ $engin->marque }}</td>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                {{ $engin->modele }}</td>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                {{ $engin->categorie }}</td>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                {{ \Carbon\Carbon::parse($location->Louer_le)->locale('fr')->isoFormat('DD MMMM YYYY HH:mm') }}</td>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                {{ \Carbon\Carbon::parse($location->Rendu_le)->locale('fr')->isoFormat('DD MMMM YYYY HH:mm') }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="flex justify-between items-center px-4 py-3">
                    <!-- Div pour les boutons de pagination -->
                    <button id="btnPrev" class="px-4 py-2 border border-orange-500 bg-white text-orange-500 rounded"
                        onclick="prevPage()">Previous</button>
                    <!-- Bouton pour la page précédente -->
                    <span id="pageIndicator" class="font-semibold text-gray-600 flex justify-center items-center">Page
                        1 of X</span>
                    <!-- Indicateur de page -->
                    <button id="btnNext" class="px-4 py-2 border border-orange-500 bg-white text-orange-500 rounded"
                        onclick="nextPage()">Next</button>
                    <!-- Bouton pour la page suivante -->
                </div>
                <!-- Fin de la div pour les boutons de pagination -->
            </div>
            <!-- Fin de la div pour le contenu de la section -->
    </section>

    <x-footer />
    <!-- Inclusion du composant de pied de page -->

    <script>
        let currentPage = 1;
        const rowsPerPage = 9; // Nombre de lignes par page
        const tableBody = document.querySelector('#dataTable tbody');
        const rows = Array.from(tableBody.querySelectorAll('tr'));
        const pageIndicator = document.getElementById('pageIndicator');
        const btnPrev = document.getElementById('btnPrev');
        const btnNext = document.getElementById('btnNext');
        let filteredRows = rows.slice(); // Copie des lignes initiales
        // Sélectionne l'élément du sélecteur de date
        const dateFilter = document.getElementById("dateFilter");
        const formattedDate = formatDate(dateFilter);

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

        // Fonction pour passer à la page précédente
        function prevPage() {
            if (currentPage > 1) {
                currentPage--;
                renderTable();
            }
        }

        // Fonction pour passer à la page suivante
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

        // Ajoute un écouteur d'événement pour détecter les changements dans la sélection de l'historique
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

        // Fonction pour filtrer et paginer la table en fonction de la saisie de recherche
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

        // Fonction pour formater la date en format français
        function formatDate(dateFilter) {
            var date = new Date(dateFilter);
            var options = { year: 'numeric', month: 'long', day: '2-digit'};
            return date.toLocaleDateString('fr-FR', options);
        }

        // Ajoute un écouteur d'événement pour détecter les changements dans le sélecteur de date
        dateFilter.addEventListener("change", function() {
            // Récupère la valeur de la date sélectionnée
            const selectedDate = this.value;

            // Vérifie si une date est sélectionnée
            if (selectedDate) {
                // Convertit la date sélectionnée en format français avec formatDate
                const formattedDate = formatDate(selectedDate);

                // Filtre les lignes de la table en fonction de la date sélectionnée dans les colonnes "Engin louer" et "Engin rendu"
                filteredRows = rows.filter(row => {
                    // Récupère le texte des cellules dans les colonnes "Engin louer" et "Engin rendu"
                    const louerLe = row.cells[6].textContent.trim(); // Indice 4 pour la colonne "Engin louer"
                    const renduLe = row.cells[7].textContent.trim(); // Indice 5 pour la colonne "Engin rendu"

                    // Vérifie si l'une des colonnes contient la date sélectionnée
                    return louerLe.includes(formattedDate) || renduLe.includes(formattedDate);
                });
            } else {
                // Si aucune date n'est sélectionnée, affiche toutes les lignes
                filteredRows = rows.slice();
            }

            // Réinitialise la pagination à la première page
            currentPage = 1;

            // Affiche la table filtrée et paginée
            renderTable();
        });
    </script>

</body>

</html>
