<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thiriot-Location | Editer location</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
    <x-side-navbar />
    <div class="w-full mx-auto lg:w-8/12 px-4 mt-6 ">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg  bg-white">
            <div class="rounded-t  mb-0 px-6 py-6 border-b-2 border-black">
                <div class="flex ">
                    <h6 class="text-gray-700 text-xl font-bold">
                        Fiche location <span class="uppercase">({{ $location -> id_loc_engin }})</span>
                    </h6>
                    <a href="/locations" class="mr-2 ml-auto bg-red-500 cursor-pointer items-center justify-center text-white hover:bg-red-600 font-bold uppercase text-xs pr-4 pl-2 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none ease-linear transition-all duration-150 flex" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Annuler
                    </a>
                </div>
            </div>
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                <form action="/update_loc/{{$location -> id_loc_engin }}" method="post">
                    @csrf
                    <h6 class="text-gray-400 text-sm mt-3 mb-6 font-bold uppercase">
                        Informations
                    </h6>
                    <div class="flex flex-wrap">
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-gray-600 text-xs font-bold mb-2">
                                    Client
                                </label>
                                <select name="client" class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                    @foreach ($clients as $client)
                                    <option value="{{ $client->id_client }}">{{ $client->nom }} {{ $client->prenom }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-gray-600 text-xs font-bold mb-2">
                                    Machine
                                </label>
                                <select name="engin" class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                    @foreach ($engins as $engin)
                                    <option value="{{ $engin->id_engins }}">{{ $engin->marque }} {{ $engin->modele }} (N° : {{ $engin->Num_Machine}})</option>
                                    @endforeach

                                </select>
                            </div>
                        
                        </div>
                    </div>
                    <hr class="mt-6 border-b-1 border-gray-300">
                    <h6 class="text-gray-400 text-sm mt-3 mb-6 font-bold uppercase">
                        Livraison
                    </h6>
                    <div class="flex flex-wrap">
                    <div class="w-full lg:w-12/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-gray-600 text-xs font-bold mb-2">
                                    Adresse
                                </label>
                                <input type="text" name="adresse" class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{$location-> adresse}}">
                            </div>
                        </div>
                        <div class="w-full lg:w-4/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-gray-600 text-xs font-bold mb-2">
                                    Ville
                                </label>
                                <input type="text" name="ville" class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{$location-> ville}}">
                            </div>
                        </div>
                        <div class="w-full lg:w-4/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-gray-600 text-xs font-bold mb-2">
                                    Code postal
                                </label>
                                <input type="text" name="code_postal" class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{$location-> code_postal}}">
                            </div>
                        </div>
                        <div class="w-full lg:w-4/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-gray-600 text-xs font-bold mb-2">
                                    Pays
                                </label>
                                <input type="text" name="pays" class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{$location-> pays}}">
                            </div>
                        </div>
                    </div>

                    <hr class="mt-6 border-b-1 border-gray-300">
                    <h6 class="text-gray-400 text-sm mt-3 mb-6 font-bold uppercase">
                        Dates
                    </h6>
                    <div class="flex flex-wrap">
                    <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-gray-600 text-xs font-bold mb-2">
                                    Début de location
                                </label>
                                <input type="datetime-local" name="debut" class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{$location-> Louer_le}}">
                            </div>
                        </div>
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-gray-600 text-xs font-bold mb-2">
                                    Fin de location
                                </label>
                                <input type="datetime-local" name="rendu" class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{$location-> Rendu_le}}">
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
</main>

</html>