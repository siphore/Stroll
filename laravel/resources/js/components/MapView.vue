<template>
  <main>
    <div id="map">
      <button id="fit">Fit to Switzerland</button>
    </div>
  </main>
</template>

<style scoped>
@import "https://unpkg.com/maplibre-gl@4.3.2/dist/maplibre-gl.css";

.distance-container {
  position: absolute;
  top: 10px;
  left: 10px;
  width: fit-content;
  height: fit-content;
  z-index: 1;
}

.distance-container>* {
  background-color: rgba(0, 0, 0, 0.5);
  color: #fff;
  font-size: 11px;
  line-height: 18px;
  display: block;
  margin: 0;
  padding: 5px 10px;
  border-radius: 3px;
}

#fit {
  display: block;
  position: absolute;
  top: 20px;
  left: 50%;
  transform: translate(-50%);
  width: 30%;
  height: 40px;
  padding: 10px;
  border: none;
  border-radius: 3px;
  font-size: 12px;
  text-align: center;
  color: #fff;
  background: #ee8a65;
  z-index: 1;
}

#clear {
  position: absolute;
  z-index: 1;
}
</style>

<script setup>
import { onMounted, ref } from "vue";
import axios from "axios";
import { loadMap } from "../composable/map";
import { addRoute } from "../composable/addRoute";
import { addLocation } from "../composable/addLocation";

const runs = ref([]);
const locations = ref([]);
const MAX_RETRIES = 3;

async function init(retries = 0) {
  try {
    const map = await loadMap();

    // Center map on user's location
    navigator.geolocation.getCurrentPosition(async (position) => {
      const { latitude, longitude } = position.coords;
      map.setCenter([longitude, latitude]);

      // Sentiers
      const runsResp = await axios.get('/api/runs');
      runs.value = runsResp.data;

      if (runs.value && runs.value.length > 0) {
        const coordsDep = runs.value[0].departure.split(',').map(coord => parseFloat(coord.trim()));
        const coordsArr = runs.value[0].arrival.split(',').map(coord => parseFloat(coord.trim()));
        addRoute(map, [coordsDep, coordsArr]);
      }

      // Locations
      const locResp = await axios.get('/api/locations');
      locations.value = locResp.data;
      locations.value.forEach((location) => {
        const coordsX = parseFloat(location.log.trim());
        const coordsY = parseFloat(location.lat.trim());

        // Create a popup
        const popup = new maplibregl.Popup({ offset: 25 }).setText(
          location.descr
        );

        // Create DOM element for the marker
        const el = document.createElement('div');
        el.class = 'marker';
        const newLocation = addLocation(map, [coordsX, coordsY], popup);
      })
    })
  } catch (error) {
    if (retries < MAX_RETRIES) {
      console.warn(`Retrying map initialization... (${retries + 1})`);
      await new Promise((res) => setTimeout(res, 1000)); // Wait for 1 second before retrying
      await initializeMap(retries + 1);
    } else {
      console.error("Error loading map or fetching runs:", error);
    }
  }
}

onMounted(() => {
  init();
});
</script>
