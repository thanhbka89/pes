<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name')}}</title>
        <link rel="stylesheet" href="{{mix('css/app.css')}}">

        <script>
            window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
        </script>
        <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                        <a href="{{ url('/en/admin/brands') }}">Dashboard</a>
                    @endif
                </div>
            @endif
        </div>
        <div id="app">
          <!-- Sử dụng component Example.vue -->
          <example></example>
        </div>
        
        <section id="result"></section>
        <section id="gMap"></section>
        <script>
            var result = document.querySelector('#result');
            navigator.geolocation.getCurrentPosition(geoSuccess, geoError)

            function geoSuccess(position){
                var lati = position.coords.latitude;
                var loti = position.coords.longitude;
                var accu = position.coords.accuracy;
                result.innerHTML += 'Latitude: ' + lati + '<br>Longitude: ' + loti;
                // Google Map
                var mapcanvas = document.createElement('div');
                mapcanvas.id = 'mapcontainer';
                // Set width, height for Map
                mapcanvas.style.height = '600px';
                mapcanvas.style.width = '1000px';
                document.querySelector('#gMap').appendChild(mapcanvas);
                var coords = new google.maps.LatLng(lati,loti);
                var options = {
                    zoom: 15,
                    center: coords,
                    // Control buttons to switch between navigation maps Map and Satellite type.
                    mapTypeControl: true,
                    navigationControlOptions: {
                    style: google.maps.NavigationControlStyle.SMALL
                },
                // Declaring help Google API to know that you're using the default type map yet? ROADMAP; SATELLITE; HYBRID; TERRAIN.
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("mapcontainer"), options);
            var rendererOptions = { map: map };
            directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions);
            // Begin route
            // Customer's position
            var start_point = new google.maps.LatLng (lati,105.8082395);
            // Shop's position
            var dest_point = new google.maps.LatLng (lati,loti);
            var request = {
                origin: dest_point,
                destination: start_point,
                travelMode: google.maps.DirectionsTravelMode.DRIVING
            };

            // Declaring service of Google Map API guide.
            directionsService = new google.maps.DirectionsService();
            directionsService.route(request, function(response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);
                    var distance = response.routes[0].legs[0].distance.text;
                    result.innerHTML += '<br>How far: ' + distance + ' Accuracy: ' + accu;
                } else {
                    alert("Failed to get directions");
                }
            });
        }

        // Error
        function geoError(error) {
            switch(error.code) {
                case error.PERMISSION_DENIED:
                    x.innerHTML = "User denied the request for Geolocation."
                    break;
                case error.POSITION_UNAVAILABLE:
                    x.innerHTML = "Location information is unavailable."
                    break;
                case error.TIMEOUT:
                    x.innerHTML = "The request to get user location timed out."
                    break;
                case error.UNKNOWN_ERROR:
                    x.innerHTML = "An unknown error occurred."
                    break;
            }
        }
        </script>

        <script src="{{mix('js/app.js')}}"></script>
    </body>
</html>
