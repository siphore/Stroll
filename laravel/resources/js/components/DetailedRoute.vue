<template>
    <div class="detailed-route scrollable">
        <h1>Détails sentier</h1>
        <div class="header">
            <button @click="handleBack" class="back-button">←</button>
            <h2>Sentier</h2>
            <div></div>
        </div>

        <img class="main-image" :src="run.img" alt="Image du sentier">
        <h3 class="route-title">{{ run.name }}</h3>
        <ul class="route-info">
            <li>
                <img src="../../svg/distance.svg" alt="Distance">
                {{ run.distance + "km" }}
            </li>
            <li>
                <img src="../../svg/duration.svg" alt="Durée">
                {{ formatDuration(run.duration) }}
            </li>
            <li>
                <img src="../../svg/niveau.svg" alt="Difficulté">
                {{ run.level_difficulty }}
            </li>
            <li>
                <img src="../../svg/rating.svg" alt="Note">
                {{ run.rating }}
            </li>
        </ul>
        <ul class="route-info">
            <li>
                <img src="../../svg/district.svg" alt="">
                {{ run.district }}
            </li>
        </ul>
        <div class="description">
            <h4>Description</h4>
            <p>
                {{ run.descr }}
            </p>
            <a href="#" class="view-more">Voir plus</a>
        </div>
        <div class="itinerary">
            <h4>Itinéraire</h4>
            <img src="path/to/itinerary/map.jpg" alt="Itinéraire">
        </div>

        <div class="practical-info">
            <h4>Informations pratiques</h4>
            <ul class="route-info">
                <li>
                    <img src="../../svg/saison.svg" alt="">
                    Été
                </li>
                <li>
                    <img src="../../svg/accessibilite.svg" alt="">
                    Famille
                </li>
                <li>
                    <img src="../../svg/accessibilite.svg" alt="">
                    Poussettes
                </li>
            </ul>
            <ul class="route-info">
                <li>
                    <img src="../../svg/accessibilite.svg" alt="">
                    Mobilité réduite
                </li>
                <li>
                    <img src="../../svg/equipement.svg" alt="">
                    Table de pique-nique
                </li>
            </ul>
        </div>
        <div class="buttons">
            <button class="btn-primary">Visualiser le sentier</button>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { formatDuration } from '../composable/formatDuration.js';

const handleBack = () => {
    window.history.back();
};

const run = ref([]);

onMounted(() => {
    const storedRun = localStorage.getItem('runData');
    if (storedRun) {
        run.value = JSON.parse(storedRun);
    }
})
</script>

<style scoped>
@import url('../../css/filtres.css');

.detailed-route {
    font-family: Arimo, sans-serif;
    padding: 16px;
    color: #254A3D;
}

.header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    color: #254A3D;
}

.back-button {
    background: none;
    border: none;
    font-size: 24px;
    color: #254A3D;
}

.main-image {
    width: 100%;
    height: auto;
}

.route-title {
    font-size: 24px;
    margin-top: 16px;
    color: #254A3D;
}

.route-info {
    display: flex;
    gap: 1rem;
    margin: 1vh 0 0 0;
    padding: 0;
    list-style-type: none;
    color: #254A3D;
}

.route-info>* {
    display: flex;
    align-items: center;
    gap: .3rem;
}

.rating {
    color: #254A3D;
}

.itinerary,
.practical-info {
    margin-top: 16px;
    color: #254A3D;
}

.description p {
    color: #040505;
}

.view-more {
    color: red;
    cursor: pointer;
}

.info-icons {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
    color: #254A3D;
}

.buttons {
    height: 4vh;
}

.btn-primary {
    margin-top: 3vh;
}
</style>