<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thiriot-Location | Clients</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <!-- Inclusion de Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Inclusion de Alpine.js pour la gestion des interactions -->
    <script src="//unpkg.com/alpinejs"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="text-gray-800 font-inter">

    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
        <x-side-navbar />
        <div class="m-5"><!-- component -->
            <section class="container px-4 mx-auto">
                <div class="flex flex-col mt-6">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden border border-gray-200 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200 ">
                                    <thead class="bg-gray-50 ">
                                        <tr>
                                            <th scope="col" class="px-4 py-3.5 text-sm font-bold text-left rtl:text-right text-gray-500 ">
                                                Identité
                                            </th>
                                            <th scope="col" class="px-4 py-3.5 text-sm font-bold text-left rtl:text-right text-gray-500 ">
                                                Adresse
                                            </th>
                                            <th scope="col" class="px-4 py-3.5 text-sm font-bold text-left rtl:text-right text-gray-500 ">Contact</th>
                                            <th scope="col" class="px-4 py-3.5 text-sm font-bold text-left rtl:text-right text-gray-500 ">Notes</th>
                                            <th scope="col" class="relative py-3.5 px-4">
                                                <span class="sr-only">Modifier</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 ">
                                        @foreach($clients as $client)
                                        <tr>
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                <div>
                                                    <h2 class="font-medium text-gray-800 ">{{ $client->nom}}</h2>
                                                    <p class="text-sm font-normal text-gray-600 ">{{ $client->prenom}}</p>
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                <div>
                                                    <h4 class="text-gray-700 ">{{ $client->adresse}}</h4>
                                                    <p class="text-gray-500 ">{{ $client->ville}}, {{ $client->code_postal}}, {{ $client->pays}}</p>
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                <div>
                                                    <h4 class="text-gray-700 ">{{ $client->mail}}</h4>
                                                    <p class="text-gray-500 ">{{ $client->telephone}}</p>
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                <div>
                                                    <p class="text-gray-700 ">{{ $client->notes}}</p>
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                <a title="Modifier l'engin" href="/edit_client/{{ $client->id_client}}">
                                                    <i class='bx bx-pencil'></i></a>
                                                <a title="Supprimer l'engin" class="cursor-pointer" href="/supprimer_client/{{ $client->id_client}}"><i class='bx bx-trash text-red-500'></i> </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 sm:flex sm:items-center sm:justify-between ">
                    <div class="text-sm text-gray-500 ">
                        Page <span class="font-medium text-gray-700 ">1 </span> sur <span class="font-medium text-gray-700 ">10</span>
                    </div>

                    <div x-data="{ isOpen: false }">
                        <button @click="isOpen = true" class="flex justify-center w-1/2 px-5 py-2 text-sm text-white transition-colors duration-200 bg-orange-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-orange-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Ajouter un client</span>
                        </button>

                        <!-- Overlay to darken the background -->
                        <div x-show="isOpen" @click="isOpen = false" class="fixed inset-0 bg-black bg-opacity-50 z-40"></div>

                        <!-- Form Modal -->
                        <div x-show="isOpen" class="fixed inset-0 z-50 overflow-auto flex items-center justify-center">
                            <div class="bg-white w-full lg:w-8/12 p-6 rounded-lg shadow-lg">
                                <div class="flex justify-between items-center border-b pb-2">
                                    <h6 class="text-gray-700 text-xl font-bold">
                                        Fiche nouveau client
                                    </h6>
                                    <button @click="isOpen = false" class="text-red-500 hover:text-red-700">
                                        Annuler
                                    </button>
                                </div>
                                <div class="mt-4">
                                    <form action="/nouveau_client" method="post">
                                        @csrf
                                        <h6 class="text-gray-400 text-sm mt-3 mb-6 font-bold uppercase">
                                            Identité
                                        </h6>
                                        <div class="flex flex-wrap">
                                            <div class="w-full lg:w-6/12 px-4">
                                                <div class="relative w-full mb-3">
                                                    <label class="block uppercase text-gray-600 text-xs font-bold mb-2">
                                                        Nom
                                                    </label>
                                                    <input type="text" name="nom" class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                </div>
                                            </div>
                                            <div class="w-full lg:w-6/12 px-4">
                                                <div class="relative w-full mb-3">
                                                    <label class="block uppercase text-gray-600 text-xs font-bold mb-2">
                                                        Prénom
                                                    </label>
                                                    <input type="text" name="prenom" class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                </div>
                                            </div>
                                            <div class="w-full lg:w-6/12 px-4">
                                                <div class="relative w-full mb-3">
                                                    <label class="block uppercase text-gray-600 text-xs font-bold mb-2">
                                                        Email
                                                    </label>
                                                    <input type="email" name="mail" class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                </div>
                                            </div>
                                            <div class="w-full lg:w-6/12 px-4">
                                                <div class="relative w-full mb-3">
                                                    <label class="block uppercase text-gray-600 text-xs font-bold mb-2">
                                                        Téléphone
                                                    </label>
                                                    <input type="text" name="telephone" class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="mt-6 border-b-1 border-gray-300">

                                        <h6 class="text-gray-400 text-sm mt-3 mb-6 font-bold uppercase">
                                            Contact
                                        </h6>
                                        <div class="flex flex-wrap">
                                            <div class="w-full lg:w-12/12 px-4">
                                                <div class="relative w-full mb-3">
                                                    <label class="block uppercase text-gray-600 text-xs font-bold mb-2">
                                                        Adresse
                                                    </label>
                                                    <input type="text" name="adresse" class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                </div>
                                            </div>
                                            <div class="w-full lg:w-4/12 px-4">
                                                <div class="relative w-full mb-3">
                                                    <label class="block uppercase text-gray-600 text-xs font-bold mb-2">
                                                        Ville
                                                    </label>
                                                    <input type="text" name="ville" class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                </div>
                                            </div>
                                            <div class="w-full lg:w-4/12 px-4">
                                                <div class="relative w-full mb-3">
                                                    <label class="block uppercase text-gray-600 text-xs font-bold mb-2">
                                                        Code postal
                                                    </label>
                                                    <input type="text" name="code_postal" class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                </div>
                                            </div>
                                            <div class="w-full lg:w-4/12 px-4">
                                                <div class="relative w-full mb-3">
                                                    <label class="block uppercase text-gray-600 text-xs font-bold mb-2">
                                                        Pays
                                                    </label>
                                                    <input type="text" name="pays" class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="mt-6 border-b-1 border-gray-300">

                                        <h6 class="text-gray-400 text-sm mt-3 mb-6 font-bold uppercase">
                                            Autre
                                        </h6>
                                        <div class="flex flex-wrap">
                                            <div class="w-full lg:w-12/12 px-4">
                                                <div class="relative w-full mb-3">
                                                    <label class="block uppercase text-gray-600 text-xs font-bold mb-2">
                                                        Notes
                                                    </label>
                                                    <textarea name="notes" class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" rows="4"></textarea>
                                                </div>
                                            </div>
                                            <button type="submit" class="ml-auto mt-2 bg-orange-500 cursor-pointer items-center justify-center text-white hover:bg-orange-600 font-bold uppercase text-xs pr-4 pl-2 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none ease-linear transition-all duration-150 flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                Valider la fiche
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex items-center mt-4 gap-x-4 sm:mt-0">
                    <a href="#" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                        </svg>
                        <span>
                            Précédent
                        </span>
                    </a>

                    <a href="#" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 ">
                        <span>
                            Suivant
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                        </svg>
                    </a>
                </div>
            </section>
        </div>
    </main>
</body>
