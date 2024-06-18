<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thiriot-Location | engins</title>
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
                                                Identification
                                            </th>



                                            <th scope="col" class="px-4 py-3.5 text-sm font-bold text-left rtl:text-right text-gray-500 ">
                                                Maintenance
                                            </th>

                                            <th scope="col" class="px-4 py-3.5 text-sm font-bold text-left rtl:text-right text-gray-500 ">Information</th>

                                            <th scope="col" class="px-4 py-3.5 text-sm font-bold text-left rtl:text-right text-gray-500 ">Description</th>

                                            <th scope="col" class="relative py-3.5 px-4">
                                                <span class="sr-only">Modifier</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 ">
                                        <tr>
                                            @foreach($engins as $engin)
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                <div>
                                                    <h2 class="font-medium text-gray-800 ">{{ $engin -> modele}}</h2>
                                                    <p class="text-sm font-normal text-gray-600 ">{{ $engin -> marque}} (N° : {{ $engin -> Num_Machine}})</p>
                                                </div>
                                            </td>

                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                <div>
                                                    <h4 class="text-gray-700 ">
                                                        @if($engin->maintenance == 1)
                                                        Oui
                                                        @elseif($engin->maintenance == 0)
                                                        Non
                                                        @else
                                                        Etat inconnu
                                                        @endif

                                                    </h4>
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                <div>
                                                    <h4 class="text-gray-700 ">{{ $engin -> statut}}</h4>
                                                    <p class="text-gray-500 "><?php
                                                                                // Convertir les secondes en heures et minutes
                                                                                $secondes = $engin->compteur_heures;
                                                                                $heures = floor($secondes / 3600);
                                                                                $minutes = floor(($secondes % 3600) / 60);
                                                                                ?>
                                                        {{ $heures }} heures {{ $minutes }} minutes
                                                    </p>
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                <div>
                                                    <p class="text-gray-700 ">{{ $engin -> description}}</p>
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap">

                                            <a title="Modifier l'engin" href="/edit_engin/{{ $engin -> id_engins}}">
                                                    <i class='bx bx-pencil'></i></a>
                                                <a title="Supprimer l'engin" class="cursor-pointer" href="/supprimer_engin/{{ $engin -> id_engins}}"><i class='text-red-500 bx bx-trash'></i> </a>
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
                        <button @click="isOpen = true" class="flex justify-center w-1/2 px-5 py-2 text-sm text-white transition-colors duration-200 bg-orange-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-orange-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Ajouter un engin</span>
                        </button>

                        <!-- Overlay to darken the background -->
                        <div x-show="isOpen" @click="isOpen = false" class="fixed inset-0 z-40 bg-black bg-opacity-50"></div>

                        <!-- Form Modal -->
                        <div x-show="isOpen" class="fixed inset-0 z-50 flex items-center justify-center overflow-auto">
                            <div class="w-full p-6 bg-white rounded-lg shadow-lg lg:w-8/12">
                                <div class="flex items-center justify-between pb-2 border-b">
                                    <h6 class="text-xl font-bold text-gray-700">
                                        Fiche nouvel engin
                                    </h6>
                                    <button @click="isOpen = false" class="text-red-500 hover:text-red-700">
                                        Annuler
                                    </button>
                                </div>
                                <div class="mt-4">
                                    <form action="/nouvel_engin" method="post">
                                        @csrf
						<h6 class="mt-3 mb-6 text-sm font-bold text-gray-400 uppercase">
							Machine
						</h6>
						<div class="flex flex-wrap">
							<div class="w-full px-4 lg:w-6/12">
								<div class="relative w-full mb-3">
									<label class="block mb-2 text-xs font-bold text-gray-600 uppercase">
									Marque
									</label>
									<input required type="text" name="marque" class="w-full px-3 py-3 text-sm text-gray-600 placeholder-gray-300 transition-all duration-150 ease-linear bg-white border-0 rounded shadow focus:outline-none focus:ring" placeholder="Caterpillar">
								</div>
							</div>
							<div class="w-full px-4 lg:w-6/12">
								<div class="relative w-full mb-3">
									<label class="block mb-2 text-xs font-bold text-gray-600 uppercase">
									Modèle
									</label>
									<input required type="text" name="modele" class="w-full px-3 py-3 text-sm text-gray-600 placeholder-gray-300 transition-all duration-150 ease-linear bg-white border-0 rounded shadow focus:outline-none focus:ring" placeholder="320">
								</div>
							</div>
							<div class="w-full px-4 lg:w-6/12">
								<div class="relative w-full mb-3">
									<label class="block mb-2 text-xs font-bold text-gray-600 uppercase">
									Numéro de machine
									</label>
									<input required type="number" name="numero" min="1" class="w-full px-3 py-3 text-sm text-gray-600 placeholder-gray-300 transition-all duration-150 ease-linear bg-white border-0 rounded shadow focus:outline-none focus:ring" placeholder="4">
								</div>
							</div>
							<div class="w-full px-4 lg:w-6/12">
								<div class="relative w-full mb-3">
									<label class="block mb-2 text-xs font-bold text-gray-600 uppercase">
									Catégorie
									</label>
									<input required type="text" name="categorie" class="w-full px-3 py-3 text-sm text-gray-600 placeholder-gray-300 transition-all duration-150 ease-linear bg-white border-0 rounded shadow focus:outline-none focus:ring" placeholder="Pelle">
								</div>
							</div>
						</div>
						<hr class="mt-6 border-gray-300 border-b-1">
						<h6 class="mt-3 mb-6 text-sm font-bold text-gray-400 uppercase">
							Information
						</h6>
						<div class="flex flex-wrap">
							<div class="w-full px-4 lg:w-4/12">
								<div class="relative w-full mb-3">
									<label class="block mb-2 text-xs font-bold text-gray-600 uppercase">
									Statut
									</label>
									<select name="statut" class="w-full px-3 py-3 text-sm text-gray-600 placeholder-gray-300 transition-all duration-150 ease-linear bg-white border-0 rounded shadow focus:outline-none focus:ring">
                                        <option placeholder="Loué">Loué</option>
                                        <option placeholder="Disponible">Disponible</option>
                                        <option placeholder="Indisponible">Indisponible</option>
                                    </select>
								</div>
							</div>
							<div class="w-full px-4 lg:w-4/12">
								<div class="relative w-full mb-3">
									<label class="block mb-2 text-xs font-bold text-gray-600 uppercase">
									Nombre de maintenances
									</label>
									<p class="w-full px-3 py-3 text-sm text-gray-600 placeholder-gray-300 transition-all duration-150 ease-linear bg-white border-0 rounded shadow focus:outline-none focus:ring" >0</p>
								</div>
							</div>
							<div class="w-full px-4 lg:w-4/12">
								<div class="relative w-full mb-3">
									<label class="block mb-2 text-xs font-bold text-gray-600 uppercase">
									Nombre d'heures
									</label>
									<input required type="text" name="temps" class="w-full px-3 py-3 text-sm text-gray-600 placeholder-gray-300 transition-all duration-150 ease-linear bg-white border-0 rounded shadow focus:outline-none focus:ring" placeholder="HH:MM"/>
								</div>
							</div>
						</div>
						<hr class="mt-6 border-gray-300 border-b-1">
						<h6 class="mt-3 mb-6 text-sm font-bold text-gray-400 uppercase">
							Autre
						</h6>
						<div class="flex flex-wrap">
							<div class="w-full px-4 lg:w-12/12">
								<div class="relative w-full mb-3">
									<label class="block mb-2 text-xs font-bold text-gray-600 uppercase">
									Description
									</label>
									<textarea name="description" class="w-full px-3 py-3 text-sm text-gray-600 placeholder-gray-300 transition-all duration-150 ease-linear bg-white border-0 rounded shadow focus:outline-none focus:ring" rows="4">Pelle hydraulique sur chenilles</textarea>
								</div>
							</div>
							<button type="submit" class="flex items-center justify-center py-2 pl-2 pr-4 mt-2 ml-auto text-xs font-bold text-white uppercase transition-all duration-150 ease-linear bg-orange-500 rounded shadow outline-none cursor-pointer hover:bg-orange-600 hover:shadow-md focus:outline-none">
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
