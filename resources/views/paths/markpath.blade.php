@extends('master.layout')

@section('content')

<div class="container-fluid">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-draw/dist/leaflet.draw.css" />
    <style>
        #map { height: 600px; }
    </style>


    <div id="map"></div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-draw/dist/leaflet.draw.js"></script>
    <script>
        const map = L.map('map', { crs: L.CRS.Simple, minZoom: -2 });

        const image = new Image();
        image.src = "{{ asset('storage/' . $map->image_path) }}";
        image.onload = function () {
            const w = image.width, h = image.height;
            const bounds = [[0, 0], [h, w]];
            L.imageOverlay(image.src, bounds).addTo(map);
            map.fitBounds(bounds);
        };

        const drawnItems = new L.FeatureGroup();
        map.addLayer(drawnItems);

        const drawControl = new L.Control.Draw({
            edit: { featureGroup: drawnItems },
            draw: {
                polyline: true,
                polygon: false,
                rectangle: false,
                circle: false,
                marker: false,
                circlemarker: false
            }
        });
        map.addControl(drawControl);

        let drawnPath = null;
        let startShop = null;
        let endShop = null;
        let shops = @json($shops); // Shops loaded from the database

        shops.forEach(shop => {
            const marker = L.marker([shop.y_coordinate, shop.x_coordinate]).addTo(map)
                .bindPopup(shop.name)
                .on('click', function () {
                    if (!startShop) {
                        startShop = shop;
                        alert(`Start Shop Selected: ${shop.name}`);
                    } else if (!endShop && shop !== startShop) {
                        endShop = shop;
                        alert(`End Shop Selected: ${shop.name}`);
                    }
                });
        });

        map.on(L.Draw.Event.CREATED, function (event) {
            const layer = event.layer;
            drawnItems.addLayer(layer);
            drawnPath = layer.toGeoJSON().geometry.coordinates;

            if (!startShop || !endShop) {
                alert("Please select both start and end shops by clicking on their markers.");
                drawnItems.removeLayer(layer);
                return;
            }

            savePath();
        });

        function savePath() {
            fetch("{{ route('paths.store') }}", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    map_id: {{ $map->id }},
                    start_shop_id: startShop.id,
                    end_shop_id: endShop.id,
                    path_data: JSON.stringify(drawnPath)
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Path saved successfully!");

                    // Reset the shop selection for the next path
                    startShop = null;
                    endShop = null;
                } else {
                    alert("Failed to save path.");
                }
            });
        }
    </script>
               </div>
               @endsection
