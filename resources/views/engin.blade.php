<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thiriot-Location | engins</title>
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
                                                <a title="Supprimer l'engin" class="cursor-pointer" href="/supprimer_engin/{{ $engin -> id_engins}}"><i class='bx bx-trash text-red-500'></i> </a>
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
                        <div x-show="isOpen" @click="isOpen = false" class="fixed inset-0 bg-black bg-opacity-50 z-40"></div>

                        <!-- Form Modal -->
                        <div x-show="isOpen" class="fixed inset-0 z-50 overflow-auto flex items-center justify-center">
                            <div class="bg-white w-full lg:w-8/12 p-6 rounded-lg shadow-lg">
                                <div class="flex justify-between items-center border-b pb-2">
                                    <h6 class="text-gray-700 text-xl font-bold">
                                        Fiche nouvel engin
                                    </h6>
                                    <button @click="isOpen = false" class="text-red-500 hover:text-red-700">
                                        Annuler
                                    </button>
                                </div>
                                <div class="mt-4">
                                    <form action="/nouvel_engin" method="post">
                                        @csrf
						<h6 class="text-gray-400 text-sm mt-3 mb-6 font-bold uppercase">
							Machine
						</h6>
						<div class="flex flex-wrap">
							<div class="w-full lg:w-6/12 px-4">
								<div class="relative w-full mb-3">
									<label class="block uppercase text-gray-600 text-xs font-bold mb-2">
									Marque
									</label>
									<input type="text" name="marque" class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Caterpillar">
								</div>
							</div>
							<div class="w-full lg:w-6/12 px-4">
								<div class="relative w-full mb-3">
									<label class="block uppercase text-gray-600 text-xs font-bold mb-2">
									Modèle
									</label>
									<input type="text" name="modele" class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="320">
								</div>
							</div>
							<div class="w-full lg:w-6/12 px-4">
								<div class="relative w-full mb-3">
									<label class="block uppercase text-gray-600 text-xs font-bold mb-2">
									Numéro de machine
									</label>
									<input type="number" name="numero" class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="4">
								</div>
							</div>
							<div class="w-full lg:w-6/12 px-4">
								<div class="relative w-full mb-3">
									<label class="block uppercase text-gray-600 text-xs font-bold mb-2">
									Catégorie
									</label>
									<input type="text" name="categorie" class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Pelle">
								</div>
							</div>
						</div>
						<hr class="mt-6 border-b-1 border-gray-300">
						<h6 class="text-gray-400 text-sm mt-3 mb-6 font-bold uppercase">
							Information
						</h6>
						<div class="flex flex-wrap">
							<div class="w-full lg:w-4/12 px-4">
								<div class="relative w-full mb-3">
									<label class="block uppercase text-gray-600 text-xs font-bold mb-2">
									Statut
									</label>
									<select name="statut" class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                        <option placeholder="Loué">Loué</option>
                                        <option placeholder="Disponible">Disponible</option>
                                        <option placeholder="Indisponible">Indisponible</option>
                                    </select>
								</div>
							</div>
							<div class="w-full lg:w-4/12 px-4">
								<div class="relative w-full mb-3">
									<label class="block uppercase text-gray-600 text-xs font-bold mb-2">
									Nombre de maintenances
									</label>
									<p class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" >0</p>
								</div>
							</div>
							<div class="w-full lg:w-4/12 px-4">
								<div class="relative w-full mb-3">
									<label class="block uppercase text-gray-600 text-xs font-bold mb-2">
									Nombre d'heures (en secondes)
									</label>
									<input type="number" name=temps" class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" />
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
									Description
									</label>
									<textarea name="description" class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" rows="4">Pelle hydraulique sur chenilles</textarea>
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
