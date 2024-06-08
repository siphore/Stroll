<template>
  <main>
    <div id="map">
      <button id="fit">Fit to Switzerland</button>
    </div>
  </main>
</template>

<style scoped>
@import "https://unpkg.com/maplibre-gl@4.3.2/dist/maplibre-gl.css";

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
</style>

<script setup>
import { onMounted, ref } from "vue";
import axios from "axios";
import { loadMap } from "../composable/map";
import { addRoute } from "../composable/addRoute";
import { addLocation } from "../composable/addLocation";

const runs = ref([]);
const locations = ref([]);

async function addToMap(map) {
  try {
    // Sentiers
    const runsResp = await axios.get('/api/runs');
    runs.value = runsResp.data;

    if (runs.value && runs.value.length > 0) {
      runs.value.forEach((run) => {
        const coordsDep = run.departure.split(',').map(coord => parseFloat(coord.trim()));
        const coordsArr = run.arrival.split(',').map(coord => parseFloat(coord.trim()));
        addRoute(map, [coordsDep, coordsArr]);
      })
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
      addLocation(map, [coordsX, coordsY], popup);
    })
  } catch (error) {
    console.error("Error fetching runs or locations:", error);
  }
}

onMounted(async () => {
  const map = await loadMap();
  addToMap(map);
});
</script>
