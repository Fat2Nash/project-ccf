<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Titre de la page -->
    <title>Historique Locations</title>

    <!-- Fonts -->
    <!-- Préconnexion au domaine pour optimiser le chargement des polices -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <!-- Inclusion de la police Figtree avec les poids 400 et 600 -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Inclusion de Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Inclusion de Alpine.js pour la gestion des interactions -->
    <script src="//unpkg.com/alpinejs"></script>

    <!-- Titre de la page avec le nom de l'utilisateur connecté -->
    <title>Thiriot-Location | {{ Auth::user()->name }}</title>
    <!-- Inclusion des icônes Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Inclusion de la feuille de style de Leaflet pour les cartes -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Inclusion de la bibliothèque Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <!-- Inclusion de fichiers CSS et JS via Vite (outil de build) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="text-gray-800 font-inter">
    <!-- Inclusion de la barre de navigation latérale -->
    <x-side-navbar />

    <!-- Section de sélection de l'historique -->
    <div id="selectHistorique" class="flex items-center justify-center mt-10 ml-32">
        <!-- Lien vers l'historique par client -->
        <a href="./HistoriqueClients" class="relative inline-block mr-2 w-[300px]">
            <button class="relative font-semibold border border-orange-500 px-4 py-2 w-full bg-white text-orange-500 rounded-lg overflow-hidden transition-all duration-300 group hover:text-white">
                <span class="absolute inset-0 bg-orange-500 w-0 transition-all duration-300 ease-in-out group-hover:w-full"></span>
                <span class="relative z-10">Historique par client</span>
            </button>
        </a>
        <!-- Séparation supplémentaire pour espacer les boutons -->
        <span class="mx-32"></span>
        <!-- Lien vers l'historique par engin -->
        <a href="./HistoriqueEngins" class="relative inline-block ml-2 w-[300px]">
            <button class="relative font-semibold border border-green-600 px-4 py-2 w-full bg-white text-green-600 rounded-lg overflow-hidden transition-all duration-300 group hover:text-white">
                <span class="absolute inset-0 bg-green-600 w-0 transition-all duration-300 ease-in-out group-hover:w-full"></span>
                <span class="relative z-10">Historique par engin</span>
            </button>
        </a>
    </div>

    <!-- Inclusion du pied de page -->
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
