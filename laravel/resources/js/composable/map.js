import "https://unpkg.com/maplibre-gl@4.3.2/dist/maplibre-gl.js";
import { fitToLocation } from "../composable/fitToLocation";
import { locateUser } from "../composable/locateUser";
import { getCoords } from "../composable/getMouseCoords.js";

export function loadMap() {
    return new Promise((resolve, reject) => {
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
            // getCoords(map);
            map.addControl(new maplibregl.NavigationControl());
            resolve(map);
        });

        map.on("error", (e) => {
            reject(e);
        });
    });
}
