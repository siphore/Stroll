<template>
  <main>
    <div id="map">
      <button id="fit">Fit to Switzerland</button>
      <button id="clear">Clear Routes</button>
    </div>
    <!-- <div id="distance" class="distance-container"></div> -->
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
import { onMounted } from "vue";
import { loadMap } from "../composable/map";

onMounted(() => {
  loadMap();
});
</script>