export function addRoute(map, coordinates) {
    console.log(coordinates);
    const url = `https://router.project-osrm.org/route/v1/driving/${coordinates.join(
        ";"
    )}?overview=full&geometries=geojson`;

    fetch(url)
        .then((response) => response.json())
        .then((data) => {
            const route = data.routes[0].geometry;
            const sourceId = `route-${Date.now()}`;

            if (map.isStyleLoaded()) {
                addSourceAndLayer(map, sourceId, route);
            } else {
                map.on("style.load", () => {
                    addSourceAndLayer(map, sourceId, route);
                });
            }
        })
        .catch((err) => console.error(err));
}

function addSourceAndLayer(map, sourceId, route) {
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
