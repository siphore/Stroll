import "https://unpkg.com/maplibre-gl@4.3.2/dist/maplibre-gl.js";

// import { makePoints } from "../composable/makePoints";
// import { tracePath } from "../composable/tracePath";
// import { fitToPath } from "../composable/fitToPath";
import { fitToLocation } from "../composable/fitToLocation";
import { locateUser } from "../composable/locateUser";
import { getCoords } from "../composable/getMouseCoords";
import { addRoute } from "../composable/addRoute";

export function loadMap() {
    const navHeight = document.querySelector("nav")?.offsetHeight;
    const mapElement = document.getElementById("map");
    mapElement.style.height = `${
        navHeight ? window.innerHeight - navHeight + "px" : 70 + "vh"
    }`;

    const map = new maplibregl.Map({
        container: "map",
        center: [6.6412, 46.7785],
        zoom: 12,
        style: "https://api.maptiler.com/maps/streets/style.json?key=AskmG7OtKitUCOKFDwAn",
    });

    map.on("load", () => {
        fitToLocation(map);
        locateUser(map);
        map.addControl(new maplibregl.NavigationControl());
        getCoords(map, addRoute);
    });

    return map;
}
