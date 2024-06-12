<template>
    <div class="detailed-location scrollable">
        <div class="header">
            <button @click="handleBack" class="back-button">←</button>
        </div>

        {{ console.log(location.img) }}
        <img class="main-image" :src="location.img" alt="Image du sentier">
        <h3 class="location-title">{{ location.name }}</h3>
        <ul class="location-info">
            <li>
                <img src="../../svg/marker.svg" alt="Ville">
                {{ location.city }}
            </li>
        </ul>
        <div class="description">
            <h4>Description</h4>
            <p>
                {{ location.descr }}
            </p>
        </div>
        <div class="access">
            <h4>Accessibilité</h4>
            <p>{{ location.access }}</p>
        </div>

        <div class="practical-info">
            <h4>Informations pratiques</h4>
            <ul class="location-info">
                <li v-for="(season, index) in parsedSeasons" :key="index">
                    <img src="/svg/saison.svg" alt="Saison">
                    {{ season }}
                </li>
            </ul>
            <div v-for="(chunk, index) in practicalInfoChunks" :key="index">
                <ul class="location-info">
                    <li v-for="info in chunk" :key="info.key">
                        <img :src="info.icon" :alt="info.label">
                        {{ info.label }}
                    </li>
                </ul>
            </div>
        </div>
        <div class="buttons">
            <button class="btn-primary" @click="visualizeLocation">Visualiser le point d'intérêt</button>
        </div>
    </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';
import { formatDuration } from '../composable/formatDuration.js';
import { loadMap } from '../composable/map.js';

const handleBack = () => {
    window.history.back();
};

const visualizeLocation = () => {
    localStorage.setItem('currentLocation', JSON.stringify(location.value));
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
    return JSON.parse(location.value.season || '[]');
});

const filteredPracticalInfo = computed(() => {
    return practicalInfoMapping.filter(info => location.value[info.key]);
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
const location = ref([]);

onMounted(() => {
    const storedLocation = localStorage.getItem('currentLocation');
    if (storedLocation) {
        location.value = JSON.parse(storedLocation);
    }
});
</script>

<style scoped>
@import url('../../css/filtres.css');

.scrollable {
    height: 100vh;
}

.detailed-location {
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

.location-title {
    font-size: 24px;
    margin-top: 16px;
    color: #254A3D;
}

.location-info {
    display: flex;
    gap: 1rem;
    margin: 1vh 0 0 0;
    padding: 0;
    list-style-type: none;
    color: #254A3D;
}

.location-info>* {
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

#map {
    height: 30vh;
}

.btn-primary {
    margin-top: 3vh;
}
</style>
