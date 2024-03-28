<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thiriot-Location | Clients</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
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
                                        <tr>
                                            @foreach($clients as $client)
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                <div>
                                                    <h2 class="font-medium text-gray-800 ">{{ $client -> nom}}</h2>
                                                    <p class="text-sm font-normal text-gray-600 ">{{ $client -> prenom}}</p>
                                                </div>
                                            </td>

                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                <div>
                                                    <h4 class="text-gray-700 ">{{ $client -> adresse}}</h4>
                                                    <p class="text-gray-500 ">{{ $client -> ville}}, {{ $client -> code_postal}}, {{ $client -> pays}}</p>
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                <div>
                                                    <h4 class="text-gray-700 ">{{ $client -> mail}}</h4>
                                                    <p class="text-gray-500 ">{{ $client -> telephone}}</p>
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                <div>
                                                    <p class="text-gray-700 ">{{ $client -> notes}}</p>
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap">

                                                <button class="px-1 py-1 text-gray-500 transition-colors duration-200 rounded-lg ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Vous pouvez accéder aux autres attributs du produit de la même manière -->
                                        @endforeach



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 sm:flex sm:items-center sm:justify-between ">
                    <div class="text-sm text-gray-500 ">
                        Page <span class="font-medium text-gray-700 ">1 </span>sur<span class="font-medium text-gray-700 "> 10</span>
                    </div>


                    <div x-data="{ isOpen: false }">
                        <button @click="isOpen = !isOpen" class="flex justify-center w-1/2 px-5 py-2 text-sm text-white transition-colors duration-200 bg-orange-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-orange-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Ajouter un client</span>
                        </button>

                        <!-- Overlay to darken the background -->
                        <div x-show="isOpen" class="overlay" @click="isOpen = false"></div>

                        <div x-show="isOpen" class="fixed  left-1/2 transform -translate-x-[256px] -translate-y-1/2 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 z-50">
                            <form action="/nouveau_client" method="post">
                                @csrf
                                <div class="relative flex items-center py-5">
                                    <div class="flex-grow border-t border-gray-600"></div>
                                    <span class="flex-shrink mx-4 text-gray-600">Nouvelle fiche client</span>
                                    <div class="flex-grow border-t border-gray-600"></div>
                                </div>
                                <div class="container items-center p-2">
                                    <h1 class="font-bold text-center">Identité</h1>
                                    <label>Nom : </label><input name="nom" type="text" placeholder="DUPONT">
                                    <label>Préom : </label><input name="prenom" type="text" placeholder="Jean-Luc">
                                </div>
                                <label>Email : </label><input name="mail" type="email" placeholder="test@exemple.com">
                                <label>Adresse : </label><input name="adresse" type="text" placeholder="11 Rue de Mirecourt">
                                <label>Ville : </label><input name="ville" type="text" placeholder="Ville-sur-Illon">
                                <label>Code postal : </label><input name="code_postal" type="text" placeholder="88270">
                                <label>Pays : </label><input name="pays" type="text" placeholder="France">
                                <label>Téléphone : </label><input name="telephone" type="tel" placeholder="+33 1 23 45 67 89">
                                <label>Note : </label><textarea name="notes" type="text" placeholder="Eventuelles notes et/ou information supplémentaires"></textarea>
                                <button type="submit" class="flex justify-center w-1/2 px-5 py-2 text-sm text-white transition-colors duration-200 bg-orange-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-orange-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Ajouter la fiche</button>
                            </form>

                            <button @click="isOpen = false" class="flex justify-center w-1/2 px-5 py-2 text-sm text-white transition-colors duration-200 bg-red-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rotate-45">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Annuler</button>
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
                </div>
            </section>
        </div>

    </main>
