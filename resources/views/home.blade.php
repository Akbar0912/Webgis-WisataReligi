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


    <script src="geojson/tes.geojson"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        #map {
            height: 600px;
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

        // Icon untuk marka Mosquee
        // var mosquee = L.icon({
        //     iconUrl: 'assets/icons/mosquee.png',
        //     iconSize: [50, 60],
        //     shadowSize: [50, 64],
        //     iconAnchor: [22, 94],
        //     shadowAnchor: [4, 62],
        //     popupAnchor: [-3, -76]
        // });

        // Icon untuk marker Bus
        var busIcon = L.icon({
            iconUrl: 'assets/icons/religi-01.png',
            iconSize: [40, 45],
            shadowSize: [50, 64],
            iconAnchor: [22, 94],
            shadowAnchor: [4, 62],
            popupAnchor: [-3, -76]
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
                        "<img src=" + properties.Gambar + " style='max-width: 200px;'/>" +
                        "<br><storng>Tempat:</strong> " + properties.Tempat +
                        "<br><strong>Alamat:</strong> " + properties.Alamat +
                        "<br><strong>Latitude:</strong> " + latitude +
                        "<br><strong>Longitude:</strong> " + longitude +
                        "<br><button class='btn btn-info' onclick='return keAwal(" + latitude + ", " +
                        longitude + ")'>Start</button>" +
                        " ||| <button class='btn btn-success' onclick='return keAkhir(" + latitude + ", " +
                        longitude + ")'>Dest</button>" +
                        " ||| <button class='btn btn-danger' onclick='return stopRouting(" + latitude +
                        ", " + longitude + ")'>Remove Route</button>";


                    // Mengikat konten popup ke layer
                    layer.bindPopup(popupContent);
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
