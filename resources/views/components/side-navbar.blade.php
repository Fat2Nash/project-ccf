<!DOCTYPE html>
<html lang="fr">

<head>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
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

        // Vérifiez si le champ 'status' est égal à "Maintenance à effectuer"
        $AlerteMaintenance = Alerte::where('status', 'Maintenance à effectuer')->exists();
    @endphp

    @php
    $user = Auth::user();
@endphp

    <!-- sidenav -->
    <div
        class="fixed top-0 left-0 z-50 w-64 h-full p-4 transition-transform bg-white shadow-inner transform -translate-x-full md:translate-x-0 sidebar-menu">
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
                    class="flex items-center px-4 py-2 font-semibold rounded-md hover:bg-orange-500 hover:text-gray-100 {{ $AlerteMaintenance ? 'bg-green-500 text-white' : 'text-gray-900' }}"
                    data-link="notifications">
                    <i class='mr-3 text-lg bx bx-bell'></i>
                    {{-- <span class="icon-[mdi--bell-notification]" style="color: #ec0909;"></span> --}}
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
                <a href="/parametres"
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
    <div class="fixed top-0 left-0 z-40 w-full h-full bg-black/50 md:hidden sidebar-overlay hidden"></div>
    <!-- end sidenav -->

    <!-- navbar -->
    <div class="sticky top-0 left-0 z-30 flex items-center px-6 py-2 bg-white shadow-md shadow-black/5">
        <button type="button" class="text-lg font-semibold text-gray-900 sidebar-toggle">
            <i class="ri-menu-line"></i>
        </button>
        <ul class="flex items-center ml-auto">
            <li class="ml-3">
                <div class="p-2 text-left md:block">
                    <h2 class="text-sm font-semibold text-gray-800">{{ Auth::user()->prenom }} {{ Auth::user()->nom }}
                    </h2>
                    <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                </div>
            </li>
        </ul>
    </div>
    <!-- end navbar -->

    <script>
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
</body>

</html>
