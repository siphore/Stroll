<template>
    <div>
        <div id="map"></div>

        <div class="scrollable">
            <div class="path">
                <img class="icon" src="../../svg/localisation.svg">
                <div class="vertical-points">
                    <span v-for="n in numberOfSpans" :key="n">.</span>
                </div>
                <img class="icon" src="../../svg/marker.svg">
            </div>
            <form @submit.prevent="submitForm">
                <!-- Point de départ (Point A) -->
                <label for="departure">
                    Point de départ (Point A)
                </label>
                <input id="departure" type="text" v-model="formStore.departure" @change="geocode('departure')"
                    placeholder="Bahnhofstrasse 7, 8001 Zürich, Switzerland" required />

                <!-- Ajouter une étape -->
                <button type="button" id="addStep" @click="addStep">
                    <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11 7.5V15.5M7 11.5H15M21 11.5C21 17.0228 16.5228 21.5 11 21.5C5.47715 21.5 1 17.0228 1 11.5C1 5.97715 5.47715 1.5 11 1.5C16.5228 1.5 21 5.97715 21 11.5Z"
                            stroke="#254A3D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Ajouter une étape
                </button>

                <!-- Steps -->
                <div v-for="(step, index) in formStore.steps" :key="index">
                    <label :for="'step-' + index">
                        Étape {{ index + 1 }}
                    </label>
                    <input :id="'step-' + index" type="text" v-model="formStore.steps[index]"
                        @change="geocode('step', index)" placeholder="Ajouter une étape" />
                </div>

                <!-- Point d’arrivée (Point B) -->
                <label for="arrival">
                    Point d'arrivée (Point B)
                </label>
                <input id="arrival" type="text" v-model="formStore.arrival" @change="geocode('arrival')"
                    placeholder="Schaffhauserstrasse 100, 8057 Zürich, Switzerland" required />

                <div class="buttons">
                    <button type="submit" class="btn-primary">Valider</button>
                    <button type="button" class="btn-secondary" @click="handleBack">Retour</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref, inject } from 'vue';
import mapboxgl from 'mapbox-gl';
import { loadMap } from '../composable/map.js';

const formStore = inject('formStore');

const numberOfSpans = ref(10);
const map = ref(null);
const markers = ref([]);

const addStep = () => {
    formStore.steps.push('');
    numberOfSpans.value += 6;
};

const submitForm = () => {
    console.log(formStore);
    window.location.hash = '#ajout-4';
};

const handleBack = () => {
    window.history.back();
};

const geocode = async (type, index = null) => {
    let address;
    if (type === 'departure') {
        address = formStore.departure;
    } else if (type === 'arrival') {
        address = formStore.arrival;
    } else if (type === 'step' && index !== null) {
        address = formStore.steps[index];
    }

    console.log('Geocoding address:', address); // Debugging log

    try {
        const response = await fetch(`https://api.mapbox.com/geocoding/v5/mapbox.places/${encodeURIComponent(address)}.json?access_token=${mapboxgl.accessToken}`);
        const data = await response.json();

        if (data.features && data.features.length > 0) {
            const [longitude, latitude] = data.features[0].geometry.coordinates;

            // Update formStore with coordinates
            if (type === 'departure') {
                formStore.departureCoordinates = [longitude, latitude];
            } else if (type === 'arrival') {
                formStore.arrivalCoordinates = [longitude, latitude];
            } else if (type === 'step' && index !== null) {
                formStore.stepsCoordinates[index] = [longitude, latitude];
            }

            // Add marker to map
            addMarker([longitude, latitude]);
        } else {
            alert(`No results found for ${address}`);
        }
    } catch (error) {
        console.error('Error geocoding address:', error);
    }
};

const addMarker = (coordinates) => {
    const marker = new mapboxgl.Marker()
        .setLngLat(coordinates)
        .addTo(map.value);
    markers.value.push(marker);
};

onMounted(() => {
    map.value = loadMap();
});
</script>

<style scoped>
@import url('../../css/filtres.css');

.scrollable {
    display: flex;
    gap: 5vw;
    padding: 5vh 0 0 10vw;
    height: 40vh;
    align-items: start;
    background-color: var(--background);
    overflow-x: hidden;
}

#map {
    height: 60vh;
}

input[type=text] {
    margin-bottom: 2vh;
    width: 50vw;
}

#addStep {
    display: flex;
    align-items: center;
    gap: .7rem;
    width: 50vw;
    padding: 2vw;
    background-color: white;
    border: 1px solid #a1c9bb;
    border-radius: 4px;
    margin-bottom: 2vh;
}

.vertical-points {
    display: flex;
    flex-direction: column;
}

.path {
    display: flex;
    flex-direction: column;
    align-items: center;
}

span {
    line-height: 1.55vh;
}

span:last-child {
    margin-bottom: 1vh;
}

.buttons {
    width: 15rem;
}
</style>
