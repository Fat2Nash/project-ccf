<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maps Engins</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19" rel="stylesheet">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css"/>

    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="overflox-y-auto">
    <div class="shadow-md 0 1px 1px 0 rgb(0 0 0 / 0.05)">
        <img src="https://thiriot-locations.com/charte/logo.png" alt="logo" class="ml-10"/>
    </div>

    <section class="relative">
        <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5 overflow-y-auto max-h-98">
            <table class="w-full border-collapse bg-white text-left text-sm text-gray-500 ">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="px-6 py-4 font-medium text-gray-900">Nom de l'engin</th>
                  <th scope="col" class="px-6 py-4 font-medium text-gray-900">Marque</th>
                  <th scope="col" class="px-6 py-4 font-medium text-gray-900">Modèle</th>
                  <th scope="col" class="px-6 py-4 font-medium text-gray-900">Catégorie</th>
                  <th scope="col" class="px-6 py-4 font-medium text-gray-900">Status</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                <tr class="hover:bg-gray-50" data-lat="48.1872" data-lng="6.4564">
                    <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                      <a href="#" class="flex items-center gap-3 map-link" data-lat="48.8566" data-lng="2.3522">
                        <div class="relative h-10 w-10">
                          <img
                            class="h-full w-full rounded-full object-cover object-center"
                            src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt=""
                          />
                          <span class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
                        </div>
                        <div class="text-sm">
                          <div class="font-medium text-gray-700">Machine 1</div>
                        </div>
                      </a>
                    </th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="px-6 py-4">
                      <span
                        class="inline-flex items-center gap-1 rounded-full px-2 py-1 text-xs font-semibold text-gray-600"
                      >
                        <span class="h-1.5 w-1.5 rounded-full"></span>
                        Louer ou non
                      </span>
                    </td>
                  </tr>
                  <tr class="hover:bg-gray-50">
                    <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                      <div class="relative h-10 w-10">
                        <img
                          class="h-full w-full rounded-full object-cover object-center"
                          src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                          alt=""
                        />
                        <span class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
                      </div>
                      <div class="text-sm">
                        <div class="font-medium text-gray-700">Machine 2</div>
                      </div>
                    </th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="px-6 py-4">
                      <span
                        class="inline-flex items-center gap-1 rounded-full px-2 py-1 text-xs font-semibold text-gray-600"
                      >
                        <span class="h-1.5 w-1.5 rounded-full"></span>
                        Louer ou non
                      </span>
                    </td>
                  </tr>
                  <tr class="hover:bg-gray-50">
                    <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                      <div class="relative h-10 w-10">
                        <img
                          class="h-full w-full rounded-full object-cover object-center"
                          src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                          alt=""
                        />
                        <span class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
                      </div>
                      <div class="text-sm">
                        <div class="font-medium text-gray-700">Machine 3</div>
                      </div>
                    </th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="px-6 py-4">
                      <span
                        class="inline-flex items-center gap-1 rounded-full px-2 py-1 text-xs font-semibold text-gray-600"
                      >
                        <span class="h-1.5 w-1.5 rounded-full"></span>
                        Louer ou non
                      </span>
                    </td>
                  </tr>
                  <tr class="hover:bg-gray-50">
                    <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                      <div class="relative h-10 w-10">
                        <img
                          class="h-full w-full rounded-full object-cover object-center"
                          src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                          alt=""
                        />
                        <span class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
                      </div>
                      <div class="text-sm">
                        <div class="font-medium text-gray-700">Machine 4</div>
                      </div>
                    </th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="px-6 py-4">
                      <span
                        class="inline-flex items-center gap-1 rounded-full px-2 py-1 text-xs font-semibold text-gray-600"
                      >
                        <span class="h-1.5 w-1.5 rounded-full"></span>
                        Louer ou non
                      </span>
                    </td>
                  </tr>
                <tr class="hover:bg-gray-50">
                  <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                    <div class="relative h-10 w-10">
                      <img
                        class="h-full w-full rounded-full object-cover object-center"
                        src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt=""
                      />
                      <span class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
                    </div>
                    <div class="text-sm">
                      <div class="font-medium text-gray-700">Machine 5</div>
                    </div>
                  </th>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td class="px-6 py-4">
                    <span
                      class="inline-flex items-center gap-1 rounded-full px-2 py-1 text-xs font-semibold text-gray-600"
                    >
                      <span class="h-1.5 w-1.5 rounded-full"></span>
                      Louer ou non
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
    </section>

    <section class="relative flex justify-center items-center">
        <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md overflow-y-auto max-h-46 w-[1280px] mt-5">
            <div id="map" class="h-[600px]"></div>
        </div>
    </section>

    <footer class="inset-x-0 bottom-0 pt-8 pb-6 mt-16 shadow-inner">
        <div class="container mx-auto px-4">
          <div class="flex flex-wrap items-center md:justify-between justify-center">
            <div class="w-full md:w-6/12 px-4 mx-auto text-center">
              <div class="text-sm text-blueGray-500 font-semibold py-1">
                <button><h3 class="font-semibold text-base text-blueGray-700"><a href="">Retour Acceuil</a></h3></button>
              </div>
            </div>
          </div>
        </div>
      </footer>

      <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
      <script>
                document.addEventListener('DOMContentLoaded', function () {
            var map = L.map('map').setView([48.8566, 2.3522], 13); // Centre la carte sur Paris

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Déclaration de la variable marker
            var marker;

            // Ajouter un gestionnaire d'événements au lien de la carte
            var mapLinks = document.querySelectorAll('.map-link');
            mapLinks.forEach(function(link) {
                link.addEventListener('click', function(event) {
                    event.preventDefault(); // Pour empêcher le comportement de lien par défaut
                    var lat = Localisation.Latitude
                    var lng = Localisation.Longitude

                    // Supprimer le marqueur précédent s'il existe
                    if (marker && map.hasLayer(marker)) {
                        map.removeLayer(marker);
                    }
                    // Créer un nouveau marqueur aux coordonnées cliquées
                    marker = L.marker([lat, lng]).addTo(map);
                    map.setView([lat, lng], 13);
                });
            });
        });
    </script>
</body>
</html>
