<template>
    <ul class="cards">
        <li v-for="(run, index) in runs" :key="index" class="card-item">
            <div class="card" @click="redirectToDetail(run)" v-if="runs.length > 0">
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
import { getNavHeight } from '../composable/navHeight.js';

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
    list-style: none;
    margin: 0;
    padding: 0;
    max-height: 56vh;
    margin-bottom: 10rem;
}

.card-item {
    border-radius: 15px;
    overflow: hidden;
    width: 90vw;
    height: 15rem;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card-item:last-child {
    margin-bottom: 10rem;
}

.card {
    position: relative;
    width: 100%;
    height: 15rem;
    border-radius: 15px;
    overflow: hidden;
    margin: 2rem 0;
}

.card-image {
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    z-index: 1;
}

.card-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 5vw;
    box-sizing: border-box;
    z-index: 1;
}

.star {
    position: absolute;
    display: flex;
    justify-content: end;
    width: 80vw;
    margin-top: 9rem;
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
    padding-bottom: 2rem;
}

.card-title {
    font-size: 1.5em;
    font-weight: bold;
    margin: 0;
}

.card-location {
    font-size: 1em;
    color: #ccc;
    margin: 0;
}

/* .card-indicators {
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
} */

@media (min-width: 1000px) {
    .card-item {
        width: 24rem;
        height: 15rem;
    }

    .card {
        height: 15rem;
    }
}
</style>