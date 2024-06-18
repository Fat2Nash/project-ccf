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
<!DOCTYPE html>
<html lang="fr">

<head>
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
        // use App\Models\Alerte;

        // Vérifiez si le champ 'status' est égal à "Maintenance à effectuer"
        $AlerteMaintenance = Alerte::where('status', 'Maintenance à effectuer')->exists();
    @endphp

    @php
    $user = Auth::user();
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
                    class="flex items-center px-4 py-2 font-semibold text-gray-900 rounded-md hover:bg-orange-500 hover:text-gray-100"
                    data-link="accueil">
                    <i class="mr-3 text-lg bx bx-home"></i>
                    <span class="text-sm">Accueil</span>
                </a>
            </li>
            @if(in_array($user->role, ['Mécanicien/Chauffeur', 'Administrateur']))
            <span class="font-bold text-gray-400 uppercase">Mécanicien / Chauffeur</span>
            <li class="mb-1 group">
                <a href="/maintenances"
                    class="flex items-center px-4 py-2 font-semibold text-gray-900 rounded-md hover:bg-orange-500 hover:text-gray-100"
                    data-link="maintenance">
                    <i class='mr-3 text-lg bx bx-wrench'></i>
                    <span class="text-sm">Maintenance</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="/livraisons"
                    class="flex items-center px-4 py-2 font-semibold text-gray-900 rounded-md hover:bg-orange-500 hover:text-gray-100"
                    data-link="livraisons">
                    <i class='mr-3 text-lg bx bx-map-pin'></i>
                    <span class="text-sm">Livraisons</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="/notifications"
                    class="flex items-center px-4 py-2 font-semibold text-gray-900 rounded-md hover:bg-orange-500 hover:text-gray-100"
                    data-link="notifications">
                    <div class="relative">
                        <i class='mr-3 text-lg bx bx-bell'></i>
                        @if ($notificationCount > 0)
                            <span
                                class="absolute top-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-orange-800 rounded-full right-2">{{ $notificationCount }}</span>
                        @endif
                    </div>
                    <span class="text-sm">Notifications</span>
                </a>
            </li>
            @endif
            @if(in_array($user->role, ['Responsable', 'Administrateur']))
            <span class="font-bold text-gray-400 uppercase">Responsable</span>
            <li class="mb-1 group">
                <a href="/clients"
                    class="flex items-center px-4 py-2 font-semibold text-gray-900 rounded-md hover:bg-orange-500 hover:text-gray-100"
                    data-link="fiches-clients">
                    <i class='mr-3 text-lg bx bx-face'></i>
                    <span class="text-sm">Fiches clients</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="/engins"
                    class="flex items-center px-4 py-2 font-semibold text-gray-900 rounded-md hover:bg-orange-500 hover:text-gray-100"
                    data-link="fiches-engins">
                    <i class='mr-3 text-lg bx bx-hard-hat'></i>
                    <span class="text-sm">Fiches engins</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="/locations"
                    class="flex items-center px-4 py-2 font-semibold text-gray-900 rounded-md hover:bg-orange-500 hover:text-gray-100"
                    data-link="fiches-locations">
                    <i class='mr-3 text-lg bx bx-spreadsheet'></i>
                    <span class="text-sm">Fiches locations</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="/engins-disponibles"
                    class="flex items-center px-4 py-2 font-semibold text-gray-900 rounded-md hover:bg-orange-500 hover:text-gray-100"
                    data-link="liste-engins">
                    <i class='mr-3 text-lg bx bx-list-ul'></i>
                    <span class="text-sm">Liste engins</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="/MapsEngins"
                    class="flex items-center px-4 py-2 font-semibold text-gray-900 rounded-md hover:bg-orange-500 hover:text-gray-100"
                    data-link="carte">
                    <i class='mr-3 text-lg bx bx-map-alt'></i>
                    <span class="text-sm">Carte</span>
                    <i class="ml-auto ri-arrow-right-s-line"></i>
                </a>
                <ul class="hidden mt-2 pl-7">
                    <li class="mb-4">
                        <a href="#"
                            class="text-gray-900 text-sm flex items-center hover:bg-orange-500 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">All</a>
                    </li>
                    <li class="mb-4">
                        <a href="#"
                            class="text-gray-900 text-sm flex items-center hover:bg-orange-500 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Categories</a>
                    </li>
                </ul>
            </li>
            <li class="mb-1 group">
                <a href="/HistoriqueLocations"
                    class="flex items-center px-4 py-2 font-semibold text-gray-900 rounded-md hover:bg-orange-500 hover:text-gray-100"
                    data-link="historique-locations">
                    <i class='mr-3 text-lg bx bx-spreadsheet'></i>
                    <span class="text-sm">Historique locations</span>
                </a>
            </li>
            @endif
            @if($user->role == 'Administrateur')
            <span class="font-bold text-gray-400 uppercase">Paramètres</span>
            <li class="mb-1 group">
                <a href="/profile"
                    class="flex items-center px-4 py-2 font-semibold text-gray-900 rounded-md hover:bg-orange-500 hover:text-gray-100"
                    data-link="parametres">
                    <i class='mr-3 text-lg bx bx-cog'></i>
                    <span class="text-sm">Paramètres</span>
                </a>
            </li>
            @endif
            <li class="mb-1 group">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="flex items-center px-4 py-2 font-semibold text-gray-900 rounded-md cursor-pointer hover:bg-red-600 hover:text-gray-100"
                        data-link="logout" onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class='mr-3 text-lg bx bx-exit'></i>
                        <span class="text-sm">Se déconnecter</span>
                    </a>
                </form>
            </li>
        </ul>
    </div>
    <div class="fixed top-0 left-0 z-40 hidden w-full h-full bg-black/50 md:hidden sidebar-overlay"></div>
    <!-- end sidenav -->

    <!-- navbar -->
    <div class="sticky top-0 left-0 z-30 flex items-center px-6 py-2 bg-white shadow-md shadow-black/5">
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
        <ul class="items-center hidden ml-auto md:flex">
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

</body>

</html>
