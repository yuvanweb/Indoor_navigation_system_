@extends('master.layout')

@section('content')

<div class="container-fluid">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map { 
            height: 600px; 
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-top: 20px;
        }
        #pathForm {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        #pathForm label {
            font-weight: 600;
            margin-right: 10px;
        }
        #pathForm select {
            padding: 8px 12px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            margin-right: 20px;
            min-width: 200px;
        }
        #pathForm button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        #pathForm button:hover {
            background-color: #0069d9;
        }
        .start-icon {
            background-color: #28a745;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            text-align: center;
            line-height: 24px;
            color: white;
            font-weight: bold;
        }
        .end-icon {
            background-color: #dc3545;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            text-align: center;
            line-height: 24px;
            color: white;
            font-weight: bold;
        }
      </style>

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
        // Initialize the map
        const map = L.map('map', { 
            crs: L.CRS.Simple, 
            minZoom: -2,
            attributionControl: false
        });

        // Load the map image
        const image = new Image();
        image.src = "{{ asset('storage/' . $map->image_path) }}";
        image.onload = function () {
            const w = image.width, h = image.height;
            const bounds = [[0, 0], [h, w]];
            L.imageOverlay(image.src, bounds).addTo(map);
            map.fitBounds(bounds);
        };

        // Variables to track displayed elements
        let displayedPath = null;
        let startMarker = null;
        let endMarker = null;
        const shops = @json($shops);

        // Add all shop markers to the map
        shops.forEach(shop => {
            L.marker([shop.y_coordinate, shop.x_coordinate])
                .addTo(map)
                .bindPopup(shop.name);
        });

        // Handle form submission
        document.getElementById('pathForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const startShopId = parseInt(document.getElementById('start_shop_id').value);
            const endShopId = parseInt(document.getElementById('end_shop_id').value);

            // Validate selection
            if (startShopId === endShopId) {
                alert('Please select different shops for start and end points');
                return;
            }

            // Fetch the path data
            fetch("{{ route('paths.get') }}", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    map_id: {{ $map->id }},
                    start_shop_id: startShopId,
                    end_shop_id: endShopId
                })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    // Find the shop details from our local shops array
                    const startShop = shops.find(s => s.id == startShopId);
                    const endShop = shops.find(s => s.id == endShopId);
                    
                    if (!startShop || !endShop) {
                        throw new Error('Shop details not found');
                    }
                    
                    displayPath(data.path, startShop, endShop);
                } else {
                    alert(data.message);
                    clearPath();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while fetching the path: ' + error.message);
                clearPath();
            });
        });

        // Display the path on the map
        function displayPath(pathData, startShop, endShop) {
            // Clear any existing path and markers
            clearPath();
            
            // Convert path data to Leaflet format [lat, lng]
            // Ensure pathData is properly formatted
            const leafletPath = Array.isArray(pathData) 
                ? pathData.map(point => {
                    // Handle both [x,y] and [y,x] formats
                    if (Array.isArray(point) && point.length >= 2) {
                        return [point[1] || point[0], point[0] || point[1]];
                    }
                    return [0, 0]; // fallback
                })
                : [];
            
            // Create the path with blue styling
            displayedPath = L.polyline(leafletPath, {
                color: '#3388ff',
                weight: 5,
                opacity: 0.8,
                dashArray: '10, 5',
                lineJoin: 'round'
            }).addTo(map);
            
            // Add start and end markers with custom icons
            startMarker = L.marker([startShop.y_coordinate, startShop.x_coordinate], {
                icon: L.divIcon({
                    className: 'start-icon',
                    html: '<div class="start-icon">S</div>',
                    iconSize: [24, 24]
                })
            }).addTo(map).bindPopup(`Start: ${startShop.name}`);
            
            endMarker = L.marker([endShop.y_coordinate, endShop.x_coordinate], {
                icon: L.divIcon({
                    className: 'end-icon',
                    html: '<div class="end-icon">E</div>',
                    iconSize: [24, 24]
                })
            }).addTo(map).bindPopup(`End: ${endShop.name}`);
            
            // Zoom to fit the path and markers
            const group = new L.FeatureGroup([displayedPath, startMarker, endMarker]);
            map.fitBounds(group.getBounds().pad(0.2)); // Add 20% padding
        }

        // Clear the current path and markers
        function clearPath() {
            if (displayedPath) {
                map.removeLayer(displayedPath);
                displayedPath = null;
            }
            if (startMarker) {
                map.removeLayer(startMarker);
                startMarker = null;
            }
            if (endMarker) {
                map.removeLayer(endMarker);
                endMarker = null;
            }
        }
    </script>
  </div>
  @endsection