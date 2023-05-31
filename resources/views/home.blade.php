<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web Gis</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

    <script src="https://unpkg.com/esri-leaflet-vector@4.0.1/dist/esri-leaflet-vector.js" crossorigin=""></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


    {{-- <script src="geojson/tes.geojson"></script> --}}

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
    <style>
        #map {
            height: 500px;
        }
    </style>

    {{-- style tampilan popup --}}
    <style>
        .custom-popup {
            max-width: 300px;
        }

        .popup-image {
            width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        .popup-title {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .popup-address {
            margin-bottom: 5px;
        }

        .popup-buttons {
            margin-top: 10px;
        }

        .popup-buttons button {
            margin-right: 5px;
        }

        .popup-buttons button remove {
            margin-top: 10px;
        }
    </style>


</head>

<body>
    <div id="map"></div>



    <script>
        // Inisialisasi peta
        var map = L.map('map').setView([-7.5675114, 112.4505864], 9);

        // Menambahkan Tile Layer
        L.tileLayer('http://mt0.google.com/vt/lyrs=p&hl=en&x={x}&y={y}&z={z}&s=Ga', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);


        // A $( document ).ready() block.
        $(document).ready(function(){
            $.geoJSON('titik/json',function(data) {
                alert(data);
            });
        });

        // Icon untuk marker Bus
        var busIcon = L.icon({
            iconUrl: 'assets/icons/religi-01.png',
            iconSize: [40, 45],
            // shadowSize: [50, 64],
            // iconAnchor: [22, 94],
            // shadowAnchor: [4, 62],
            // popupAnchor: [-3, -76]
        });

        // Mengambil data GeoJSON dan menambahkannya ke peta
        $.getJSON('geojson/jatim2.geojson', function(data) {
            L.geoJSON(data, {
                pointToLayer: function(feature, latlng) {
                    return L.marker(latlng, {
                        icon: busIcon
                    });
                },

                onEachFeature: function(feature, layer) {
                    var properties = feature.properties;

                    // Mendapatkan informasi yang diinginkan dari properti
                    var fcode = properties.FCODE;
                    var remark = properties.REMARK;

                    // Mendapatkan koordinat
                    var coordinates = feature.geometry.coordinates;
                    var latitude = coordinates[1];
                    var longitude = coordinates[0];

                    // Membuat konten popup dengan informasi titik
                    var popupContent =
                        "<img src='" + properties.Gambar + "' class='popup-image' />" +
                        "<div class='popup-title'>Tempat: " + properties.Tempat + "</div>" +
                        "<div class='popup-address'><strong>Alamat:</strong> " + properties.Alamat +
                        "</div>" +
                        "<div><strong>Latitude:</strong> " + latitude + "</div>" +
                        "<div><strong>Longitude:</strong> " + longitude + "</div>" +
                        "<div class='popup-buttons'>" +
                        "<button class='btn btn-info' onclick='return keAwal(" + latitude + ", " +
                        longitude + ")'>Start</button>" +
                        "<button class='btn btn-success' onclick='return keAkhir(" + latitude + ", " +
                        longitude + ")'>Dest</button>" +
                        "<br><br><button class='btn btn-danger remove' onclick='return stopRouting(" +
                        latitude +
                        ", " + longitude + ")'>Remove Route</button>" +
                        "</div>";


                    // Mengikat konten popup ke layer
                    layer.bindPopup(popupContent, {
                        className: 'custom-popup'
                    });
                }
            }).addTo(map);
        });

        // L.Routing.control({
        //     waypoints: [
        //         L.latLng(-7.599187514, 112.78720839799996),
        //         L.latLng(-7.38659453000002, 112.733095929)
        //     ]
        // }).addTo(map);

        // Membuat rute antara tempat wisata religi A dan B
        var control = null;

        function Routing() {
            control = L.Routing.control({
                waypoints: [
                    L.latLng(),
                    L.latLng()
                ],
                createMarker: function() {
                    // Mengembalikan null untuk menghindari pembuatan ikon default
                    return null;
                }
            })
            control.addTo(map);
        }


        function keAwal(latitude, longitude) {
            var latLng0 = L.latLng(latitude, longitude);
            if (control == null) {
                Routing();
                control.spliceWaypoints(0, 1, latLng0);
                control.spliceWaypoints(control.getWaypoints().length - 1, 1, latLng1);
            }
            control.spliceWaypoints(0, 1, latLng0);

        }

        function keAkhir(latitude, longitude) {
            var latLng1 = L.latLng(latitude, longitude);
            control.spliceWaypoints(control.getWaypoints().length - 1, 1, latLng1);
        }

        function stopRouting() {
            control.remove();
            control = null;
        }
    </script>
</body>

</html>
