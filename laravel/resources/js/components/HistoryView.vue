<template>
    <div id="historique">
        <button class="back-button" @click="goBack">
            <img src="../../svg/back_button.svg" alt="Retour">
        </button>
        <h1 class="title">Historique des sentiers</h1>
        <div class="scrollable">
            <ul class="cards">
                <li v-for="(run, index) in runs" :key="index" class="card-item">
                    <Vignette :run="run" />
                </li>
            </ul>
        </div>
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

.cards {
    max-height: 100vh;
}
</style>
