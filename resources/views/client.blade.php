<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thiriot-Location | Clients</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
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
                                <label>Email : </label><input name="mail" type="email" placeholder="test@test.com">
                                <label>Adresse : </label><input name="adresse" type="text" placeholder="11 Rue de Mirecourt">
                                <label>Ville : </label><input name="ville" type="text" placeholder="Ville-sur-Illon">
                                <label>Code postal : </label><input name="code_postal" type="text" placeholder="88270">
                                <label>Pays : </label><input name="pays" type="text" placeholder="France">
                                <label>Téléphone : </label>
<form class="max-w-sm mx-auto">
    <div class="flex items-center">
        <button id="dropdown-phone-button" data-dropdown-toggle="dropdown-phone" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">
            <svg fill="none" aria-hidden="true" class="h-4 w-4 me-2" viewBox="0 0 20 15"><rect width="19.6" height="14" y=".5" fill="#fff" rx="2"/><mask id="a" style="mask-type:luminance" width="20" height="15" x="0" y="0" maskUnits="userSpaceOnUse"><rect width="19.6" height="14" y=".5" fill="#fff" rx="2"/></mask><g mask="url(#a)"><path fill="#D02F44" fill-rule="evenodd" d="M19.6.5H0v.933h19.6V.5zm0 1.867H0V3.3h19.6v-.933zM0 4.233h19.6v.934H0v-.934zM19.6 6.1H0v.933h19.6V6.1zM0 7.967h19.6V8.9H0v-.933zm19.6 1.866H0v.934h19.6v-.934zM0 11.7h19.6v.933H0V11.7zm19.6 1.867H0v.933h19.6v-.933z" clip-rule="evenodd"/><path fill="#46467F" d="M0 .5h8.4v6.533H0z"/><g filter="url(#filter0_d_343_121520)"><path fill="url(#paint0_linear_343_121520)" fill-rule="evenodd" d="M1.867 1.9a.467.467 0 11-.934 0 .467.467 0 01.934 0zm1.866 0a.467.467 0 11-.933 0 .467.467 0 01.933 0zm1.4.467a.467.467 0 100-.934.467.467 0 000 .934zM7.467 1.9a.467.467 0 11-.934 0 .467.467 0 01.934 0zM2.333 3.3a.467.467 0 100-.933.467.467 0 000 .933zm2.334-.467a.467.467 0 11-.934 0 .467.467 0 01.934 0zm1.4.467a.467.467 0 100-.933.467.467 0 000 .933zm1.4.467a.467.467 0 11-.934 0 .467.467 0 01.934 0zm-2.334.466a.467.467 0 100-.933.467.467 0 000 .933zm-1.4-.466a.467.467 0 11-.933 0 .467.467 0 01.933 0zM1.4 4.233a.467.467 0 100-.933.467.467 0 000 .933zm1.4.467a.467.467 0 11-.933 0 .467.467 0 01.933 0zm1.4.467a.467.467 0 100-.934.467.467 0 000 .934zM6.533 4.7a.467.467 0 11-.933 0 .467.467 0 01.933 0zM7 6.1a.467.467 0 100-.933.467.467 0 000 .933zm-1.4-.467a.467.467 0 11-.933 0 .467.467 0 01.933 0zM3.267 6.1a.467.467 0 100-.933.467.467 0 000 .933zm-1.4-.467a.467.467 0 11-.934 0 .467.467 0 01.934 0z" clip-rule="evenodd"/></g></g><defs><linearGradient id="paint0_linear_343_121520" x1=".933" x2=".933" y1="1.433" y2="6.1" gradientUnits="userSpaceOnUse"><stop stop-color="#fff"/><stop offset="1" stop-color="#F0F0F0"/></linearGradient><filter id="filter0_d_343_121520" width="6.533" height="5.667" x=".933" y="1.433" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset dy="1"/><feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.06 0"/><feBlend in2="BackgroundImageFix" result="effect1_dropShadow_343_121520"/><feBlend in="SourceGraphic" in2="effect1_dropShadow_343_121520" result="shape"/></filter></defs></svg>
        +1 <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/></svg>
        </button>
        <div id="dropdown-phone" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-52 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-phone-button">
                <li>
                    <button type="button" class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                        <div class="inline-flex items-center">
                            <svg fill="none" aria-hidden="true" class="h-4 w-4 me-2" viewBox="0 0 20 15"><rect width="19.6" height="14" y=".5" fill="#fff" rx="2"/><mask id="a" style="mask-type:luminance" width="20" height="15" x="0" y="0" maskUnits="userSpaceOnUse"><rect width="19.6" height="14" y=".5" fill="#fff" rx="2"/></mask><g mask="url(#a)"><path fill="#D02F44" fill-rule="evenodd" d="M19.6.5H0v.933h19.6V.5zm0 1.867H0V3.3h19.6v-.933zM0 4.233h19.6v.934H0v-.934zM19.6 6.1H0v.933h19.6V6.1zM0 7.967h19.6V8.9H0v-.933zm19.6 1.866H0v.934h19.6v-.934zM0 11.7h19.6v.933H0V11.7zm19.6 1.867H0v.933h19.6v-.933z" clip-rule="evenodd"/><path fill="#46467F" d="M0 .5h8.4v6.533H0z"/><g filter="url(#filter0_d_343_121520)"><path fill="url(#paint0_linear_343_121520)" fill-rule="evenodd" d="M1.867 1.9a.467.467 0 11-.934 0 .467.467 0 01.934 0zm1.866 0a.467.467 0 11-.933 0 .467.467 0 01.933 0zm1.4.467a.467.467 0 100-.934.467.467 0 000 .934zM7.467 1.9a.467.467 0 11-.934 0 .467.467 0 01.934 0zM2.333 3.3a.467.467 0 100-.933.467.467 0 000 .933zm2.334-.467a.467.467 0 11-.934 0 .467.467 0 01.934 0zm1.4.467a.467.467 0 100-.933.467.467 0 000 .933zm1.4.467a.467.467 0 11-.934 0 .467.467 0 01.934 0zm-2.334.466a.467.467 0 100-.933.467.467 0 000 .933zm-1.4-.466a.467.467 0 11-.933 0 .467.467 0 01.933 0zM1.4 4.233a.467.467 0 100-.933.467.467 0 000 .933zm1.4.467a.467.467 0 11-.933 0 .467.467 0 01.933 0zm1.4.467a.467.467 0 100-.934.467.467 0 000 .934zM6.533 4.7a.467.467 0 11-.933 0 .467.467 0 01.933 0zM7 6.1a.467.467 0 100-.933.467.467 0 000 .933zm-1.4-.467a.467.467 0 11-.933 0 .467.467 0 01.933 0zM3.267 6.1a.467.467 0 100-.933.467.467 0 000 .933zm-1.4-.467a.467.467 0 11-.934 0 .467.467 0 01.934 0z" clip-rule="evenodd"/></g></g><defs><linearGradient id="paint0_linear_343_121520" x1=".933" x2=".933" y1="1.433" y2="6.1" gradientUnits="userSpaceOnUse"><stop stop-color="#fff"/><stop offset="1" stop-color="#F0F0F0"/></linearGradient><filter id="filter0_d_343_121520" width="6.533" height="5.667" x=".933" y="1.433" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset dy="1"/><feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.06 0"/><feBlend in2="BackgroundImageFix" result="effect1_dropShadow_343_121520"/><feBlend in="SourceGraphic" in2="effect1_dropShadow_343_121520" result="shape"/></filter></defs></svg>
                            United States (+1)
                        </div>
                    </button>
                </li>
                <li>
                    <button type="button" class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                        <div class="inline-flex items-center">
                            <svg class="h-4 w-4 me-2" fill="none" viewBox="0 0 20 15"><rect width="19.6" height="14" y=".5" fill="#fff" rx="2"/><mask id="a" style="mask-type:luminance" width="20" height="15" x="0" y="0" maskUnits="userSpaceOnUse"><rect width="19.6" height="14" y=".5" fill="#fff" rx="2"/></mask><g mask="url(#a)"><path fill="#0A17A7" d="M0 .5h19.6v14H0z"/><path fill="#fff" fill-rule="evenodd" d="M-.898-.842L7.467 4.8V-.433h4.667V4.8l8.364-5.642L21.542.706l-6.614 4.46H19.6v4.667h-4.672l6.614 4.46-1.044 1.549-8.365-5.642v5.233H7.467V10.2l-8.365 5.642-1.043-1.548 6.613-4.46H0V5.166h4.672L-1.941.706-.898-.842z" clip-rule="evenodd"/><path stroke="#DB1F35" stroke-linecap="round" stroke-width=".667" d="M13.067 4.933L21.933-.9M14.009 10.088l7.947 5.357M5.604 4.917L-2.686-.67M6.503 10.024l-9.189 6.093"/><path fill="#E6273E" fill-rule="evenodd" d="M0 8.9h8.4v5.6h2.8V8.9h8.4V6.1h-8.4V.5H8.4v5.6H0v2.8z" clip-rule="evenodd"/></g></svg>
                            United Kingdom (+44)
                        </div>
                    </button>
                </li>
                <li>
                    <button type="button" class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                        <div class="inline-flex items-center">
                            <svg class="h-4 w-4 me-2" fill="none" viewBox="0 0 20 15" xmlns="http://www.w3.org/2000/svg"><rect width="19.6" height="14" y=".5" fill="#fff" rx="2"/><mask id="a" style="mask-type:luminance" width="20" height="15" x="0" y="0" maskUnits="userSpaceOnUse"><rect width="19.6" height="14" y=".5" fill="#fff" rx="2"/></mask><g mask="url(#a)"><path fill="#0A17A7" d="M0 .5h19.6v14H0z"/><path fill="#fff" stroke="#fff" stroke-width=".667" d="M0 .167h-.901l.684.586 3.15 2.7v.609L-.194 6.295l-.14.1v1.24l.51-.319L3.83 5.033h.73L7.7 7.276a.488.488 0 00.601-.767L5.467 4.08v-.608l2.987-2.134a.667.667 0 00.28-.543V-.1l-.51.318L4.57 2.5h-.73L.66.229.572.167H0z"/><path fill="url(#paint0_linear_374_135177)" fill-rule="evenodd" d="M0 2.833V4.7h3.267v2.133c0 .369.298.667.666.667h.534a.667.667 0 00.666-.667V4.7H8.2a.667.667 0 00.667-.667V3.5a.667.667 0 00-.667-.667H5.133V.5H3.267v2.333H0z" clip-rule="evenodd"/><path fill="url(#paint1_linear_374_135177)" fill-rule="evenodd" d="M0 3.3h3.733V.5h.934v2.8H8.4v.933H4.667v2.8h-.934v-2.8H0V3.3z" clip-rule="evenodd"/><path fill="#fff" fill-rule="evenodd" d="M4.2 11.933l-.823.433.157-.916-.666-.65.92-.133.412-.834.411.834.92.134-.665.649.157.916-.823-.433zm9.8.7l-.66.194.194-.66-.194-.66.66.193.66-.193-.193.66.193.66-.66-.194zm0-8.866l-.66.193.194-.66-.194-.66.66.193.66-.193-.193.66.193.66-.66-.193zm2.8 2.8l-.66.193.193-.66-.193-.66.66.193.66-.193-.193.66.193.66-.66-.193zm-5.6.933l-.66.193.193-.66-.193-.66.66.194.66-.194-.193.66.193.66-.66-.193zm4.2 1.167l-.33.096.096-.33-.096-.33.33.097.33-.097-.097.33.097.33-.33-.096z" clip-rule="evenodd"/></g><defs><linearGradient id="paint0_linear_374_135177" x1="0" x2="0" y1=".5" y2="7.5" gradientUnits="userSpaceOnUse"><stop stop-color="#fff"/><stop offset="1" stop-color="#F0F0F0"/></linearGradient><linearGradient id="paint1_linear_374_135177" x1="0" x2="0" y1=".5" y2="7.033" gradientUnits="userSpaceOnUse"><stop stop-color="#FF2E3B"/><stop offset="1" stop-color="#FC0D1B"/></linearGradient></defs></svg>
                            Australia (+61)
                        </div>
                    </button>
                </li>
                <li>
                    <button type="button" class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                        <div class="inline-flex items-center">
                            <svg class="w-4 h-4 me-2" fill="none" viewBox="0 0 20 15"><rect width="19.6" height="14" y=".5" fill="#fff" rx="2"/><mask id="a" style="mask-type:luminance" width="20" height="15" x="0" y="0" maskUnits="userSpaceOnUse"><rect width="19.6" height="14" y=".5" fill="#fff" rx="2"/></mask><g mask="url(#a)"><path fill="#262626" fill-rule="evenodd" d="M0 5.167h19.6V.5H0v4.667z" clip-rule="evenodd"/><g filter="url(#filter0_d_374_135180)"><path fill="#F01515" fill-rule="evenodd" d="M0 9.833h19.6V5.167H0v4.666z" clip-rule="evenodd"/></g><g filter="url(#filter1_d_374_135180)"><path fill="#FFD521" fill-rule="evenodd" d="M0 14.5h19.6V9.833H0V14.5z" clip-rule="evenodd"/></g></g><defs><filter id="filter0_d_374_135180" width="19.6" height="4.667" x="0" y="5.167" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset/><feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.06 0"/><feBlend in2="BackgroundImageFix" result="effect1_dropShadow_374_135180"/><feBlend in="SourceGraphic" in2="effect1_dropShadow_374_135180" result="shape"/></filter><filter id="filter1_d_374_135180" width="19.6" height="4.667" x="0" y="9.833" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset/><feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.06 0"/><feBlend in2="BackgroundImageFix" result="effect1_dropShadow_374_135180"/><feBlend in="SourceGraphic" in2="effect1_dropShadow_374_135180" result="shape"/></filter></defs></svg>
                            Germany (+49)
                        </div>
                    </button>
                </li>
                <li>
                    <button type="button" class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                        <div class="inline-flex items-center">
                            <svg class="w-4 h-4 me-2" fill="none" viewBox="0 0 20 15"><rect width="19.1" height="13.5" x=".25" y=".75" fill="#fff" stroke="#F5F5F5" stroke-width=".5" rx="1.75"/><mask id="a" style="mask-type:luminance" width="20" height="15" x="0" y="0" maskUnits="userSpaceOnUse"><rect width="19.1" height="13.5" x=".25" y=".75" fill="#fff" stroke="#fff" stroke-width=".5" rx="1.75"/></mask><g mask="url(#a)"><path fill="#F44653" d="M13.067.5H19.6v14h-6.533z"/><path fill="#1035BB" fill-rule="evenodd" d="M0 14.5h6.533V.5H0v14z" clip-rule="evenodd"/></g></svg>
                            France (+33)
                        </div>
                    </button>
                </li>
                <li>
                    <button type="button" class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                        <div class="inline-flex items-center">
                            <svg class="w-4 h-4 me-2" fill="none" viewBox="0 0 20 15"><rect width="19.6" height="14" y=".5" fill="#fff" rx="2"/><mask id="a" style="mask-type:luminance" width="20" height="15" x="0" y="0" maskUnits="userSpaceOnUse"><rect width="19.6" height="14" y=".5" fill="#fff" rx="2"/></mask><g mask="url(#a)"><path fill="#262626" fill-rule="evenodd" d="M0 5.167h19.6V.5H0v4.667z" clip-rule="evenodd"/><g filter="url(#filter0_d_374_135180)"><path fill="#F01515" fill-rule="evenodd" d="M0 9.833h19.6V5.167H0v4.666z" clip-rule="evenodd"/></g><g filter="url(#filter1_d_374_135180)"><path fill="#FFD521" fill-rule="evenodd" d="M0 14.5h19.6V9.833H0V14.5z" clip-rule="evenodd"/></g></g><defs><filter id="filter0_d_374_135180" width="19.6" height="4.667" x="0" y="5.167" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset/><feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.06 0"/><feBlend in2="BackgroundImageFix" result="effect1_dropShadow_374_135180"/><feBlend in="SourceGraphic" in2="effect1_dropShadow_374_135180" result="shape"/></filter><filter id="filter1_d_374_135180" width="19.6" height="4.667" x="0" y="9.833" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset/><feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.06 0"/><feBlend in2="BackgroundImageFix" result="effect1_dropShadow_374_135180"/><feBlend in="SourceGraphic" in2="effect1_dropShadow_374_135180" result="shape"/></filter></defs></svg>
                            Germany (+49)
                        </div>
                    </button>
                </li>
            </ul>
        </div>
        <label for="phone-input" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Phone number:</label>
        <div class="relative w-full">
            <input type="text" id="phone-input" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-0 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" required />
        </div>
    </div>
</form>

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