<template>
  <main>
    <div id="map"></div>
    <div id="distance" class="distance-container"></div>
  </main>
</template>

<style scoped>
@import "https://unpkg.com/maplibre-gl@4.3.2/dist/maplibre-gl.css";

html,
body,
#map {
  width: 100vw;
  height: 80vh;
}

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
</style>

<script setup>
import "https://unpkg.com/maplibre-gl@4.3.2/dist/maplibre-gl.js";
// import "https://unpkg.com/maplibre-contour@0.0.5/dist/index.min.js";

window.addEventListener("DOMContentLoaded", loadMap);
window.addEventListener("hashchange", loadMap);

function loadMap(e) {
  if (e.newURL != undefined && !e.newURL.includes("#map")) return;
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
    // hash: true,
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

  const distanceContainer = document.getElementById('distance');

  // GeoJSON object to hold our measurement features
  const geojson = {
    'type': 'FeatureCollection',
    'features': []
  };

  // Used to draw a line between points
  const linestring = {
    'type': 'Feature',
    'geometry': {
      'type': 'LineString',
      'coordinates': []
    }
  };

  map.on("load", () => {
    map.addSource('geojson', {
      'type': 'geojson',
      'data': geojson
    });

    // Add styles to the map
    map.addLayer({
      id: 'measure-points',
      type: 'circle',
      source: 'geojson',
      paint: {
        'circle-radius': 5,
        'circle-color': '#000'
      },
      filter: ['in', '$type', 'Point']
    });

    map.addLayer({
      id: 'measure-lines',
      type: 'line',
      source: 'geojson',
      layout: {
        'line-cap': 'round',
        'line-join': 'round'
      },
      paint: {
        'line-color': '#000',
        'line-width': 2.5
      },
      filter: ['in', '$type', 'LineString']
    });

    map.on('click', (e) => {
      const features = map.queryRenderedFeatures(e.point, {
        layers: ['measure-points']
      });

      // Remove the linestring from the group
      // So we can redraw it based on the points collection
      if (geojson.features.length > 1) geojson.features.pop();

      // Clear the Distance container to populate it with a new value
      distanceContainer.innerHTML = '';

      // If a feature was clicked, remove it from the map
      if (features.length) {
        const id = features[0].properties.id;
        geojson.features = geojson.features.filter((point) => {
          return point.properties.id !== id;
        });
      } else {
        const point = {
          'type': 'Feature',
          'geometry': {
            'type': 'Point',
            'coordinates': [e.lngLat.lng, e.lngLat.lat]
          },
          'properties': {
            'id': String(new Date().getTime())
          }
        };

        geojson.features.push(point);
      }

      if (geojson.features.length > 1) {
        linestring.geometry.coordinates = geojson.features.map(
          (point) => {
            return point.geometry.coordinates;
          }
        );

        geojson.features.push(linestring);

        // Populate the distanceContainer with total distance
        loadTurf().then(() => {
          const value = document.createElement('pre');
          value.textContent =
            `Total distance: ${turf.length(linestring).toLocaleString()
            }km`;
          distanceContainer.appendChild(value);
        });
      }

      map.getSource('geojson').setData(geojson);
    });

    map.on('mousemove', (e) => {
      const features = map.queryRenderedFeatures(e.point, {
        layers: ['measure-points']
      });
      // UI indicator for clicking/hovering a point on the map
      map.getCanvas().style.cursor = features.length ?
        'pointer' :
        'crosshair';
    })
  })
}

async function loadTurf() {
  return new Promise((resolve, reject) => {
    const script = document.createElement('script');
    script.src = 'https://npmcdn.com/@turf/turf@5.1.6/turf.min.js';
    script.onload = resolve;
    script.onerror = reject;
    document.head.appendChild(script);
  });
}
</script>