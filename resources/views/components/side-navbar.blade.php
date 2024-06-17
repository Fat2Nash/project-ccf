    <!--sidenav -->
    <div class="fixed top-0 left-0 z-50 w-64 h-full p-4 overflow-y-scroll transition-transform bg-white sidebar-menu">
        <a href="#" class="flex items-center pb-4 border-b border-b-gray-800">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thiriot-Location | Notifications</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        function removeNotification(element) {
            element.closest('tr').remove();
        }

        document.addEventListener('DOMContentLoaded', function() {
            const links = document.querySelectorAll('#sidebar-menu a[data-link]');
            const sidebar = document.querySelector('.sidebar-menu');
            const overlay = document.querySelector('.sidebar-overlay');
            const sidebarToggle = document.querySelector('.sidebar-toggle');

            // Highlight the active link on page load based on the current URL
            const currentPath = window.location.pathname;
            let activeLink = null;

            links.forEach(link => {
                const linkPath = link.getAttribute('href');
                if (linkPath === currentPath) {
                    activeLink = link;
                }
            });

            if (activeLink) {
                activeLink.classList.add('bg-orange-600', 'text-white');
            }

            links.forEach(link => {
                link.addEventListener('click', function(e) {
                    // Prevent the default action for links that do not have href set
                    if (!this.getAttribute('href') || this.getAttribute('href') === '#') {
                        e.preventDefault();
                    }

                    // Remove active state from all links
                    links.forEach(l => l.classList.remove('bg-orange-600', 'text-white'));

                    // Add active state to the clicked link
                    this.classList.add('bg-orange-600', 'text-white');

                    // Save the active link in localStorage
                    localStorage.setItem('activeLink', this.getAttribute('data-link'));
                });
            });

            // Toggle sidebar on mobile
            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('-translate-x-full');
                overlay.classList.toggle('hidden');
            });

            // Close sidebar when clicking outside of it
            overlay.addEventListener('click', function() {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            });
        });
    </script>
</head>

<body class="text-gray-800 font-inter">

    @php
        use App\Models\Alerte;

        // Vérifiez si le champ 'status' est égal à "Maintenance à effectuer"
        $AlerteMaintenance = Alerte::where('status', 'Maintenance à effectuer')->exists();

        // Récupérer le nombre d'alertes de maintenance
$notificationCount = Alerte::where('status', 'Maintenance à effectuer')->count();

// Exemple de données utilisateur, à remplacer par les données réelles de votre application
$userName = 'Nom Utilisateur';
$userEmail = 'email@exemple.com';
    @endphp

    <!-- sidenav -->
    <div
        class="fixed top-0 left-0 z-50 w-64 h-full p-4 transition-transform transform -translate-x-full bg-white shadow-inner md:translate-x-0 sidebar-menu">
        <a href="/" class="flex items-center pb-4 border-b border-b-gray-800" id="logo-link">
            <img src="https://thiriot-locations.com/charte/logo.png" alt="logo" />
        </a>
        <ul class="mt-4" id="sidebar-menu">
            <span class="font-bold text-gray-400 uppercase">Commun</span>
            <li class="mb-1 group">
                <a href="/"
                    class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-orange-600 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="mr-3 text-lg bx bx-home"></i>
                    <span class="text-sm">Accueil</span>
                </a>
            </li>

            <li class="mb-1 group">
                <a href="/liste-engin"
                    class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-orange-600 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class='mr-3 text-lg bx bx-list-ul'></i>
                    <span class="text-sm">Liste locations</span>
                </a>
            </li>
            <span class="font-bold text-gray-400 uppercase">Mécanicien / Chauffeur</span>
            <li class="mb-1 group">
                <a href=""
                    class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-orange-600 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-">
                    <i class='mr-3 text-lg bx bx-map-alt'></i>
                    <span class="text-sm">Carte</span>
                    <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
                </a>
                <ul class="pl-7 mt-2 hidden group-[.selected]:block">
                    <li class="mb-4">
                        <a href=""
                            class="text-gray-900 text-sm flex items-center hover:text-orange-600 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">All</a>
                    </li>
                    <li class="mb-4">
                        <a href=""
                            class="text-gray-900 text-sm flex items-center hover:text-orange-600 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Categories</a>
                    </li>
                </ul>
            </li>
            <li class="mb-1 group">
                <a href="/maintenances"
                    class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-orange-600 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class='mr-3 text-lg bx bx-map-pin'></i>
                    <span class="text-sm">Maintenances</span>
                </a>
            </li>

            <li class="mb-1 group">
                <a href="/livraisons"
                    class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-orange-600 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class='mr-3 text-lg bx bx-map-pin'></i>
                    <span class="text-sm">Livraisons</span>
                </a>
            </li>
            <li class="relative mb-1 group">
                <a href="/notifications"
                    class="flex items-center px-4 py-2 font-semibold text-gray-900 rounded-md hover:bg-orange-500 hover:text-gray-100"
                    data-link="notifications">
                    <div class="relative">
                        <i class='mr-3 text-lg bx bx-bell'></i>
                        @if ($notificationCount > 0)
                            <span
                                class="absolute top-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-800 rounded-full right-2">{{ $notificationCount }}</span>
                        @endif
                    </div>
                    <span class="text-sm">Notifications</span>

                </a>
            </li>
            <span class="font-bold text-gray-400 uppercase">Responsable</span>
            <li class="mb-1 group">
                <a href="/clients"
                    class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-orange-600 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class='mr-3 text-lg bx bx-face'></i>
                    <span class="text-sm">Fiches clients</span>

                </a>
            </li>
            <li class="mb-1 group">
                <a href="/engins"
                    class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-orange-600 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class='mr-3 text-lg bx bx-hard-hat'></i>
                    <span class="text-sm">Fiches engins</span>

                </a>
            </li>

            <li class="mb-1 group">
                <a href="/fiche-location"
                    class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-orange-600 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class='mr-3 text-lg bx bx-spreadsheet'></i>
                    <span class="text-sm">Fiches locations</span>

                </a>
            </li>
            <li class="mb-1 group">
                <a href="/engins-disponibles"
                    class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-orange-600 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class='mr-3 text-lg bx bx-check-square'></i>
                    <span class="text-sm">Engins disponibles</span>

                </a>
            </li>
            <li class="mb-1 group">
                <a href="/historique-locations"
                    class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-orange-600 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class='mr-3 text-lg bx bxs-hourglass-top'></i>
                    <span class="text-sm">Historique Location</span>

                </a>
            </li>
            <li class="mb-1 group">
                <a href="/notifications"
                    class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-orange-600 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class='mr-3 text-lg bx bx-bell'></i>
                    <span class="text-sm">Notifications</span>

                </a>
            </li>
            <span class="font-bold text-gray-400 uppercase">Paramètres</span>

            <li class="mb-1 group">
                <a href=""
                    class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-orange-600 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class='mr-3 text-lg bx bx-cog'></i>
                    <span class="text-sm">Paramètres</span>

                </a>
            </li>
            <li class="mb-1 group">

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-red-600 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 cursor-pointer"
                        :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        <i class='mr-3 text-lg bx bx-exit'></i>
                        <span class="text-sm">Se déconnecter</span>
                    </a>
                </form>

            </li>
        </ul>
    </div>
    <div class="fixed top-0 left-0 z-40 w-full h-full bg-black/50 md:hidden sidebar-overlay"></div>
    <!-- end sidenav -->


    <!-- navbar -->
    <div class="sticky top-0 left-0 z-30 flex items-center px-6 py-2 bg-white shadow-md shadow-black/5">
        <button type="button" class="text-lg font-semibold text-gray-900 sidebar">
            <i class="ri-menu-line"></i>
        </button>

        <ul class="flex items-center ml-auto">
            <li class="ml-3 ">
                <p class="flex items-center ">
                <div class="p-2 text-left md:block">
                    <h2 class="text-sm font-semibold text-gray-800">{{ Auth::user()->prenom }}
                        {{ Auth::user()->nom }}</h2>
                    <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                </div>
                </p>
            </li>
        </ul>
    </div>
    <!-- end navbar -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const links = document.querySelectorAll('#sidebar-menu a[data-link]');

            // Highlight the active link on page load based on localStorage
            const activeLink = localStorage.getItem('activeLink');
            if (activeLink) {
                const linkElement = document.querySelector(`#sidebar-menu a[data-link="${activeLink}"]`);
                if (linkElement) {
                    linkElement.classList.add('bg-orange-600', 'text-white');
                }
            }

            links.forEach(link => {
                link.addEventListener('click', function(e) {
                    // Prevent the default action for links that do not have href set
                    if (!this.getAttribute('href') || this.getAttribute('href') === '#') {
                        e.preventDefault();
                    }

                    // Remove active state from all links
                    links.forEach(l => l.classList.remove('bg-orange-600', 'text-white'));

                    // Add active state to the clicked link
                    this.classList.add('bg-orange-600', 'text-white');

                    // Save the active link in localStorage
                    localStorage.setItem('activeLink', this.getAttribute('data-link'));
                });
            });
        });
    </script>
        </ul>
    </div>
    <div class="fixed inset-0 z-40 hidden bg-black bg-opacity-50 sidebar-overlay"></div>

    <!-- Page content -->
    <div class="md:ml-64">

        <!-- Header/Navbar -->
        <header class="flex items-center justify-between p-4 bg-white shadow-md md:justify-end">
            <div class="flex items-center">
                <!-- Sidebar toggle button for mobile -->
                <button type="button" class="text-lg font-semibold text-gray-900 sidebar-toggle md:hidden">
                    <i class="text-2xl bx bx-menu" style="color: black;"></i>
                </button>

                <!-- Logo -->
                <a href="/" class="flex items-center ml-4 md:hidden" id="logo-link">
                    <img src="https://thiriot-locations.com/charte/logo.png" alt="logo" />
                </a>
            </div>

            <!-- User info -->
            <div class="flex items-center space-x-4">
                <div class="text-right">
                    <div class="text-sm font-medium text-gray-900">{{ $userName }}</div>
                    <div class="text-sm text-gray-500">{{ $userEmail }}</div>
                </div>

            </div>
        </header>

        <!-- Your page content goes here -->

    </div>
</body>

</html>
