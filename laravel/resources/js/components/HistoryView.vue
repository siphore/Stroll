<template>
    <div id="historique">
        <button class="back-button" @click="goBack">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
        <h1>Historique</h1>
        <div class="trail-list">
            <div class="trail-card" v-for="trail in trails" :key="trail.id">
                <img :src="trail.image" :alt="trail.name" class="trail-image" />
                <div class="trail-info">
                    <h2 class="trail-name">{{ trail.name }}</h2>
                    <p class="trail-location">{{ trail.location }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const trails = ref([
    { id: 1, name: 'Sentier de la Cité', location: 'Lausanne', image: new URL('/assets/sentier-cite.png', import.meta.url).href },
    { id: 2, name: 'Sentier du Flon', location: 'Lausanne', image: new URL('/assets/sentier-flon.png', import.meta.url).href },
    { id: 3, name: 'Sentier de la Sallaz', location: 'Lausanne', image: new URL('/assets/sentier-sallaz.png', import.meta.url).href },
]);

function goBack() {
    window.history.back();
}
</script>

<style scoped>
body {
    background-color: #F5F5F5;
    font-family: Arial, sans-serif;
}

#historique {
    padding: 5vw;
    background-color: #F5F5F5;
    height: 100vh;
    max-height: 90vh;
    overflow-y: scroll;
    position: relative;
}

.back-button {
    background: none;
    border: none;
    position: absolute;
    top: 2rem;
    left: 2rem;
    cursor: pointer;
}

h1 {
    text-align: center;
    color: #254A3D;
    margin-bottom: 2rem;
    margin-top: 3rem;
}

.trail-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.trail-card {
    display: flex;
    flex-direction: column;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    position: relative;
}

.trail-image {
    width: 100%;
    height: auto;
}

.trail-info {
    padding: 1rem;
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    position: absolute;
    bottom: 0;
    width: 100%;
    text-align: center;
}

.trail-name {
    font-size: 1.5rem;
    margin: 0;
}

.trail-location {
    font-size: 1rem;
    margin: 0;
}
</style>
