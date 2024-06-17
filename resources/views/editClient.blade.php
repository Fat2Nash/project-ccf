<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thiriot-Location | Editer client</title>
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
                        Fiche client <span class="uppercase">({{$client[0] -> nom}} {{$client[0] -> prenom}})</span>
                    </h6>
                    <a href="/clients" class="mr-2 ml-auto bg-red-500 cursor-pointer items-center justify-center text-white hover:bg-red-600 font-bold uppercase text-xs pr-4 pl-2 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none ease-linear transition-all duration-150 flex" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Annuler
                    </a>
                </div>
            </div>
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                <form action="/update_client/{{$client[0] -> id_client}}" method="post">
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
                                <input type="text" name="nom" class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{$client[0] -> nom}}">
                            </div>
                        </div>
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-gray-600 text-xs font-bold mb-2">
                                    Prénom
                                </label>
                                <input type="text" name="prenom" class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{$client[0] -> prenom}}">
                            </div>
                        </div>
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-gray-600 text-xs font-bold mb-2">
                                    Email
                                </label>
                                <input type="email" name="mail" class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{$client[0] -> mail}}">
                            </div>
                        </div>
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-gray-600 text-xs font-bold mb-2">
                                    Téléphone
                                </label>
                                <input type="text" name="telephone" class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{ $client[0] -> telephone }}">
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
                                <input type="text" name="adresse" class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{$client[0] -> adresse}}">
                            </div>
                        </div>
                        <div class="w-full lg:w-4/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-gray-600 text-xs font-bold mb-2">
                                    Ville
                                </label>
                                <input type="text" name="ville" class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{$client[0] -> ville}}">
                            </div>
                        </div>
                        <div class="w-full lg:w-4/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-gray-600 text-xs font-bold mb-2">
                                    Code postal
                                </label>
                                <input type="text" name="code_postal" class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{$client[0] -> code_postal}}">
                            </div>
                        </div>
                        <div class="w-full lg:w-4/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-gray-600 text-xs font-bold mb-2">
                                    Pays
                                </label>
                                <input type="text" name="pays" class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{$client[0] -> pays}}">
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
                                <textarea name="notes" class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" rows="4">{{$client[0] -> notes}}</textarea>
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
