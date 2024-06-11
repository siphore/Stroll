<template>
    <div class="card" @click="redirectToDetail(run)">
        <img class="card-image" :src="run.img" />
        <div class="card-overlay">
            <div class="card-header">
                <span><i class="fas fa-exchange-alt"></i>{{ run.distance }}km</span>
                <span><i class="fas fa-clock"></i> {{ formatDuration(run.duration) }}</span>
                <span><i class="fas fa-mountain"></i> {{ run.level_difficulty }}</span>
            </div>
            <div class="card-content">
                <h3 class="card-title">{{ run.name }}</h3>
                <p class="card-location">{{ run.district.replace(/_/g, "'") }}</p>
            </div>
            <div class="star" @click.stop="toggleSaveRun">
                <img :src="isRunSaved ? '/svg/removeStarred.svg' : '/svg/addStarred.svg'" alt="Enregistrer le sentier">
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { formatDuration } from '../composable/formatDuration.js';

const props = defineProps({
    run: Object
});

const isRunSaved = ref(false);

onMounted(() => {
    checkIfRunIsSaved();
});

function redirectToDetail(runData) {
    localStorage.setItem('runData', JSON.stringify(runData));
    window.location.hash = "#details-sentier";
}

function checkIfRunIsSaved() {
    const savedRuns = JSON.parse(localStorage.getItem('savedRuns')) || [];
    isRunSaved.value = savedRuns.some(savedRun => savedRun.id === props.run.id);
}

function toggleSaveRun() {
    const savedRuns = JSON.parse(localStorage.getItem('savedRuns')) || [];
    if (isRunSaved.value) {
        const updatedRuns = savedRuns.filter(savedRun => savedRun.id !== props.run.id);
        localStorage.setItem('savedRuns', JSON.stringify(updatedRuns));
    } else {
        savedRuns.push(props.run);
        localStorage.setItem('savedRuns', JSON.stringify(savedRuns));
    }
    isRunSaved.value = !isRunSaved.value;
}
</script>

<style scoped>
@import url('../../css/vignette.css');
</style>