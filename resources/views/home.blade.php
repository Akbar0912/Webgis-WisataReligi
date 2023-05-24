<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web Gis</title>

    <!-- Leaflet Routing Machine Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.css"
        integrity="sha512-82egxSKTIoB6EXIjllwz+Xf6etSIVZ13wKJBGImtSxEKjGpsXZlax2kLgtrUqYV61FcfsY8Pds6e/1HjmSsBGw=="
        crossorigin="" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.js"
        integrity="sha512-7c2oTSXf6uIA7Ud6pZehi9+5QZI/CiAAetbNh4qHkUc7AT2OLutPi4T1q/Uj5+u5ChwsK1Me67wL9G1G5dpAOA=="
        crossorigin=""></script>

    <!-- Stylesheet Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <!-- Leaflet Library -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <!-- jQuery Library -->
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>

    <!-- Esri Leaflet Vector Library -->
    <script src="https://unpkg.com/esri-leaflet-vector@4.0.1/dist/esri-leaflet-vector.js" crossorigin=""></script>

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
            iconUrl: 'assets/icons/pin.png',
            iconSize: [50, 55],
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
                        "<br><button onclick='return keSini(" + latitude + longitude +
                        ")'>Button</button>";

                    // Mengikat konten popup ke layer
                    layer.bindPopup(popupContent);
                }
            }).addTo(map);
        });

        // Membuat rute antara tempat wisata religi A dan B
        L.Routing.control({
            waypoints: [
                L.latLng(-7.5982513440231685, 112.23599844772906),
                L.latLng(-7.561940028535261, 112.34746263818818)
            ],
            show: true, // Menampilkan garis jarak
            lineOptions: {
                styles: [{
                    color: 'blue',
                    opacity: 5,
                    weight: 10
                }]
            }
        }).addTo(map);
    </script>
</body>

</html>
