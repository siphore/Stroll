export function getCoords(map) {
    map.on("click", (e) => {
        console.log(JSON.stringify(e.lngLat.wrap()));
        // document.getElementById("info").innerHTML =
        //     // e.point is the x, y coordinates of the mousemove event relative
        //     // to the top-left corner of the map
        //     `${JSON.stringify(e.point)}<br />${
        //         // e.lngLat is the longitude, latitude geographical position of the event
        //         JSON.stringify(e.lngLat.wrap())
        //     }`;
    });
}
