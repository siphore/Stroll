export function addRoute(map, coordinates) {
    const url = `https://router.project-osrm.org/route/v1/driving/${coordinates.join(
        ";"
    )}?overview=full&geometries=geojson`;

    fetch(url)
        .then((response) => response.json())
        .then((data) => {
            const route = data.routes[0].geometry;
            const sourceId = `route-${Date.now()}`;

            const addRouteSourceAndLayer = () => {
                if (!map.getSource(sourceId)) {
                    addSourceAndLayer(map, sourceId, route);
                    addMarkers(map, coordinates);
                }
            };

            if (map.isStyleLoaded()) {
                addRouteSourceAndLayer();
            } else {
                map.on("style.load", () => {
                    addRouteSourceAndLayer();
                });
            }
        })
        .catch((err) =>
            console.error("Error fetching route or adding layer:", err)
        );
}

function addSourceAndLayer(map, sourceId, route) {
    if (!map.getSource(sourceId)) {
        map.addSource(sourceId, {
            type: "geojson",
            data: {
                type: "Feature",
                properties: {},
                geometry: route,
            },
        });

        map.addLayer({
            id: sourceId,
            type: "line",
            source: sourceId,
            layout: {
                "line-join": "round",
                "line-cap": "round",
            },
            paint: {
                "line-color": "#ff0000",
                "line-width": 4,
            },
        });
    }
}

function addMarkers(map, coordinates) {
    // Add a marker at the starting point
    new maplibregl.Marker({ color: "green" })
        .setLngLat(coordinates[0])
        .addTo(map);

    // Add a marker at the ending point
    new maplibregl.Marker({ color: "red" })
        .setLngLat(coordinates[1])
        .addTo(map);
}

// function addMarkers(map, coordinates) {
//     // Create a DOM element for the starting point marker
//     const startEl = document.createElement('div');
//     startEl.className = 'marker';
//     startEl.textContent = 'A';
//     startEl.style.backgroundColor = 'green';
//     startEl.style.color = 'white';
//     startEl.style.borderRadius = '50%';
//     startEl.style.width = '30px';
//     startEl.style.height = '30px';
//     startEl.style.display = 'flex';
//     startEl.style.justifyContent = 'center';
//     startEl.style.alignItems = 'center';

//     // Add the starting point marker
//     new maplibregl.Marker(startEl)
//         .setLngLat(coordinates[0])
//         .addTo(map);

//     // Create a DOM element for the ending point marker
//     const endEl = document.createElement('div');
//     endEl.className = 'marker';
//     endEl.textContent = 'B';
//     endEl.style.backgroundColor = 'red';
//     endEl.style.color = 'white';
//     endEl.style.borderRadius = '50%';
//     endEl.style.width = '30px';
//     endEl.style.height = '30px';
//     endEl.style.display = 'flex';
//     endEl.style.justifyContent = 'center';
//     endEl.style.alignItems = 'center';

//     // Add the ending point marker
//     new maplibregl.Marker(endEl)
//         .setLngLat(coordinates[1])
//         .addTo(map);
// }
