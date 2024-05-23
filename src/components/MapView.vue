<template>
    <main>
      <div id="map"></div>
      <div id="distance" class="distance-container"></div>
    </main>
  </template>
  
  <style scoped>
  @import "https://unpkg.com/maplibre-gl@4.3.2/dist/maplibre-gl.css";
  
  @media (min-width: 1024px) {
    body {
      margin: 0;
      padding: 0;
    }
  
    html,
    body,
    #map {
      width: 100vw;
      height: 90vh;
    }
  
    .distance-container {
      position: absolute;
      top: 10px;
      left: 10px;
      width: 10vw;
      height: 5vh;
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
  }
  </style>
  
  <script>
  export default {
    name: 'MapView',
    mounted() {
      document.addEventListener("DOMContentLoaded", () => {
        loadMap().then(() => {
          return new maplibregl.Map({
            container: 'map',
            style:
              'https://api.maptiler.com/maps/streets/style.json?key=get_your_own_OpIi9ZULNHzrESv6T2vL',
            center: [6.6412, 46.7785],
            zoom: 12
          })
        }).then((map) => {
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
                loadTurf().then((turf) => {
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
        })
      })
    }
  }
  
  async function loadTurf() {
    // Asynchronously load turf.js
    return import('https://npmcdn.com/@turf/turf@5.1.6/turf.min.js');
  }
  
  async function loadMap() {
    try {
      return import('https://unpkg.com/maplibre-gl@4.3.2/dist/maplibre-gl.js');
    } catch (error) {
      console.error('Error loading map:', error);
    }
  }
  </script>
  