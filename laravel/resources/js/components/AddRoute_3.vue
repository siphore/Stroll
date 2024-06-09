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
                <input id="departure" type="text" v-model="departure" placeholder="Rue des narcisses 5" required />

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
                <input id="arrival" type="text" v-model="arrival" placeholder="Rue des narcisses 6" required />

                <div class="buttons">
                    <button type="submit" class="btn-primary">Valider</button>
                    <button type="button" class="btn-secondary" @click="handleBack">Retour</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import { loadMap } from '../composable/map.js';

const departure = ref('');
const arrival = ref('');
const steps = ref([]);
const numberOfSpans = ref(10);

const addStep = () => {
    steps.value.push('');
    numberOfSpans.value += 6;
};

const submitForm = () => {
    const routeData = {
        departure: departure.value,
        steps: steps.value,
        arrival: arrival.value,
    };
    console.log(routeData);

    window.location.hash = '#ajout-4';
};

const handleBack = () => {
    window.history.back();
};

onMounted(() => {
    loadMap();
})
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
