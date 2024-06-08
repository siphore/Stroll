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
}
