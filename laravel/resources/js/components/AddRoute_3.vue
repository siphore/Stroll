<template>
    <div id="map"></div>
    <div class="buttons">
        <button type="submit" class="btn-primary" @click="nextView">Valider</button>
        <button type="button" class="btn-secondary" @click="handleBack">Retour</button>
    </div>
</template>

<script setup>
import { onMounted } from 'vue';
import { loadMap } from '../composable/map.js';

onMounted(() => {
    loadMap();
})

const nextView = () => {
    window.location.hash = '#ajout-4';
};

const handleBack = () => {
    window.history.back();
};
</script>

<style scoped>
@import url('../../css/filtres.css');
</style>