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

<div class="fixed  left-1/2 transform -translate-x-[256px] bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 z-50">
                            <form action="/update_client/{{$client[0] -> id_client}}" method="post">
                            
                                @csrf
                                <div class="relative flex items-center py-5">
                                    <div class="flex-grow border-t border-gray-600"></div>
                                    <span class="flex-shrink mx-4 text-gray-600">Fiche client</span>
                                    <div class="flex-grow border-t border-gray-600"></div>
                                </div>
                                <div class="container items-center p-2">
                                    <h1 class="font-bold text-center">Identité</h1>
                                    <label>Nom : </label><input name="nom" type="text" placeholder="DUPONT" value="{{$client[0] -> nom}}">
                                    <label>Préom : </label><input name="prenom" type="text" placeholder="Jean-Luc" value="{{$client[0] -> prenom}}">
                                </div>
                                <label>Email : </label><input name="mail" type="email" placeholder="test@exemple.com" value="{{$client[0] -> mail}}">
                                <label>Adresse : </label><input name="adresse" type="text" placeholder="11 Rue de Mirecourt" value="{{$client[0] -> adresse}}">
                                <label>Ville : </label><input name="ville" type="text" placeholder="Ville-sur-Illon" value="{{$client[0] -> ville}}">
                                <label>Code postal : </label><input name="code_postal" type="text" placeholder="88270" value="{{$client[0] -> code_postal}}">
                                <label>Pays : </label><input name="pays" type="text" placeholder="France" value="{{$client[0] -> pays}}">
                                <label>Téléphone : </label><input name="telephone" type="tel" placeholder="+33 1 23 45 67 89" value="{{$client[0] -> telephone}}">
                                <label>Note : </label><textarea name="notes" type="text" placeholder="Eventuelles notes et/ou information supplémentaires">{{$client[0] -> notes}}</textarea>
                                <button type="submit" class="flex justify-center w-1/2 px-5 py-2 text-sm text-white transition-colors duration-200 bg-orange-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-orange-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Editer la fiche</button>
                            </form>

                            <a href="/clients" class="flex justify-center w-1/2 px-5 py-2 text-sm text-white transition-colors duration-200 bg-red-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rotate-45">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Annuler</a>
                        </div>
                    </div>

</form>
    <!-- Inclusion du composant de la navbar -->
