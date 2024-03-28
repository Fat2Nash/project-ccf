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
        <div class="font-medium">Liste des engins à Livrer</div>
    </div>
    <div class="overflow-auto max-h-[200px]"> <!-- Utilisation de overflow-auto pour activer le défilement -->
        <table class="w-full min-w-[540px]">
            <tbody>

                <!-- 1er engin -->
        <tr>
            <td class="px-4 py-2 border-b border-b-gray-50">
                <div class="flex items-center">
                    <a href="#" class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-orange-600">Engin 1</a>
                </div>
            </td>
            <td class="px-4 py-2 border-b border-b-gray-50">
                <span class="text-[13px] font-medium text-gray-400">02-02-2024</span>
            </td>
            <td class="px-4 py-2 border-b border-b-gray-50">
                <span class="text-[13px] font-medium text-gray-400">17 h 45</span>
            </td>
        </tr>


<x-footer/>
</body>
</html>
