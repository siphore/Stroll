export function addLocation(map, coordinates, popup) {
    const marker = new maplibregl.Marker({
        color: "#000",
    })
        .setLngLat(coordinates)
        .setPopup(popup)
        .addTo(map);

    return marker;
}
