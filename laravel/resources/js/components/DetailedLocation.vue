<template>
    <div class="detailed-location scrollable">
        <div class="header">
            <button @click="handleBack" class="back-button">←</button>
        </div>

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
                <li v-for="info in filteredPracticalInfo" :key="info.key">
                    <img :src="info.icon" :alt="info.label">
                    {{ info.label }}
                </li>
            </ul>
        </div>
        <div class="buttons">
            <button class="btn-primary" @click="visualizeLocation">Visualiser le point d'intérêt</button>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue';

const handleBack = () => {
    window.history.back();
};

const visualizeLocation = () => {
    localStorage.setItem('currentLocation', JSON.stringify(location.value));
    window.location.href = '#carte';
};

// Informations pratiques
const practicalInfoMapping = [
    { key: 'address', icon: '/svg/marker.svg', label: 'Address' },
    { key: 'phone', icon: '/svg/phone.svg', label: 'Phone' },
    { key: 'availability', icon: '/svg/availability.svg', label: 'Availability' }
];

const location = ref({});

const filteredPracticalInfo = computed(() => {
    return practicalInfoMapping.filter(info => location.value[info.key]).map(info => ({
        ...info,
        label: location.value[info.key]
    }));
});

// Init
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

h4 {
    margin: 3rem 0 1rem 0;
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
    flex-direction: column;
    gap: 1rem;
    margin: 1vh 0 0 0;
    padding: 0;
    list-style-type: none;
    color: #254A3D;
}

.location-info>* {
    display: flex;
    align-items: center;
    justify-content: start;
    gap: .7rem;
}

.itinerary,
.practical-info {
    margin-top: 16px;
    color: var(--sapin-1);
}

.description p {
    color: #040505;
}

.info-icons {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
    color: #254A3D;
}

.btn-primary {
    margin-top: 3vh;
}
</style>
