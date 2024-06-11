<template>
    <!-- <ul class="cards">
        <li v-for="(run, index) in runs" :key="index" class="card-item"> -->
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
            <!-- <div class="card-indicators">
                        <span class="indicator active"></span>
                        <span class="indicator"></span>
                        <span class="indicator"></span>
                    </div> -->
            <div class="star" @click.stop="saveRun(run)">
                <img src="../../svg/addToStarred.svg" alt="Enregistrer le sentier">
            </div>
        </div>
    </div>
    <!-- </li>
    </ul> -->
</template>

<script setup>
import { onMounted } from 'vue';
import { formatDuration } from '../composable/formatDuration.js';

defineProps({
  run: {
    type: Object,
    required: true,
  },
})

function redirectToDetail(runData) {
    localStorage.setItem('runData', JSON.stringify(runData));
    window.location.hash = "#details-sentier";
}

function saveRun(runData) {
    // Get existing saved runs from localStorage
    let savedRuns = JSON.parse(localStorage.getItem('savedRuns')) || [];

    // Add the new run if it's not already saved
    if (!savedRuns.find(run => run.id === runData.id)) {
        savedRuns.push(runData);
        localStorage.setItem('savedRuns', JSON.stringify(savedRuns));
    }
}
</script>

<style scoped>
@import url('../../css/vignette.css');
</style>