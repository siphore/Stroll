<template>
    <ul class="cards">
        <li v-for="(run, index) in runs" :key="index" class="card-item" @click="redirectToDetail(run)">
            <div class="card" v-if="runs.length > 0">
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
                    <div class="card-indicators">
                        <span class="indicator active"></span>
                        <span class="indicator"></span>
                        <span class="indicator"></span>
                    </div>
                    <div class="star">
                        <img src="../../svg/addToStarred.svg" alt="Enregistrer le sentier">
                    </div>
                </div>
            </div>
        </li>
    </ul>
</template>

<script setup>
import { onMounted } from 'vue';
import { runs, fetchRuns } from '../composable/fetchRuns.js';
import { formatDuration } from '../composable/formatDuration.js';

function redirectToDetail(runData) {
    localStorage.setItem('runData', JSON.stringify(runData));
    window.location.hash = "#details-sentier";
}

onMounted(() => {
    fetchRuns();
});
</script>



<style scoped>
.cards {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    list-style: none;
    height: 60vh;
    padding: 0;
}

.card-item {
    border-radius: 15px;
    overflow: hidden;
    width: 90vw;
    height: 25vh;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card {
    position: relative;
    width: 100%;
    height: 25vh;
    border-radius: 15px;
    overflow: hidden;
}

.card-image {
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    z-index: 0;
}

.card-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.4);
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 5vw;
    box-sizing: border-box;
    z-index: 1;
}

.star {
    display: flex;
    justify-content: end;
    width: 100%;
}

.card-header {
    display: flex;
    justify-content: space-between;
    font-size: 1em;
    color: #fff;
}

.card-header span {
    display: flex;
    align-items: center;
}

.card-header i {
    margin-right: 5px;
}

.card-content {
    padding-bottom: 10px;
}

.card-title {
    font-size: 1.5em;
    margin: 10vh 0 1vh 0;
    font-weight: bold;
}

.card-location {
    font-size: 1em;
    color: #ccc;
    margin: 0;
}

.card-indicators {
    position: absolute;
    display: flex;
    justify-content: center;
    align-items: end;
    width: 80vw;
    height: 85%;
}

.indicator {
    width: 10px;
    height: 10px;
    background: #ccc;
    border-radius: 50%;
    margin: 0 5px;
}

.indicator.active {
    background: #d4a959;
}
</style>