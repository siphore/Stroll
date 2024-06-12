import "https://unpkg.com/maplibre-gl@4.3.2/dist/maplibre-gl.js";
import { locateUser } from "./locateUser";
import { getCoords } from "./getMouseCoords.js";
import { getNavHeight } from "./navHeight.js";
import mapboxgl from "mapbox-gl";

export function loadMap(componentInstance, callback) {
    mapboxgl.accessToken = "AskmG7OtKitUCOKFDwAn";

    return new Promise((resolve, reject) => {
        const navHeight = getNavHeight();
        const mapElement = document.getElementById("map");
        if (navHeight) {
            mapElement.style.height = window.innerHeight - navHeight + "px";
        }

        const map = new maplibregl.Map({
            container: "map",
            center: [6.6412, 46.7785],
            zoom: 12,
            style: `https://api.maptiler.com/maps/streets/style.json?key=${mapboxgl.accessToken}`,
        });

        // Center map on user's location
        navigator.geolocation.getCurrentPosition((position) => {
            const { latitude, longitude } = position.coords;
            map.setCenter([longitude, latitude]);
            map.on("load", () => {
                locateUser(map);
                if (componentInstance.type.__name === "AddRoute_3") {
                    getCoords(map, callback);
                }
                map.addControl(new maplibregl.NavigationControl());
                resolve(map);
            });

            map.on("error", (e) => {
                reject(e);
            });
        });
    });
}

export async function adjustZoomForRoute(map, routeCoords) {
    const bounds = new maplibregl.LngLatBounds();
    routeCoords.forEach((coord) => bounds.extend(coord));
    map.fitBounds(bounds, {
        maxZoom: 12,
    });
}
