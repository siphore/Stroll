const routes = {};

export async function addRoute(map, coordinates, routeId, markers, formStore) {
    const url = `https://router.project-osrm.org/route/v1/driving/${coordinates.join(
        ";"
    )}?overview=full&geometries=geojson`;

    try {
        const response = await fetch(url);
        if (!response.ok) {
            throw new Error("Network response was not ok");
        }
        const data = await response.json();
        const route = data.routes[0].geometry;
        console.log(data);

        formStore.distance = data.routes[0].distance;
        formStore.duration = data.routes[0].distance * 1.3 / 60;

        const addRouteSourceAndLayer = () => {
            if (!map.getSource(routeId)) {
                routes[routeId] = {
                    sourceId: routeId,
                    layerId: routeId,
                    markers: [],
                };
                addSourceAndLayer(map, routeId, route);
                addMarkers(map, coordinates, routeId, markers);
            }
        };

        const waitForStyleLoad = () => {
            return new Promise((resolve) => {
                if (map.isStyleLoaded()) {
                    resolve();
                } else {
                    map.once("style.load", resolve);
                }
            });
        };

        waitForStyleLoad()
            .then(() => {
                addRouteSourceAndLayer();
            })
            .catch((err) => {
                console.error("Error waiting for style to load:", err);
            });
    } catch (error) {
        console.error("Error fetching route or adding layer:", error);
    }
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

function addMarkers(map, coordinates, routeId, markers) {
    coordinates.forEach((coord, index) => {
        const color =
            index === 0
                ? "green"
                : index === coordinates.length - 1
                ? "red"
                : "blue";
        const marker = new maplibregl.Marker({ color })
            .setLngLat(coord)
            .addTo(map);
        routes[routeId].markers.push(marker);
        markers.value.push(marker); // Add marker to markers array
    });
}

export function removeSpecificRoute(map, routeId, markers) {
    const route = routes[routeId];
    if (!route) {
        console.error(`Route with ID ${routeId} not found.`);
        return;
    }

    // Remove source and layer
    if (map.getLayer(route.layerId)) {
        map.removeLayer(route.layerId);
    }
    if (map.getSource(route.sourceId)) {
        map.removeSource(route.sourceId);
    }

    // Remove markers
    route.markers.forEach((marker) => marker.remove());
    markers.value.forEach((marker) => marker.remove());
    markers.value = []; // Clear markers array

    // Remove route from the routes object
    delete routes[routeId];
}
