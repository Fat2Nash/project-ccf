<!-- sidenav -->
<div class="fixed left-0 top-0 w-64 h-full bg-white p-4 z-50 sidebar-menu transition-transform shadow-inner">
    <a href="/" class="flex items-center pb-4 border-b border-b-gray-800">
        <img src="https://thiriot-locations.com/charte/logo.png" alt="logo" />
    </a>
    <ul class="mt-4" id="sidebar-menu">
        <span class="text-gray-400 font-bold uppercase">Commun</span>
        <li class="mb-1 group">
            <a href="/" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-orange-600 hover:text-gray-100 rounded-md" data-link="accueil">
                <i class="bx bx-home mr-3 text-lg"></i>
                <span class="text-sm">Accueil</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a href="#" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-orange-600 hover:text-gray-100 rounded-md" data-link="liste-engins">
                <i class='bx bx-list-ul mr-3 text-lg'></i>
                <span class="text-sm">Liste engins</span>
            </a>
        </li>
        <span class="text-gray-400 font-bold uppercase">Mécanicien / Chauffeur</span>
        <li class="mb-1 group">
            <a href="/MapsEngins" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-orange-600 hover:text-gray-100 rounded-md" data-link="carte">
                <i class='bx bx-map-alt mr-3 text-lg'></i>
                <span class="text-sm">Carte</span>
                <i class="ri-arrow-right-s-line ml-auto"></i>
            </a>
            <ul class="pl-7 mt-2 hidden">
                <li class="mb-4">
                    <a href="#" class="text-gray-900 text-sm flex items-center hover:text-orange-600 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">All</a>
                </li>
                <li class="mb-4">
                    <a href="#" class="text-gray-900 text-sm flex items-center hover:text-orange-600 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Categories</a>
                </li>
            </ul>
        </li>
        <li class="mb-1 group">
            <a href="#" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-orange-600 hover:text-gray-100 rounded-md" data-link="maintenance">
                <i class='bx bx-wrench mr-3 text-lg'></i>
                <span class="text-sm">Maintenance</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a href="#" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-orange-600 hover:text-gray-100 rounded-md" data-link="livraisons">
                <i class='bx bx-map-pin mr-3 text-lg'></i>
                <span class="text-sm">Livraisons</span>
            </a>
        </li>
        <span class="text-gray-400 font-bold uppercase">Responsable</span>
        <li class="mb-1 group">
            <a href="#" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-orange-600 hover:text-gray-100 rounded-md" data-link="fiches-clients">
                <i class='bx bx-face mr-3 text-lg'></i>
                <span class="text-sm">Fiches clients</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a href="#" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-orange-600 hover:text-gray-100 rounded-md" data-link="fiches-engins">
                <i class='bx bx-hard-hat mr-3 text-lg'></i>
                <span class="text-sm">Fiches engins</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a href="#" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-orange-600 hover:text-gray-100 rounded-md" data-link="fiches-locations">
                <i class='bx bx-spreadsheet mr-3 text-lg'></i>
                <span class="text-sm">Fiches locations</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a href="/HistoriqueLocations" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-orange-600 hover:text-gray-100 rounded-md" data-link="historique-locations">
                <i class='bx bx-spreadsheet mr-3 text-lg'></i>
                <span class="text-sm">Historique locations</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a href="#" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-orange-600 hover:text-gray-100 rounded-md" data-link="notifications">
                <i class='bx bx-bell mr-3 text-lg'></i>
                <span class="text-sm">Notifications</span>
            </a>
        </li>
        <span class="text-gray-400 font-bold uppercase">Paramètres</span>
        <li class="mb-1 group">
            <a href="#" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-orange-600 hover:text-gray-100 rounded-md" data-link="parametres">
                <i class='bx bx-cog mr-3 text-lg'></i>
                <span class="text-sm">Paramètres</span>
            </a>
        </li>
        <li class="mb-1 group">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-red-600 hover:text-gray-100 rounded-md cursor-pointer" data-link="logout" onclick="event.preventDefault(); this.closest('form').submit();">
                    <i class='bx bx-exit mr-3 text-lg'></i>
                    <span class="text-sm">Se déconnecter</span>
                </a>
            </form>
        </li>
    </ul>
</div>
<div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
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
                <h2 class="text-sm font-semibold text-gray-800">{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</h2>
                <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
            </div>
            </p>
        </li>
    </ul>
</div>
<!-- end navbar -->

<script>
document.addEventListener('DOMContentLoaded', function () {
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
        link.addEventListener('click', function (e) {
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
