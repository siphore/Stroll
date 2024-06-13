<template>
  <main>
    <div id="map">
      <!-- <button id="fit">Fit to Switzerland</button> -->
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
import { onMounted, ref, getCurrentInstance, inject } from "vue";
import axios from "axios";
import { loadMap, adjustZoomForRoute } from "../composable/map";
import { addRoute } from "../composable/addRoute";
import { addLocation } from "../composable/addLocation";

const storeLocation = (location) => {
  localStorage.setItem('currentLocation', JSON.stringify(location));
};

const formStore = inject('formStore');
const routeId = ref(`route-${Date.now()}`);
const markers = ref([]);

const runs = ref([]);
const locations = ref([]);

async function addToMap(map) {
  try {
    // Retrieve run data from local storage
    const storedRun = JSON.parse(localStorage.getItem('currentRun'));
    if (storedRun) {
      const coordsDep = storedRun.departure.split(',').map(coord => parseFloat(coord.trim()));
      const coordsArr = storedRun.arrival.split(',').map(coord => parseFloat(coord.trim()));

      adjustZoomForRoute(map, [coordsDep, coordsArr]);
      localStorage.removeItem('currentRun');
    }

    // Sentiers
    const runsResp = await axios.get('/api/runs');
    runs.value = runsResp.data;

    if (runs.value && runs.value.length > 0) {
      runs.value.forEach((run) => {
        const coordsDep = run.departure.split(',').map(coord => parseFloat(coord.trim()));
        const coordsArr = run.arrival.split(',').map(coord => parseFloat(coord.trim()));
        addRoute(map, [coordsDep, coordsArr], routeId.value, markers, formStore);
      });
    }

    // Locations
    const locResp = await axios.get('/api/locations');
    locations.value = locResp.data;
    locations.value.forEach((location, index) => {
      const coordsX = parseFloat(location.log.trim());
      const coordsY = parseFloat(location.lat.trim());

      // Create a popup with a unique id for the link
      const popup = new maplibregl.Popup({ offset: 25 }).setHTML(
        `${location.name}<br><a href="#details-point-interet" class="popup-link" data-index="${index}">Voir plus</a>`
      );

      // Create DOM element for the marker
      const el = document.createElement('div');
      el.class = 'marker';
      addLocation(map, [coordsX, coordsY], popup);
    });

    // Add event listener for all popup links
    document.addEventListener('click', (event) => {
      if (event.target.classList.contains('popup-link')) {
        const index = event.target.getAttribute('data-index');
        storeLocation(locations.value[index]);
      }
    });
  } catch (error) {
    console.error("Error fetching runs or locations:", error);
  }
}

onMounted(async () => {
  const map = await loadMap(getCurrentInstance());
  addToMap(map);
});
</script>
