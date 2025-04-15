<!DOCTYPE html>
<html>
<head>
    <title>Show Path</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map { height: 600px; }
    </style>
</head>
<body>

    <h1>Select Shops to Display Path</h1>

    <form id="pathForm">
        <label for="start_shop_id">Start Shop:</label>
        <select id="start_shop_id" name="start_shop_id">
            @foreach ($shops as $shop)
                <option value="{{ $shop->id }}">{{ $shop->name }}</option>
            @endforeach
        </select>

        <label for="end_shop_id">End Shop:</label>
        <select id="end_shop_id" name="end_shop_id">
            @foreach ($shops as $shop)
                <option value="{{ $shop->id }}">{{ $shop->name }}</option>
            @endforeach
        </select>

        <button type="submit">Show Path</button>
    </form>

    <div id="map"></div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
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

        let displayedPath = null;

        document.getElementById('pathForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const startShopId = document.getElementById('start_shop_id').value;
            const endShopId = document.getElementById('end_shop_id').value;

            fetch("{{ route('paths.get') }}", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    map_id: {{ 1 }},
                    start_shop_id: startShopId,
                    end_shop_id: endShopId
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    displayPath(data.path);
                } else {
                    alert(data.message);
                }
            });
        });

        function displayPath(pathData) {
            if (displayedPath) {
                map.removeLayer(displayedPath);
            }
          //  const reversedPath = pathData.slice().reverse(); 

            console.log(pathData);
           // console.log(reversedPath);
            displayedPath = L.polyline(pathData, { color: 'red' }).addTo(map);
          //  displayedPath = L.polyline(reversedPath, { color: 'red' }).addTo(map);
        }


    </script>
</body>
</html>
