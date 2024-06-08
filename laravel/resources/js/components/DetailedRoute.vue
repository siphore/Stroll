<template>
    <div class="detailed-route scrollable">
        <div class="header">
            <button @click="handleBack" class="back-button">←</button>
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
                <img src="../../svg/marker.svg" alt="District">
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
                <li v-for="(season, index) in parsedSeasons" :key="index">
                    <img src="/svg/saison.svg" alt="Saison">
                    {{ season }}
                </li>
            </ul>
            <div v-for="(chunk, index) in practicalInfoChunks" :key="index">
                <ul class="route-info">
                    <li v-for="info in chunk" :key="info.key">
                        <img :src="info.icon" :alt="info.label">
                        {{ info.label }}
                    </li>
                </ul>
            </div>
        </div>
        <div class="buttons">
            <button class="btn-primary" @click="visualizeTrail">Visualiser le sentier</button>
        </div>
    </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';
import { formatDuration } from '../composable/formatDuration.js';

const handleBack = () => {
    window.history.back();
};

const visualizeTrail = () => {
    localStorage.setItem('currentRun', JSON.stringify(run.value));
    window.location.href = '#carte';
};

// Informations pratiques
const practicalInfoMapping = [
    { key: 'family', label: 'Famille', icon: '/svg/accessibilite.svg' },
    { key: 'school', label: 'École', icon: '/svg/accessibilite.svg' },
    { key: 'senior', label: 'Senior', icon: '/svg/accessibilite.svg' },
    { key: 'handicap', label: 'Mobilité réduite', icon: '/svg/accessibilite.svg' },
    { key: 'dogs', label: 'Chiens autorisés', icon: '/svg/accessibilite.svg' },
    { key: 'parkings', label: 'Parkings', icon: '/svg/accessibilite.svg' },
    { key: 'public_transport', label: 'Transport public', icon: '/svg/accessibilite.svg' },
    { key: 'mobility', label: 'Mobilité réduite', icon: '/svg/accessibilite.svg' },
    { key: 'scroller', label: 'Poussettes', icon: '/svg/accessibilite.svg' },
    { key: 'table_picnic', label: 'Table de pique-nique', icon: '/svg/equipement.svg' },
    { key: 'bench', label: 'Banc', icon: '/svg/equipement.svg' },
    { key: 'wc', label: 'WC', icon: '/svg/equipement.svg' },
    { key: 'fireplace', label: 'Place de feu', icon: '/svg/equipement.svg' },
    { key: 'playground', label: 'Place de jeu', icon: '/svg/equipement.svg' }
];

const parsedSeasons = computed(() => {
    return JSON.parse(run.value.season || '[]');
});

const filteredPracticalInfo = computed(() => {
    return practicalInfoMapping.filter(info => run.value[info.key]);
});

const practicalInfoChunks = computed(() => {
    // Properties per row
    const chunkSize = 3;

    const chunks = [];
    for (let i = 0; i < filteredPracticalInfo.value.length; i += chunkSize) {
        chunks.push(filteredPracticalInfo.value.slice(i, i + chunkSize));
    }
    return chunks;
});

// Init
const run = ref([]);

onMounted(() => {
    const storedRun = localStorage.getItem('runData');
    if (storedRun) {
        run.value = JSON.parse(storedRun);
    }
});
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
    margin-bottom: 1vh;
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
    border-radius: 1rem;
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