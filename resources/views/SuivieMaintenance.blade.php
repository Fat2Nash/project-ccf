<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thiriot-Location | {{ Auth::user()->name }}</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<x-side-navbar />
<div class="p-6 bg-white border border-gray-100 rounded-md shadow-md shadow-black/5">
    <div class="flex items-start justify-between mb-4">
        <div class="font-medium">Liste des engins à Récupérer</div>
    </div>
    <div class="overflow-auto"> <!-- Utilisation de overflow-auto pour activer le défilement -->
        <ul class="w-full"> <!-- Utilisation d'une liste au lieu d'un tableau -->
            <!-- 1er engin -->
            <li class="flex items-center justify-between px-4 py-2 border-b border-b-gray-50">
                <a href="#" class="text-sm font-medium text-gray-600 truncate hover:text-orange-600 ml-2">
                    Engin 1
                </a>
                <span class="text-[13px] font-medium text-gray-400">02-02-2024</span>
                <span class="text-[13px] font-medium text-gray-400">17 h 45</span>
            </li>
            <!-- Ajoutez d'autres éléments de liste au besoin -->
        </ul>
    </div>
</div>

<x-footer/>
</body>
</html>
