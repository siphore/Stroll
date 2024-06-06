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
import { fetch } from "../composable/fetch";

const runs = ref([]);
const locations = ref([]);

onMounted(async () => {
  try {
    const map = await loadMap();

    // Routes
    const runsResp = await axios.get('http://127.0.0.1:8000/api/runs');
    runs.value = runsResp.data;
    console.log(runs.value);

    if (runs.value && runs.value.length > 0) {
      const coordsDep = runs.value[0].departure.split(',').map(coord => parseFloat(coord.trim()));
      const coordsArr = runs.value[0].arrival.split(',').map(coord => parseFloat(coord.trim()));
      addRoute(map, [coordsDep, coordsArr]);
    }

    // Locations
    const locResp = await axios.get('http://127.0.0.1:8000/api/locations');
    locations.value = locResp.data;
    locations.value.forEach((location) => {
      const coordsX = parseFloat(location.log.trim());
      const coordsY = parseFloat(location.lat.trim());
      addLocation(map, [coordsX, coordsY]);
    })
  } catch (error) {
    console.error("Error loading map or fetching runs:", error);
  }
});
</script>
