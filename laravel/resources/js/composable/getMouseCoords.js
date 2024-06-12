export function getCoords(map, callback) {
    let coordinates = [];
    let markerList = [];

    map.on("click", (e) => {
        const lngLat = e.lngLat.wrap();
        coordinates.push([lngLat.lng, lngLat.lat]);

        // Add a marker for each point
        // const marker = new maplibregl.Marker()
        //     .setLngLat([lngLat.lng, lngLat.lat])
        //     .addTo(map);
        // markerList.push(marker);

        // Call the callback with the new coordinates
        if (callback) {
            callback(coordinates);
        }
    });
}
