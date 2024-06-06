import { Marker } from "mapbox-gl";

export function addLocation(map, coordinates) {
    console.log(coordinates);
    // const marker = new Marker({
    //     color: "#FFFFFF",
    // })
    //     .setLngLat(coordinates)
    //     .addTo(map);

    const marker = new maplibregl.Marker().setLngLat(coordinates).addTo(map);
}
