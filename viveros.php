<?php require 'php/functions.php'?>
<html>
  <head>
    <title>Viveros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" type="text/css" href="CSS/estilos.css" />
  </head>
  <body>
  <?php include "includes/nav.php"?>

  <div id="container">
      <div id="map"></div>
      <div id="sidebar">
        <h2>Results</h2>
        <ul id="places"></ul>
        <button id="more">Load more results</button>
      </div>
    </div>
<script>

function initMap() {
  // Create the map.
  if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    const userLocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                const map = new google.maps.Map(document.getElementById("map"), {
                    center: userLocation,
                    zoom: 17,
                    mapId: "8d193001f940fde3",
                });
                    // Agregar un marcador en la ubicación del usuario
                    const marker = new google.maps.Marker({
                        position: userLocation,
                        map: map,
                        title: 'Tu ubicación'
                    });

                    // Create the places service.
                    const service = new google.maps.places.PlacesService(map);
                    let getNextPage;
                    const moreButton = document.getElementById("more");

                    moreButton.onclick = function () {
                        moreButton.disabled = true;
                        if (getNextPage) {
                        getNextPage();
                        }
                    };

                    // Perform a nearby search.
                    service.nearbySearch(
                        { location: userLocation, radius: 10000, keyword: "vivero" },
                        (results, status, pagination) => {
                        if (status !== "OK" || !results) return;

                        addPlaces(results, map);
                        moreButton.disabled = !pagination || !pagination.hasNextPage;
                        if (pagination && pagination.hasNextPage) {
                            getNextPage = () => {
                            // Note: nextPage will call the same handler function as the initial call
                            pagination.nextPage();
                            };
                        }
                        },
                    );
                
                
                
                });

                




            } else {
                // Geolocalización no soportada
                handleLocationError(false, map.getCenter());
            }
  
  
}

function addPlaces(places, map) {
  const placesList = document.getElementById("places");

  for (const place of places) {
    if (place.geometry && place.geometry.location) {
      const image = {
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25),
      };

      new google.maps.Marker({
        map,
        icon: image,
        title: place.name,
        position: place.geometry.location,
      });

      const li = document.createElement("li");

      li.textContent = place.name;
      placesList.appendChild(li);
      li.addEventListener("click", () => {
        map.setCenter(place.geometry.location);
      });
    }
  }
}

window.initMap = initMap;
</script>
    <!-- 
      The `defer` attribute causes the script to execute after the full HTML
      document has been parsed. For non-blocking uses, avoiding race conditions,
      and consistent behavior across browsers, consider loading using Promises. See
      https://developers.google.com/maps/documentation/javascript/load-maps-js-api
      for more information.
      -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdG1GC0tad8uTf4ujOjM1rXm0TM-L6vrA&callback=initMap&libraries=places&v=weekly"
      defer
    ></script>
  </body>
</html>