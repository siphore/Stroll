<template>
  <main>
    <div id="map">
      <button id="fit">Fit to Switzerland</button>
      <button id="clear">Clear Routes</button>
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
import { fetch } from "../composable/fetch";
import { loadMap } from "../composable/map";
import { addRoute } from "../composable/addRoute";

const runs = ref([]);

onMounted(async () => {
  const map = loadMap();

  const url = 'http://127.0.0.1:8000/api/runs';
  runs.value = await fetch(url).then((data) => {
    const coordsDep = data[0].departure.split(',').map(coord => parseFloat(coord.trim()));
    const coordsArr = data[0].arrival.split(',').map(coord => parseFloat(coord.trim()));
    addRoute(map, [coordsDep, coordsArr]);
  });
});
</script>