<!DOCTYPE html>
<html>
<head>
    <title>Map Viewer</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map { height: 600px; }
    </style>
</head>
<body>
    <h2>{{ $map->name }}</h2>
    <div id="map"></div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        const map = L.map('map', {
            crs: L.CRS.Simple,
            minZoom: -2
        });

        const image = new Image();
        image.src = "{{ asset('storage/' . $map->image_path) }}";
        image.onload = function () {
            const w = image.width, h = image.height;
            const bounds = [[0, 0], [h, w]];
            const layer = L.imageOverlay(image.src, bounds).addTo(map);
            map.fitBounds(bounds);

            @foreach ($shops as $shop)
                L.marker([{{ $shop->y_coordinate }}, {{ $shop->x_coordinate }}])
                    .addTo(map)
                    .bindPopup("{{ $shop->name }}");
            @endforeach

            map.on('click', function(e) {
                const x = e.latlng.lng.toFixed(2);
                const y = e.latlng.lat.toFixed(2);
                alert(`Clicked at X: ${x}, Y: ${y}`);
            });
        };
    </script>
</body>
</html>
