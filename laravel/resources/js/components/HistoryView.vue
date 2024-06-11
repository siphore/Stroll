<template>
    <div id="historique" class="scrollable">
        <button class="back-button" @click="goBack">
            <img src="../../svg/back_button.svg" alt="Retour">
        </button>
        <h1 class="title">Historique des sentiers</h1>
        <ul class="cards">
            <li v-for="(run, index) in runs" :key="index" class="card-item">
                <Vignette :run="run" />
            </li>
        </ul>
        <!-- <div class="run-list">
            <div class="run-card" v-for="run in runs" :style="{ backgroundImage: `url(${run.img})` }">
                <div class="run-info">
                    <h2 class="run-name">{{ run.name }}</h2>
                    <p class="run-location">{{ run.district }}</p>
                </div>
            </div>
        </div> -->
    </div>
</template>

<script setup>
import { onMounted } from 'vue';
import { runs, fetchRuns } from '../composable/fetchRuns';
import Vignette from './Vignette.vue';
import { getNavHeight } from '../composable/navHeight';

function goBack() {
    window.history.back();
}

onMounted(() => {
    document.getElementById('historique').style.height = `calc(100vh - ${getNavHeight()}px - 5rem)`;
    const cards = document.querySelector(".cards");
    cards.style.margin = 0;
    fetchRuns();
})
</script>

<style scoped>
@import url('../../css/vignette.css');

h1,
h2,
p {
    margin: 0;
    padding: 0;
}

#historique {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 5rem;
}

.back-button {
    position: absolute;
    background: none;
    border: none;
    top: 2rem;
    left: 2rem;
    cursor: pointer;
}

.title {
    font-size: 1.5rem;
    color: var(--sapin-1);
}

/* .run-list {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 1.5rem;
}

.run-card {
    display: flex;
    align-items: end;
    width: 90vw;
    height: 8rem;
    border-radius: .7rem;
    background-size: cover;
    background-position: center;
}

.run-info {
    display: flex;
    flex-direction: column;
    color: #fff;
    padding: 1rem;
}

.run-info h2 {
    font-size: 1.3rem;
}

.run-info p {
    font-size: .8rem;
} */
</style>
