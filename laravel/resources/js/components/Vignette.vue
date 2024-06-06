<template>
    <ul class="cards">
        <li v-for="(index) in cardsKeys" :key="index" class="card-item">
            <div class="card">
                <div class="card-image"></div>
                <div class="card-overlay">
                    <div class="card-header">
                        <span><i class="fas fa-exchange-alt"></i> 1km</span>
                        <span><i class="fas fa-clock"></i> 1h00</span>
                        <span><i class="fas fa-mountain"></i> Facile</span>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">{{ data.name }}</h3>
                        <p class="card-location">Châtel-Saint-Denis</p>
                    </div>
                    <div class="card-indicators">
                        <span class="indicator active"></span>
                        <span class="indicator"></span>
                        <span class="indicator"></span>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</template>

<script setup>
import { ref } from 'vue';
import { displayCards } from "../composable/vignette.js";

const cards = displayCards();
const cardsKeys = Object.keys(cards);

const runs = ref([]);

async function getRuns() {
    const runsResp = await axios.get('/api/runs');
    runs.value = runsResp.data;
    return runs.value[0];
}
const data = await getRuns();

console.log(data);
</script>

<style scoped>
.cards {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    list-style: none;
    height: 50vh;
    padding: 0;
    /* overflow-y: scroll; */
}

.card-item {
    margin: 10px;
    border-radius: 15px;
    overflow: hidden;
    width: 90vw;
    height: 25vh;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card {
    position: relative;
    width: 100%;
    height: 240px;
    border-radius: 15px;
    overflow: hidden;
}

.card-image {
    width: 100%;
    height: 100%;
    background-image: url('https://awwway.ch/wp-content/uploads/2017/06/Pleiades_sentier_narcisses_Montreux_7-1024x683.jpg');
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
    padding: 20px;
    box-sizing: border-box;
    z-index: 1;
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
    margin: 0;
    font-weight: bold;
}

.card-location {
    font-size: 1em;
    color: #ccc;
}

.card-indicators {
    display: flex;
    justify-content: center;
    margin-top: 10px;
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