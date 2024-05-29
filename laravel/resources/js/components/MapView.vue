<template>
  <main>
    <div id="map">
      <button id="fit">Fit to Switzerland</button>
    </div>
    <div id="distance" class="distance-container"></div>
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
</style>

<script setup>
import { onMounted } from "vue";
import "https://unpkg.com/maplibre-gl@4.3.2/dist/maplibre-gl.js";
// import "https://unpkg.com/maplibre-contour@0.0.5/dist/index.min.js";
// import "https://d3js.org/d3.v3.min.js";

import { makePoints } from "../composable/makePoints";
import { fitToLocation } from "../composable/fitToLocation";
import { tracePath } from "../composable/tracePath";
import { locateUser } from "../composable/locateUser";

function loadMap() {
  const headerHeight = document.querySelector('header').offsetHeight;
  const navHeight = document.querySelector('nav').offsetHeight;
  document.getElementById('map').style.height = `${window.innerHeight - headerHeight - navHeight}px`;

  // const demSource = new mlcontour.DemSource({
  //   url: 'https://demotiles.maplibre.org/terrain-tiles/{z}/{x}/{y}.png',
  //   encoding: 'mapbox',
  //   maxzoom: 12,
  //   // offload contour line computation to a web worker
  //   worker: true
  // })
  // demSource.setupMaplibre(maplibregl);

  const map = new maplibregl.Map({
    container: 'map',
    center: [6.6412, 46.7785],
    zoom: 12,
    style:
      'https://api.maptiler.com/maps/streets/style.json?key=AskmG7OtKitUCOKFDwAn',
    /*
    style: {
      version: 8,
      glyphs: 'https://demotiles.maplibre.org/font/{fontstack}/{range}.pbf',
      sources: {
        hillshadeSource: {
          type: 'raster-dem',
          // share cached raster-dem tiles with the contour source
          tiles: [demSource.sharedDemProtocolUrl],
          tileSize: 512,
          maxzoom: 12
        },
        contourSourceFeet: {
          type: 'vector',
          tiles: [
            demSource.contourProtocolUrl({
              // meters to feet
              multiplier: 3.28084,
              overzoom: 1,
              thresholds: {
                // zoom: [minor, major]
                11: [200, 1000],
                12: [100, 500],
                13: [100, 500],
                14: [50, 200],
                15: [20, 100]
              },
              elevationKey: 'ele',
              levelKey: 'level',
              contourLayer: 'contours'
            })
          ],
          maxzoom: 15
        }
      },
      layers: [
        {
          id: 'hills',
          type: 'hillshade',
          source: 'hillshadeSource',
          layout: { visibility: 'visible' },
          paint: { 'hillshade-exaggeration': 0.25 }
        },
        {
          id: 'contours',
          type: 'line',
          source: 'contourSourceFeet',
          'source-layer': 'contours',
          paint: {
            'line-opacity': 0.5,
            // "major" contours have level=1, "minor" have level=0
            'line-width': ['match', ['get', 'level'], 1, 1, 0.5]
          }
        },
        {
          id: 'contour-text',
          type: 'symbol',
          source: 'contourSourceFeet',
          'source-layer': 'contours',
          filter: ['>', ['get', 'level'], 0],
          paint: {
            'text-halo-color': 'white',
            'text-halo-width': 1
          },
          layout: {
            'symbol-placement': 'line',
            'text-size': 10,
            'text-field': [
              'concat',
              ['number-format', ['get', 'ele'], {}],
              '\''
            ],
            'text-font': ['Noto Sans Bold']
          }
        }
      ]
    }
    */
  })

  map.on("load", () => {
    makePoints(map);
    fitToLocation(map);
    locateUser(map);
    // tracePath();
  })
}

onMounted(() => {
  loadMap();
});
</script>