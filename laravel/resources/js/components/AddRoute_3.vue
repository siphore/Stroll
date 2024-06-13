<template>
    <div>
        <div id="map">
            <button id="reset" @click="removeCurrentRoute">Effacer (marche pas)</button>
        </div>

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
                <input id="departure" type="text" v-model="departure" placeholder="Sélectionner le départ" required />

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
                <div v-for="(step, index) in steps" :key="index">
                    <label :for="'step-' + index">
                        Étape {{ index + 1 }}
                    </label>
                    <input :id="'step-' + index" type="text" v-model="steps[index]" placeholder="Ajouter une étape" />
                </div>

                <!-- Point d’arrivée (Point B) -->
                <label for="arrival">
                    Point d'arrivée (Point B)
                </label>
                <input id="arrival" type="text" v-model="arrival" placeholder="Sélectionner l'arrivée" required />

                <div class="buttons">
                    <button type="submit" class="btn-primary">Valider</button>
                    <button type="button" class="btn-secondary" @click="handleBack">Retour</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref, getCurrentInstance, inject } from 'vue';
import axios from 'axios';
import { loadMap } from '../composable/map.js';
import { addRoute, removeSpecificRoute } from '../composable/addRoute.js';

const departure = ref('');
const arrival = ref('');
const steps = ref([]);
const numberOfSpans = ref(10);
const routeId = ref(`route-${Date.now()}`);
const coordinates = ref([]);
const markers = ref([]);
const formStore = inject('formStore');

const handleImageUpload = (event) => {
    const file = event.target.files[0];
    if (file && (file.type === 'image/png' || file.type === 'image/jpeg')) {
        formStore.img = file;
    } else {
        alert('Please upload a valid image file (PNG or JPG).');
    }
};

const addStep = () => {
    steps.value.push('');
    numberOfSpans.value += 6;
};

const submitForm = async () => {
    const departureInput = document.getElementById('departure');
    const arrivalInput = document.getElementById('arrival');

    formStore.departure = departureInput.value;
    formStore.arrival = arrivalInput.value;
    formStore.steps = steps.value;

    const formData = new FormData();
    const flattenedFormStore = { ...formStore._rawValue, ...formStore };
    for (const key in flattenedFormStore) {
        if (flattenedFormStore.hasOwnProperty(key) && key !== '_rawValue' && key !== '__v_isRef' && key !== '__v_isShallow' && key !== 'dep') {
            if (Array.isArray(flattenedFormStore[key])) {
                formData.append(key, JSON.stringify(flattenedFormStore[key]));
            } else {
                formData.append(key, flattenedFormStore[key]);
            }
        }
    }
    if (formStore.img) {
        formData.append('img', formStore.img);
    }

    try {
        const response = await axios.post('/api/runs', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        });
        console.log('Run created successfully:', response.data);
    } catch (error) {
        if (error.response) {
            if (error.response.status === 422) {
                console.error('Validation errors:', error.response.data.errors);
            } else if (error.response.status === 500) {
                console.error('Server error:', error.response.data);
            } else {
                console.error('Error:', error.response.data);
            }
        } else {
            console.error('Error creating run:', error);
        }
    }
};

const handleBack = () => {
    window.history.back();
};

const handleCoordinates = (coords) => {
    coordinates.value = coords;
    const departureInput = document.getElementById('departure');
    const arrivalInput = document.getElementById('arrival');

    departureInput.value = coordinates.value[0];
    if (coordinates.value.length > 1) arrivalInput.value = coordinates.value[coordinates.value.length - 1];
    if (coordinates.value.length == 2) addNewRoute(coordinates.value);
};

const loadMapInstance = ref(null);

const addNewRoute = (coords) => {
    if (loadMapInstance.value) {
        addRoute(loadMapInstance.value, coords, routeId.value, markers, formStore);
    }
};

const removeCurrentRoute = () => {
    coordinates.value = [];
    if (loadMapInstance.value) {
        removeSpecificRoute(loadMapInstance.value, routeId.value, markers);
    }
};

onMounted(() => {
    loadMap(getCurrentInstance(), handleCoordinates).then(map => {
        loadMapInstance.value = map;
    });
});
</script>


<style scoped>
@import url('../../css/filtres.css');

#reset {
    position: absolute;
    z-index: 1;
}

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
