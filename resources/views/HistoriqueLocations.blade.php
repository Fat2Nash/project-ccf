<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Historique Locations</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <script src="https://cdn.tailwindcss.com"></script>
        <script src="//unpkg.com/alpinejs"></script>

        <title>Thiriot-Location | {{Auth::user()->name}}</title>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
<body class="text-gray-800 font-inter">
    <x-side-navbar />

    <div id="selectHistorique" class="flex items-center justify-center mt-10 ml-32">
        <a href="./HistoriqueClients" class="relative inline-block mr-2 w-[300px]">
            <button class="relative font-semibold border border-orange-500 px-4 py-2 w-full bg-white text-orange-500 rounded-lg overflow-hidden transition-all duration-300 group hover:text-white">
                <span class="absolute inset-0 bg-orange-500 w-0 transition-all duration-300 ease-in-out group-hover:w-full"></span>
                <span class="relative z-10">Historique par client</span>
            </button>
        </a>
        <span class="mx-32"></span> <!-- Séparation supplémentaire -->
        <a href="./HistoriqueEngins" class="relative inline-block ml-2 w-[300px]">
            <button class="relative font-semibold border border-green-600 px-4 py-2 w-full bg-white text-green-600 rounded-lg overflow-hidden transition-all duration-300 group hover:text-white">
                <span class="absolute inset-0 bg-green-600 w-0 transition-all duration-300 ease-in-out group-hover:w-full"></span>
                <span class="relative z-10">Historique par engin</span>
            </button>
        </a>
    </div>

    <x-footer />

    <script>
        // Script JavaScript pour gérer le changement de sélection dans le menu déroulant
        document.getElementById("selectHistorique").addEventListener("change", function() {
            // Récupération de l'option sélectionnée
            var selectedOption = this.options[this.selectedIndex];
            // Vérification si une option valide a été sélectionnée
            if (selectedOption.value !== "") {
                // Redirection vers l'URL correspondante à l'option sélectionnée
                window.location.href = selectedOption.value;
            }
        });
    </script>
</body>
</html>
