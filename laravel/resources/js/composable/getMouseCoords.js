export function getCoords(map) {
    let coordinates = [];
    let markerList = [];

    map.on("click", (e) => {
        const lngLat = e.lngLat.wrap();
        coordinates.push([lngLat.lng, lngLat.lat]);
        console.log(coordinates);

        // Add a marker for each point
        const marker = new maplibregl.Marker()
            .setLngLat([lngLat.lng, lngLat.lat])
            .addTo(map);
        markerList.push(marker);
    });

    // Example to clear markers and routes
    const clearButton = document.getElementById("clear");
    clearButton.onclick = () => {
        coordinates = [];
        markerList.forEach((marker) => marker.remove());
        markerList = [];

        // Remove all layers and sources related to routes
        map.getStyle()
            .layers.filter((layer) => layer.id.startsWith("route-"))
            .forEach((layer) => {
                map.removeLayer(layer.id);
                map.removeSource(layer.id);
            });
    };
}
