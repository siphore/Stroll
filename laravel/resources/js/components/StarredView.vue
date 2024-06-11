<template>
    <div id="starred">
        <h1 class="title">Enregistré</h1>
        <ul class="cards scrollable">
            <li v-for="(run, index) in savedRuns" :key="index" class="card-item">
                <div class="card" @click="redirectToDetail(run)" v-if="savedRuns.length > 0">
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
                        <div class="star" @click.stop="removeRun(run)">
                            <img src="../../svg/removeStarred.svg" alt="Enregistrer le sentier">
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { formatDuration } from '../composable/formatDuration.js';

const savedRuns = ref([]);

function removeRun(runData) {
    let runs = JSON.parse(localStorage.getItem('savedRuns')) || [];
    runs = runs.filter(run => run.id !== runData.id);
    localStorage.setItem('savedRuns', JSON.stringify(runs));
    savedRuns.value = runs;
}

onMounted(() => {
    const runs = JSON.parse(localStorage.getItem('savedRuns')) || [];
    savedRuns.value = runs;
});
</script>

<style scoped>
@import url('../../css/vignette.css');

.title {
    padding: 2rem 0 0 2rem;
}

.cards {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 0;
}
</style>
